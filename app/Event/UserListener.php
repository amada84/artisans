<?php

App::uses('CakeEventListener', 'Event');

class UserListener implements CakeEventListener {
    
    public function implementedEvents() {
        return array(
	        'Model.User.afterRegister' => 'afterRegister',
	        /*'Model.User.afterEdit' => 'afterEdit',*/
	    );
    }

    public function afterRegister(CakeEvent $event) {
    	if ($event->subject()->data['User']['type'] == 'pro') {
    		$data = $event->subject()->data['User'];
			$this->PackUser = ClassRegistry::init('PackUser');
			$this->PackUser->add($data['pack_id'], $data['id']);

    		/*$emailConfig = Configure::read('Users.emailConfig');

	    	if ($emailConfig) {
				$Email = new CakeEmail($emailConfig);
			} else {
				$Email = new CakeEmail('default');
			}

			$Email = $this->_getMailInstance();
			$Email->to('palmclodys@yahoo.fr')
				->from(Configure::read('App.defaultEmail'))
				->emailFormat('html')
				->subject('Inscription Compte Pro')
				->template('new_user_pro')
				->viewVars(array(
				'model' => 'User',
				'user' => $event->subject()->data)
				->send();*/
		}
	}
}


/*Send to many users

$result = $email->template($template,'default')

                ->emailFormat('html')

                ->to(array('first@gmail.com','second@gmail.com','third@gmail.com')))
                ->from($from_email)

                ->subject($subject)

               ->viewVars($data);
*/