
<?php include("includes/header.php"); ?>

<?php if (!$session->is_signed_in()){redirect("login.php");}?>

<?php

    $user = user::find_by_id($_GET['id']);

    if (isset($_POST['update'])){

       //we have an object
        if($user){

             //Assign to object
            $user->title                =   $_POST['title'];
            $user->caption              =   $_POST['caption'];
            $user->alternative_text     =   $_POST['alternative_text'];
            $user->description          =   $_POST['description'];

            //Update Data and save

            $user->save();
        }

}

   //$users = user::find_all();
?>
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
                     userS
                        <small>Subheading</small>
                    </h1>

<!--                    edit_user.php-->
                    <form action="" method="post" enctype="multipart/form-data">
                        <div class="col-md-8">

                            <div class="form-group">
                                <label for="">Username</label>
                                <input type="text" name="username" class="form-control" >
                            </div>
                            

                            <div class="form-group">
                                <label for="firstname">First Name</label>
                                <input type="text" name="first_last" class="form-control"  >
                            </div>

                            <div class="form-group">
                                <label for="lastname">Last Name</label>
                                <input type="text" name="last_name" class="form-control"  >
                            </div>

                            <div class="form-group">
                                <label for="password">Password</label>
                                <input type="text" name="password" class="form-control"  >
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