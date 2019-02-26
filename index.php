<?php include("includes/header.php"); ?>

<!--Display-->

<?php
//Page Variables

$page = !empty($_GET['page']) ? (int)$_GET['page'] : 1;

$items_per_page     = 4;

$item_total_count = Photo::count_all();

//Instantiate

$paginate = new Paginate($page,$items_per_page ,$item_total_count);

$sql     = "SELECT * FROM photos ";
$sql    .= "LIMIT  {$items_per_page} ";
$sql    .= "OFFSET {$paginate->offset()}";
$photos  = Photo::find_by_query($sql);

//Display
//$photos = Photo::find_all();

?>
        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-md-12">
                <div class="thumbnail row">
                  <?php foreach ($photos as $photo) : ?>

                        <div class="col-xs-6 col-md-3">
                            <a class="thumbnail" href="photo.php?id=<?php echo $photo->id; ?>">
                                <img class="img-responsive home_page_photo" src="admin/<?php echo $photo->picture_path();?> " alt="">

                            </a>
                        </div>


                  <?php endforeach;?>

                </div>

                <div class="row">
                    <ul class="pager">

                        <?php
                           if ($paginate->page_total() > 1){
                               if ($paginate->has_next()){
                                   echo "<li class='next'><a href='index.php?page={$paginate->next_page()}'>Next</a></li>";
                               }

                            // loop

                              for ($i=1 ; $i <=  $paginate->page_total(); $i++){
                                   //check active link
                                  if ($i==$paginate->current_page){
                                      echo "<li  class='active'><a href='index.php?page={$i}'>{$i}</a></li>";
                                  }else{
                                      echo "<li><a href='index.php?page={$i}'>{$i}</a></li>";
                                  }
                              }


                               if ($paginate->has_previous()){
                                   echo "<li class='previous'><a href='index.php?page={$paginate->previous_page()}'>Previous</a></li>";
                               }
                           }


                        ?>

                    </ul>
                </div>

            </div>




            <!-- Blog Sidebar Widgets Column -->
<!--            <div class="col-md-4">-->
<!---->
<!--            -->
<!--                 --><?php //include("includes/sidebar.php"); ?>
<!---->
<!---->
<!---->
        </div>
        <!-- /.row -->

        <?php include("includes/footer.php"); ?>
