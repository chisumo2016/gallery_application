<?php
// Manage our login system

class Session{

    //Properties
    private $signed_in = false;
    public  $user_id;
    public  $message;
    public  $count;

    //Constructor
    public function  __construct()
    {
        //Start A session
        session_start();
        $this-> check_the_login();
        $this->check_message();
        $this->visitor_count();
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

    //Getter function  return true /false value
    public  function  is_signed_in(){
        return $this->signed_in;
    }

    //Function to login the user
    public  function  login($user){
        if ($user){
            $this->user = $_SESSION['user_id'] =  $user->id;  //$user->id from object
            $this->signed_in = true;
        }
    }

    //Logout the user

    public function  logout(){
        unset($_SESSION['user_id']);
        unset($this->user_id);
        $this->signed_in = false;

    }


    //Output the Message

    public function  message($msg=""){
       if (!empty($msg)) {
           //assign
           $_SESSION['message'] = $msg;
       }else{
           //getting
           return $this->message;
       }
    }

    private  function check_message(){
        if (isset($_SESSION['message'])){
            $this->message = $_SESSION['message'];
            unset($_SESSION['message']);
        }else{
            $this->message = "";
        }
    }

    //Tracking via session
    public  function  visitor_count(){
        if (isset($_SESSION['count'])){
            return $this->count = $_SESSION['count']++;
        }else{
            return  $_SESSION['count'] =1;
        }

    }


}

//Instantiated a session

$session = new Session();
$message = $session->message();


//We can put password incription