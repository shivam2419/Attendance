<?php
session_start();
$main_id=$_SESSION['id'];
include('db.php');

//getting branch and year according to the logged in user.
$query_branch_year = "SELECT `branch`,`year` FROM `teachers` WHERE `id`=$main_id";
$result_branch_year = mysqli_query($conn, $query_branch_year);

//creating empty variable to store the branch and year of the logged in teacher.
$branch_teacher="";
$year_teacher="";
while($row=mysqli_fetch_assoc($result_branch_year))
{
    $branch_teacher=$row['branch'];
    $year_teacher=$row['year'];
}
$table_name=$branch_teacher." ".$year_teacher;

if (isset($_POST['submit'])) {
    include('db.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Remove Student</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="removestudent.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <script>
        function openForm() {
            document.getElementById("myForm").style.display = "block";
        }

        function closeForm() {
            document.getElementById("myForm").style.display = "none";
        }
    </script>
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

        #edit {
            font-size: 2vh;
            border: none;
            width: 80%;
            height: 4vh;
            border: 1px solid white;
            border-radius: 10px;
            background-color: rgb(53, 116, 184);
        }

        #edit a {
            text-decoration: none;
            color: white;
            margin-left: -1%;
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
                <a class="navbar-brand" href="#">Logo</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="../newattend.php">Dashboard</a></li>
                    <li><a href="addstudent.php">Add Student</a></li>
                    <li class="active"><a href="removestudent.php">Remove Student</a></li>
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
                    <li><a href="addstudent.php">Add Student</a></li>
                    <li class="active"><a href="removestudent.php">Remove Student</a></li>
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
                <h1>Remove Students</h1>
                <div class="row ">
                    <form action="update.php" method="POST">
                        <div class="col-sm-12 text-center ">
                            <div class="well">
                                <h4>All Students</h4>
                                <hr>
                                <table>
                                    <tr>
                                        <th>S.No</th>
                                        <th>Name</th>
                                        <th>Father's Name</th>
                                        <th>Roll Number</th>
                                        <th>Branch</th>
                                        <th>Phone Number</th>
                                        <th>Year</th>
                                        <th>Status</th>
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
                                            <td><?php echo $row['name'] ?></td>
                                            <td><?php echo $row['fname'] ?></td>

                                            <td><?php echo $row['roll'] ?></td>
                                            <td><?php echo $row['branch'] ?></td>
                                            <td><?php echo $row['pnum'] ?></td>
                                            <td><?php echo $row['year'] ?></td>
                                            <!--Creating a button with id having value it's 'unique id', eg : id=104,id=105,id=106....-->
                                            <td> <button id="edit" type="submit"><a class="link" href='delete.php?id=<?php echo $row['roll']; ?>'>Delete</a></button></td>

                                        </tr>


                                    <?php
                                        $i++;
                                    }

                                    ?>
                                </table>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- A button to open the popup form -->

    <!-- The form -->


</body>

</html>