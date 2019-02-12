<?php

//Include config
 require_once ("new_config.php");

class Database {

    //open connection
    public $connection;

    //Constructor
    public  function  __construct()
    {
        // Will start Automatically DB
        $this->open_db_connection();
    }

    public function  open_db_connection(){
        //$this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

        if ($this->connection->connect_errno){  //mysqli_connect_errno()

            die("Database Connection failed badly" . $this->connection->connect_error);
        }
    }

    // Query Method

    public function query($sql){
        $result = $this->connection->query($sql);    //mysqli_query($this->connection, $sql);
        $this->confirm_query( $result);
        return $result;
    }

    private  function  confirm_query($result){
        if (!$result){
            die("Query Failed" .$this->connection->error);
        }

    }

    //Escape string

    public function  escape_string($string){
        $escape_string = $this->connection->real_escape_string($string);
        return $escape_string;
    }

    //Insert Id

    public function  the_insert_id(){
        return $this->connection->insert_id;
    }


}

//Instantiated the database

$database = new Database();

//$database->open_db_connection();



