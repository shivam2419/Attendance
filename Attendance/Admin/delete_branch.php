<?php
include ('db.php');
$id=$_GET['id'];
if(isset($_GET['id'])){
$query="DELETE FROM `branches` WHERE `id`=$id";
$result=mysqli_query($conn,$query);

if($result){
  
 echo" <script>alert('Branch Removed !!'); window.location='add&removebranch.php'</script>";
}
else{
    die(mysqli_error($conn));
}

}
?>