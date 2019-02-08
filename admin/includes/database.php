<?php

//Include config
 require_once ("new_config.php");

class Database {

    public $connection;

    //Constructor
    public  function  __construct()
    {
        // Will start Automatically DB
        $this->open_db_connection();
    }

    public function  open_db_connection(){
        $this->connection = mysqli_connect(
            DB_HOST,
            DB_USER,
            DB_PASS,
            DB_NAME,
            DB_PORT);

        if (mysqli_connect_errno()){

            die("Dtabase Connection failed badly" . mysqli_error());
        }
    }

    // Query Method

    public function query($sql){
        $result = mysqli_query($this->connection, $sql);
        if (!$result){
            die("Query Failed");
        }

        return $result;
    }
}

//Instantiated the database

$database = new Database();

//$database->open_db_connection();



