<?php
require_once ("init.php");

//Instantiate Object
$user = new User();
//Catch value

if(isset($_POST['image_name'])) {


    $user->ajax_save_user_image($_POST['image_name'], $_POST['user_id']);
}



if(isset($_POST['photo_id'])) {


    Photo::display_sidebar_data($_POST['photo_id']);
}


