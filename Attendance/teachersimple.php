<!DOCTYPE html>
<html lang="en">

<head>
  <title>Teacher Page</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="newattend.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  <style>
      .navbar-header a{
            display: flex;
        }
    /* Set height of the grid so .sidenav can be 100% (adjust as needed) */
    .row.content {
      height: 550px
    }

    /* Set gray background color and 100% height */
    .sidenav {
      background-color: #f1f1f1;
      height: 100%;
    }

    /* On small screens, set height to 'auto' for the grid */
    @media screen and (max-width: 767px) {
      .row.content {
        height: auto;
      }
      .navbar-header a{
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
        <a class="navbar-brand" href="#"><img src="images/rlogo.png" alt="" height="20">&nbsp; Raja jait singh govt. Polytechnic</a>
      </div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li class="active"><a href="newattend.php">Dashboard</a></li>
          <li><a href="Teacher/changepassword.php">Change password</a></li>
          <li><a href="Teacher/attendance.php">Take Attendance</a></li>
          <li><a href="Teacher/recordstudent.php">Student Attendance Record</a></li>
          <li><a href="Teacher/sendexcel.php">Download Attendance</a></li>
          <li><a href="Teacher/sendtowhat.php">Send Attendance to Group</a></li>
          <li><a href="index.php">Logout </a></li>
        </ul>
      </div>
    </div>
  </nav>

  <div class="container-fluid">
    <div class="row content">
      <div class="col-sm-3 sidenav hidden-xs">
        <h2>Menu</h2>
        <ul class="nav nav-pills nav-stacked">
          <li class="active"><a href="teachersimple.php">Dashboard</a></li>
          <li><a href="Teacher_Simple/changepassword.php">Change password</a></li>
          <li><a href="Teacher_Simple/attendance.php">Take Attendance</a></li>
          <li><a href="Teacher_Simple/recordstudent.php">Student Attendance Record</a></li>
          <li><a href="Teacher_Simple/sendexcel.php">Download Attendance</a></li>
          <li><a href="Teacher_Simple/sendtowhat.php">Send Attendance to Group</a></li>
          <li><a href="index.php">Logout </a></li>
        </ul><br>
      </div>
      <br>

      <div class="col-sm-9">
        <div class="middle_head">
          <img src="images/rlogo.png" alt="" height="50">
          <h1>Raja Jait Singh Government Polytechnic (Teacher)</h1>
        </div>
        <div class=" well">
          <h4>Student Record</h4>
        </div>
        <div class="row">
          <div class="col-sm-3">
            <div class="well">
              <div class="head">
                <h4>Students</h4>
                <img src="images/people.png" alt="">
              </div>
              <p>74</p>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="well">
              <div class="head">
                <h4>Classes</h4>
                <img src="images/books.png" alt="">
              </div>
              <p>1</p>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="well">
              <div class="head">
                <h4>Aiims</h4>
                <img src="images/target.png" alt="">
              </div>
              <p>10</p>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="well">
              <div class="head">
                <h4>Total Attendance</h4>
                <img src="images/attendance.png" alt="">
              </div>
              <p>24</p>
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