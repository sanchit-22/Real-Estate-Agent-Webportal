<?php
session_start();
	$agent_id=$_POST['agent_id'];
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
	$sql="select password from account where user_id=$agent_id";
	$result=mysqli_query($conn,$sql);
	$result=mysqli_num_rows($result);
	if($result)
	{
		echo "choose different user ID";
		?>
		<?php
	}
	if($result==NULL)
	{
		$sql="Insert into agent values('$agent_id','$name','$email','$mobile','$address','0');";
		$result=mysqli_query($conn,$sql);
		if($result)
		{
		//	echo "data inserted";
		}
		else 
		{
			echo "Some error try to again Signup";
		}
		$sql="Insert into account values('$agent_id','$pass','0')";
		$result=mysqli_query($conn,$sql);
		if($result)
		{
			echo "You are successfully register login now";
			?>
			<?php
		}
		else 
		{
			echo "Some error try to again add agent";
		}
	}
	session_unset();
?>