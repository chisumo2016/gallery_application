
<?php include("includes/header.php"); ?>
<?php include("includes/photo_library_modal.php"); ?>

<?php if (!$session->is_signed_in()){redirect("login.php");}?>

<?php


//Checking the Id
if (empty($_GET['id'])){
    //Re
    redirect("users.php");

}

   $user = User::find_by_id($_GET['id']);
    if (isset($_POST['update'])){
      //Check
        if($user){

            //Assign the Value to Object Properties
             $user->username                =   $_POST['username'];
             $user->first_name              =   $_POST['first_name'];
             $user->last_name               =   $_POST['last_name'];
             $user->password                =   $_POST['password'];

                    //Updating user modification
             if (empty($_FILES['user_image'])){
                 $user->save();


             }else{
                 $user ->set_file($_FILES['user_image']);
                 //save
                 $user->upload_photo();
                 //$user->save_user_and_image();

                 $user->save();

                 redirect("edit_user.php?id={$user->id}");

             }


        }

}

   //$users = user::find_all();
?>

<!--Modal -->







<!--============================================================================-->
    <!-- Navigation -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->

        <?php include("includes/top_nav.php")?>

        <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->

        <?php include ("includes/side_nav.php")?>
        <!-- /.navbar-collapse -->
    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">

                    <h1 class="page-header">
                     Edit User
<!--                        <small>Subheading</small>-->
                    </h1>

                    <div class="col-md-6 user_image_box">
                        <a href="#" data-toggle="modal" data-target="#photo-library"><img src="<?php echo  $user->image_path_and_placeholder();?>" alt="" class="img-responsive"></a>
                    </div>

                    <!--         edit_user.php-->
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="col-md-6 ">

                            <div class="form-group">

                                <input type="file" name="user_image">
                            </div>

                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" class="form-control"  value="<?php echo $user->username?>">
                            </div>
                            

                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" name="first_name" class="form-control"  value="<?php echo $user->first_name?>">
                            </div>

                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" name="last_name" class="form-control"  value="<?php echo $user->last_name?>">
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="password" name="password" class="form-control" value="<?php echo $user->password?>">
                            </div>

                            <div class="form-group">
                                <input type="submit" name="update" class="btn btn-primary pull-right" value="Update">
                            </div>

                            <div class="form-group">
                                <a id="user-id" href="delete_user.php?id=<?php echo $user->id;?>" class="btn btn-danger pull-left">Delete</a>
                            </div>

                            
                        </div> <!--end of col-md-8 -->

                  

                   </form>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->


    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>