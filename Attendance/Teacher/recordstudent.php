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

$today_date = strftime("%d");
$today_month = strftime("%b");
$today_year = strftime("%y");
$today_date = intval($today_date);
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Attendance Record</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="recordstudent.css">
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
                    <li><a href="attendance.php">Take Attendance</a></li>
                    <li class="active"><a href="recordstudent.php">Student Attendance Record</a></li>
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
                    <li><a href="attendance.php">Take Attendance</a></li>
                    <li class="active"><a href="recordstudent.php">Student Attendance Record</a></li>
                    <li><a href="sendexcel.php">Download Attendance</a></li>
                    <li><a href="sendtowhat.php">Send Attendance to Group</a></li>
                    <li><a href="../index.php">Logout </a></li>
                </ul><br>
            </div>
            <br>
            <div class="col-sm-9">
                <h1>Student Attendance Record</h1>
                <div class="row ">
                    <div class="col-sm-12 text-center ">
                        <div class="well">
                            <h4 class="input-group mb-3">
                                Records
                                <form action="recordstudent.php" method="POST">
                                    <select class="custom-select" id="inputGroupSelect01" name="days_of_attendance" value="2 days">
                                        <option selected value="2 days">--select days--</option>
                                        <option value="2 days" name="days_of_attendance">2 days</option>
                                        <option value="5 days" name="days_of_attendance">5 days</option>
                                        <option value="1 week" name="days_of_attendance">1 week</option>
                                    </select>
                                    <br><br>
                                    <input type="text" class="member" name="member" placeholder="Select (all / Roll Number) *">
                                    <br><br>
                                    <input type="submit" name="submit" value="SUBMIT" onclick="view()">
                                </form>
                            </h4>
                            <hr>
                            <table id="table">
                                <tr>
                                    <th>S.no</th>
                                    <th>Name</th>
                                    <th>Roll Number</th>
                                    <?php
                                    if (isset($_POST['submit'])) {
                                        include('db.php');
                                        $year = $_POST['days_of_attendance'];
                                        $member = $_POST['member'];
                                        if ($year == "2 days") {
                                            for ($i = $today_date; $i > $today_date - 2; $i--) {
                                                if ($i < 10) {
                                                    $i = "0" . $i;
                                                }
                                    ?>
                                                <th>
                                                    <?php echo $i . "-" . $today_month . "-" . $today_year; ?>
                                                </th>
                                            <?php
                                            }
                                        }
                                        if ($year == "5 days") {
                                            for ($i = $today_date; $i > $today_date - 5; $i--) {
                                                if ($i < 10) {
                                                    $i = "0" . $i;
                                                }
                                            ?>
                                                <th>
                                                    <?php echo $i . "-" . $today_month . "-" . $today_year; ?>
                                                </th>
                                            <?php
                                            }
                                        }
                                        if ($year == "1 week") {
                                            for ($i = $today_date; $i > $today_date - 7; $i--) {
                                                if ($i < 10) {
                                                    $i = "0" . $i;
                                                }
                                            ?>
                                                <th>
                                                    <?php echo $i . "-" . $today_month . "-" . $today_year; ?>
                                                </th>
                                    <?php
                                            }
                                        }
                                    }
                                    ?>
                                    <th>
                                        Percentage
                                    </th>
                                </tr>
                                <?php
                                if (isset($_POST['submit'])) {
                                    include('db.php');
                                    $date = strftime("%d%B%y");
                                    if ($member == "all") {
                                        $query = "SELECT * FROM `$table_name`";
                                        $result = mysqli_query($conn, $query);
                                        $sno = 1;
                                        $days= 0;
                                        $present=0;
                                        $work_field = array();
                                        while ($row = mysqli_fetch_assoc($result)) {
                                            $roll = $row['roll'];
                                            // $query_ans = "SELECT `name` FROM `$table_name` WHERE `roll`='$row[$i . $today_month . $today_year]'";
                                            // $result3 = mysqli_query($conn, $query_ans);
                                ?>
                                            <tr>
                                                <td>
                                                    <?php echo $sno ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['name'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['roll'] ?>
                                                </td>
                                                <?php
                                                $today_date = strftime("%d");
                                                $today_date = intval($today_date);
                                                if ($year == "2 days") {
                                                    $days+= 2;
                                                    for ($i = $today_date; $i > $today_date - 2; $i--) {
                                                        if ($i < 10) {
                                                            $i = "0" . $i;
                                                        }
                                                ?>
                                                        <td id="<?php echo $row[$i . $today_month . $today_year] ?>">
                                                            <?php echo $row[$i . $today_month . $today_year] ?>
                                                        </td>
                                                        <?php
                                                        if (in_array($i . $today_month . $today_year, $work_field)) {
                                                        } else {

                                                            array_push($work_field, $i . $today_month . $today_year);
                                                        }
                                                    }
                                                }
                                                if ($year == "5 days") {
                                                    $days+= 5;
                                                    for ($i = $today_date; $i > $today_date - 5; $i--) {
                                                        if ($i < 10) {
                                                            $i = "0" . $i;
                                                        }
                                                        ?>
                                                        <td id="<?php echo $row[$i . $today_month . $today_year] ?>">
                                                            <?php echo $row[$i . $today_month . $today_year] ?>
                                                        </td>
                                                    <?php
                                                    if (in_array($i . $today_month . $today_year, $work_field)) {
                                                    } else {

                                                        array_push($work_field, $i . $today_month . $today_year);
                                                    }
                                                    }
                                                }
                                                if ($year == "1 week") {
                                                    $days+= 7;
                                                    for ($i = $today_date; $i > $today_date - 7; $i--) {
                                                        if ($i < 10) {
                                                            $i = "0" . $i;
                                                        }
                                                    ?>
                                                        <td id="<?php echo $row[$i . $today_month . $today_year] ?>">
                                                            <?php echo $row[$i . $today_month . $today_year] ?>
                                                        </td>
                                                <?php
                                                if (in_array($i . $today_month . $today_year, $work_field)) {
                                                } else {

                                                    array_push($work_field, $i . $today_month . $today_year);
                                                }
                                                    }
                                                }
                                                ?>
                                                <td>
                                                    <?php
                                                     $percentage=0;
                                                     foreach ($work_field as $key => $value) {
                                                         $query_ans = "SELECT `$value` FROM `$table_name` WHERE `roll`='$roll'";
                                                         $result3 = mysqli_query($conn, $query_ans);
                                                         foreach ($result3 as $key => $value) {
                                                             foreach ($value as $key1 => $value1) {
                                                              if($value1=="Present")
                                                              {
                                                                 $present+=1;
                                                              }  
                                                             $percentage=($present/$days)*100;
                                                             $percentage=intval($percentage);
         
                                                             }
                                                         }
                                                     }
                                                     echo $percentage."%";
                                                     $present=0;
                                                     $percentage=0;
                                                     $days=0;
                                                    ?>
                                                </td>
                                            </tr>
                                        <?php
                                            $sno++;
                                           
                                        }
                                        ?>

                                        <?php
                                    } else {
                                        $query = "SELECT * FROM `$table_name` where roll=$member";
                                        $result = mysqli_query($conn, $query);
                                        $sno = 1;
                                        $days=0;
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <tr>
                                                <td>
                                                    <?php echo $sno ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['name'] ?>
                                                </td>
                                                <td>
                                                    <?php echo $row['roll'] ?>
                                                </td>
                                                <?php
                                                $today_date = strftime("%d");
                                                $today_date = intval($today_date);

                                                if ($year == "2 days") {
                                                    $days=2;
                                                    for ($i = $today_date; $i > $today_date - 2; $i--) {
                                                        if ($i < 10) {
                                                            $i = "0" . $i;
                                                        }
                                                ?>
                                                        <td id="<?php echo $row[$i . $today_month . $today_year] ?>">
                                                            <?php echo $row[$i . $today_month . $today_year] ?>
                                                        </td>
                                                    <?php
                                                    if (in_array($i . $today_month . $today_year, $work_field)) {
                                                    } else {

                                                        array_push($work_field, $i . $today_month . $today_year);
                                                    }
                                                    }
                                                }

                                                if ($year == "5 days") {
                                                    $days=5;
                                                    for ($i = $today_date; $i > $today_date - 5; $i--) {
                                                        if ($i < 10) {
                                                            $i = "0" . $i;
                                                        }
                                                    ?>
                                                        <td id="<?php echo $row[$i . $today_month . $today_year] ?>">
                                                            <?php echo $row[$i . $today_month . $today_year] ?>
                                                        </td>
                                                    <?php
                                                    if (in_array($i . $today_month . $today_year, $work_field)) {
                                                    } else {

                                                        array_push($work_field, $i . $today_month . $today_year);
                                                    }
                                                    }
                                                }
                                                if ($year == "1 week") {
                                                    $days=7;
                                                    for ($i = $today_date; $i > $today_date - 7; $i--) {
                                                        if ($i < 10) {
                                                            $i = "0" . $i;
                                                        }
                                                    ?>
                                                        <td id="<?php echo $row[$i . $today_month . $today_year] ?>">
                                                            <?php echo $row[$i . $today_month . $today_year] ?>
                                                        </td>
                                                <?php
                                                if (in_array($i . $today_month . $today_year, $work_field)) {
                                                } else {

                                                    array_push($work_field, $i . $today_month . $today_year);
                                                }
                                                    }
                                                }
                                                ?>
                                                  <td>
                                                    <?php
                                                     $percentage=0;
                                                     foreach ($work_field as $key => $value) {
                                                         $query_ans = "SELECT `$value` FROM `$table_name` WHERE `roll`='$roll'";
                                                         $result3 = mysqli_query($conn, $query_ans);
                                                         foreach ($result3 as $key => $value) {
                                                             foreach ($value as $key1 => $value1) {
                                                              if($value1=="Present")
                                                              {
                                                                 $present+=1;
                                                              }  
                                                             $percentage=($present/$days)*100;
                                                             $percentage=intval($percentage);
         
                                                             }
                                                         }
                                                     }
                                                     echo $percentage."%";
                                                     $present=0;
                                                     $percentage=0;
                                                     $days=0;
                                                    ?>
                                                </td>
                                            </tr>
                                <?php
                                            $sno++;
                                        }
                                    }
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

<!-- foreach ($work_field as $key => $value) {
// $query_ans="SELECT `$value` FROM `$table_name` WHERE `roll`='$roll'";
// $result3=mysqli_query($conn,$query_ans);
// foreach ($result3 as $key => $value) {
// foreach($value as $key1=> $value1)
// {
// echo $roll;
// echo "$value1";
// echo "<br>";

// }
// }
} -->