<?php
include 'db.php';
session_start();
$main_id = $_SESSION['id'];

//getting branch and year according to the logged in user.
$query_branch_year = "SELECT `branch`,`year`,`subject` FROM `teachers` WHERE `id`=$main_id";
$result_branch_year = mysqli_query($conn, $query_branch_year);

//creating empty variable to store the branch and year of the logged in teacher.
$branch_teacher = "";
$year_teacher = "";
$subject_teacher = "";

while ($row = mysqli_fetch_assoc($result_branch_year)) {
    $branch_teacher = $row['branch'];
    $year_teacher = $row['year'];
    $subject_teacher = $row['subject'];
}
$table_name = $branch_teacher . " " . $year_teacher;
$id=$_GET['id'];
if(isset($_GET['id'])){
$query="DELETE FROM `$table_name` WHERE `roll`=$id";
$result=mysqli_query($conn,$query);

if($result){
  
 echo" <script>alert('Student Deleted !!'); window.location='removestudent.php'</script>";
}
else{
    die(mysqli_error($conn));
}

}
?>