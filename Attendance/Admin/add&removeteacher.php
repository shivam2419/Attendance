<?php
// if (isset($_POST['submit'])) {
//     include('db.php');
//     $name = strtoupper($_POST['name']);
//     $id = $_POST['id'];
//     $password = $_POST['password'];
//     $branch = strtolower($_POST['branch']);
//     $year = $_POST['year'];
//     $head = $_POST['head'];
//     $subject = $_POST['subject'];
//     $id_arr = array();
//     $table_name = $branch . " " . $year;
//     $query_head = "SELECT `head` FROM `teachers` WHERE `branch`='$branch' and `year`='$year'";
//     $result_head = mysqli_query($conn, $query_head);
//     foreach ($result_head as $key => $value) {
//         foreach ($value as $key1 => $value1) {
//             if ($value1 == "$head") {
//                 echo "<script>alert('Head Already Exists !');</script>";
//             } else {
//                 $query_id = "SELECT `id` FROM `teachers`";
//                 $result_id = mysqli_query($conn, $query_id);
//                 foreach ($result_id as $key1 => $value1) {
//                     foreach ($value1 as $key2 => $value2) {
//                         array_push($id_arr, $value2);
//                     }
//                 }
//                 if (in_array($id, $id_arr)) {
//                     echo "<script>alert('Id Already Exist !');</script>";
//                 } else {
//                     $query_insert = "INSERT INTO `teachers` (`name`, `id`, `password`, `branch`,`year`,`head`,`subject`) VALUES ('$name', '$id', '$password', '$branch','$year','$head','$subject')";
//                     $result_insert = mysqli_query($conn, $query_insert);
//                     if ($result_insert) {
//                         echo "<script>alert('Task Completed !');</script>";
//                     }
//                 }
//             }
//         }
//     }
// }

if (isset($_POST['submit'])) {
    include('db.php');
    $name = strtoupper($_POST['name']);
    $id = $_POST['id'];
    $password = $_POST['password'];
    $subject = $_POST['subject'];
    $year = $_POST['year'];
    $head = $_POST['head'];
    $pnum = $_POST['pnum'];
    $date = date('d');
    $branch = strtolower($_POST['branch']);
    //getting `id` - To check whether it is existed or new..
    $id_arr = array();                //creating an empty array to store all the id.
    $query_id = "SELECT `id` FROM `teachers`";
    $result_id = mysqli_query($conn, $query_id);
    foreach ($result_id as $key1 => $value1) {
        foreach ($value1 as $key2 => $value2) {
            array_push($id_arr, $value2); //storing all the id's in the array.
        }
    }
    if (in_array($id, $id_arr))      //checking if the entered id is new or existed using 'in_array()' function.
    {
        echo "<script>alert('Id Already Exists !');</script>";
    } else {
        $query_insert = "INSERT INTO `teachers` (`name`, `id`, `password`, `branch`,`year`,`head`,`subject`,`edate`,`pnum`) VALUES ('$name', '$id', '$password', '$branch','$year','$head','$subject',$date,$pnum)";
        $result_insert = mysqli_query($conn, $query_insert);
        if ($result_insert) {
            echo "<script>alert('Task Completed !');</script>";
        }
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add/Remove Teachers</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="add&removeteacher.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <style>
        body {
            background-color: rgb(224, 233, 241);
        }

        .navbar-header a {
            display: flex;
        }

        /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
        .row.content {
            height: 550px
        }

        /* Set gray background color and 100% height */
        .sidenav {
            background-color: white;
            height: 95vh;
        }

        /* On small screens, set height to 'auto' for the grid */
        @media screen and (max-width: 767px) {
            .row.content {
                height: auto;
            }

            .navbar-header a {
                font-size: 14px;
            }
        }
    </style>
</head>

<body>

    <nav class="navbar navbar-inverse visible-xs">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#"><img src="../images/rlogo.png" alt="" height="20">&nbsp;Raja jait singh govt. polytechnic</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="../admin.php">Dashboard</a></li>
                    <li class="active"><a href="add&removeteacher.php">Add / Remove Teacher</a></li>
                    <li><a href="add&removebranch.php">Add / Remove Branch</a></li>
                    <li><a href="changepassword.php">Change password</a></li>
                    <li><a href="showteachers.php">Show teachers</a></li>
                    <li><a href="showbandh.php">Show Branches & Heads</a></li>
                    <li><a href="messages.php">Messages</a></li>
                    <li><a href="../index.php">Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav hidden-xs">
                <h2>Menu</h2>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="../admin.php">Dashboard</a></li>
                    <li class="active"><a href="add&removeteacher.php">Add / Remove Teacher</a></li>
                    <li><a href="add&removebranch.php">Add / Remove Branch</a></li>
                    <li><a href="changepassword.php">Change password</a></li>
                    <li><a href="showteachers.php">Show teachers</a></li>
                    <li><a href="showbandh.php">Show Branches & Heads</a></li>
                    <li><a href="messages.php">Messages</a></li>
                    <li><a href="../index.php">Logout</a></li>
                </ul><br>
            </div>
            <br>

            <div class="col-sm-9">
                <h1>Add Teacher's</h1>
                <div class=" well">
                    <h4>Add Teacher's</h4>
                    <br>
                    <form action="add&removeteacher.php" method="POST">
                        <input type="text" placeholder="Name*" name="name">
                        <input type="text" placeholder="Teacher Id*" name="id">
                        <br><br>
                        <input type="text" placeholder="Password*" name="password">
                        <input type="text" placeholder="Subject*" name="subject">
                        <br><br>
                        <input type="text" placeholder="Subject*" name="pnum">
                        <select class="custom-select" id="inputGroupSelect01" name="year">
                            <option selected>--select year--</option>
                            <option value="1st">1st year</option>
                            <option value="2nd">2nd year</option>
                            <option value="3rd">3rd year</option>
                        </select>
                        <br><br>
                        <select name="head" id="inputGroupSelect01">
                            <option value="No" selected>--select head--</option>
                            <option value="Yes">Yes</option>
                            <option value="No">No</option>
                        </select>
                        <select class="custom-select" id="inputGroupSelect01" name="branch">
                            <option selected>--select branch--</option>
                            <option value="computer science engineering">Computer Science Engineering</option>
                            <option value="electrical engineering">Electrical Engineering</option>
                            <option value="electrical and electrnoics engineering">Electrical and Electrnoics Engineering</option>
                            <option value="machenical engineering">Machenical Engineering</option>
                            <option value="civil engineering">Civil Engineering</option>
                            <option value="fasion designing">Fasion Designing </option>
                        </select>
                        <br><br>
                        <input type="submit" name="submit" id="btn">
                    </form>

                </div>

                <div class="row ">
                    <div class="col-sm-12 text-center ">
                        <div class="well">
                            <h4>Remove Teacher's</h4>
                            <hr>
                            <table>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Teacher Id</th>
                                    <th>Branch</th>
                                    <th>Year</th>
                                    <th>Head</th>
                                    <th>Status</th>
                                </tr>
                                <?php
                                include('db.php');
                                $query = "SELECT * FROM `teachers`";
                                $result = mysqli_query($conn, $query);
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <tr>

                                        <td><?php echo $i ?></td>
                                        <td><?php echo $row['name'] ?></td>
                                        <td><?php echo $row['id'] ?></td>
                                        <td><?php echo $row['branch'] ?></td>
                                        <td><?php echo $row['year'] ?></td>
                                        <td><?php echo $row['head'] ?></td>

                                        <td> <button id="edit" type="submit"><a class="link" href='delete_teacher.php?id=<?php echo $row['id']; ?>'>Remove</a></button></td>

                                    </tr>


                                <?php
                                    $i++;
                                }

                                ?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>