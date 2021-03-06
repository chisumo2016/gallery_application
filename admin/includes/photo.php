<?php


Class Photo extends  Db_object {
    //Properties

    //Abstract Tables
    protected  static  $db_table = "photos";
    protected  static  $db_table_fields = ['title','description','filename','type','size','caption','alternative_text' ,'user_id'];  // Column from database

    public $id ; //photo_id
    public $title ;
    public $description;
    public $filename;
    public $type;
    public $size;
    public $caption;
    public $alternative_text;
    public $user_id;

    //Setting properties Array

    public  $tmp_path;
    public  $upload_directory     = "images";
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
            $this->filename  = basename($file['name']);
            $this->tmp_path  = $file['tmp_name'];
            $this->type      = $file['type'];
            $this->size      = $file['size'];
            //$this->caption   = $file['caption'];
            //$this->size      = $file['alternative_text'];
        }


    }




    public function save(){

        //Error Checking

        if($this->id){  //photo_id  has been replaced
            $this->update();
        }else {

          if (!empty($this->custom_errors))  {
              return false;
          }
           //Check if the filename is empty
          if (empty($this->filename) || empty($this->tmp_path)){
              $this->custom_errors[] = "The file was not available";
              return false;
          }

          //target path.permanent location of file
            $target_path = SITE_ROOT .DS . 'admin' . DS . $this->upload_directory . DS .$this->filename;

            //var_dump($target_path);

            //Check if file exists
        if (file_exists($target_path )) {
            $this->custom_errors[] = "This file {$this->filename} already exists";
            return false;

        }

        //Move the file

        if (move_uploaded_file($this->tmp_path, $target_path)){
            if ($this->create()){
                //take the temp out
                unset($this->tmp_path);
                return true;
            }
        }else {
            //Permission
            $this->custom_errors[] = "The file directory probably does not have permission";
            return false;
          }
       }

    }


    //Dynamic image Path
    public function  picture_path(){

        return $this->upload_directory.DS.$this->filename;
    }


    // Delete method

    public  function  delete_photo(){
        //Delete from the table
        if ($this->delete()){
            //delete the file
            $target_path = SITE_ROOT.DS. 'admin' .DS. $this->picture_path();

            //Function to delete the file
            return unlink($target_path) ? :  false;
        }else{
            return false;
        }
    }


    //Photo Library Method
    public static function display_sidebar_data($photo_id) {


        $photo = Photo::find_by_id($photo_id);


        $output = "<a class='thumbnail' href='#'><img width='100' src='{$photo->picture_path()}' ></a> ";
        $output .= "<p>{$photo->filename}</p>";
        $output .= "<p>{$photo->type}</p>";
        $output .= "<p>{$photo->size}</p>";

        echo $output;





    }


}