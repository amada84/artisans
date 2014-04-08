<?php

App::uses('AppModel', 'Model');

class Article extends AppModel {
	
	public $name = 'Article';

	public $findMethods = array(
		'search' => true
	);

	public $filterArgs = array(
		'name' => array('type' => 'like'),
		'id' => array('type' => 'value'),
		'category_id' => array('type' => 'value'),
	);

	public $displayField = 'name';

	public $validate = array(
		'name' => array(
			'required' => array(
				'rule' => 'notEmpty',
				'message' => 'Entrez le nom de l\'annonce.')),
		'content' => array(
			'required' => array(
				'rule' => 'notEmpty',
				'message' => 'Entrez le contenu de l\'annonce.')),
		'duration' => array(
			'naturalNumber' => array(
				'rule' => array('naturalNumber', false),
				'message' => 'La date de clôture doit être un nombre de jour'),
			'required' => array(
				'rule' => 'notEmpty',
				'message' => 'Entrez une durée.')),
		'price' => array(
			'numeric' => array(
				'rule' => 'numeric',
				'message' => 'Entrez le prix tout caractère numérique')),
		'ip_address' => array(
			'rule' => array('ip'),
			'message' => 'Donnez une adresse Ip valide.'),
	);

	public $belongsTo = array(
        'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'counterCache' => array(
            	'ads_published' => array('Article.is_active' => 1),
            	'ads_unpublished' => array('Article.is_active' => 0))),
        'Category' => array(
            'className' => 'Category',
            'foreignKey' => 'category_id',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'counterCache' => array(
            	'ads_published' => array('Article.is_active' => 1),
            	'ads_unpublished' => array('Article.is_active' => 0))));

	public function __construct($id = false, $table = null, $ds = null) {
		$this->_setupBehaviors();
		parent::__construct($id, $table, $ds);
	}

	protected function _setupBehaviors() {		
		App::uses('SearchableBehavior', 'Search.Model/Behavior');
		if (class_exists('SearchableBehavior')) {
			$this->actsAs[] = 'Search.Searchable';
		}

		App::uses('SluggableBehavior', 'Utils.Model/Behavior');
		if (class_exists('SluggableBehavior') && Configure::read('Users.disableSlugs') !== true) {
			$this->actsAs['Utils.Sluggable'] = array(
				'label' => 'name',
				'update' => true,
				'separator' => '-',
				'method' => 'multibyteSlug');
		}

		$this->actsAs['Draft'] = array(
        	'conditions' => array(
	        	'Article.is_active' => -1
	        )
		);

		$this->actsAs[] = 'Containable';
	}

	public function isOwnedBy($article, $user) {
		return $this->field('id', array('id' => $article, 'user_id' => $user)) === $article;
	}

	public function add($postData = null, $options = array()) {
		if (!empty($postData)) {

			$defaults = array(
				'returnData' => true);

			extract(array_merge($defaults, $options));

			$postData = $this->_beforeAdd($postData);

			$this->data = $postData;
			if ($this->validates()) {
				$postData[$this->alias]['closing_date'] = $this->duration($postData[$this->alias]['duration']);
				$this->create();
				$result = $this->save($postData, false);
				if ($result) {
					$result[$this->alias][$this->primaryKey] = $this->id;
					$this->data = $result;
					if ($returnData) {
						return $this->data;
					}
					return true;
				}
			}
		}
		return false;
	}

	protected function _beforeAdd($postData = array()) {

        if(isset($postData[$this->alias]['content']) && !empty($postData[$this->alias]['content'])) {
            $postData[$this->alias]['resume'] = String::truncate(
                $postData[$this->alias]['content'],
                100,
                array(
                    'ellipsis' => '...',
                    'exact' => false
                )
            );
        }
        return $postData;
    }

	protected function duration($days) {
		return date('Y-m-d H:i:s', time() + ($days*24*3600));
	}

	public function edit($articleId = null, $postData = null) {
		$article = $this->getAdForEditing($articleId);
		$this->set($article);
		if (empty($article)) {
			throw new NotFoundException(__d('articles', 'Annonce non valide.'));
		}

		if (!empty($postData)) {
			$this->set($postData);
			$result = $this->save(null, true);
			if ($result) {
				$this->data = $result;
				return true;
			} else {
				return $postData;
			}
		}
	}

	public function publish($articleId = null, $postData = null) {
		$article = $this->getAdForEditing($articleId);
		$this->set($article);
		if (empty($article)) {
			throw new NotFoundException(__d('articles', 'Annonce invalide'));
		}
		if (!empty($postData)) {
			switch ($postData['submit']) {
				case 'Valider':
					$postData[$this->alias]['is_active'] = 1;
					$postData[$this->alias]['is_editable'] = 0;
					$postData[$this->alias]['validated_date'] = date('Y-m-d H:i:s');
					break;
				
				case 'Archiver':
					if (!empty($postData[$this->alias]['user_id']) && isset($postData[$this->alias]['user_id'])) {
						$this->User->id = $postData[$this->alias]['user_id'];
						$this->User->saveField('user_can_add_post', 0);
					}
					$postData[$this->alias]['is_archived'] = 1;
					$postData[$this->alias]['is_editable'] = 0;
					$postData[$this->alias]['archived_date'] = date('Y-m-d H:i:s');
					break;

				case 'Supprimer':
					$this->delete($articleId);
					break;
			}

			$this->set($postData);
			$result = $this->save(null, true);
			if ($result) {
				$this->data = $result;
				return true;
			} else {
				return $postData;
			}
		}
	}

	public function getAdForEditing($articleId = null, $options = array()) {
		$defaults = array(
			'conditions' => array($this->alias . '.id' => $articleId));
		$options = Set::merge($defaults, $options);

		$article = $this->find('first', $options);

		if (empty($article)) {
			throw new NotFoundException(__d('articles', 'Annonce non trouvée.'));
		}

		return $article;
	}

	public function view($id = null, $slug = null, $config = array()) {
		$options = array(
			$this->alias . '.' . $this->primaryKey => $id,
			$this->alias . '.slug' => $slug,
		);
		$conditions = array_merge($options,$config);
		$article = $this->find('first', array(
			'contain' => array(
				'User'),
			'conditions' => $conditions));

		if (empty($article)) {
			throw new OutOfBoundsException(__d('articles', 'Cette annonce n\'existe pas.'));
		}
		return $article;
	}

	public function viewUserAd($userId = null) {
		$result = $this->find('all', array(
			'conditions' => array(
				$this->alias . '.user_id' => $userId,
				$this->alias . '.is_active' => 1,
				$this->alias . '.is_archived' => 0,
				$this->alias . '.is_closed' => 0)));

		if (empty($result)) {
			throw new NotFoundException(__d('articles', 'Aucune annonce trouvée.'));
		}
		return $result;
	}

	public function afterFind($results, $primary = false) {
		foreach ($results as $k => $v) {
			if (isset($v[$this->alias]['id']) && isset($v[$this->alias]['slug'])) {
				$v[$this->alias]['link'] = array(
					'controller' => 'articles',
					'action' => 'view',
					'slug' => $v[$this->alias]['slug'],
					'id' => $v[$this->alias]['id'],
				);
			}
			$results[$k] = $v;
		}
		return $results;
	}

	public function related($product, $limit = 8) {

        // Children of product
        $conditions = array(
            'OR' => array(array('Product.parent_id' => $product['Product']['id'])), // Children of product),
            'Product.id <>' => $product['Product']['id'],
            'Product.published' => 1
        );

        // Siblings and parent of product if applicable
        if (!empty($product['Product']['parent_id'])) {

            $conditions['OR'][] = array('Product.parent_id' => $product['Product']['parent_id']);
            $conditions['OR'][] = array('Product.id' => $product['Product']['parent_id']);
        }

        // Products in the same categories
        // Get category IDs in an array
        $categoryIds = Set::extract($product['Category'], '{n}.id');

        $conditionsSubQuery['category_id IN(?)'] = implode(',', $categoryIds);

        $db = $this->getDataSource();
        $subQuery = $db->buildStatement(
                array(
            'fields' => array('product_id'),
            'table' => 'categories_products',
            'joins' => array(),
            'alias' => 'c_p',
            'conditions' => $conditionsSubQuery,
            'order' => null,
            'group' => null,
            'limit' => null
                ), $this->CategoryProduct
        );
        $subQuery = 'Product.id IN (' . $subQuery . ') ';
        $subQueryExpression = $db->expression($subQuery);

        $conditions['OR'][] = $subQueryExpression;

        return $this->find('all', array(
                    'conditions' => $conditions,
                    'contain' => array('Category'),
                    'group' => 'Product.id',
                    'limit' => $limit
                ));
    }
}