<?php
include 'db.php';
$id=$_GET['id'];
if(isset($_GET['id'])){
$query="DELETE FROM `teachers` WHERE `id`=$id";
$result=mysqli_query($conn,$query);

if($result){
  
 echo" <script>alert('Teacher Removed !!'); window.location='add&removeteacher.php'</script>";
}
else{
    die(mysqli_error($conn));
}

}
?>