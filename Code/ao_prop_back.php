<style type="text/css">
	.material
	{
		color:red;
	}
	table
	{
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
<?php 
session_start();
//echo $_SESSION['user_id'];
$user_id=$_SESSION['user_id'];
$user="root";
$password="Sanchit.123";
$db="estate_api";
$conn=mysqli_connect('localhost',$user,$password,$db);
error_reporting(0);
	$ci = $_POST['city'];
	$loc = $_POST['locality'];
	$min = $_POST['start_cost'];
	$max = $_POST['end_cost'];
	$bhk = $_POST['BHk'];
	$flag = 1;
	if(empty($min)==true) $min = 0;
	if(empty($max)==true) $max=100000000;
	if($_POST['type']=='rent_fil')
		$t = 'rent';
	if($_POST['type']=='buy_fil')
		$t = 'sell';
	
	if(empty($ci) && empty($loc) && empty($bhk))//0 done
	{
		//1.when none is selected
		if(empty($_POST['start_cost']) && empty($_POST['end_cost'])){
		echo "You didn't select any option. please try again!";
		$flag = 0;	
		}
		
		//2.only min is selected
		if(!empty($_POST['start_cost']) && empty($_POST['end_cost']))
		$query_res = "select * from property,detail,pin_detail where property.p_id=detail.p_id and detail.pincode=pin_detail.pincode and cost>=$min and p_type='$t'"; 
	
		//3.only max is selected
		if(empty($_POST['start_cost']) && !empty($_POST['end_cost']))
		$query_res = "select * from property,detail,pin_detail where property.p_id=detail.p_id and detail.pincode=pin_detail.pincode and cost<=$max and p_type='$t'";
	
		//4.both is selected
		if(!empty($_POST['start_cost']) && !empty($_POST['end_cost']))
		$query_res = "select * from property,detail,pin_detail where property.p_id=detail.p_id and detail.pincode=pin_detail.pincode and cost>=$min and cost<=$max and p_type='$t'";
	}
	
	if(empty($ci) && empty($loc) && !empty($bhk))//1 done 
	$query_res="select * from property,detail,pin_detail where cost>=$min and cost<=$max and property.p_id = detail.p_id and detail.pincode=pin_detail.pincode and BHK=$bhk and p_type='$t'";
	
	if(empty($ci) && !empty($loc) && empty($bhk))//2 done 
	$query_res="select * from property,detail,pin_detail where cost>=$min and cost<=$max and property.p_id=detail.p_id and detail.pincode=pin_detail.pincode and locality='$loc' and p_type='$t'";
	
	if(empty($ci) && !empty($loc) && !empty($bhk))//3 done
	$query_res="select * from property,detail,pin_detail where cost>=$min and cost<=$max and property.p_id=detail.p_id and detail.pincode=pin_detail.pincode and locality='$loc' and BHK=$bhk and p_type='$t'";
	
	if(!empty($ci) && empty($loc) && empty($bhk))//4 done
	$query_res="select * from property,detail,pin_detail where cost>=$min and cost<=$max and property.p_id=detail.p_id and detail.pincode=pin_detail.pincode and city='$ci' and p_type='$t'";
	
	if(!empty($ci) && empty($loc) && !empty($bhk))//5 done 
	$query_res="select * from property,detail,pin_detail where cost>=$min and cost<=$max and property.p_id=detail.p_id and detail.pincode=pin_detail.pincode and city='$ci' and BHK=$bhk and p_type='$t'";
	
	if(!empty($ci) && !empty($loc) && empty($bhk))//6 done
	$query_res="select * from property,detail,pin_detail where cost>=$min and cost<=$max and property.p_id=detail.p_id and detail.pincode=pin_detail.pincode and city='$ci' and locality='$loc' and p_type='$t'";
	
	if(!empty($ci) && !empty($loc) && !empty($bhk))//7 done
	$query_res="select * from property,detail,pin_detail where cost>=$min and cost<=$max and property.p_id=detail.p_id and detail.pincode=pin_detail.pincode and city='$ci'and BHK=$bhk and locality='$loc' and p_type='$t'";
	
	
	include "header_aohome_property.php";
//	echo $query_res;
	?>
	<div class="container">
	<table>
		<tr>
			<th>
				P_id
			</th>
			<th>
				Agent alloted(ID)
			</th>
			<th>
				Availability
			</th>
		</tr>
	<?php
	$data = mysqli_query($conn,$query_res);
	while($flag && $result = mysqli_fetch_assoc($data))
	{
		?>
			<tr>
				<td><?php echo $result['p_id']?></td>
				<td>
					<?php
					echo $result['agent_id'];
					?>

				</td>
				<td>
					<?php
					echo $result['avail'];
					?>
				</td>
			</tr>
		<?php
	}
	?>
	</table>

<form class="boxed" method="POST" action="ao_searchproperty.php">
	<h2> Look Up for the Property</h2>
	<span class="box1" style="padding-left: 20px;">
	<div class="input-group input-group-lg">
   		<input type="text" class="form-control" aria-label="Sizing example input" placeholder="enter property id" aria-describedby="inputGroup-sizing-lg" name="property_n_i" required>
   	</div>
   </span>
	<button type="submit" class="btn btn-primary btn-lg btn-block">Search</button>
</form>
</div>