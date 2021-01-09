<?php
session_start();
	$cust_id=$_POST['cust_id'];
	$pass=$_POST['pass'];
	$name=$_POST['name'];
	$email=$_POST['email'];
	$mobile=$_POST['mobile'];
	$address=$_POST['address'];
//	echo $mobile;
	$user="root";
	$password="Sanchit.123";
	$db="estate_api";
	$conn=mysqli_connect('localhost',$user,$password,$db);
	$sql="select password from account where user_id=$cust_id";
	$result=mysqli_query($conn,$sql);
	$result=mysqli_num_rows($result);
	if($result)
	{
		echo "choose different user ID";
		?>
		<a href="loginpage2.php">back to login page</a>
		<?php
	}
	if($result==NULL)
	{
		$sql="Insert into agent values('$cust_id','$name','$email','$mobile','$address','1');";
		$result=mysqli_query($conn,$sql);
		if($result)
		{
		//	echo "data inserted";
		}
		else 
		{
			echo "Some error try to again Signup";
		}
		$sql="Insert into account values('$cust_id','$pass','1')";
		$result=mysqli_query($conn,$sql);
		if($result)
		{
			echo "You are successfully register login now";
			?>
			<a href="loginpage2.php">login now!!</a>
			<?php
		}
		else 
		{
			echo "Some error try to again Signup";
		}
	}
	session_unset();
?>