<?php

//Parents Class Which control the All Program

class Db_object{

    public  $custom_errors        = [];
    public  $upload_errors_array  = [

        //Associative Arrays
        UPLOAD_ERR_OK             =>  "There is no error, the file uploaded with success",
        UPLOAD_ERR_INI_SIZE       =>  "The uploaded file exceeds the upload_max_filesize directive in php.ini.  ",
        UPLOAD_ERR_FORM_SIZE      =>  "The uploaded file exceeds the MAX_FILE_SIZE directive that was specified in the HTML form.",
        UPLOAD_ERR_PARTIAL        =>  "The uploaded file was only partially uploaded. ",
        UPLOAD_ERR_NO_FILE        =>  "No file was uploaded. ",
        UPLOAD_ERR_NO_TMP_DIR     =>  "Missing a temporary folder. Introduced in PHP 5.0.3. ",
        UPLOAD_ERR_CANT_WRITE     =>  "Failed to write file to disk. Introduced in PHP 5.1.0. ",
        UPLOAD_ERR_EXTENSION      =>  "A PHP extension stopped the file upload.",

    ];




    //Set File Method
    //This is passing $_FILES['uploaded_file'] as Argument

    public function  set_file($file){

        //Error Check
        if (empty($file)  || !$file  || !is_array($file) ){
            $this->custom_errors[] = "There was no files uploaded here";
            return false;

        }elseif ($file['error'] !=0) {  //check if a file is uploaded
            //saving inside erors array
            $this->custom_errors[] = $this->upload_errors_array[$file['error']];
            return false;

        } else{


            //Assign  a key
            $this->user_image  = basename($file['name']);
            $this->tmp_path  = $file['tmp_name'];
            $this->type      = $file['type'];
            $this->size      = $file['size'];
            //$this->caption   = $file['caption'];
            //$this->size      = $file['alternative_text'];
        }


    }



//Display The User  find_all_users
    public static function find_all()
    {
        //Abstracting the method
        return static::find_by_query("SELECT * FROM ".  static::$db_table    ." ");
        //return static::find_this_query("SELECT * FROM  users");
    }

    //Find the user By Id  -find_user_by_id
    public static function find_by_id($id)
    {
        //Abstracting the method
        $the_result_array =static:: find_by_query("SELECT * FROM ".  static::$db_table    ." WHERE id= $id LIMIT  1");

        return !empty($the_result_array ) ? array_shift($the_result_array ): false;
        /*
          //Abstracting the method
            $the_result_array =static:: find_by_query("SELECT * FROM ".  static::$db_table    ." WHERE id= $user_id LIMIT  1");

            return !empty($the_result_array ) ? array_shift($the_result_array ): false;

         */
        //$the_result_array =static:: find_this_query("SELECT * FROM  users WHERE id= $id LIMIT  1");
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
    public  static  function  find_by_query($sql){
        global $database;
        $result_set = $database->query($sql);

        //Add our instantation method
        $the_object_array = [];

        while($row = mysqli_fetch_array($result_set)){

            $the_object_array[] = static::instantation($row);
        }
        return     $the_object_array;

    }



    //Auto Instantation Method
    public static  function  instantation($the_record){  // from database

        //Instantiate by itself

        //get_called_class() will be used to call the calling  class instead of Instantiated Class Db_Object

        $calling_class = get_called_class();
        $the_object = new $calling_class;
        //$the_object = new self;

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



    // Create - USER
    public function  create(){

        global  $database;

        //Abstract the Method
        //$properties = $this->properties();
        $properties = $this->clean_properties();//escape


        $sql  = "INSERT INTO " . static::$db_table . "(" . implode(",", array_keys($properties)) . ") ";
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
        $sql = "UPDATE " .static::$db_table . "  SET ";
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
        $sql  = "DELETE FROM " .static::$db_table ."  ";
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

        foreach (static::$db_table_fields as $db_field ){
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

    //Count All
    public  static  function  count_all(){
        global  $database;

        $sql        = "SELECT count(*) FROM " . static::$db_table;
        $result_set = $database->query($sql);
        $row        = mysqli_fetch_array($result_set);
        return array_shift($row);
    }


}