<?php

// app/Model/User.php

App::uses('AppModel', 'Model');
App::uses('BlowfishPasswordHasher', 'Controller/Component/Auth');

	class User extends AppModel
	{
      
       public $name = 'User';

	 
	
	public $validate = array(
        'name' => array(
      
            'between' => array(
                'rule' => array('lengthBetween', 5, 20),
                'message' => 'Between 5 to 15 characters'
            ),
            'notBlank' => array(
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'name is required'
            )
        ),
        'email' => array(
     
            'notBlank' => array(
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'email is required'
            )
        ),
        'password' => array(
    
            'notBlank' => array(
                'rule' => 'notBlank',
                'required' => true,
                'message' => 'password is required'
            )
        ),
  
        
    );
    
	function isUniqueUsername($check) {

		$username = $this->find(
			'first',
			array(
				'fields' => array(
					'User.id',
					'User.username'
				),
				'conditions' => array(
					'User.email' => $check['username']
				)
			)
		);

		if(!empty($username)){
			if($this->data[$this->alias]['id'] == $username['User']['id']){
				return true; 
			}else{
				return false; 
			}
		}else{
			return true; 
		}
    }
    	function isUniqueEmail($check) {

		$email = $this->find(
			'first',
			array(
				'fields' => array(
					'User.id'
				),
				'conditions' => array(
					'User.email' => $check['email']
				)
			
			)
		);

		if(!empty($email)){
			if($this->data[$this->alias]['id'] == $email['User']['id']){
				return true; 
			}else{
				return false; 
			}
		}else{
			return true; 
		}
    }
	
	public function alphaNumericDashUnderscore($check) {
        // $data array is passed using the form field name as the key
        // have to extract the value to make the function generic
        $value = array_values($check);
        $value = $value[0];

        return preg_match('/^[a-zA-Z0-9_ \-]*$/', $value);
    }
	
	public function equaltofield($check,$otherfield) 
    { 
        //get name of field 
        $fname = ''; 
        foreach ($check as $key => $value){ 
            $fname = $key; 
            break; 
        } 
        return $this->data[$this->name][$otherfield] === $this->data[$this->name][$fname]; 
    } 

  public function beforeSave($options = array()) {
		    if (isset($this->data[$this->alias]['password'])) {
		        $this->data[$this->alias]['password'] = AuthComponent::password(
		            $this->data[$this->alias]['password']
		        );
		    }
        
		    return true;
		}


 }?>