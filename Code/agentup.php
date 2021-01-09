<?php
include "header_agent.php";
?>
<html>
<head>
<title>Update Property</title>
<h1 style="color: green;text-align:center;"><i><u>Update Property details</i></u></h1>
</head>
<h2>
	
</h2>
<body align="middle">
	
<?php
	$user="root";
	$password="Sanchit.123"; // need to be changed
	$db="estate_api"; // need to base64_encode changed
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
	$p_id=$avail=$date1=$name1=$s1="";
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		$p_id=test_input($_POST["p_id"]);
		$avail=test_input($_POST["avail"]);
		$date1=test_input($_POST["date"]);
		$name1=test_input($_POST["name1"]);
		$s1=test_input($_POST["s1"]);

	
	if($p_id=="" || $avail=="" || $date1=="" || $name1==""|| $s1=="")
	{
		echo '<script language="javascript">';
		echo 'alert("Some of the fields are empty")';
		echo '</script>';
	}
	else
{
	$avail="\"".$avail."\"";
	$name1="\"".$name1."\"";
	$date1="\"".$date1."\"";
	$q1="Update property set avail=".$avail."where p_id=".$p_id;

	if($conn->query($q1)===TRUE)
	{
		echo "Result Update<br>";

	if($s1=='rent')
	{
		$res1="Insert into rent(p_id,r_name,date) values (".$p_id.",".$name1.",".$date1.")";
		if($conn->query($res1)===TRUE)
		{
			echo $s1." table updated";
		}
		else
			echo $res1."<br>".$conn->error."<br>";
	}
	elseif($s1=="sold")
	{
		$res1="Insert into sell(p_id,s_name,date) values (".$p_id.",".$name1.",".$date1.")";
		if($conn->query($res1)===TRUE)
		{
			echo $s1." table updated";
		}
		else
			echo $res1."<br>".$conn->error."<br>";
	}
	echo "";
	}
	else
	echo $q1." ".$conn->error;
}
}
$conn->close();
?>
<p style="text-align: left">
</p>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" >

<strong>Property id&nbsp:&nbsp</strong><input type="text" name="p_id"><span style="color:red">&nbsp;*</span><br><br>

<b>Availability:(yes/no)</b> <input type="text" name="avail"><span style="color:red">&nbsp;*</span><br><br>
<b>Buyer/Renter's Name&nbsp:&nbsp&nbsp&nbsp&nbsp</b><input type="text" name="name1"><span style="color:red">&nbsp;*</span><br><br>
<b>sold/rent&nbsp:&nbsp&nbsp&nbsp&nbsp</b><input type="text" name="s1"><span style="color:red">&nbsp;*</span><br><br>
<b>Date (YYYY-MM-DD) : </b><input type="text" name="date"><span style="color:red"> *</span><br><br>
<input type="submit">
</form>

</body>
</html>