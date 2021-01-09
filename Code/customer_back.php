<style type="text/css">
	.material
	{
		color:red;
	}
	table
	{
		width: 70%;
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
		$query_res = "select * from property,detail,pin_detail where property.p_id=detail.p_id and detail.pincode=pin_detail.pincode and cost>=$min and p_type='$t' and avail = 'yes' order by cost desc"; 
	
		//3.only max is selected
		if(empty($_POST['start_cost']) && !empty($_POST['end_cost']))
		$query_res = "select * from property,detail,pin_detail where property.p_id=detail.p_id and detail.pincode=pin_detail.pincode and cost<=$max and p_type='$t' and avail = 'yes' order by cost desc";
	
		//4.both is selected
		if(!empty($_POST['start_cost']) && !empty($_POST['end_cost']))
		$query_res = "select * from property,detail,pin_detail where property.p_id=detail.p_id and detail.pincode=pin_detail.pincode and cost>=$min and cost<=$max and p_type='$t' and avail = 'yes' order by cost desc";
	}
	
	if(empty($ci) && empty($loc) && !empty($bhk))//1 done 
	$query_res="select * from property,detail,pin_detail where cost>=$min and cost<=$max and property.p_id = detail.p_id detail.pincode=pin_detail.pincode and BHK=$bhk and p_type='$t' and avail = 'yes' order by cost desc";
	
	if(empty($ci) && !empty($loc) && empty($bhk))//2 done 
	$query_res="select * from property,detail,pin_detail where cost>=$min and cost<=$max and property.p_id=detail.p_id and detail.pincode=pin_detail.pincode and locality='$loc' and p_type='$t' and avail = 'yes' order by cost desc";
	
	if(empty($ci) && !empty($loc) && !empty($bhk))//3 done
	$query_res="select * from property,detail,pin_detail where cost>=$min and cost<=$max and property.p_id=detail.p_id and detail.pincode=pin_detail.pincode and locality='$loc' and BHK=$bhk and p_type='$t' and avail = 'yes' order by cost desc";
	
	if(!empty($ci) && empty($loc) && empty($bhk))//4 done
	$query_res="select * from property,detail,pin_detail where cost>=$min and cost<=$max and property.p_id=detail.p_id and detail.pincode=pin_detail.pincode and city='$ci' and p_type='$t' and avail = 'yes' order by cost desc";
	
	if(!empty($ci) && empty($loc) && !empty($bhk))//5 done 
	$query_res="select * from property,detail,pin_detail where cost>=$min and cost<=$max and property.p_id=detail.p_id and detail.pincode=pin_detail.pincode and city='$ci' and BHK=$bhk and p_type='$t' and avail = 'yes' order by cost desc";
	
	if(!empty($ci) && !empty($loc) && empty($bhk))//6 done
	$query_res="select * from property,detail,pin_detail where cost>=$min and cost<=$max and property.p_id=detail.p_id and detail.pincode=pin_detail.pincode and city='$ci' and locality='$loc' and p_type='$t' and avail = 'yes' order by cost desc";
	
	if(!empty($ci) && !empty($loc) && !empty($bhk))//7 done
	$query_res="select * from property,detail,pin_detail where cost>=$min and cost<=$max and property.p_id=detail.p_id and detail.pincode=pin_detail.pincode and city='$ci'and BHK=$bhk and locality='$loc' and p_type='$t' and avail = 'yes' order by cost desc";
	
	//echo $query_res;
	//echo "\n"; //uncomment to see which query is going to run
	$data = mysqli_query($conn,$query_res);
	$rows=mysqli_num_rows($data);
	//echo $rows;
	//echo "\n";

	include "header_cust.php";
	?>
	<h4 style="text-align: center; padding:20px;" > Cost high to low</h4>
	<table>
		<tr>
			<th>
				p_id
			</th>
			<th>
				Full Address
			</th>
			<th>
				cost
			</th>
		</tr>
	<?php
	while($result = mysqli_fetch_assoc($data))
	{
		?>
			<tr>
				<td class="heading"><?php echo $result['p_id']?></td>
				<td>
					<?php
					echo $result['address'];
					echo ",";
					echo $result['locality'];
					echo ",";
					echo $result['city'];
					?>
				</td>
				<td class="cost">
					<?php
					echo $result['cost'];
					?>
				</td>
			</tr>
			<?php
	}
	?>
</table>
	<form class="boxed" method="POST" action="prop_details.php">
	<h2> Look Up for the Property</h2>
	<span class="box1" style="padding-left: 20px;">
	<div class="input-group input-group-lg">
   		<input type="text" class="form-control" aria-label="Sizing example input" placeholder="enter property id" aria-describedby="inputGroup-sizing-lg" name="property_n_i" required>
   	</div>
   </span>
	<button type="submit" class="btn btn-primary btn-lg btn-block">Search</button>
</form>