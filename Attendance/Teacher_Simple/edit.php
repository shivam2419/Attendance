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

// Real Work
$id = $_GET['id'];
$sql = "SELECT  `name`, `fname`, `roll`, `branch`, `pnum`, `year` FROM `$table_name` WHERE  `roll`=$id";
$result = mysqli_query($conn, $sql);
$row = mysqli_fetch_assoc($result);


if (isset($_POST['submit'])) {

    // $id = $_POST['id'];
    $name = $_POST['name'];
    $name = strtoupper($_POST['name']);
    $fname = $_POST['fname'];
    $fname = strtoupper($_POST['fname']);
    $roll = $_POST['roll'];
    $branch = $_POST['branch'];
    $branch = strtoupper($_POST['branch']);
    $pnum = $_POST['pnum'];
    $year = $_POST['year'];
    //updated the student table 
    $query = "UPDATE `$table_name` SET `name`='$name',`fname`='$fname',`roll`='$roll',`branch`='$branch',`pnum`='$pnum',`year`='$year' WHERE `roll`='$id'";
    $result = mysqli_query($conn, $query);


    if ($result) {
        echo "<script>alert('Details Updated !!'); window.location='update.php'</script>";
    } else {
        die(mysqli_error($conn));
        echo "error";
    }
}
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="edit.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <div class="container my-5">
        <h1>Update Details</h1>
        <form method="post">
            <p>UPDATE : <?php echo $row['name'];  ?></p>
            <div class="inp">
                <label for="">Name :</label>
                <input type="text" class="form-control" name="name" value=<?php echo $row['name']; ?>>
            </div>
            <div class="inp">
                <label for="">Father Name :</label>
                <input type="text" class="form-control" name="fname" value=<?php echo $row['fname']; ?>>
            </div>
            <div class="inp">
                <label for="">Roll Number :</label>
                <input type="int" class="form-control" name="roll" value=<?php echo $row['roll']; ?>>
            </div>

            <div class="inp">
                <label for="">Branch :</label>
                <input type="text" class="form-control" name="branch" value=<?php echo $row['branch']; ?>>
            </div>
            <div class="inp">
                <label for=""> Phone Number:</label>
                <input type="int" class="form-control" name="pnum" value=<?php echo $row['pnum']; ?>>
            </div>
            <div class="inp">
                <label for="">Year :</label>
                <input type="text" class="form-control" name="year" value=<?php echo $row['year']; ?>>
            </div>
            <br>
            <button name="submit" type="submit" class="btn btn-primary">Update</button>
        </form>

    </div>

</body>

</html>