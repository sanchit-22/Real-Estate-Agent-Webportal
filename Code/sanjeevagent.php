
<?php
session_start();
$_SESSION["a_id"]=$_SESSION['user_id']; //changes required
	$user="root"; 
	$password="Sanchit.123"; // Password
	$db="estate_api"; //Need to be changed
	$conn=mysqli_connect('localhost',$user,$password,$db) ;
	if($conn->connect_error)
	{
		die("connection failed");
	}
	$query1="select * from agent where a_id=".$_SESSION['a_id'];
	$result=$conn->query($query1);
	if($result->num_rows >0)
	{
		while($row=$result->fetch_assoc())
		{
			$_SESSION["a_name"]=$row['a_name'];
			$_SESSION["id"]=$row['a_id'];
			$_SESSION["email"]=$row['email'];
			$_SESSION["address"]=$row['address'];
			$_SESSION["mobile"]=$row['mobile'];

		}

	}
include "header_agent.php";
 //need to changed
/*
line 31 and 32 has page url . if required make chnages. line 56 and 57 contains page name of update property and agent profile respectively*/
?>
<!DOCTYPE html>
<html>
<head>
	<style>
		.right{
			position:absolute;
			right: 60px;
			padding:0px;
			font-size: 120%;
			color:#66CE8A;}
		.right li{
			display: inline-block;
			right: 5px;
			padding:5px;
			font-size: 120%;
			color:#66CE8A;}
		.right3{
			position: absolute;
			left:150px;
			padding: 10px;
			font-size: 25px;
			color: #FDFDFF;}
		table
		{
			border-collapse: collapse;
			width: 100%;
			color: #d96459;
			font-family: monospace;
			font-size: 20px;
			text-align: left;
		}
		tr:nth-child(odd) {
			background-color: #f2f2f2;
		}
	</style>
<h3 style="color:#39FF14;font-size: 300%;text-align: center;"><i>Hi <?php echo $_SESSION['a_name'];?>! 

</i></h3></head>
<script>
function validateForm() {
  var x = document.forms["myForm"]["fname"].value;
  if (x == "") {
    alert("Name must be filled out");
    return false;
  }
}
</script>
 
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
<div class="right3">
<a style="color: indigo"><strong >City &emsp;</strong></a><input type="text" name="city"><span style="color:red">*</span>
&nbsp&nbsp&nbsp&nbsp&nbsp
<b style="color: indigo">PINCODE &nbsp&nbsp</b> <input type="text" name="pin">
&nbsp&nbsp&nbsp&nbsp&nbsp
<b style="color: indigo">Area&nbsp&nbsp&nbsp</b><input type="text" name="Area">
&nbsp&nbsp&nbsp
<b style="color: indigo">BHk&nbsp&nbsp&nbsp&nbsp</b><input type="text" name="BHk">&nbsp&nbsp&nbsp
<input type="submit"><br>
<p><span style="color:red">* Mandatory field</span></p>
</div>
</form>

<body>

<?php
	
	$user="root";
	$password="Sanchit.123"; //need to changed
	$db="estate_api"; // need to be changed
	$conn=mysqli_connect('localhost',$user,$password,$db) ;
	if($conn->connect_error)
	{
		die("connection failed");
	}
	$city=$pin=$Area=$BHk="";
	function test_input($data)
	{
		$data=trim($data);
		return $data;
	}
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$city=test_input($_POST["city"]);
		$pin=test_input($_POST["pin"]);
		$Area=test_input($_POST["Area"]);
		$BHk=test_input($_POST["BHk"]);

	
	if(($city==""))
		{
		echo '<script language="javascript">';
		echo 'alert("City cannot be empty")';
		echo '</script>';
		}
	else
	{
		if($city=="")
		$city="";
		else
		$city="\"".$city."\"";
		if($pin=="")
		$pin=0;
		if($Area=="")
		$Area=0;
		else
		{
			$a1=$Area-1000;
			$a2=$Area+1000;
		}
		if($BHk=="")
		$BHk=0;
		if($pin!=0 && $BHk!=0 && $Area!=0)
		{
			$q2="select * from agent join (select avail,address,n1.pincode,agent_id,area,BHk,city,locality from property p join (select pin_detail.pincode,p_id,area,BHk,city,locality from detail  join pin_detail  on pin_detail.pincode=detail.pincode) as n1 on n1.p_id=p.p_id ) h on agent.a_id=h.agent_id where city= ".$city." and (pincode=".$pin." and BHk=".$BHk ." and (area>=".$a1." and area<=".$a2."))";
		}
		elseif(($pin==0 || is_null($pin))&&($BHk==0 || is_null($BHk)) &&($Area==0 || is_null($Area)))
		{
			$q2="select * from agent join (select  avail,address,n1.pincode,agent_id,area,BHk,city,locality from property p join (select pin_detail.pincode,p_id,area,BHk,city,locality from detail  join pin_detail  on pin_detail.pincode=detail.pincode) as n1 on n1.p_id=p.p_id ) h on agent.a_id=h.agent_id where city= ".$city;
		}
		elseif($pin!=0 && $BHk!=0 && $Area==0)
		{
			$q2="select * from agent join (select avail,address,n1.pincode,agent_id,area,BHk,city,locality from property p join (select pin_detail.pincode,p_id,area,BHk,city,locality from detail  join pin_detail  on pin_detail.pincode=detail.pincode) as n1 on n1.p_id=p.p_id ) h on agent.a_id=h.agent_id where city= ".$city." and pincode=".$pin." and BHk=".$BHk;
		}
		elseif(($pin==0 || is_null($pin))&&($BHk==0 || is_null($BHk)) &&($Area!=0))
		{
				$q2="select distinct * from agent join (select avail,address,n1.pincode,agent_id,area,BHk,city,locality from property p join (select pin_detail.pincode,p_id,area,BHk,city,locality from detail  join pin_detail  on pin_detail.pincode=detail.pincode) as n1 on n1.p_id=p.p_id ) h on agent.a_id=h.agent_id where city= ".$city." and ((area>=".$a1." and area<=".$a2."))";
		
		}

		elseif(($pin==0 || is_null($pin))&&($Area==0))
		{
				$q2="select distinct * from agent join (select avail,address,n1.pincode,agent_id,area,BHk,city,locality from property p join (select pin_detail.pincode,p_id,area,BHk,city,locality from detail  join pin_detail  on pin_detail.pincode=detail.pincode) as n1 on n1.p_id=p.p_id ) h on agent.a_id=h.agent_id where city= ".$city." and BHk=".$BHk;
		
		}
		elseif(($BHk==0 || is_null($BHk))&&($Area==0))
		{
		$q2="select * from agent join (select avail,address,n1.pincode,agent_id,area,BHk,city,locality from property p join (select pin_detail.pincode,p_id,area,BHk,city,locality from detail  join pin_detail  on pin_detail.pincode=detail.pincode) as n1 on n1.p_id=p.p_id ) h on agent.a_id=h.agent_id where city= ".$city." and pincode=".$pin;
		}
		elseif($BHk==0 || is_null($BHk))
		{
		$q2="select * from agent join (select avail,address,n1.pincode,agent_id,area,BHk,city,locality from property p join (select pin_detail.pincode,p_id,area,BHk,city,locality from detail  join pin_detail  on pin_detail.pincode=detail.pincode) as n1 on n1.p_id=p.p_id ) h on agent.a_id=h.agent_id where city= ".$city." and (pincode=".$pin." and (area>=".$a1." and area<=".$a2."))";
		}
		elseif($Area==0 || is_null($Area))
		{
		 $q2="select * from agent join (select  avail,address,n1.pincode,agent_id,area,BHk,city,locality from property p join (select pin_detail.pincode,p_id,area,BHk,city,locality from detail  join pin_detail  on pin_detail.pincode=detail.pincode) as n1 on n1.p_id=p.p_id ) h on agent.a_id=h.agent_id where city= ".$city." and pincode=".$pin."and BHk=".$BHk;
		}
		elseif($pin==0 || is_null($pin))
		{
			$q2="select * from agent join (select avail,address,n1.pincode,agent_id,area,BHk,city,locality from property p join (select pin_detail.pincode,p_id,area,BHk,city,locality from detail  join pin_detail  on pin_detail.pincode=detail.pincode) as n1 on n1.p_id=p.p_id ) h on agent.a_id=h.agent_id where city= ".$city." and (BHk=".$BHk ." and (area>=".$a1." and area<=".$a2."))";
		}
		
		$result=$conn->query($q2);
		$count=0;
		$res1=$conn->query($q2);
		while($row=$res1->fetch_assoc())
		{
			if($_SESSION['a_id']==$row['a_id'])
			$count+=1;
			
		}
		echo "<br/><br/><br/><br/><br/><br/><br/><br/>";
		if($count>=1)
		{
			?>
			<table>
				<tr>
					<th>
						Address
					</th>
					<th>
						pincode
					</th>
					<th>
						availability
					</th>
					<th>
						rooms
					</th>
					<th>
						Area
					</th>
				</tr>
				<?php
		while($row=$result->fetch_assoc())
		{
			if($_SESSION['a_id']==$row['a_id'])
			{
				?>
				<tr>
					<td>
						<?php
						echo $row['address'];
						echo ",";
						echo $row['locality'];
						echo ",";
						echo $row['city'];
						?>
					</td>
					<td>
						<?php
						echo $row['pincode'];
						?>
					</td>
					<td>
						<?php
						echo $row['avail'];
						?>
					</td>
					<td>
						<?php
						echo $row['BHk'];
						?>
					</td>
					<td>
						<?php
						echo $row['area'];
						?>
					</td>
				</tr>
				<?php
			}
			$count+=1;
		}
		?>
	</table>
	<?php
	}
	
		else
		{
			echo "<h3><br><br><br><br><br><br><br>Sorry ! No such data found</h3>";
		}
		}
	}	
$conn->close();
?>
</body>

</html>
