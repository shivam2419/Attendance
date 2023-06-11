<?php
$year = "";
if (isset($_POST['submit'])) {
    include('db.php');
    $year = $_POST['days_of_attendance'];
    $member = $_POST['member'];
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <title>Send Attendance</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="sendtowhat.css">
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
                    <li class="active"><a href="sendtowhat.php">Send Attendance to Group</a></li>
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
                    <li><a href="recordstudent.php">Student Attendance Record</a></li>
                    <li><a href="sendexcel.php">Download Attendance</a></li>
                    <li class="active"><a href="sendtowhat.php">Send Attendance to Group</a></li>
                    <li><a href="../index.php">Logout </a></li>
                </ul><br>
            </div>
            <br>

            <div class="col-sm-9">
                <h1>Send Attendance Record</h1>
                <div class="row ">
                    <div class="col-sm-12 text-center ">
                        <div class="well">
                            <h4 class="input-group mb-3">
                                Send Attendance
                                <img src="wpimg.png" alt="">
                            </h4>

                            <div class="data">
                                <form action="sendwhatsmsg.php" method="POST">
                                    <br>
                                    <!-- <input type="file" class="member" name="member" placeholder="Select (all / Roll Number) *">
                                    <br> -->
                                    <input type="text" class="member2" name="pnum" placeholder=" Your Phone Number *">
                                    <br><br>
                                    <input type="text" class="member2" name="msg" placeholder=" Message *">
                                    <br><br>
                                    <!-- <input type="text" class="member2" name="groupname" placeholder="Group Name*">
                                    <br><br> -->
                                    <input type="submit" name="submit" value="SUBMIT" onclick="view()">
                                </form>
                                <div class="data2">
                                    <video controls src="wpimg.mp4" width="700"></video>

                                </div>
                            </div>


                            <hr>
                            <label for="">Note :</label>
                            <b>You can select only one thing either group name or phone number*</b>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>