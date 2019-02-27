<?php

//Include config
 require_once ("new_config.php");

class Database {

    //open connection
    public $connection;
    public $db;

    //Constructor
    public  function  __construct()
    {
        // Will start Automatically DB  $this->open_db_connection();
        $this->db = $this->open_db_connection();
    }

    public function  open_db_connection(){
        //$this->connection = mysqli_connect(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

        $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME, DB_PORT);

        if ($this->connection->connect_errno){  //mysqli_connect_errno()

            die("Database Connection failed badly" . $this->connection->connect_error);
        }

        return $this->connection;
    }

    // Query Method

    public function query($sql){
        $result = $this->db->query($sql);    //mysqli_query($this->connection, $sql); $result = $this->connection->query($sql);
        $this->confirm_query( $result);
        return $result;
    }

    private  function  confirm_query($result){
        if (!$result){
            die("Query Failed" .$this->db->error);  //$this->connection->error);
        }

    }

    //Escape string //Sanitize

    public function  escape_string($string){

        return  $this->db->real_escape_string($string);  //$this->connection->real_escape_string($string);

        //$escape_string = $this->db->real_escape_string($string);  //$this->connection->real_escape_string($string);
        //return $escape_string;
    }

    //Insert Id method

    public function  the_insert_id(){
        return $this->db->insert_id;
        //return mysqli_insert_id($this->connection);  return $this->connection->insert_id;
    }


}

//Instantiated the database

$database = new Database();

//$database->open_db_connection();



