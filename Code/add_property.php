<style type="text/css">
	.updated
	{
		font-size: 10px;
		color:green;
	}
</style>
<?php
	$prop_id=$_POST['prop_id'];
	$prop_type=$_POST['prop_type'];
	$reg_date=$_POST['reg_date'];
	$prop_cost=$_POST['prop_cost'];
	$prop_bhk=$_POST['prop_bhk'];
	$prop_area=$_POST['prop_area'];
	$owner_id=$_POST['owner_id'];
	$owner_name=$_POST['owner_name'];
	$o_mobile=$_POST['o_mobile'];
	$o_email=$_POST['o_email'];
	$address=$_POST['address'];
	$pincode=$_POST['pincode'];
	$locality=$_POST['locality'];
	$city=$_POST['city'];
	/*
	echo $prop_id;
	echo "\n";
	echo $prop_type[0];
	echo "\n";
	echo $reg_date;
	echo "\n";
	echo $prop_cost;
	echo "\n";
	echo $prop_bhk;
	echo "\n";
	echo $prop_area;
	echo "\n";
	echo $owner_id;
	echo "\n";
	echo $owner_name;
	echo "\n";
	echo $o_mobile;
	echo "\n";
	echo $o_email;
	echo "\n";
	echo $address;
	echo "\n";
	echo $pincode;
	echo "\n";
	echo $locality;
	echo "\n";
	echo $city;*/
	include "header_aohome_property.php";
	$user="root";
	$password="Sanchit.123";
	$db="estate_api";
	$conn=mysqli_connect('localhost',$user,$password,$db);
	$sql="create view v as(select agent_id,count(agent_id) as c_a_id from property p,detail d,pin_detail pd where p.p_id=d.p_id and pd.pincode=d.pincode group by agent_id)";
	mysqli_query($conn,$sql);
	$sql_1="select agent_id,c_a_id from v order by c_a_id";
	$result=mysqli_query($conn,$sql_1);
	$row=mysqli_fetch_assoc($result);
///	echo "agent id=";
//	echo $row['agent_id'];
	$agent_id=$row['agent_id'];
//	echo "\n";

	$sql1="Insert into owner value('$owner_id','$owner_name','$o_email','$o_mobile')";
	$result=mysqli_query($conn,$sql1);
	if($result)
	{
//		echo"success1\n";
	}

	$sql2="Insert into property values('$prop_id','$prop_type[0]','$reg_date','$prop_cost','$agent_id','$owner_id','yes','$address')";
	$result=mysqli_query($conn,$sql2);
	if($result)
	{
		?>
		<div class="updated">
			<?php
			echo "Property successfully entered in the database\n";
			echo "agent alloted to this property is";
			echo $agent_id;
			?>
		</div>
		<?php
	}

	$sql3="Insert into pin_detail values('$pincode','$city','$locality')";
	$result=mysqli_query($conn,$sql3);
	if($result)
	{
//		echo "success3\n";
	}
	else 
	{
//		echo "success3 fail\n";
	}
	$sql4="Insert into detail values('$prop_id','$prop_bhk','$prop_area','$pincode')";
	$result=mysqli_query($conn,$sql4);
	if($result)
	{
//		echo "success4\n";
	}
	include "ao_footer.php";
?>