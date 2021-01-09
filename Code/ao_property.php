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
	include "header_aohome_property.php";
?>
<div class="container">
<form class="boxed" method="POST" action="ao_searchproperty.php">
	<h2> Look Up for the Property</h2>
	<span class="box1" style="padding-left: 20px;">
	<div class="input-group input-group-lg">
   		<input type="text" class="form-control" aria-label="Sizing example input" placeholder="enter property id" aria-describedby="inputGroup-sizing-lg" name="property_n_i" required>
   	</div>
   </span>
	<button type="submit" class="btn btn-primary btn-lg btn-block">Search</button>
</form>
<h2>Want to Search Property by Filter??</h2>
<form class="boxed1" method="POST" action="ao_prop_back.php">
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
<?php
	include "ao_footer.php";
?>
</div>
</body>
</html>