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
//echo $_SESSION['user_id'];
$user_id=$_SESSION['user_id'];
$user="root";
$password="Sanchit.123";
$db="estate_api";
$conn=mysqli_connect('localhost',$user,$password,$db);
error_reporting(0);
include "header_aohome_agent.php";
?>

<h3>Personal details of agent are</h3>
<br>
<?php 
$id = $_POST['agent_id'];
$q = "select * from agent where a_id = $id"; 
$data = mysqli_query($conn,$q);
$result = mysqli_fetch_assoc($data);

if(empty($_POST['agent_id']))
echo "Sorry,You did not give id.Please enter the id of agent!"."<br/>";
?>
			<div class="col-lg-3">
				</div>
				<div class="col-lg-3">
					<table>
						<tr>
							<td class="heading">Agent ID:</td>
							<td>
								<?php
								echo $id;
								?>
							</td>
						</tr>
						<tr>
							<td class="heading">Agent Name:</td>
							<td>
								<?php
								echo $result['a_name'];
								?>
							</td>
						</tr>
						<tr>
							<td class="heading">Email:</td>
							<td>
								<?php
								echo $result['email'];
								?>
							</td>
						</tr>
						<tr>
							<td class="heading">Mobile:</td>
							<td>
								<?php
									echo $result['mobile'];
								?>
							</td>
						</tr>
						<tr>
							<td class="heading">Address:</td>
							<td>
								<?php
									echo $result['address'];
								?>
							</td>
						</tr>
					</table>
				</div>
			</div><?php
$t = $_POST['type'];
	if($t=='buy')
	$query = "select property.p_id,date,cost from property,sell,agent where agent.a_id = $id and agent.a_id = property.agent_id and property.p_id = sell.p_id and p_type='sell'";
	
	if($t=='rent')
	$query = "select property.p_id,date,cost from property,sell,agent where agent.a_id = $id and agent.a_id = property.agent_id and property.p_id = sell.p_id and p_type='rent'";

	//echo $query;
	$data = mysqli_query($conn,$query);
	$total = mysqli_num_rows($data);
	//echo $total;
	if($total==0)
	{
		if($t=='but') echo "Agent is not sold any property till now!";
		if($t=='rent') echo "Agent does not give any property on rent till now!";
		echo "<br/>";
	}
	else 
		goto funct;
	funct:
	if($t=='buy')
	{
		?>
	<h3>
		<?php
		echo "Details of property sold by agent are";
	}
	if($t=='rent')
		echo "Details of property given on rent by agent are : ";
	echo "<br/>";
	?>
</h3>
<table>
    <tr>
        <th>P_id</th>
		<th>date</th>
		<th>cost</th>
    </tr>
<?php
while($r = mysqli_fetch_assoc($data))
{
      echo"<tr>
		<td>".$r['p_id']."</td>
		<td>".$r['date']."</td>
		<td>".$r['cost']."</td>
	   </tr>";
}
?>
</table>	
<?php
include "ao_footer.php";
?>	