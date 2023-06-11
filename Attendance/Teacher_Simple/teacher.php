<?php
include('db.php');
session_start();
$id = $_SESSION['id'];
$year = "";
$branch = "";
$name = "";
$total_students = "";
$query = "SELECT `branch`,`year`,`name` from `teachers` WHERE `id` =$id";
$result = mysqli_query($conn, $query);
while ($row = mysqli_fetch_assoc($result)) {
  $year = $row['year'];
  $branch = $row['branch'];
  $name = $row['name'];
}
$table_name = $branch . " " . $year;

$query2 = "SELECT COUNT(`name`) from `$table_name` WHERE `year`='$year'";
$result2 = mysqli_query($conn, $query2);
if ($result2) {
  foreach ($result2 as $key => $value) {
    foreach ($value as $key1 => $value1) {
      $total_students = $value1;
    }
  }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <title>Teacher Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="teacher.css">
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
        <a class="navbar-brand" href="#"><img src="..../images/rlogo.png" alt="" height="20">&nbsp; Raja jait singh govt. Polytechnic</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="active"><a href="teacher.php">Dashboard</a></li>
          <li><a href="changepassword.php">Change password</a></li>
          <li><a href="attendance.php">Take Attendance</a></li>
          <li><a href="recordstudent.php">Student Attendance Record</a></li>
          <li><a href="sendexcel.php">Download Attendance</a></li>
          <li><a href="sendtowhat.php">Send Attendance to Group</a></li>
          <li><a href="index.php">Logout </a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row content">
      <div class="col-sm-3 sidenav hidden-xs">
        <h2>Menu</h2>
        <ul class="nav">
          <li class="active"><a href="teacher.php">Dashboard</a></li>
          <li><a href="changepassword.php">Change password</a></li>
          <li><a href="attendance.php">Take Attendance</a></li>
          <li><a href="recordstudent.php">Student Attendance Record</a></li>
          <li><a href="sendexcel.php">Download Attendance</a></li>
          <li><a href="sendtowhat.php">Send Attendance to Group</a></li>
          <li><a href="index.php">Logout </a></li>
        </ul><br>
      </div>
      <br>

      <div class="col-sm-9">
        <div class="nav_big">
          <nav>
            <div class="left">
              <img src="../images/rlogo.png" alt="" height="40">
              <h2>Raja Jait Singh Govt. Polytechnic</h2>
            </div>
            <div class="right">
              <img src="../images/user.png" alt="" height="40">
              <div class="content">
                <h4><?php echo $name; ?></h4>
                <p>Teacher</p>
              </div>
            </div>

          </nav>
        </div>

        <div class="row">
          <div class="col-sm-3">
            <div class="well">
              <div class="head">
                <h4>Students</h4>
                <img src="../images/people.png" alt="">
              </div>
              <p><?php echo $total_students ?></p>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="well">
              <div class="head">
                <h4>Class</h4>
                <img src="../images/books.png" alt="">
              </div>
              <p>1</p>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="well">
              <div class="head">
                <h4>Aiims</h4>
                <img src="../images/target.png" alt="">
              </div>
              <p>10</p>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="well">
              <div class="head">
                <h4>Weekly Attendance</h4>
                <img src="../images/attendance.png" alt="">
              </div>
              <p>67%</p>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-sm-7">
            <div class="well">
              <h5><b>Students</b>
                <button><a href="recordstudent.php">Show all ></a></button>
              </h5>
              <hr>
              <table>
                <tr>
                  <th>Roll Number</th>
                  <th>Name</th>
                  <th>Attendance</th>
                </tr>

                <?php
                include('db.php');
                $query = "SELECT * FROM `$table_name`
                ORDER BY `roll`;";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                  <tr>
                    <td> <?php echo $row['roll'] ?> </td>
                    <td> <?php echo $row['name'] ?> </td>
                    <td>
                      <p>80%</p>
                    </td>
                  </tr>
                <?php
                }
                ?>
              </table>
            </div>
          </div>

          <div class="col-sm-5">
            <div class="well">
              <h5><b>Newly Added</b>
                <button><a href="recordstudent.php">Show all ></a></button>
              </h5>
              <hr>
              <table>
                <tr>
                  <th>Roll Number</th>
                  <th>Name</th>
                  <th>Contact</th>
                </tr>

                <?php
                include('db.php');
                $query = "SELECT * FROM `$table_name`
                ORDER BY `edate` DESC;";
                $result = mysqli_query($conn, $query);
                while ($row = mysqli_fetch_assoc($result)) {
                ?>
                  <tr>
                    <td><img src="../images/user.png" height="30" alt=""></td>
                    <td> <?php echo $row['name'] ?> </td>
                    <td><a href=""><img src="../images/phone.png" height="30" alt="">&nbsp;&nbsp;<?php echo $row['pnum']; ?></a> </td>

                  </tr>
                <?php
                }
                ?>
              </table>
            </div>
          </div>
        </div>

        <div class="row ">
          <div class="col-sm-12 text-center shadow p-3 mb-5 bg-black rounded">
            <div class="well">
              <h4>For more contact <b>shivam241980@gmail.com</b></h4>
            </div>
          </div>
        </div>
      </div>
    </div>

</body>

</html>