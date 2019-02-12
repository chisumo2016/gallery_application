<div class="container-fluid">

    <!-- Page Heading -->
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">
                ADMIN
                <small>Subheading</small>
            </h1>

            <?php

//            $users = User::find_all_users();
//
//            foreach ($users as $user){
//
//                echo $user->username . "<br>";
//            }


            $found_user = User::find_user_by_id(2);

            echo $found_user->username;

            //$pictures = new Picture();

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