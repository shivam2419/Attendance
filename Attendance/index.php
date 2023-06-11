<?php
if (isset($_POST['submit'])) {
  include('db.php');
  session_start();
  $user_type = $_POST['user'];
  $id = $_POST['id'];
  $password = $_POST['password'];
  if ($user_type == "Teacher") {
    $query = "SELECT `password`,`head` from `teachers` WHERE `id`='$id'";
    $result = mysqli_query($conn, $query);

    while ($row = mysqli_fetch_assoc($result)) {
      if($row['head']=='Yes')
      {
        if ($password == $row['password']) {

          $_SESSION['id']=$id;
          header("location:newattend.php");
        } else {
          echo "<script>alert('Incorrect username or password for UserId :'+$id)</script>";
          header("refresh: 0.2; url=index.php");
        }
      }
      else{
        if ($password == $row['password']) {
          $_SESSION['id']=$id;
          header("location:teachersimple.php");
        } else {
          echo "<script>alert('Incorrect username or password for UserId :'+$id)</script>";
          header("refresh: 0.2; url=index.php");
        }
      }
    break;
    }
  } else {
    $query2 = "SELECT `password` from `admin` WHERE `id`='$id'";
    $result2 = mysqli_query($conn, $query2);
    while ($row = mysqli_fetch_assoc($result2)) {
      if ($password == $row['password']) {
        $_SESSION['id']=$id;

        header("location:admin.php");
      } else {
        echo "<script>alert('Incorrect username or password for Id :'+$id)</script>";
        header("refresh: 0.2; url=index.php");
      }
      break;
    }
  }
}



?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
  <link rel="stylesheet" href="index.css" />
</head>

<body>
  <nav>
    <div class="left">
      <img src="images/rlogo.png" alt="" height="40">
      <h2>Raja Jait Singh Government Polytechnic</h2>
    </div>
    <img src="images/settings.png" alt="" height="40">
  </nav>
  <div class="container">
    <form class="card" action="index.php" method="POST">
      <p>ATTENDANCE MANAGMENT SYSTEM</p>
      <img src="images/user.png" alt="" />
      <h3>Login Panel</h3>

      <input type="text" placeholder="User Id" name="id" />
      <br /><br />
      <input type="password" placeholder="password" name="password" />
      <br /><br />
      <select id="" name="user">
        <option selected>--select type--</option>
        <option value="Admin" name="user">Adminstrator</option>
        <option value="Teacher" name="user">Teacher</option>
      </select>
      <br /><br />
      <input type="submit" value="Login" id="btn" name="submit" />
    </form>
    <img src="images/attendancelogo.png" alt="" class="attendimg">
  </div>
</body>

</html>