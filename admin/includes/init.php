<?php

// Directory Path

//Define Constant
defined('DS') ? null : define('DS', DIRECTORY_SEPARATOR);

//Define Site Root
//defined('SITE_ROOT') ? null : define('SITE_ROOT', __DIR__ );
defined('SITE_ROOT') ? null : define('SITE_ROOT', DS . 'C' . DS . 'laragon' .DS . 'www' . DS . 'gallery_application');

defined('INCLUDES_PATH') ? null : define('INCLUDES_PATH', SITE_ROOT.DS.'admin'.DS.'includes');




//Initializer File
 require_once("functions.php");
 require_once("new_config.php");
 require_once("database.php");
 require_once("user.php");
 require_once("photo.php");
 require_once("session.php");
 require_once("db_object.php");