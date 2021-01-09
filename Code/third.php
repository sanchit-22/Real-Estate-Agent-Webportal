<style type="text/css">
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
$year = $_POST['year'];
//echo $_POST['type2'];
if($_POST['type2']=='buy')
	$pro_type = 'sell';
if($_POST['type2']=='rent')
	$pro_type = 'rent';
//echo $year;
if($pro_type=='sell')
{
	$view_create = "create view v_sell as(select a_name,sell.p_id,datediff(date,p_reg_date) as datedif,year(date) as year,cost from agent,property,sell where agent.a_id=property.agent_id and property.p_id=sell.p_id);";
	$data = mysqli_query($conn,$view_create);
	$query = "select a_name,avg(datedif),avg(cost),year from v_sell group by a_name having year=$year";
	$data1 = mysqli_query($conn,$query);
}
if($pro_type=='rent')
{
	$view_create = "create view v_rent as(select a_name,rent.p_id,datediff(date,p_reg_date) as datedif,year(date) as year,cost from agent,property,rent where agent.a_id=property.agent_id and property.p_id=rent.p_id);";
	$data = mysqli_query($conn,$view_create);
	$query = "select a_name,avg(datedif),avg(cost),year from v_rent group by a_name having year=$year";
	$data1 = mysqli_query($conn,$query);
}
$total = mysqli_num_rows($data1);
//echo $total;
if($_POST['year'] == 0) echo "You did not select any year. Please choose year!";
if($_POST['year'] != 0 && $total==0) echo "No records find for selected year!";
//echo $query;
//echo "\n";
//echo $view_create;
//$result = mysqli_fetch_assoc($data1);
	?>
		<table>
			<tr>
				<th>Agent Name</th>
				<th>avg(datedif)</th>
				<th>avg(cost)</th>
			</tr>
		<?php
		while($r = mysqli_fetch_assoc($data1))
		{
			echo"<tr>
				<td>".$r['a_name']."</td>
				<td>".$r['avg(datedif)']."</td>
				<td>".$r['avg(cost)']."</td>
				<td>".$r['sold_year']."</td>
				</tr>";
		}
?>