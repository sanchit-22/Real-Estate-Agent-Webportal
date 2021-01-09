<?php
session_start();
	$opt1="Customer";
	$opt2="Agent";
	$opt3="Agent Office";
	$id=$_POST['userid'];
	$pass=$_POST['password'];
	echo $pass;
	echo "\n";
	echo $id;
	$oradio=$_POST['optradio'];
	$opt=$oradio[0];
	echo $opt;
	$user="root";
	$password="Sanchit.123";
	$db="estate_api";
	$conn=mysqli_connect('localhost',$user,$password,$db);
	if(strcmp($opt,$opt1)==0)
	{
		$sql="select password from account where flag=1 and user_id=$id";
		$result=mysqli_query($conn,$sql) or die("bad query");
		$total=mysqli_num_rows($result);
		if($total==0)
		{
			header('Location:loginpage2.php');
		}
		else if($total>0)
		{
			$row=mysqli_fetch_assoc($result);
			$pass1=$row['password'];
//			echo "$pass1";
			if($pass==$pass1)
			{
				$_SESSION['user_id']=$id;
				header('Location:customerhome.php');
			}
			else 
			{
				header('Location:loginpage2.php');
			}
		}
	}
	else if(strcmp($opt,$opt2)==0)
	{
		echo"dfdf\n";
		$sql="select password from account where flag=0 and user_id=$id";
		echo "1";
		$result=mysqli_query($conn,$sql) or die("bad query");
		echo "2";
		$row=mysqli_fetch_assoc($result);
		echo "3";
		$pass1=$row['password'];
		$total=mysqli_num_rows($result);
		echo "4";
		if($total==0)
		{
//			echo "3";
			header('Location:loginpage2.php');
		}
		else if($total!=0)
		{
			if($pass==$pass1)
			{
				$_SESSION['user_id']=$id;
				echo "yes\n";
				header('Location:sanjeevagent.php');
			}
			else 
			{
				echo "no\n";
				echo $pass1;
		//	echo "failed login wrong id or password";
				header('Location:loginpage2.php');
			}	
		}
	}
	else if($opt="Agent office")
	{
		$id1=6969;
	//	$result=mysqli_query($db,$sql) or die("bad query");
	//	$pass1=mysqli_fetch_assoc($result);
	//	$pass1=$pass1['password'];
		if($pass==7878123 && $id==$id1)
		{
			$_SESSION['user_id']=$id;
			header('Location:agentofficehome.php');
		}
		else 
		{
			header('Location:loginpage2.php');
		}
	}
?>