<?php include("includes/init.php"); ?>

<!--//Accessing the Admin page-->
<?php if (!$session->is_signed_in()){ redirect("login.php");} ?>

<!--Detect the Id-->

<?php
  if (empty($_GET['id'])){
      //Redirect
      redirect("users.php");
  }

  //Instantiate
$user = User::find_by_id($_GET['id']);

  if ($user){
      $session->message("The {$user->id} User has been deleted");
      $user->delete();

      redirect("users.php");

  }else{
      redirect("users.php");
  }
?>

