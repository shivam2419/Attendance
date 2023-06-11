<?php
include('db.php');
session_start();
$main_id=$_SESSION['id'];

//getting branch and year according to the logged in user.
$query_branch_year = "SELECT `branch`,`year`,`subject` FROM `teachers` WHERE `id`=$main_id";
$result_branch_year = mysqli_query($conn, $query_branch_year);

//creating empty variable to store the branch and year of the logged in teacher.
$branch_teacher="";
$year_teacher="";
$subject_teacher="";
while($row=mysqli_fetch_assoc($result_branch_year))
{
    $branch_teacher=$row['branch'];
    $year_teacher=$row['year'];
    $subject_teacher=$row['subject'];
}
$table_name=$branch_teacher." ".$year_teacher;

if (isset($_POST['submit'])) {
    $branch = $_POST['branch'];
    $year = $_POST['year'];
    $table_name = $branch . " " . $year;
    $query = "CREATE TABLE `$table_name` (`name` text(100),`fname` text(100),`roll` int(10),`branch` text(100),`year` text(10),`pnum` text(10),`edate` text(100))";
    $result = mysqli_query($conn, $query);
    $query2 = "INSERT INTO `branches` (`branches`,`year`) VALUES ('$branch','$year');";
    $result2 = mysqli_query($conn, $query2);
    if ($result and $result2) {
        echo "<script>alert('Branch Added Succefully !!')</script>";
    }
}
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
      <title>Add/Remove Branches</title>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="add&removebranch.css">
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
                      <li><a href="add&removeteacher.php">Add / Remove Teacher</a></li>
                      <li class="active"><a href="add&removebranch.php">Add / Remove Branch</a></li>
                      <li><a href="changepassword.php">Change password</a></li>
                      <li><a href="showteachers.php">Show teachers</a></li>
                      <li><a href="showbandh.php">Show Branches & Heads</a></li>
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
                      <li><a href="add&removeteacher.php">Add / Remove Teacher</a></li>
                      <li class="active"><a href="add&removebranch.php">Add / Remove Branch</a></li>
                      <li><a href="changepassword.php">Change password</a></li>
                      <li><a href="showteachers.php">Show teachers</a></li>
                      <li><a href="showbandh.php">Show Branches & Heads</a></li>
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
                      <div class="col-sm-3" id="main">
                          <form action="add&removebranch.php" method="POST">
                              <div class="select_content">
                                  <input type="text" id="inp" placeholder="Enter Branch Name" name="branch">
                                  <select name="year" id="">
                                      <option value="">--select year--</option>
                                      <option value="1st">1st year</option>
                                      <option value="2nd">2nd year</option>
                                      <option value="3rd">3rd year</option>
                                  </select>
                              </div>

                              <br>
                              <input type="submit" name="submit" value="SUBMIT">
                          </form>
                          <div class="table">
                              <table>
                                  <tr>
                                      <th>S.No</th>
                                      <th>Branches</th>
                                      <th>Year</th>
                                      <th>Status</th>
                                  </tr>
                                  <?php
                                    include('db.php');
                                    $query = "SELECT * FROM `branches`";
                                    $result = mysqli_query($conn, $query);
                                    $i = 1;
                                    while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                      <tr>

                                          <td><?php echo $i; ?></td>
                                          <td><?php echo $row['branches'] ?></td>
                                          <td><?php echo $row['year'] ?></td>

                                          <td> <button id="edit" type="submit"><a class="link" href='delete_branch.php?id=<?php echo $row['id']; ?>'>Remove</a></button></td>

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

              <div class="col-sm-9 text-center shadow p-3 mb-5 bg-black rounded">
                  <div class="well">
                      <h4>For more contact <b>shivam241980@gmail.com</b></h4>
                  </div>
              </div>
          </div>
      </div>

  </body>

  </html>