<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                ADMIN
                <small>Subheading</small>
            </h1>

            <?php

              //Echo include Path
            echo SITE_ROOT;
            echo INCLUDES_PATH;




               //PHOTO CLASS TESTING

            //Display
            /*$photos = Photo::find_all();
            foreach ($photos as $photo){
                echo $photo->filename;
            }

            //Create

            $photo = new Photo();

            $photo->title   = "Just Some Test";
            $photo->description    = "something weared";
            $photo->filename  = "image.png";
            $photo->type    = "image";
            $photo->size    = "13";

            $photo->create();*/

            /*
             * //Testing the Parent Class
             *
                 $user = new User();
                 $user->username = "NEW USER";
                 $user->save();



                 $users = User::find_all();
                  foreach ($users as $user){
                    echo $user->username;
                }

                 //Testing the Abstracted Update Method
                    $user = User::find_user_by_id(5);
                    $user->username = "Tanzania1";
                    $user->password = "Tanzania1";
                    $user->first_name = "Tanzania";
                    $user->last_name = "Tanzania";
                    $user->update();

                 //Testing the Abstracted Create Method

                 //Create

                    $user = new User();

                    $user->username    = "Sudent";
                    $user->password    = "something weared";
                    $user->first_name  = "SOL";
                    $user->last_name    = "Don't Know";

                    $user->create();
             */

            /*
             //Update
             $user = User::find_user_by_id(3);
             $user->firstname = "Bernard1";
             $user->lastname = "Bernard1";
             $user->update();*/

             /*
                 //Delete

            $user= User::find_user_by_id(6);
            $user->delete();

            //save

            $user= User::find_user_by_id(5);
            $user->password = "password";
            $user->save();

             //create
            $user= new User();
            $user->username = "Sue  200";
            $user->save();
            */





            ?>

            <ol class="breadcrumb">
                <li>
                    <i class="fa fa-dashboard"></i>  <a href="index.html">Dashboard</a>
                </li>
                <li class="active">
                    <i class="fa fa-file"></i> Blank Page
                </li>
            </ol>
        </div>
    </div>
    <!-- /.row -->

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