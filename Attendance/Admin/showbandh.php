<?php
include('db.php');
if (isset($_POST['submit'])) {
    $branch = $_POST['branch'];
    $year = $_POST['year'];
    $query = "SELECT `name` FROM `teachers` WHERE `branch`='$branch' and `head`='Yes' and `year`='$year'";
    $result = mysqli_query($conn, $query);
    $head = "";
    foreach ($result as $key => $value) {
        foreach ($value as $key1 => $value1) {
            $head = $value1;
        }
    }
    echo "<script>alert('Branch : $branch || Head : $head')</script>";
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Branch and heads</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="showbandh.css">
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
                </button> <a class="navbar-brand" href="#"><img src="../images/rlogo.png" alt="" height="20">&nbsp;Raja jait singh govt. polytechnic</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li><a href="../admin.php">Dashboard</a></li>
                    <li ><a href="add&removeteacher.php">Add / Remove Teacher</a></li>
                      <li ><a href="add&removebranch.php">Add / Remove Branch</a></li>
                    <li><a href="changepassword.php">Change password</a></li>
                    <li><a href="showteachers.php">Show teachers</a></li>
                    <li class="active"><a href="showbandh.php">Show Branches & Heads</a></li>
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
                    <li ><a href="add&removeteacher.php">Add / Remove Teacher</a></li>
                      <li ><a href="add&removebranch.php">Add / Remove Branch</a></li>
                    <li><a href="changepassword.php">Change password</a></li>
                    <li><a href="showteachers.php">Show teachers</a></li>
                    <li class="active"><a href="showbandh.php">Show Branches & Heads</a></li>
                    <li><a href="messages.php">Messages</a></li>
                    <li><a href="../index.php">Logout</a></li>
                </ul><br>
            </div>
            <br>

            <div class="col-sm-9">
                <div class="middle_head">
                    <img src="..\images\rlogo.png" alt="" height="50">
                    <h1>Raja Jait Singh Government Polytechnic (Admin)</h1>
                </div>
                <div class=" well">
                    <h4>Student Record</h4>
                </div>
                <div class="row">
                    <div class="col-sm-3">
                        <form action="showbandh.php" method="POST">
                            <select name="branch" id="">
                                <option value="">--select branch--</option>
                                <?php
                                include('db.php');
                                $select_branches = "SELECT `branches` FROM `branches`";
                                $result2 = mysqli_query($conn, $select_branches);
                                foreach ($result2 as $key => $value) {
                                    foreach ($value as $key1 => $value1) {
                                ?>
                                        <option value="<?php echo $value1; ?>" name="branch">
                                            <?php
                                            echo $value1;
                                            ?>
                                        </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                            <br><br>
                            <select name="year" id="">
                                <option value="">--select year--</option>
                                <?php
                                include('db.php');
                                $select_branches = "SELECT `year` FROM `branches`";
                                $result2 = mysqli_query($conn, $select_branches);
                                foreach ($result2 as $key => $value) {
                                    foreach ($value as $key1 => $value1) {
                                ?>
                                        <option value="<?php echo $value1; ?>" name="year">
                                            <?php
                                            echo $value1;
                                            ?>
                                        </option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                                <br><br>
                            <input type="submit" name="submit" value="SUBMIT">
                        </form>
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