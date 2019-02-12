<?php
class User
{
    //Property
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

        $result_set =self:: find_this_query("SELECT * FROM  users WHERE id= $user_id LIMIT  1");

        $found_user = mysqli_fetch_array($result_set);

        return   $found_user;
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
        $object_properties = get_object_vars($this);

        //Find if the key exists
        return array_key_exists($the_attribute, $object_properties);
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



























