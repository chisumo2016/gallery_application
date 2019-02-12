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
}

//Instantiated a session

$session = new Session();