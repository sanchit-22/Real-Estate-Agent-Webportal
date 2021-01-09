<style type="text/css">
	.boxed label
	{
		font-size: 20px;
		display:inline-block;
		width:50px;
		padding:10px;
		transition:all 0.3s;
	}
	.boxed input[type="radio"]
	{
		display:none;
	} 
	.boxed input[type="radio"]:checked + label 
	{
  		border-bottom:  solid 4px red;
	}
	.boxed1 label
	{
		font-size: 20px;
		display:inline-block;
		width:500px;
		padding:10px;
		transition:all 0.3s;
	}
	.boxed1 input[type="radio"]
	{
		display:none;
	} 
	.boxed1 input[type="radio"]:checked + label 
	{
  		border:  solid 4px green;
	}
	.filterbox
	{
		padding:20px;
	}
	.each
	{
		padding-top: 50px;
	}
	.personal
	{
		padding-top: 50px;
	}
	.material
	{
		color:red;
	}
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
<?php
session_start();
include "header_aohome_agent.php";
//echo $_SESSION['user_id'];
$user_id=$_SESSION['user_id'];
$user="root";
$password="Sanchit.123";
$db="estate_api";
$conn=mysqli_connect('localhost',$user,$password,$db);
error_reporting(0);
$t = $_POST['type1'];
//echo $_POST['type1'];

	if($_POST['type1']=='sell')
	$query = "select agent.a_id,sum(cost) from agent,sell,property where (flag=0 and avail='no' and p_type='sell' and agent.a_id=property.agent_id and property.p_id=sell.p_id)
          group by a_name order by sum(cost)";
	if($_POST['type1']=='rent')
	$query = "select agent.a_id,sum(cost) from agent,rent,property where (flag=0 and avail='no' and p_type='rent' and agent.a_id=property.agent_id and property.p_id=rent.p_id)
          group by a_name order by sum(cost)";
	
	//echo $query;
	$data = mysqli_query($conn,$query);
	$total = mysqli_num_rows($data);
	//echo $total;
	if($total==0)
	{
		if($t=='sell') echo "No agent who sold the property!";
		if($t=='rent') echo "No agent who give property on rent!";
	}
	?>
	<table>
			<tr>
				<th>agent_id</th>
				<th>P_id</th>
				<th>date</th>
				<th>cost</th>
			</tr>
			<?php
	while($result = mysqli_fetch_assoc($data))
	{
		$id = $result['a_id'];
		//echo $id;
		if($t=='sell')
		$query1 = "select property.p_id,date,cost from property,sell,agent where agent.a_id = $id and agent.a_id = property.agent_id and property.p_id = sell.p_id and p_type='sell'";
		if($t=='rent')
		$query1 = "select property.p_id,date,cost from property,rent,agent where agent.a_id = $id and agent.a_id = property.agent_id and property.p_id = rent.p_id and p_type='rent'";
		$data1 = mysqli_query($conn,$query1);
		//echo $query1;
		?>
		
		<?php
		while($r = mysqli_fetch_assoc($data1))
		{
			echo"<tr>
				<td>".$result['a_id']."</td>
				<td>".$r['p_id']."</td>
				<td>".$r['date']."</td>
				<td>".$r['cost']."</td>
				</tr>";
		}
		
	}
	?>
</table>
<form class="boxed" method="POST" action="first.php">
	<div class="each">
	<input type="radio" name="type" id="buy" value="buy" checked><label for="buy">Sold</label>
	<input type="radio" name="type" value="rent" id="rent"><label for="rent">Rent</label>
	<span class="box1" style="padding-left: 20px;">
	<div class="input-group input-group-lg">
   		<input type="text" class="form-control" aria-label="Sizing example input" placeholder="enter agent name" aria-describedby="inputGroup-sizing-lg" name="agent_id">
   	</div>
   </span>
	<button type="submit" class="btn btn-primary btn-lg btn-block">Search</button>
</div>
</form>
<?php

include "ao_footer.php";
?>
