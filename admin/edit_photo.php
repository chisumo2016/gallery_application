
<?php include("includes/header.php"); ?>

<?php if (!$session->is_signed_in()){redirect("login.php");}?>

<?php
if (isset($_POST['update'])){

    echo "IT WORKS ";
}
   //$photos = Photo::find_all();
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
                     PHOTOS
                        <small>Subheading</small>
                    </h1>

                    <form action="edit_photo.php" method="post">
                        <div class="col-md-8">

                            <div class="form-group">
                                <input type="text" name="title" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="caption">Caption</label>
                                <input type="text" name="caption" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="caption">Alternate Text</label>
                                <input type="text" name="alternative_text" class="form-control">
                            </div>

                            <div class="form-group">
                                <label for="caption">Description</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                            </div>
                        </div> <!--end of col-md-8 -->

                    <div class="col-md-4">
                        <div class="photo-info-box">
                            <div class="info-box-header">
                                <h4>Save <span class="glyphicon glyphicon-menu-up"></span></h4>
                            </div>

                            <div class="inside">
                                <div class="box-inner">
                                    <p class="text">
                                        <span class="glyphicon glyphicon-calendar"></span> Uploaded On: 21.02.2019
                                    </p>

                                    <p class="text">
                                        Photo Id: <span class="data photo_id_box"></span>
                                    </p>

                                    <p class="text">
                                        Filename: <span class="data">image.jpg</span>
                                    </p>

                                    <p class="text">
                                        File Type: <span class="data">JPG</span>
                                    </p>

                                    <p class="text">
                                        File Size: <span class="data">5555555</span>
                                    </p>

                                </div>

                                <div class="info-box-footer clearfix">
                                    <div class="info-box-delete pull-left">
                                        <a  class="btn btn-danger btn-lg" href="delete_photo.php?id=<?php echo $photo->id;?>">Delete</a>
                                    </div>
                                    <div class="info-box-update pull-right">
                                        <input type="submit" name="update" value="update" class="btn btn-primary btn-lg">
                                    </div>
                                </div>
                            </div>



                        </div>
                    </div>

                   </form>

                </div>
            </div>
            <!-- /.row -->

        </div>
        <!-- /.container-fluid -->


    </div>
    <!-- /#page-wrapper -->

<?php include("includes/footer.php"); ?>