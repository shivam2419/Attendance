<!DOCTYPE html>
<html lang="en">

<head>
    <title>Showing teachers</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="showteachers.css">
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
                      <li ><a href="add&removebranch.php">Add / Remove Branch</a></li>
                    <li><a href="changepassword.php">Change password</a></li>
                    <li class="active"><a href="showteachers.php">Show teachers</a></li>
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
                    <li ><a href="add&removeteacher.php">Add / Remove Teacher</a></li>
                      <li ><a href="add&removebranch.php">Add / Remove Branch</a></li>
                    <li><a href="changepassword.php">Change password</a></li>
                    <li class="active"><a href="showteachers.php">Show teachers</a></li>
                    <li><a href="showbandh.php">Show Branches & Heads</a></li>
                    <li><a href="messages.php">Messages</a></li>
                    <li><a href="../index.php">Logout</a></li>
                </ul><br>
            </div>
            <br>

            <div class="col-sm-9">
                <div class="middle_head">
                    <img src="../images/rlogo.png" alt="" height="50">
                    <h1>Raja Jait Singh Government Polytechnic (Admin)</h1>
                </div>
                <div class=" well">
                    <h4>Show Teachers</h4>
                </div>
                <div class="row">
                    <div class="col-sm-12 shadow p-3 mb-5 bg-black rounded">
                        <div class="well">
                            <h3>Showing Teachers</h3>
                            <form action="showteachers.php" method="POST">
                              <div class="select_content">
                              <select name="branch" id="">
                                      <option value="">--select branch--</option>
                                      <?php
                                include('db.php');
                                $select_branches="SELECT `branches` FROM `branches`";
                                $result2=mysqli_query($conn,$select_branches);
                                foreach ($result2 as $key => $value) {
                                   foreach ($value as $key1 => $value1) {
                                    ?>
                                    <option value="<?php echo $value1;?>" name="branch">
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
                                      <option value="1st">1st year</option>
                                      <option value="2nd">2nd year</option>
                                      <option value="3rd">3rd year</option>
                                      <option value="All">All</option>
                                  </select>
                              </div>

                              <br>
                              <input type="submit" name="submit" value="SUBMIT">
                          </form>
                            <hr>
                            <table>
                                <tr>
                                    <th>Name</th>
                                    <th>Teacher Id</th>
                                    <th>Password</th>
                                    <th>Subject</th>
                                    <th>Branch</th>
                                    <th>Year</th>
                                </tr>
                                <?php
                                if (isset($_POST['submit'])) {
                                    include('db.php');
                                    $year=$_POST['year'];
                                    $branch=$_POST['branch'];
                                    if($year=="All")
                                    {
                                        $query = "SELECT * FROM `teachers` WHERE `branch`='$branch'";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                            <tr>
                                                <td> <?php echo $row['name'] ?> </td>
                                                <td> <?php echo $row['id'] ?> </td>
                                                <td> <?php echo $row['password'] ?> </td>
                                                <td><?php echo $row['subject'] ?></td>
                                                <td><?php echo  strtoupper($row['branch']) ?></td>
                                                <td><?php echo $row['year'] ?></td>
    
                                            </tr>
    
    
                                    <?php
                                        }
                                    }
                                    else{
                                        $query = "SELECT * FROM `teachers` WHERE `branch`='$branch' and `year`='$year'";
                                        $result = mysqli_query($conn, $query);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                    ?>
                                            <tr>
                                            <td> <?php echo $row['name'] ?> </td>
                                                <td> <?php echo $row['id'] ?> </td>
                                                <td> <?php echo $row['password'] ?> </td>
                                                <td><?php echo $row['subject'] ?></td>
                                                <td><?php echo strtoupper($row['branch']) ?></td>
                                                <td><?php echo $row['year'] ?></td>
    
                                            </tr>
    
    
                                    <?php
                                        }
                                    }
                                    }
                                    ?>
                            </table>
                            <h5>Note : <i>Showing all teachers...</i></h3>
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