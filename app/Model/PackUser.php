<?php 

class PackUser extends AppModel {
	
	public $useTable = 'packs_users';

	public $name = 'PackUser';

	public $belongsTo = array(
        'Pack' => array(
            'className' => 'Pack',
            'foreignKey' => 'pack_id',
            'conditions' => '',
            'fields' => '',
            'order' => '',
            'counterCache' => 'suscribed_users'
		),
		/*'User' => array(
            'className' => 'User',
            'foreignKey' => 'user_id',
            'conditions' => array('User.type' => 'pro'),
            'fields' => '',
            'order' => '',
            'counterCache' => ''
		)*/
    );

	public function add($packId = null, $userId = null) {
		if(isset($packId) && isset($userId)) {
			$days = Configure::read('Packs.pack_expires');
			$default_units = $this->Pack->getDefaultsUnits($packId);
			$data = array(
				'user_id' => $userId,
				'pack_id' => $packId,
				'units' => $default_units,
				'active' => 0,
				'pack_expires' => date('Y-m-d H:i:s', time() + ($days*24*3600))
			);
			$this->create($data);		
			$result = $this->save($data);
		}
	}

	public function edit($PackUserid = null) {
		
	}

	public function deleteStatus($user_id = null, $pack_id = null) {
		
	}
}

?>