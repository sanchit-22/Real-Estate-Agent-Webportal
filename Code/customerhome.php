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
		width:50px;
		padding:10px;
		transition:all 0.3s;
	}
	.boxed1 input[type="radio"]
	{
		display:none;
	} 
	.boxed1 input[type="radio"]:checked + label 
	{
  		border-bottom:  solid 4px green;
	}
	.filterbox
	{
		padding:5px;
	}
</style>
<?php
error_reporting(0);
session_start();
//echo $_SESSION['user_id'];
$user_id=$_SESSION['user_id'];
$user="root";
$password="Sanchit.123";
$db="estate_api";
$conn=mysqli_connect('localhost',$user,$password,$db);
$sql="select flag from account where user_id=$user_id";
$result=mysqli_query($conn,$sql) or die("bad query");
$row=mysqli_fetch_assoc($result);
$flag=$row['flag'];
if($flag==1)
{

}
else if($flag==0)
{
	header('Location:loginpage2.php');
}
$sql="select a_name from agent where a_id=$user_id";
$result=mysqli_query($conn,$sql);
$row=mysqli_fetch_assoc($result);
$_SESSION['user_name']=$row['a_name'];
include "header_cust.php";
?>
<div class="container">
		<div class="jumbotron jumbotron-fluid">
  			<div class="container">
    			<h1 class="display-4">Mega Real Estate</h1>
    			<p class="cust">Welcome to MEGA Real Estate!!! Find dreams of your home at the affordable prizes</p>
  			</div>
		</div>
		<form class="boxed1" method="POST" action="customer_back.php">
	<input type="radio" name="type" id="buy_fil" value="buy_fil" checked><label for="buy_fil">Buy</label>
	<input type="radio" name="type" value="rent_fil" id="rent_fil"><label for="rent_fil">Rent</label>
	<div class="row">
		<div class="col-lg-6">
			<div class="filterbox">
			Enter city	  <input type="text" class="form-control" aria-label="Sizing example input" placeholder="Enter city" aria-describedby="inputGroup-sizing-mb-3" name="city">
			<br>
			</div>
		</div>
		<div class="col-lg-6">
			<div class="filterbox">
			Enter locality	  <input type="text" class="form-control" aria-label="Sizing example input" placeholder="Enter locality" aria-describedby="inputGroup-sizing-mb-3" name="locality">
			<br>
			</div>
		</div>
		<div class="col-lg-3">
			<h4>Enter your Budget</h4>
		</div>
		<div class="col-lg-3">
			<div class="filterbox">
				<input type="text" class="form-control" aria-label="Sizing example input" placeholder="starting range" aria-describedby="inputGroup-sizing-mb-3" name="start_cost">
			</div>
		</div>
		<div class="col-lg-3">
			<h1 style="color: black;">-----</h1>
		</div>
		<div class="col-lg-3">
			<div class="filterbox">
				<input type="text" class="form-control" aria-label="Sizing example input" placeholder="ending cost" aria-describedby="inputGroup-sizing-mb-3" name="end_cost">
			</div>
		</div>
		<div class="col-lg-6">
			<div class="filterbox">
			BHk	  <input type="text" class="form-control" aria-label="Sizing example input" placeholder="how many room you want" aria-describedby="inputGroup-sizing-mb-3" name="BHk">
			<br>
			</div>
		</div>
	</div>
	<button type="submit" class="btn btn-primary btn-lg btn-block"> search</button>
</form>
</div>