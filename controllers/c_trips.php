<?php
class trips_controller extends base_controller {

    public function __construct() {
        parent::__construct();

        # Make sure user is logged in if they want to use anything in this controller
        if(!$this->user) {
            Router::redirect('/users/login');
        }  
    }


    public function p_delete(){

        $_POST = DB::instance(DB_NAME)->sanitize($_POST);

        $buttonPressed = array_keys($_POST)[0];
        //echo $buttonPressed;

        $trip_id = array_values($_POST)[0];
        //echo $trip_id;

        if(isset($_POST[$buttonPressed])){

            DB::instance(DB_NAME)->delete('trips', "WHERE trip_id = ".$trip_id);

            Router::redirect('/trips/history');
        }

    }



    public function add($empty_airport = NULL){

        # Setup view
        $this->template->content = View::instance('v_trips_add');
        $this->template->title   = "New trip";

        # Pass data to the view to check if trip has been added
        $this->template->content->empty_airport = $empty_airport;

        # Render template
        echo $this->template;

    }

    public function p_add() {

        # If user clicked on 'save'
        if(isset($_POST['saveTrip'])){

            if($_POST['airport'] != ""){

                # Associate this post with this user
                $_POST['user_id']  = $this->user->user_id;
                $_POST['begdaTimeFmt'] = strtotime($_POST['date']);

                # Do not include country nor the button
                unset($_POST['country']);
                unset($_POST['saveTrip']);

                # Insert into database
                DB::instance(DB_NAME)->insert('trips', $_POST);

                # Redirect to show trips      
                Router::redirect("/trips/index/added");
            }

            else{
                Router::redirect("/trips/add/empty_airport");
            }



        }

    else{
            # Redirect to show trips      
        Router::redirect("/trips/index");
    } 
}



public function index($added = NULL) {

        # Set up the View
    $this->template->content = View::instance('v_trips_index');
    $this->template->title   = $this->user->first_name."'s trips";

        # Query
    $q = "SELECT *
    FROM trips 
    WHERE user_id = ".$this->user->user_id . 
    " ORDER BY begdaTimeFmt,begin_time,end_time DESC" ;

        # Run the query, store the results in the variable $trips
    $trips = DB::instance(DB_NAME)->select_rows($q);

        # save current date
    $today = Time::now();

    $upcoming = array();

        # remove items from the past
    foreach($trips as $row => $innerArray){
      foreach($innerArray as $innerRow => $value){
        if($innerRow == 'begdaTimeFmt'){
            if($value < $today){
                    // echo "borrando ";
                    // print_r($innerArray);
                    // echo "<br>";
                unset($innerArray);
            }
            else{
                array_push($upcoming, $innerArray);
            }
        }
    }
}

        // echo '<pre>';
        // print_r($upcoming);
        // echo '</pre>';

        # Pass data to the View
$this->template->content->upcoming = $upcoming;

        # Check if trip has been added
$this->template->content->added = $added;

        // # Render the View
echo $this->template;
}





public function history() {

        # Set up the View
    $this->template->content = View::instance('v_trips_history');
    $this->template->title   = $this->user->first_name."'s history";

        # Query
    $q = "SELECT *
    FROM trips 
    WHERE user_id = ".$this->user->user_id . 
    " ORDER BY date,begin_time,end_time ASC" ;

        # Run the query, store the results in the variable $list
    $list = DB::instance(DB_NAME)->select_rows($q);

        # save current date
    $today = Time::now();

    $history = array();

        # remove items from the past
    foreach($list as $row => $innerArray){
      foreach($innerArray as $innerRow => $value){
        if($innerRow == 'date'){
            if(strtotime($value) >= $today){
                    // echo "borrando ";
                    // print_r($innerArray);
                    // echo "<br>";
                unset($innerArray);
            }
            else{
                array_push($history, $innerArray);
            }
        }
    }
}

        # Pass data to the View
$this->template->content->history = $history;

        # Render the View
echo $this->template;
}


} # end of the class
?>