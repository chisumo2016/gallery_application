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
      $session->message("The Comment with {$comment->id} has been deleted");
      redirect("comment_photo.php?id={$comment->photo_id}");

  }else{

      redirect("comment_photo.php?id={$comment->photo_id}");
  }
?>

