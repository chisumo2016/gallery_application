<?php


class Comment  extends  Db_object
{
    //Properties

    //Abstract Tables
    protected static $db_table = "comments";
    protected static $db_table_fields = ['photo_id', 'author', 'body'];  // Column from database


    public $id;
    public $photo_id;
    public $author;
    public $body;


    //Method

    public  static  function create_comment($photo_id , $author="Joh Gon", $body=""){
        //Check condition
        if (!empty($photo_id) && !empty($author) && !empty($body)){
            
            //Instantiated the Object
            $comments = new Comment();

            //Assign the value to properties
            $comments->photo_id = (int)$photo_id;
            $comments->author   = $author;
            $comments->body     = $body;

            return $comments;
        }else{

            return false;
        }
    }




}



























