
<?php include("includes/header.php"); ?>

<?php if (!$session->is_signed_in()){redirect("login.php");}?>

<?php

//id
if (empty($_GET['id'])){
    //Re
    redirect("photos.php");

}else{
    $photo = Photo::find_by_id($_GET['id']);

    if (isset($_POST['update'])){

       //we have an object
        if($photo){

             //Assign to object
            $photo->title                =   $_POST['title'];
            $photo->caption              =   $_POST['caption'];
            $photo->alternative_text     =   $_POST['alternative_text'];
            $photo->description          =   $_POST['description'];

            //Update Data and save

            $photo->save();

        }
    }
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

<!--                    edit_photo.php-->
                    <form action="" method="post">
                        <div class="col-md-8">

                            <div class="form-group">
                                <input type="text" name="title" class="form-control" value="<?php  echo $photo->title;?>">
                            </div>

                            <div class="form-group">

                                <a href="#"><img width="200" src="<?php echo $photo->picture_path(); ?>" alt="" class="thumbnail"></a>
<!--                                <a  class="thumbnail" href=""><img src="--><?php //echo $photo->picture_path(); ?><!-- alt=""></a>-->
                            </div>

                            <div class="form-group">
                                <label for="caption">Caption</label>
                                <input type="text" name="caption" class="form-control"  value="<?php  echo $photo->caption;?>">
                            </div>

                            <div class="form-group">
                                <label for="caption">Alternate Text</label>
                                <input type="text" name="alternative_text" class="form-control"  value="<?php  echo $photo->alternative_text;?>">
                            </div>

                            <div class="form-group">is
                                <label for="caption">Description</label>
                                <textarea name="description" id="" cols="30" rows="10" class="form-control"><?php  echo $photo->description;?></textarea>

                            </div>
                        </div> <!--end of col-md-8 -->

                    <div class="col-md-4">
                        <div class="photo-info-box">
                            <div class="info-box-header">
                                <h4>Save <span  id="toggle" class="glyphicon glyphicon-menu-up pull-right"></span></h4>
                            </div>

                            <div class="inside">
                                <div class="box-inner">
                                    <p class="text">
                                        <span class="glyphicon glyphicon-calendar"></span> Uploaded On: Feb 21, 2012 @5.24am
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
                                        <a  href="delete_photo.php?id=<?php echo $photo->id;?>"  class="btn btn-danger btn-lg">Delete</a>
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