<?php
include('db.php');
session_start();
$main_id = $_SESSION['id'];

//getting branch and year according to the logged in user.
$query_branch_year = "SELECT `branch`,`year`,`subject` FROM `teachers` WHERE `id`=$main_id";
$result_branch_year = mysqli_query($conn, $query_branch_year);

//creating empty variable to store the branch and year of the logged in teacher.
$branch_teacher = "";
$year_teacher = "";
$subject_teacher = "";
while ($row = mysqli_fetch_assoc($result_branch_year)) {
    $branch_teacher = $row['branch'];
    $year_teacher = $row['year'];
    $subject_teacher = $row['subject'];
}
$table_name = $branch_teacher . " " . $year_teacher;

if (isset($_POST['submit'])) {
    include('db.php');
    $query1 = "DESC `$table_name`";
    $result1 = mysqli_query($conn, $query1);
    $date = date('dMy', strtotime($_POST['date1']));
    $today_date_input = date('d', strtotime($_POST['date1']));
    $today_date_php = date("d");
    $column_names = array();
    // Changing date into int
    $today_date_input = (int) $today_date_input;
    $today_date_php = (int) $today_date_php;
    //Pushing all the columns name in array for later work.
    while ($row = mysqli_fetch_assoc($result1)) {
        array_push($column_names, $row['Field']);
    }
    if ($today_date_input <= $today_date_php) {
        foreach ($column_names as $key => $value) {
            if (in_array($date, $column_names)) {
                $attendance = $_POST['attendance'];

                foreach ($attendance as $key => $value) {
                    if ($value < 10) {
                        $value = "0" . $value;
                    }
                    $query_absent = "UPDATE `$table_name` SET `$date`='Absent'";
                    $result_absent = mysqli_query($conn, $query_absent);

                    $query2 = "UPDATE `$table_name` SET `$date`='Present' WHERE `roll`=$value";
                    $result2 = mysqli_query($conn, $query2);
                }

                echo "<script>alert('Task Completed !!')</script>";
                break;
            } else {
                //If today's date column doesn't exist then it will create a column of today' date !!
                $date = strval($date);
                $query3 = "ALTER TABLE `$table_name` ADD `$date` text(100)";
                $result3 = mysqli_query($conn, $query3);
                $attendance = $_POST['attendance'];
                $query_absent = "UPDATE `$table_name` SET `$date`='Absent'";
                $result_absent = mysqli_query($conn, $query_absent);
                foreach ($attendance as $key => $value) {
                    if ($value < 10) {
                        $value = "0" . $value;
                    }
                    $query4 = "UPDATE `$table_name` SET `$date`='Present' WHERE `roll`=$value";
                    $result4 = mysqli_query($conn, $query4);
                }
                // for 7 days checking if date exists or not in database...
                echo "<script>alert('Task Completed !!')</script>";
                break;
            }
            //     echo "<script>alert('Task Completed !!')</script>";
        }
    } else {
        echo "<script>alert('Incorrect or Invalid Date !!')</script>";
    }
}


?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Take Attendance</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="attendance.css">
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
                    <li><a href="addstudent.php">Add Student</a></li>
                    <li><a href="removestudent.php">Remove Student</a></li>
                    <li><a href="update.php">Update details</a></li>
                    <li><a href="changepassword.php">Change password</a></li>
                    <li class="active"><a href="attendance.php">Take Attendance</a></li>
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
                    <li><a href="addstudent.php">Add Student</a></li>
                    <li><a href="removestudent.php">Remove Student</a></li>
                    <li><a href="update.php">Update details</a></li>
                    <li><a href="changepassword.php">Change password</a></li>
                    <li class="active"><a href="attendance.php">Take Attendance</a></li>
                    <li><a href="recordstudent.php">Student Attendance Record</a></li>
                    <li><a href="sendexcel.php">Download Attendance</a></li>
                    <li><a href="sendtowhat.php">Send Attendance to Group</a></li>
                    <li><a href="../index.php">Logout </a></li>
                </ul><br>
            </div>
            <br>
            <div class="col-sm-9">
                <h1>Take Attendance ( Today's Date :
                    <?php echo strftime("%d-%B-%y") ?> )
                </h1>
                <div class="row ">
                    <div class="col-sm-12 text-center ">
                        <div class="well">
                            <h3>Attendance of <?php echo "' " . strtoupper($branch_teacher) . " '" . " ";
                                                    echo $year_teacher . " year ";
                                                    echo $subject_teacher; ?></h3>
                            <hr>
                            <form action="attendance.php" method="POST">
                                <label for=""><b>Select Date*</b></label>
                                <input type="date" name="date1" id="date">
                                <table>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Father's Name</th>
                                        <th>Roll Number</th>
                                        <th>Attendance</th>
                                    </tr>
                                    <?php
                                    include('db.php');
                                    $query = "SELECT * FROM `$table_name`";
                                    $result = mysqli_query($conn, $query);
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                        <tr>
                                            <td>
                                                <?php echo $i ?>
                                            </td>
                                            <td>
                                                <?php echo $row['name'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['fname'] ?>
                                            </td>
                                            <td>
                                                <?php echo $row['roll'] ?>
                                            </td>   
                                            <td class="check11"><input type="checkbox" name="attendance[]" value="<?php echo $row['roll'] ?>" class="check11"></td>

                                        </tr>


                                    <?php
                                        $i++;
                                    }
                                    ?>
                                </table>
                                <input type="submit" name="submit" value="SUBMIT" id="btn">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>

<?php

?>