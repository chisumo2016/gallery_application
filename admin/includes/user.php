<?php
class User  extends  Db_object
{
    //Properties

    //Abstract Tables
    protected  static  $db_table = "users";
    protected  static  $db_table_fields = ['username','password','first_name','last_name'];  // Column from database


    public $id ;
    public $username;
    public $password;
    public $firstname;
    public $lastname;

    
    //Verify User
    public static  function  verify_user($username, $password){
        global  $database;

        //Sanitize our database
        $username  = $database->escape_string($username);
        $password  = $database->escape_string( $password);

        //Abstracting the method
        $sql  =  "SELECT * FROM ".  self::$db_table    ." WHERE ";
        //$sql  =  "SELECT * FROM users  WHERE ";
        $sql  .= "username = '{$username}' ";
        $sql  .= "AND password = '{$password}' ";
        $sql  .="LIMIT 1";

        $the_result_array = self::find_this_query($sql);

        return !empty($the_result_array ) ? array_shift($the_result_array ): false;

    }

      // Create - USER
    public function  create(){

        global  $database;

        //Abstract the Method
        //$properties = $this->properties();
        $properties = $this->clean_properties();//escape

        $sql  = "INSERT INTO " . self::$db_table . "(" . implode(",", array_keys($properties)) . ") ";
        $sql .= "VALUES ('". implode("','", array_values($properties)) ."')";

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

        //Abstract the Method
        //$properties = $this->properties();
        $properties = $this->clean_properties();

        $properties_pairs = [];

        foreach ($properties as $key => $value) {
            $properties_pairs[]  = "{$key}='{$value}'";
        }

        //$sql = "UPDATE users SET ";
        $sql = "UPDATE " .self::$db_table . "  SET ";
        $sql .= implode(", ", $properties_pairs);
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

    //Abstract Method --"Modified the Properties method in User Class
    protected  function properties(){

        $properties = [];

        foreach (self::$db_table_fields as $db_field ){
            //check exist other wise we can assign
            if (property_exists($this, $db_field)){
                //assign on array on property
                $properties[$db_field] = $this->$db_field ;
            }
        }
        //Return all array
        return $properties;
        //return get_object_vars($this);
    }

    //Escape Value From Abstract Methods
    protected function clean_properties(){
        global  $database;

        //Empty [] to put a clean value
        $clean_properties = [];
        //Loop
        foreach ($this->properties() as $key => $value) {
            //assign the value
            $clean_properties[$key] = $database->escape_string($value);
        }
        //Array -contain key and values
        return $clean_properties;
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


public function create(){



        //$sql = "INSERT INTO users (username, password, first_name, last_name)";
        /*Abstract Tables*/
//$sql = "INSERT INTO " .self::$db_table ." (username, password, first_name, last_name)";

/*$sql .=$database->escape_string($this->username)  . "', '";
$sql .=$database->escape_string($this->password)  . "', '";
$sql .=$database->escape_string($this->firstname) . "', '";
$sql .=$database->escape_string($this->lastname)  . "')";


}


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

*/



























