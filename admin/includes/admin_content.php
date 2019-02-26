<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                ADMIN
                <small>Dashboard</small>
            </h1>

            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-primary">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-users fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo $session->count; ?></div>
                                    <div>New Views</div>
                                </div>
                            </div>
                        </div>
                        <a href="#">
                            <div class="panel-footer">
                                <span class="pull-left">View Details</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-green">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-photo fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo Photo::count_all();?></div>
                                    <div>Photos</div>
                                </div>
                            </div>
                        </div>
                        <a href="photos.php">
                            <div class="panel-footer">
                                <span class="pull-left">Total Photos in Gallery</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>


                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-yellow">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-user fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo User::count_all();?>

                                    </div>

                                    <div>Users</div>
                                </div>
                            </div>
                        </div>
                        <a href="users.php">
                            <div class="panel-footer">
                                <span class="pull-left">Total Users</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6">
                    <div class="panel panel-red">
                        <div class="panel-heading">
                            <div class="row">
                                <div class="col-xs-3">
                                    <i class="fa fa-support fa-5x"></i>
                                </div>
                                <div class="col-xs-9 text-right">
                                    <div class="huge"><?php echo Comment::count_all();?></div>
                                    <div>Comments</div>
                                </div>
                            </div>
                        </div>
                        <a href="comments.php">
                            <div class="panel-footer">
                                <span class="pull-left">Total Comments</span>
                                <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                                <div class="clearfix"></div>
                            </div>
                        </a>
                    </div>
                </div>


            </div> <!--First Row-->

          <div class="row">
              <div id="piechart" style="width: 900px; height: 500px;"></div>

          </div>

        </div>
    </div>
    <!-- /.row -->

</div>



<div class="tanza">
<!--    --><?php
//    //
//    //
//    ////            $user = User::find_by_id(1);
//    ////
//    ////            echo $user->username;
//    //
//    ////Echo include Path
//    ////echo DS;
//    ////echo INCLUDES_PATH;
//    //
//    //
//    //
//    //
//    ////PHOTO CLASS TESTING
//    //
//    ////Display
//    ///*$photos = Photo::find_all();
//    //foreach ($photos as $photo){
//    //    echo $photo->filename;
//    //}
//    //
//    ////Create
//    //
//    //$photo = new Photo();
//    //
//    //$photo->title   = "Just Some Test";
//    //$photo->description    = "something weared";
//    //$photo->filename  = "image.png";
//    //$photo->type    = "image";
//    //$photo->size    = "13";
//    //
//    //$photo->create();*/
//    //
//    ///*
//    // * //Testing the Parent Class
//    // *
//    //     $user = new User();
//    //     $user->username = "NEW USER";
//    //     $user->save();
//    //
//    //
//    //
//    //     $users = User::find_all();
//    //      foreach ($users as $user){
//    //        echo $user->username;
//    //    }
//    //
//    //     //Testing the Abstracted Update Method
//    //        $user = User::find_user_by_id(5);
//    //        $user->username = "Tanzania1";
//    //        $user->password = "Tanzania1";
//    //        $user->first_name = "Tanzania";
//    //        $user->last_name = "Tanzania";
//    //        $user->update();
//    //
//    //     //Testing the Abstracted Create Method
//    //
//    //     //Create
//    //
//    //        $user = new User();
//    //
//    //        $user->username    = "Sudent";
//    //        $user->password    = "something weared";
//    //        $user->first_name  = "SOL";
//    //        $user->last_name    = "Don't Know";
//    //
//    //        $user->create();
//    // */
//    //
//    ///*
//    // //Update
//    // $user = User::find_user_by_id(3);
//    // $user->firstname = "Bernard1";
//    // $user->lastname = "Bernard1";
//    // $user->update();*/
//    //
//    ///*
//    //    //Delete
//    //
//    //$user= User::find_user_by_id(6);
//    //$user->delete();
//    //
//    ////save
//    //
//    //$user= User::find_user_by_id(5);
//    //$user->password = "password";
//    //$user->save();
//    //
//    ////create
//    //$user= new User();
//    //$user->username = "Sue  200";
//    //$user->save();
//    //*/
//    //
//    //
//    //
//    //
//    //
//    //?><!-- -->
</div>











<!--
//Create User
 $user = new User();
 $user->username = "Suave The Second";
 $user->password = "Rico Last Name";
 $user->first_name = "Rica";
 $user->last_name = "Suaves";

 $user->create();



  --->








<!--$found_user = User::find_user_by_id(2);-->
<!---->
<!--echo $found_user->username;-->
<!---->
<!--//$pictures = new Picture();-->






<!-- /.container-fluid -->

<!--//                if ($database->connection){-->
<!--//                    echo "True";-->
<!--//                }-->


<!--$sql = "SELECT * FROM users WHERE id = 1";//as string
$result = $database->query($sql);
$user_found = mysqli_fetch_array($result);
echo $user_found['username'-->


<!--$user = new User();-->
<!--$result_set = $user->find_all_users();-->
<!---->
<!--while($row = mysqli_fetch_array($result_set)){-->
<!--echo $row['username'] . "<br>";-->
<!--}-->

<!--

//Assign Array value to object
              $user = new User();
              $user-> id = $found_user['id'];
              $user-> username = $found_user['username'];
              $user-> password = $found_user['password'];
              $user-> first_name = $found_user['first_name'];
              $user-> last_name = $found_user['last_name'];

              echo $user->id;


-->

<!-- Testing the method

  $found_user  = User::find_user_by_id(2);
             $user = User::instantation($found_user);


              echo $user->username;

-->


<!--

            // Testing Query Method

              $result_set = User::find_all_users();

              while($row = mysqli_fetch_array($result_set)){
                  echo $row['username'] . "<br>";
               }


               $found_user  = User::find_user_by_id(2);
              $user = User::instantation($found_user);


              echo $user->username;

              //echo  $found_user['username'];


-->