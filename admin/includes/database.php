<?php

//Include config
 require_once ("new_config.php");

class Database {

    private $connection;

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
}

//Instantiated the database

$database = new Database();

$database->open_db_connection();



