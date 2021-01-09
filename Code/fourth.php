<?php
include "header_aohome_agent.php";
session_start();
?>
<h2 style="text-align: center;">Best Agent </h2>
<?php
//echo $_SESSION['user_id'];
$user_id=$_SESSION['user_id'];
$user="root";
$password="Sanchit.123";
$db="estate_api";
$conn=mysqli_connect('localhost',$user,$password,$db);
error_reporting(0);
$year = $_POST['year'];
//echo $year;
//echo "<br/>";
if($_POST['year'] == 0) echo "You did not select any year. Please choose year!";
$query = "select a_name,sum(cost) from agent,property,sell where (property.agent_id = agent.a_id and property.p_id=sell.p_id and avail='no' and year(date)=$year) group by a_name order by sum(cost) desc limit 1;";
$data = mysqli_query($conn,$query);
$result = mysqli_fetch_assoc($data);
?>
<h5>
	<?php
echo "Agent Name : ";
echo $result['a_name'];
echo "<br/>";
echo "Cost : ";
echo $result['sum(cost)'];
echo "<br/>";
 //echo $query;
 //if($_POST['year']!=0 && total==0) echo "No property sold for selected year!"
?>
</h5>