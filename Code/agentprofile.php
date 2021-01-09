<?php
session_start();
include "header_agent.php";
?>

<html>
<h1 style="font-size: 40px;"><u>Personal details</u>:</h1>
<body>
	<style>
	.detail
	{
		font-size: 30px;
	}
	</style>
<?php
		echo "<p class= 'detail'>Name : ".$_SESSION['a_name']."</p>";
		echo "<p class='detail'>Id : ".$_SESSION['a_id']."</p>";
		echo "<p class='detail'>Email-id : ".$_SESSION["email"]."</p>";
		echo "<p class='detail'>Address : ".$_SESSION['address']."</p>";
		echo "<p class='detail'>Mobile No. : ".$_SESSION['mobile']."</p>";
	
	$user="root"; 
	$password="Sanchit.123"; // Password
	$db="estate_api"; //Need to be changed
	$conn=mysqli_connect('localhost',$user,$password,$db) ;
	if($conn->connect_error)
	{
		die("connection failed");
	}
	function test_input($data)
	{
		$data=trim($data);
		return $data;
	}
	$y="";
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$y=test_input($_POST["year"]);
		if($y=="" || is_null($y))
		{
			echo '<script language="javascript">';
		echo 'alert("Year field is empty")';
		echo '</script>';
		}
		$r=$y;
		$y=$y1=$r;
		$q1="select * from agent join (select date,cost,sell.p_id,agent_id from sell join property p on p.p_id=sell.p_id group by agent_id) k on k.agent_id=agent.a_id where agent.a_id=".$_SESSION['a_id'];
		$q2="select * from agent join (select date,cost,rent.p_id,agent_id from rent join property p on p.p_id=rent.p_id group by agent_id) k on k.agent_id=agent.a_id where agent.a_id=".$_SESSION['a_id'];
		$result=$conn->query($q1);
		$result1=$conn->query($q2);
		$_SESSION['avail']='no';
		$q3="select * from property where agent_id=".$_SESSION['a_id'];
		$sum1=$sum2=0;
				while($row=$result->fetch_assoc())
				{
				if(substr($row['date'],0,4)==substr($y,0,4))
				$sum1+=0.05*$row['cost'];
				$sum2+=0.05*$row['cost'];
				}
			
			while($row=$result1->fetch_assoc())
			{
				if(substr($row['date'],0,4)==substr($y,0,4))
				$sum1+=0.05*$row['cost'];
				$sum2+=0.05*$row['cost'];
			}
		echo "<h3>Total earning as a agent is :</h3><strong>".$sum2."</strong><br>";
		echo"<h3><br><br> Total earning in the year is : </h3>".$sum1."<br><br><br><br>";
	}

$conn->close();
?>	
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div>
<a style="font-size: 23px;" >Year(yyyy) &nbsp</a><input type="text" name="year"><span style="color:red">&nbsp;*&emsp;</span>
<input type="submit"><br>
</div>

</body>
</html>