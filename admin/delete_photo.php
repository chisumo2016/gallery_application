<?php include("includes/init.php"); ?>

<!--//Accessing the Admin page-->
<?php if (!$session->is_signed_in()){ redirect("login.php");} ?>

<!--Detect the Id-->

<?php
  if (empty($_GET['id'])){
      //Redirect
      redirect("photos.php");
  }

  //Instantiate
$photo = Photo::find_by_id($_GET['id']);

  if ($photo){

      $photo->delete_photo();
      //Notification
      $session->message("The  {$photo->filename} has been deleted");

      redirect("photos.php");

  }else{
      redirect("photos.php");
  }
?>

