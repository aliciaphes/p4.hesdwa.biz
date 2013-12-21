<?php

class users_controller extends base_controller {

    public function __construct() {

        parent::__construct();

    } 



    public function validate_email($address) {
        # Use a regular expression to make sure it is a valid email address
        return preg_match('/^[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/i', $address);
    }


    public function signup($error = NULL) {

        # Setup view
        $this->template->content = View::instance('v_users_signup');
        $this->template->title = 'Sign up';

        # Pass data to the view
        $this->template->content->error = $error;

        # Render template
        echo $this->template;
    }



    public function p_signup() {

        # If email is not valid, redirect to view with parameter to show error
        if (!$this->validate_email($_POST['email']))
            Router::redirect("/users/signup/wrong_email");

        else{
            # Check if email already exists
            $user_details = DB::instance(DB_NAME)->select_row("SELECT * FROM users
                WHERE email = '".$_POST['email']."'");

            if(isset($user_details))
                Router::redirect("/users/signup/error");

            else{
                # Brand new user, correct POST data
                # Last/first name, email and password are retrieved from the form.
                # We set the rest of the DB fields (previously sanitizing):

                $_POST = DB::instance(DB_NAME)->sanitize($_POST);

                $_POST['created']  = Time::now();
                $_POST['modified'] = Time::now();
                $_POST['uTimezone'] = TIMEZONE;

                # Encrypt the password  
                $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);            

                # Create an encrypted token via their email address and a random string
                $_POST['token'] = sha1(TOKEN_SALT.$_POST['email'].Utils::generate_random_string());

                # Insert this user into the database
                $success = DB::instance(DB_NAME)->insert_row('users', $_POST);

                # If the insertion is successful, we modify 'last_login':
                if($success > 0){
                    $data = Array("last_login" => Time::now());
                    DB::instance(DB_NAME)->update("users", $data, "WHERE user_id  = '".$success."'");
                }else{
                    die("<h2>There's been an error creating your credentials</h2>");
                }

                # Auto login user:
                $this->login_success($_POST['token']);

                # Send them to the main page
                Router::redirect('/trips/index');                
            }
        }
    }


    public function login_success($token) {

        # Store this token in a cookie
        setcookie("token", $token, strtotime('+1 year'), '/');

        # update last login date:
        $data = Array();
        $data["last_login"] = Time::now();

        DB::instance(DB_NAME)->update("users", $data, "WHERE token  = '".$token."'");  
    }




    public function login($error = NULL) {

        # Setup view
        $this->template->content = View::instance('v_users_login');
        $this->template->title   = "Welcome!";

        # Pass data to the view
        $this->template->content->error = $error;

        # Render template
        echo $this->template;        
    }




    public function p_login() {

        # If email is not valid, redirect to view with parameter to show error
        if (!$this->validate_email($_POST['email']))
            Router::redirect("/users/login/wrong_email");

        else{

           # Sanitize the user entered data to prevent issues (re: SQL Injection Attacks)
            $_POST = DB::instance(DB_NAME)->sanitize($_POST);

           # Hash submitted password so we can compare it against one in the db
            $_POST['password'] = sha1(PASSWORD_SALT.$_POST['password']);

           # Search the db for this email and password
           # Retrieve the token if it's available
            $q = "SELECT token 
            FROM users 
            WHERE email  = '".$_POST['email']."' 
            AND password = '".$_POST['password']."'";

            $token = DB::instance(DB_NAME)->select_field($q);


            # If we didn't find a matching token in the database, it means login failed
            if(!$token) 
                # Send error and redirect to login page
                Router::redirect("/users/login/error");

            else{ # login succeeded:

                $this->login_success($token);

                # Send them to the main page
                Router::redirect("/");
            }
        }     
    }



    public function logout() {

        # Generate and save a new token for next login
        $new_token = sha1(TOKEN_SALT.$this->user->email.Utils::generate_random_string());

        # Create the data array we'll use with the update method
        # In this case, we're only updating one field, so our array only has one entry
        $data = Array("token" => $new_token);

        # Do the update
        DB::instance(DB_NAME)->update("users", $data, "WHERE token = '".$this->user->token."'");

        # Delete their token cookie by setting it to a date in the past - effectively logging them out
        setcookie("token", "", strtotime('-1 year'), '/');

        # Send them back to the main index.
        Router::redirect("/"); 
    }




    public function edit() {

        if(!$this->user) 
            Router::redirect('/users/login');
        else{
            # Setup view
            $this->template->content = View::instance('v_users_edit');
            $this->template->title   = "Profile";

            # Render template
            echo $this->template;   
        }    
    }


    public function p_edit() {

        # If user clicked on 'update'
        if(isset($_POST['update'])){

            $data = Array(
                "first_name" => $_POST['first_name'],
                "last_name"  => $_POST['last_name'],
                "uTimezone"  => $_POST['uTimezone'],
                "interests"  => $_POST['interests']
                );


            $user_details = DB::instance(DB_NAME)->select_row(
                "SELECT first_name, last_name, uTimezone, interests
                FROM users WHERE user_id = ".$this->user->user_id);

            # If entered data is not the same as current info in DB, we change mod.date
            if(array_diff($data, $user_details)){
                $data["modified"] = Time::now();
            }

            DB::instance(DB_NAME)->update("users", $data, "WHERE user_id = ".$this->user->user_id);

            # Redirect to user's profile
            Router::redirect('/users/profile');


        }
        # Otherwise, user clicked on 'cancel' (we ignore the 'clear' button)
        elseif(isset($_POST['cancel'])){
            # Redirect to user's profile
            Router::redirect('/users/profile');
        }
       
    }






    public function profile($user_name = NULL) {

        if(!$this->user) 
            Router::redirect('/users/login');
        else{
        # Create a new View instance
            $this->template->content = View::instance('v_users_profile');
            $this->template->title   = "Your profile";

            $this->template->user_name = $user_name;

        # Render template
            echo $this->template; 
        } 

    }



} # end of class

?>