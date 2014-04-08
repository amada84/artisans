<?php 

App::uses('AppController', 'Controller');

class PacksController extends AppController {
	
	public $name = 'Packs';

	public function beforeFilter() {
		parent::beforeFilter();
		//$this->Auth->allow('*');
		$this->set('modelName', $this->modelClass); 
	}

	protected function _pluginLoaded($plugin, $exception = true) {
		$result = CakePlugin::loaded($plugin);
		if ($exception === true && $result === false) {
			throw new MissingPluginException(array('plugin' => $plugin));
		}
		return $result;
	}

	protected function _setupComponents() {
		if ($this->_pluginLoaded('Search', false)) {
			$this->components[] = 'Search.Prg';
		}
	}

	protected function _setupAdminPagination() {
		$this->Paginator->settings = array(
			'limit' => 20,
			'order' => array(
				$this->modelClass . '.created' => 'desc'
			)
		);
	}

	public function __construct($request, $response) {
		$this->_setupComponents();
		parent::__construct($request, $response);
		$this->_reInitControllerName();
	}

	protected function _reInitControllerName() {
		$name = substr(get_class($this), 0, -10);
		if ($this->name === null) {
			$this->name = $name;
		} elseif ($name !== $this->name) {
			$this->name = $name;
		}
	}

	public function admin_index() {
		$this->Prg->commonProcess();
		unset($this->Pack->validate['name']);
		$this->Pack->data[$this->modelClass] = $this->passedArgs;

		if ($this->Pack->Behaviors->loaded('Searchable')) {
			$parsedConditions = $this->Pack->parseCriteria($this->passedArgs);
		} else {
			$parsedConditions = array();
		}

		$this->_setupAdminPagination();
		$this->Paginator->settings[$this->modelClass]['conditions'] = $parsedConditions;

		$this->Pack->recursive = 0;
		$this->set('packs', $this->paginate()); 
	}

	public function admin_add($pack_id = null) {
		if (!empty($this->request->data)) {

			try {
				$result = $this->Pack->add($this->data);
				if ($result !== false) {
					$this->Session->setFlash(sprintf(__d('packs', 'Le pack %s a été sauvegardée'), $result['Pack'][$this->Pack->displayField]), 'notif');
					$this->redirect(array('action' => 'index'));
				}
			} catch (OutOfBoundsException $e) {
				$this->Session->setFlash($e->getMessage(), 'notif', array('type' => 'error'));
			} catch (Exception $e) {
				$this->Session->setFlash($e->getMessage(), 'notif', array('type' => 'error'));
				$this->redirect(array('action' => 'index'));
			}
			if (!empty($this->data) && !empty($pack_id)) {
				$this->data[$this->Pack->alias]['pack_id'] = $pack_id;
			}
		}
	}

	public function admin_edit($id = null) {
		try {
			$result = $this->Pack->edit($id, $this->data);
			if ($result === true) {
				$this->Session->setFlash(__d('packs', 'Catégorie sauvegardée'), 'notif');
				$this->redirect(array('action' => 'index'));
				
			} else {
				$this->data = $result;
			}
		} catch (OutOfBoundsException $e) {
			$this->Session->setFlash($e->getMessage(), 'notif', array('type' => 'error'));
		}
	}

	public function admin_delete($id = null) {
        /*$this->Pack->id = $id;
        if (!$this->Pack->exists()) {
            throw new NotFoundException(__d('packs', 'Pack non valide'));
        }
        if ($this->Pack->delete()) {
            $this->Session->setFlash(__d('packs', 'Pack supprimé.'), 'notif');
            $this->redirect(array('action' => 'index'));
        }
        $this->Session->setFlash(__d('packs', 'Le pack ne peut être supprimé ou n\'est vide.'), 'notif', array('type' => 'error'));*/
        $this->redirect(array('action' => 'index'));
	}
}