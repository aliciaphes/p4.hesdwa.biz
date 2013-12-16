<?php
class posts_controller extends base_controller {

    public function __construct() {
        parent::__construct();

        # Make sure user is logged in if they want to use anything in this controller
        if(!$this->user) {
            Router::redirect('/users/login');
        }  
    }

    public function add($added = NULL) {

        # Setup view
        $this->template->content = View::instance('v_trips_add');
        $this->template->title   = "New trip";

        # Pass data to the view to check if oonga has been added
        $this->template->content->added = $added;

        # Render template
        echo $this->template;

    }

    public function p_add() {

        # Associate this post with this user
        $_POST['user_id']  = $this->user->user_id;

        # Unix timestamp of when this post was created / modified
        $_POST['created']  = Time::now();
        $_POST['modified'] = Time::now();

        # Insert into database
        DB::instance(DB_NAME)->insert('trips', $_POST);

        # Redirect to show oongas      
        Router::redirect("/posts/add/added");
    }




    public function index() {

        # Set up the View
        $this->template->content = View::instance('v_trips_index');
        $this->template->title   = $this->user->first_name."'s trips";

        // # Query
        // $q = "SELECT *
        // FROM trips 
        // WHERE user_id = ".$this->user->user_id . 
        // "ORDER BY beginTime endTime DESC" ;

        // # Run the query, store the results in the variable $trips
        // $trips = DB::instance(DB_NAME)->select_rows($q);

        // # Pass data to the View
        // $this->template->content->trips = $trips;

        // # Render the View
        // echo $this->template;


    }




} # end of the class
?>