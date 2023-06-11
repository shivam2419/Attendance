<!DOCTYPE html>
<html lang="en">

<head>
    <title>Branch and heads</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="sendexcel.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
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
                <a class="navbar-brand" href="#"><img src="../images/rlogo.png" alt="" height="20"></a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="../newattend.php">Dashboard</a></li>
                    <li><a href="addstudent.php">Add Student</a></li>
                    <li><a href="removestudent.php">Remove Student</a></li>
                    <li><a href="update.php">Update details</a></li>
                    <li><a href="changepassword.php">Change password</a></li>
                    <li><a href="attendance.php">Take Attendance</a></li>
                    <li><a href="recordstudent.php">Student Attendance record</a></li>
                    <li class="active"><a href="sendexcel.php">Download Attendance</a></li>
                    <li><a href="sendtowhat.php">Send Attendance to Group</a></li>
                    <li><a href="../index.php">Logout </a></li>
                </ul>
            </div>
        </div>
    </nav>

    <div class="container-fluid">
        <div class="row content">
            <div class="col-sm-3 sidenav hidden-xs">
                <i class='fas fa-user-alt'></i>
                <ul class="nav nav-pills nav-stacked">
                    <h2>Menu</h2>
                    <li><a href="../newattend.php">Dashboard</a></li>
                    <li><a href="addstudent.php">Add Student</a></li>
                    <li><a href="removestudent.php">Remove Student</a></li>
                    <li><a href="update.php">Update details</a></li>
                    <li><a href="changepassword.php">Change password</a></li>
                    <li><a href="attendance.php">Take Attendance</a></li>
                    <li><a href="recordstudent.php">Student Attendance record</a></li>
                    <li class="active"><a href="sendexcel.php">Download Attendance</a></li>
                    <li><a href="sendtowhat.php">Send Attendance to Group</a></li>
                    <li><a href="../index.php">Logout </a></li>
                </ul><br>
            </div>
            <br>

            <div class="col-sm-9">
                <div class="middle_head">
                    <h1>Download Attendance</h1>
                </div>
                <div class=" well">
                    <h4>Student Record</h4>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <div class="well">
                            <form action="excel.php" method="POST">

                                <input type="text" placeholder="Filename*" class="filename" name="filename">
                                <br><br>
                                <select name="days_of_attendance" id="">
                                    <option value="" selected>--select days--</option>
                                    <option value="2 days">2 days</option>
                                    <option value="5 days">5 days</option>
                                    <option value="1 week">1 week</option>
                                    <option value="2 week">2 week</option>
                                    <option value="1 month">1 month</option>

                                </select>
                                <br><br>
                                <input type="submit" name="submit" value="SUBMIT">
                            </form>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-sm-9 text-center shadow p-3 mb-5 bg-black rounded">
                <div class="well">
                    <h4>For more contact <b>shivam241980@gmail.com</b></h4>
                </div>
            </div>
        </div>
    </div>

</body>

</html>