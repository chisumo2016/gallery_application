<?php


Class Photo extends  Db_object {
    //Properties

    //Abstract Tables
    protected  static  $db_table = "photos";
    protected  static  $db_table_fields = ['photo_id ','title','description','filename','type','size'];  // Column from database

    public $photo_id ;
    public $title ;
    public $description;
    public $filename;
    public $type;
    public $size;

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







}