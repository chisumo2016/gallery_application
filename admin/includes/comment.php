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

    




}



























