<?php include("includes/init.php"); ?>

<!--//Accessing the Admin page-->
<?php if (!$session->is_signed_in()){ redirect("login.php");} ?>

<!--Detect the Id-->

<?php
  if (empty($_GET['photo_id'])){
      //Redirect
      redirect("photos.php");
  }

  //Instantiate
$photo = Photo::find_by_id($_GET['photo_id']);

  if ($photo){
      $photo->delete_photo();
  }else{
      redirect("photos.php");
  }
?>

