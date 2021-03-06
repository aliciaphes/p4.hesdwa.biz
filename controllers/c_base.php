<?php

class base_controller {
	
	public $user;
	public $userObj;
	public $template;
	public $email_template;

	/*-------------------------------------------------------------------------------------------------

	-------------------------------------------------------------------------------------------------*/
	public function __construct() {
						
		# Instantiate User obj
			$this->userObj = new User();
			
		# Authenticate / load user
			$this->user = $this->userObj->authenticate();					
						
		# Set up templates
			$this->template 	  = View::instance('_v_template');
			$this->email_template = View::instance('_v_email');			
								
		# So we can use $user in views			
			$this->template->set_global('user', $this->user);

		# CSS includes:
		$client_files_head = Array('/css/bootstrap3.0.0.min.css',			
								   '/css/bootstrap-responsive.min.css',
								   '/css/bootstrap-formhelpers.min.css',
								   '/css/jquery-ui-1.10.3.custom.min.css',
								   '/css/kalt.css');
		$this->template->client_files_head = Utils::load_client_files($client_files_head);


		# Javascript/jQuery includes:
		$client_files_body = Array('/js/jquery-1.10.2.min.js',
								   '/js/jquery-ui-1.10.3.custom.min.js',
								   '/js/bootstrap.min.js',
								   '/js/bootstrap-formhelpers.min.js',
								   '/js/kalt.js');
        $this->template->client_files_body = Utils::load_client_files($client_files_body);			
			
	}
	
} # eoc
