<?php
include('db.php');  
$name=$_POST['name'];
$id=$_POST['id'];
$password=$_POST['password'];
$branch=$_POST['branch'];
$query="INSERT INTO `teachers` (`Name`, `id`, `password`, `branch`) VALUES ('$name', '$id', '$password', '$branch')";
$result=mysqli_query($conn,$query);
if ($result)
{
    echo "done";
    echo "<br>";
    echo "<a href='index.html'>Login</a>";
}
?>