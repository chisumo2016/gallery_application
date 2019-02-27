<?php include("includes/header.php"); ?>

<?php  if (!$session->is_signed_in()){redirect("login.php");} ?>

    <!-- Submit Form  change $_POST['submit']-->

<?php
$message = "";
if (isset($_FILES['file'])){

   //Instantiate a Object
    $photo = new Photo();
    $photo->user_id   = $_SESSION['user_id'];
    $photo->title   = $_POST['title'];
    $photo->set_file($_FILES['file']);

    //Check if saved

    if ($photo->save()){

        $message = "Photo uploaded Successfully";

    }else{
        $message = join("<br>", $photo->custom_errors);
    }
}


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
                     UPLOADS
<!--                        <small>Subheading</small>-->
                    </h1>
                    <p class="bg-success"> <?php echo $message; ?></p>

                    <div class="row">
                        <div class="col-md-6">


                            <form action="upload.php" method="post" enctype="multipart/form-data">

                                <div class="form-group">
                                    <input type="text" name="title"  class="form-control">
                                </div>

                                <div class="form-group">
                                    <input type="file" name="file" >
                                </div>

                                <button type="submit" class="btn btn-primary" name="submit">Upload Picture</button>
                            </form>
                        </div>
                    </div><!-- end row -->
                    <br><br>
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="upload.php" class="dropzone"></form>
                        </div>
                    </div>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->


    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>