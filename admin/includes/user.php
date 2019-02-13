<?php
class User
{
    //Properties
    
    //Abstract Tables
    protected  static  $db_table = "users";

    public $id ;
    public $username;
    public $password;
    public $firstname;
    public $lastname;



    //Display The User
    public static function find_all_users()
    {
       return self::find_this_query("SELECT * FROM  users");
    }

    //Find the user By Id
    public static function find_user_by_id($user_id)
    {

        $the_result_array =self:: find_this_query("SELECT * FROM  users WHERE id= $user_id LIMIT  1");

        return !empty($the_result_array ) ? array_shift($the_result_array ): false;

        /*if(!empty($the_result_array)){
            //Grab 1st Array

            $first_item = array_shift ($the_result_array);
            return   $first_item;
        }else{
            return false;
        }*/

        //return   $found_user;
    }

    public  static  function  find_this_query($sql){
        global $database;
        $result_set = $database->query($sql);

        //Add our instantation method
        $the_object_array = [];

        while($row = mysqli_fetch_array($result_set)){

            $the_object_array[] = self::instantation($row);
        }
        return     $the_object_array;

    }

   //Auto Instantation Method
    public static  function  instantation($the_record){  // from database

        $the_object = new self;

        //Associative array key and value

         foreach ($the_record as $the_attribute => $value) {
             if ($the_object->has_the_attribute($the_attribute)) {
                 //Assign to Object attribute
                 $the_object->$the_attribute = $value;
             }
         }

        return $the_object;
    }

    //Creating the attribute to find method
    private function  has_the_attribute($the_attribute) {
         //Build in function -will return all property
        $object_properties = get_object_vars($this);//$this user class

        //Find if the key exists
        return array_key_exists($the_attribute, $object_properties);
    }


    //Verify User
    public static  function  verify_user($username, $password){
        global  $database;

        //Sanitize our database
        $username  = $database->escape_string($username);
        $password  = $database->escape_string( $password);

        $sql  =  "SELECT * FROM users  WHERE ";
        $sql  .= "username = '{$username}' ";
        $sql  .= "AND password = '{$password}' ";
        $sql  .="LIMIT 1";

        $the_result_array = self:: find_this_query($sql);

        return !empty($the_result_array ) ? array_shift($the_result_array ): false;


    }



    // CRUD - USER
    public function  create(){
        global  $database;
        //$sql = "INSERT INTO users (username, password, first_name, last_name)";
        $sql = "INSERT INTO ".self::$db_table ." (username, password, first_name, last_name)";
        $sql .= "VALUES ('";
        $sql .=$database->escape_string($this->username)  . "', '";
        $sql .=$database->escape_string($this->password)  . "', '";
        $sql .=$database->escape_string($this->firstname) . "', '";
        $sql .=$database->escape_string($this->lastname)  . "')";

        //Send Query
        if($database->query($sql)){

            //Last Id
            $this->id = $database->the_insert_id();
            return true;

        }else{

            return false;
        }
    }

    //Update
    public function  update(){
        global  $database;

        //$sql = "UPDATE users SET ";
        $sql = "UPDATE ".self::$db_table ."  SET ";
        $sql .= "username= '"    . $database->escape_string($this->username)  . "', ";
        $sql .= "password= '"    . $database->escape_string($this->password)  . "', ";
        $sql .= "first_name= '"  . $database->escape_string($this->firstname) . "', ";
        $sql .= "last_name= '"   . $database->escape_string($this->lastname)  . "' ";
        $sql .= " WHERE id="   .  $database->escape_string($this->id);

        //Send Query Database
        $database->query($sql);

        return (mysqli_affected_rows($database->connection) == 1) ? true : false;



    }
    //Delete

    public function  delete(){
        global  $database;

        //$sql  = "DELETE FROM users ";
        $sql  = "DELETE FROM " .self::$db_table ."  ";
        $sql .= "WHERE id=" . $database->escape_string($this->id);
        $sql .= " LIMIT 1";

        //Send to the database
        $database->query($sql);
        return (mysqli_affected_rows($database->connection) == 1) ? true : false;
    }

    //Abstraction

    public function  save(){
        return isset($this->id) ? $this->update() : $this->create();
    }
}
















//  //Display The User
/*public static function find_all_users()
{
    global $database;

    $result_set = $database->query("SELECT * FROM  users");

    return $result_set;
}

public static function find_user_by_id($user_id)
    {
        global $database;

        $result_set = $database->query("SELECT * FROM  users WHERE id= $user_id LIMIT  1");

        $found_user = mysqli_fetch_array($result_set);

        return   $found_user;
    }


//Auto Instantation Method

    public static  function  instantation($found_user){
        //Assign Array value to object

        $the_object = new self;

        $the_object-> id            = $found_user['id'];
        $the_object-> username      = $found_user['username'];
        $the_object-> password      = $found_user['password'];
        $the_object-> first_name    = $found_user['first_name'];
        $the_object-> last_name     = $found_user['last_name'];

        return $the_object;
    }


*/



























