<?php

/**
 * 
 */
class UsersController extends AppController
{ 


	public $name  ='Users';


	public function index(){
			$this->User->recursive =0;
			$this->set("users",$this->User->find('all'));
	}

    public function beforeFilter() {
        parent::beforeFilter();
        // $this->Auth->allow('updateprofile','register','thankyou'); 
   
    }

	public function login() {
	
	   //if already logged-in, redirect
		if($this->Session->check('Auth.User')){
			$this->redirect(array('action' => 'home'));		
		}
        if ($this->request->is('POST')) {

            $email           = $this->request->data['email'];
            $pass            = $this->request->data['password'];
          
            $user  = $this->User->find('first', array(
               'conditions' => array(
	                'User.email'     => $email,
	                'User.password'  => AuthComponent::password($pass)
                )
            ));
         
            if($user){
                $this->Auth->login($user);
                return $this->redirect($this->Auth->redirectUrl());
            }else{ 
	           $this->Session->setFlash(__('Invalid username or password') );
            	return $this->redirect(array('action' => 'login'));
            }
            // $this->Session->setFlash(__('Invalid username or password'));
                
            // $error = 'Invalid username or password, try again';
            // return $this->set('error', $error);
        }

    }
	
	public function register() {
			
	       if ($this->request->is('POST')) {
			   $this->request->data['created_ip'] = $this->request->clientIp();
			    $this->User->create();
			if ($this->User->save($this->request->data)) {
					
                $message = "The user has been created";
				 $this->set('success',$message);
			    return $this->redirect(array('action' => 'thankyou'));

			}else {

				 $message = $this->validationErrors;
				 return $this->set('success',$message);
			}	
        }

	}


	public function home() {

	   $query  = $this->User->find('first', array(
                'conditions' => array(
	                'User.id'     => AuthComponent::user('User')['id'],
	              
                )
            ));
		   $this->set('results',$query);


         $people =$this->User->find('all', array(
                'conditions' => array(
	                'User.id !='     => AuthComponent::user('User')['id'],
	              
                )
            ));
        	$this->set('activeusers',$people);
 
        

	}

	public function userprofile(){


          $people =$this->User->find('all', array(
                'conditions' => array(
	                'User.id !='     => AuthComponent::user('User')['id'],
	              
                )
            ));

		   $query  = $this->User->find('first', array(
                'conditions' => array(
	                'User.id'     => AuthComponent::user('User')['id'],
	              
                )
            ));
		   $this->set('results',$query);
 		   $query2  = $this->User->find('all',array());
		   $this->set('people',$people);

	}


	public function updateprofile($id){

			
           date_default_timezone_set('Asia/Manila');
		   $query  = $this->User->find('first', array(
                'conditions' => array(
	                'User.id'     => AuthComponent::user('User')['id'],
	              
                )
            ));

          $people =$this->User->find('all', array(
                'conditions' => array(
	                'User.id !='     => AuthComponent::user('User')['id'],
	              
                )
            ));
 
		   $this->set('results',$query);
           $this->set('people',$people);

		 if ($this->request->is('POST')) {

		 	  $name       = $this->request->data['fullname'];
		 	  $hubby      = $this->request->data['User']['hubby'];
		 	  $birthdate  = $this->request->data['birthdate'];
		 	  $gender     = $this->request->data['gender'];
		 	  
		 	  $modified   = date('Y/m/d H:i:s');
              $modifed_ip = $this->request->clientIp();

			  $imagprof        = $this->request->data['User']['image']['name'];
			  $imagePath       = WWW_ROOT . DS . 'img' . DS . $imagprof; 

			  move_uploaded_file($this->request->data['User']['image']['tmp_name'], $imagePath );

     	if (!$this->User->id) {

	          	 if($imagprof !=""){
			       $this->User->updateAll(
					    array(
						    'image'       => "'$imagprof'",
						    'name'        => "'$name'",
 						    'gender'      => "'$gender'",
						    'birthdate'   => "'$birthdate'",
						    'hubby'       => "'$hubby'",
						    'modified'	  => "'$modified'", 
						    'modifed_ip'  => "'$modifed_ip'"


					  		),
					   	 array('id' => $id)
						);
	          	 }else{
	          	 		$this->User->updateAll(
					    array(
					    	'name'        => "'$name'",
						    'gender'      => "'$gender'",
						    'birthdate'   => "'$birthdate'",
						    'hubby'       => "'$hubby'",
						    'modified'	  => "'$modified'", 
						    'modifed_ip'  => "'$modifed_ip'"


					  		),
					   	 array('id' => $id)
						);
	          	 }
			
			   $this->redirect(array('action' => 'userprofile'));
			}  				
  		}

	  
     }

	public function logout() {
	    date_default_timezone_set('Asia/Manila');
	    $id              = AuthComponent::user('User')['id'];
	    $last_login_time = date('Y/m/d H:i:s');
	    $this->User->updateAll(
		  array('last_login_time'=> "'$last_login_time'",),
		   array( 'User.id'   => $id)
			);
	    return $this->redirect($this->Auth->logout());
	}
	public function thankyou(){

	}

}?>
