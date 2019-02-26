<?php include("includes/init.php"); ?>

<!--//Accessing the Admin page-->
<?php if (!$session->is_signed_in()){ redirect("login.php");} ?>

<!--Detect the Id-->

<?php
  if (empty($_GET['id'])){

      //Redirect
      redirect("comments.php");
  }

  //Instantiate
$comment = Comment::find_by_id($_GET['id']);

  if ($comment){

      $comment->delete();

      redirect("comments.php");

  }else{
      redirect("comments.php");
  }
?>

