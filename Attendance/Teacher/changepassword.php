<?php


if (isset($_POST['submit'])) {
    include 'db.php';
    $id = $_POST['id'];
    $password = $_POST['oldpass'];
    $newpassword = $_POST['newpass'];
    $confirmnewpassword = $_POST['confirmpass'];
    $query = "SELECT  `password` FROM `teachers` WHERE `id`=$id ";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);
    if (!$row) {
        echo "<script>alert('please enter valid teacher id')</script>";
    }
    
    if ($newpassword==$confirmnewpassword && $password==$row['password']) {
        
        $query2 = "UPDATE `teachers` SET `password`='$newpassword' WHERE `id`=$id";
        $sql = mysqli_query($conn, $query2);
        if ($sql) {
            echo "<script>alert('changed password sucessfully !!'); window.location='changepassword.php'</script>";
        }
    } else {
        echo "<script>alert('password does not match!!'); window.location='changepassword.php'</script>";
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <title>Add/Remove Teachers</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="changepassword.css">
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
                <li><a href="../newattend.php">Dashboard</a></li>
                    <li ><a href="addstudent.php">Add Student</a></li>
                    <li><a href="removestudent.php">Remove Student</a></li>
                    <li><a href="update.php">Update details</a></li>
                    <li class="active"><a href="changepassword.php">Change password</a></li>
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
                    <li><a href="addstudent.php">Add Student</a></li>
                    <li><a href="removestudent.php">Remove Student</a></li>
                    <li><a href="update.php">Update details</a></li>
                    <li  class="active"><a href="changepassword.php">Change password</a></li>
                    <li><a href="attendance.php">Take Attendance</a></li>
                    <li><a href="recordstudent.php">Student Attendance Record</a></li>
                    <li><a href="sendexcel.php">Download Attendance</a></li>
                    <li><a href="sendtowhat.php">Send Attendance to Group</a></li>
                    <li><a href="../index.php">Logout </a></li>
                </ul><br>
            </div>
            <br>

            <div class="col-sm-9">
                <h1>Change Password</h1>
                <div class=" well">

                    <form action="changepassword.php" method="POST">
                        <input type="number" placeholder="Your Id*" name="id"> <br>
                        <input type="text" placeholder="Current Password*" name="oldpass">
                        <br>
                        <input type="text" placeholder="New Password*" name="newpass"> <br>
                        <input type="text" placeholder="Confirm password*" name="confirmpass">
                        <br>
                        <br>

                        <input type="submit" name="submit" id="btn">
                    </form>

                </div>
            </div>
        </div>
    </div>

</body>

</html>