<?php


class Db_object{


//Display The User  find_all_users
    public static function find_all()
    {
        //Abstracting the method
        return self::find_this_query("SELECT * FROM ".  self::$db_table    ." ");
        //return self::find_this_query("SELECT * FROM  users");
    }

    //Find the user By Id  -find_user_by_id
    public static function find_by_id($user_id)
    {
        //Abstracting the method
        $the_result_array =self:: find_this_query("SELECT * FROM ".  self::$db_table    ." WHERE id= $user_id LIMIT  1");

        return !empty($the_result_array ) ? array_shift($the_result_array ): false;

        //$the_result_array =self:: find_this_query("SELECT * FROM  users WHERE id= $user_id LIMIT  1");
        /*if(!empty($the_result_array)){
            //Grab 1st Array

            $first_item = array_shift ($the_result_array);
            return   $first_item;
        }else{
            return false;
        }*/

        //return   $found_user;
    }

    //Find Query
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




}