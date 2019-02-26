<?php

class User  extends  Db_object

{
    //Properties

    //Abstract Tables
    protected  static  $db_table = "users";
    protected  static  $db_table_fields = ['username','password','first_name','last_name','user_image'];  // Column from database


    public $id ;
    public $username;
    public $password;
    public $first_name;
    public $last_name;
    public $user_image;
    public $upload_directory     = "images";
    public $image_placeholder    = "https://placehold.it/400x400&text=image";

//    public  $custom_errors        = [];
//    public  $upload_errors_array  = [
//
//        //Associative Arrays
//        UPLOAD_ERR_OK             =>  "There is no error, the file uploaded with success",
//        UPLOAD_ERR_INI_SIZE       =>  "The uploaded file exceeds the upload_max_filesize directive in php.ini.  ",
//        UPLOAD_ERR_FORM_SIZE      =>  "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.",
//        UPLOAD_ERR_PARTIAL        =>  "The uploaded file was only partially uploaded. ",
//        UPLOAD_ERR_NO_FILE        =>  "No file was uploaded. ",
//        UPLOAD_ERR_NO_TMP_DIR     =>  "Missing a temporary folder. Introduced in PHP 5.0.3. ",
//        UPLOAD_ERR_CANT_WRITE     =>  "Failed to write file to disk. Introduced in PHP 5.1.0. ",
//        UPLOAD_ERR_EXTENSION      =>  "A PHP extension stopped the file upload.",
//
//    ];
//


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

        $the_result_array = self::find_by_query($sql);

        return !empty($the_result_array ) ? array_shift($the_result_array ): false;

    }

    //Image
    public function  image_path_and_placeholder(){
        return empty($this->user_image) ? $this->image_placeholder : $this->upload_directory .DS. $this->user_image;
    }




    public function upload_photo(){


            if (!empty($this->custom_errors))  {
                return false;
            }
            //Check if the user_image is empty
            if (empty($this->user_image) || empty($this->tmp_path)){
                $this->custom_errors[] = "The file was not available";
                return false;
            }

            //target path.permanent location of file
            $target_path = SITE_ROOT .DS . 'admin' . DS . $this->upload_directory . DS .$this->user_image;

            //var_dump($target_path);

            //Check if file exists
            if (file_exists($target_path )) {
                $this->custom_errors[] = "This file {$this->user_image} already exists";
                return false;

            }

            //Move the file

            if (move_uploaded_file($this->tmp_path, $target_path)){
                //if ($this->create()){ }
                    //take the temp out
                    unset($this->tmp_path);
                    return true;

            }else {
                //Permission
                $this->custom_errors[] = "The file directory probably does not have permission";
                return false;
            }
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



























