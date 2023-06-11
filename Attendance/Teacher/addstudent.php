<?php
session_start();
$main_id = $_SESSION['id'];
include('db.php');

//getting branch and year according to the logged in user.
$query_branch_year = "SELECT `branch`,`year` FROM `teachers` WHERE `id`=$main_id";
$result_branch_year = mysqli_query($conn, $query_branch_year);

//creating empty variable to store the branch and year of the logged in teacher.
$branch_teacher = "";
$year_teacher = "";
while ($row = mysqli_fetch_assoc($result_branch_year)) {
    $branch_teacher = $row['branch'];
    $year_teacher = $row['year'];
}
$table_name = $branch_teacher . " " . $year_teacher;


if (isset($_POST['submit'])) {
    //Getting all the values from user.
    $name = strtoupper($_POST['name']);
    $roll = $_POST['roll'];
    $fname = strtoupper($_POST['fname']);
    $branch = strtoupper($_POST['branch']);
    $roll = $_POST['roll'];
    $year = $_POST['year'];
    $pnum = $_POST['pnum'];
    $date = date('d');
    $roll_arr = array();  //creating an empty array to store all the roll number .
    $query_id = "SELECT `roll` FROM `$table_name`";
    $result_id = mysqli_query($conn, $query_id);
    foreach ($result_id as $key1 => $value1) {
        foreach ($value1 as $key2 => $value2) {
            array_push($roll_arr, $value2);     //storing all the roll numbers in array.
        }
    }
    if (in_array($roll, $roll_arr)) {   //checking if the entered roll number exits in the table or it's new.
        echo "<script>alert('Roll Number Already Exists !');</script>";
    } else {
        $query_insert = "INSERT INTO `$table_name`(`name`, `fname`, `roll`, `branch`, `pnum`, `year`,`edate`) VALUES ('$name','$fname','$roll','$branch','$pnum','$year',$date)";
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
    <title>Append Students</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="addstudent.css">
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
                <a class="navbar-brand" href="#"><img src="../images/rlogo.png" alt="" height="20">&nbsp; Raja jait singh govt. Polytechnic</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="../newattend.php">Dashboard</a></li>
                    <li class="active"><a href="addstudent.php">Add Student</a></li>
                    <li><a href="removestudent.php">Remove Student</a></li>
                    <li><a href="update.php">Update details</a></li>
                    <li><a href="changepassword.php">Change password</a></li>
                    <li><a href="attendance.php">Take Attendance</a></li>
                    <li><a href="recordstudent.php">Student Attendance Record</a></li>
                    <li><a href="sendexcel.php">Download Attendance</a></li>
                    <li><a href="sendtowhat.php">Send Attendance to Group</a></li>
                    <li><a href="../index.php">Logout </a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav hidden-xs">
                <h2>Menu</h2>
                <ul class="nav nav-pills nav-stacked">
                    <li><a href="../newattend.php">Dashboard</a></li>
                    <li class="active"><a href="addstudent.php">Add Student</a></li>
                    <li><a href="removestudent.php">Remove Student</a></li>
                    <li><a href="update.php">Update details</a></li>
                    <li><a href="changepassword.php">Change password</a></li>
                    <li><a href="attendance.php">Take Attendance</a></li>
                    <li><a href="recordstudent.php">Student Attendance Record</a></li>
                    <li><a href="sendexcel.php">Download Attendance</a></li>
                    <li><a href="sendtowhat.php">Send Attendance to Group</a></li>
                    <li><a href="../index.php">Logout </a></li>
                </ul><br>
            </div>
            <br>

            <div class="col-sm-9">
                <h1>Add Students</h1>
                <div class=" well">
                    <h4>Add Students</h4>
                    <br>
                    <form action="addstudent.php" method="POST">
                        <input type="text" placeholder="Firstname*" name="name">
                        <input type="text" placeholder="Father name*" name="fname">
                        <br><br>
                        <input type="text" placeholder="Roll Number*" name="roll">
                        <input type="text" name="branch" value="<?php echo $branch_teacher; ?>">
                        <br><br>
                        <input type="text" placeholder="Phone Number*" name="pnum">
                        <input type="text" name="year" value="<?php echo $year_teacher; ?>">
                        <br><br>
                        <input type="submit" name="submit" id="btn">
                    </form>

                </div>

                <div class="row ">
                    <div class="col-sm-12 text-center ">
                        <div class="well">
                            <h4>All Students</h4>
                            <hr>
                            <table>
                                <tr>
                                    <th>S.No</th>
                                    <th>Name</th>
                                    <th>Roll Number</th>
                                    <th>Father's Name</th>
                                    <th>Year</th>
                                </tr>
                                <?php
                                include('db.php');
                                $query = "SELECT * FROM `$table_name`";
                                $result = mysqli_query($conn, $query);
                                $i = 1;
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>

                                    <tr>
                                        <td><?php echo $i ?></td>
                                        <td> <?php echo $row['name'] ?> </td>
                                        <td><?php echo $row['roll'] ?></td>
                                        <td><?php echo $row['fname'] ?></td>
                                        <td><?php echo $row['year'] ?></td>

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