<?php
// Manage our login system

class Session{

    //Properties
    private $signed_in;
    public  $user_id;

    //Constructor
    public function  __construct()
    {
        //Start A session
        session_start();
    }

    //Checking login Method
    private  function  check_the_login(){
        if (isset($_SESSION['user_id'])){
           $this->user_id = $_SESSION['user_id'];
           $this->signed_in = true;
        }else{
            unset($this->user_id);
            $this->signed_in = false;
        }
    }
}

//Instantiated a session

$session = new Session();