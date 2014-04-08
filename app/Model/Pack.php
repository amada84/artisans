<?php

App::uses('AppModel', 'Model');

class Pack extends AppModel {

	public $name = 'Pack';

	public $displayField = 'name';

	public $filterArgs = array(
		'name' => array('type' => 'like'),
	);

	public $validate = array();

	public $hasMany = array(
        'PackUser' => array(
            'className' => 'PackUser',
            'foreignKey' => 'pack_id',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'dependent' => true
		)
    );
	

	public function __construct($id = false, $table = null, $ds = null) {
		$this->_setupBehaviors();		
		parent::__construct($id, $table, $ds);
		$this->validate = array(
			'name' => array(
				'required' => array(
					'rule' => array('notEmpty'),
					'required' => true,
					'allowEmpty' => false,
					'message' => __d('packs', 'Veuillez entrer un nom du pack')
				)
			),
			'defaut_units' => array(
				'required' => array(
					'rule' => array('notEmpty'),
					'required' => true,
					'allowEmpty' => false,
					'message' => __d('packs', 'Veuillez entrer le nombre d\'unités du pack')
				),
				'numeric' => array(
					'rule' => 'numeric',
					'message' => __d('packs', 'Veuillez entrer un entier')
				),
			),
		);
	}

	protected function _setupBehaviors() {
		App::uses('SearchableBehavior', 'Search.Model/Behavior');
		if (class_exists('SearchableBehavior')) {
			$this->actsAs[] = 'Search.Searchable';
		}
	}

	public function add($data = null, $options = array()) {
		$defaults = array(
            'returnData' => true);
        extract(array_merge($defaults, $options));
		if (!empty($data)) {
			$this->create($data);
			$result = $this->save($data);
			if ($result !== false) {
				$this->data = array_merge($data, $result);
				if ($returnData) {
					return $this->data;
				}
				return true;
			} else {
				throw new OutOfBoundsException(__d('packs', 'Impossible de sauvegarder le pack, veuillez vérifier les données.'));
			}
			return $result;
		}
	}

	public function getDefaultsUnits($id = null) {
		$conditions = array("{$this->alias}.{$this->primaryKey}" => $id);
		
		$pack = $this->find('first', array(
			'conditions' => $conditions));

		if (empty($pack)) {
			throw new OutOfBoundsException(__d('packs', 'Pack invalide'));
		}
		
		return $pack[$this->alias]['defaut_units'];
	}	

	public function edit($id = null, $data = null) {
		$conditions = array("{$this->alias}.{$this->primaryKey}" => $id);

		$pack = $this->find('first', array(
			'conditions' => $conditions));

		if (empty($pack)) {
			throw new OutOfBoundsException(__d('packs', 'Pack invalide'));
		}
		$this->set($pack);

		if (!empty($data)) {
			$this->set($data);
			$result = $this->save(null, true);
			if ($result) {
				$this->data = $result;
				return true;
			} else {
				return $data;
			}
		} else {
			return $pack;
		}
	}

	public function delete($id = null, $cascade = true) {
        
    }

    public function beforeDelete($cascade = true) {
    	
    }

    public function getPacks() {
    	return $this->find('all');
    }
}