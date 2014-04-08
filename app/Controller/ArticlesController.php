<?php 

App::uses('AppController', 'Controller');

class ArticlesController extends AppController {
	
	public $name = 'Articles';

	public $plugin = null;

	public $components = array();

	public $presetVars = true;

	public function isAuthorized($user = null) {
	    if ($this->action === 'add') {
	        return true;
	    }
	    if (in_array($this->action, array('edit', 'delete'))) {
	    	if (isset($this->request->params['pass']) && !empty($this->request->params['pass'])) {
	    		$adId = $this->request->params['pass'][0];
	    		if ($this->Article->isOwnedBy($articleId, $user['id'])) {
		            return true;
		        }
	    	}
	    }
	    return parent::isAuthorized($user);
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

	public function beforeRender() {
		parent::beforeRender();
	}

	public function beforeFilter() {
		parent::beforeFilter();
		$this->_setupAuth();
		$this->_setupPagination();

		$this->set('model', $this->modelClass);
	}

	protected function _setupAdminPagination() {
		$this->Paginator->settings = array(
			'limit' => 20,
			'order' => array(
				$this->modelClass . '.created' => 'desc'
			),
		);
	}

	protected function _setupPagination() {
		$this->Paginator->settings = array(
			'limit' => 20,
			'order' => array(
				$this->modelClass . '.created' => 'desc'
			),
		);
	}

	protected function _setupAuth() {
		$this->Auth->allow('index', 'view', 'abusive', 'suggest', 'contact_owner');
	}

	public function index() {
		
	}
}