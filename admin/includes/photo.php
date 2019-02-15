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

}