
<?php
// connect to mysql server & select database
include("include/connection.php"); 

// Check whether the user has logged in
if(isset($_SESSION['username']) == false){
header("location:index.php");
}
else{
$username = $_SESSION['username'];

$sql = "SELECT * FROM user_login  WHERE username='$username' LIMIT 1";
$query = mysqli_query($connection,$sql) or die(mysql_error());
 $res = mysqli_fetch_array($query);
// Fetch the the user ID  
 $username = $res['username'];
 $id = $res['user_id'];
// Confirm whether the user really logged in
if($_SESSION['username']!= $username){
header("location: index.php");
   }
}


?>