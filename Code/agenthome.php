<?php
session_start();
//echo $_SESSION['user_id'];
$user_id=$_SESSION['user_id'];
$user="root";
$password="Sanchit.123";
$db="estate_api";
$conn=mysqli_connect('localhost',$user,$password,$db);
$sql="select flag from account where user_id=$user_id";
$result=mysqli_query($conn,$sql) or die("bad query");
$row=mysqli_fetch_assoc($result);
$flag=$row['flag'];
if($flag==0)
{

}
else if ($flag==1)
{
	header('Location:loginpage2.php');
}
//write your code for home page of customer
//id of the user is stored in the variable $user_id


?>
<a href="logout.php">Logout</a>