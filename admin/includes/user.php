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
        return     $result_set;

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


*/



























