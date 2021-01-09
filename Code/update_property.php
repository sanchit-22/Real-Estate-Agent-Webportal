<style type="text/css">
	.prop_box
	{
		padding: 20px;
		border-bottom: 1px solid #1771c1;
	}
	.prop_box h4
	{
		padding-bottom:5px;

	}
	.prop_box h5
	{
		padding-bottom: 3px;
		padding-top: 3px;
	}
</style>
<?php 
	include "header_aohome_property.php"
?>
<h3 style="text-align: center;color:#1771c1;"> Add New Property</h3>
<div class="container">
<form class="add_property" method="post" action="add_property.php">
	<div class="prop_box">
	<h4>Property Details:</h4>
	<div class="row">
		
		<div class="col-lg-6">
			<h5>Enter Property ID</h5>
			<input type="text" name="prop_id" placeholder="ex:73837" required>
		</div>			
		<div class="col-lg-4">
			<h5>Enter Property type</h5>
			<input type="radio" name="prop_type[]" id="p_buy" value="sell" checked><label>Sell</label><br>
			<input type="radio" name="prop_type[]" id="p_rent" value="rent"><label>Rent</label>
		</div>
		<div class="col-lg-4">
			<h5>Registration date</h5>
			<input type="date" name="reg_date" placeholder="ex:20-09-2018" required>
		</div>
		<div class="col-lg-4">
			<h5>Cost in rupees</h5>
			<input type="text" name="prop_cost" placeholder="ex:200000" required>
		</div>
		<div class="col-lg-4">
			<h5>Area of the property</h5>
			<input type="text" name="prop_area" placeholder="in sq feet" required>
		</div>
		<div class="col-lg-4">
			<h5>Rooms in house</h5>
			<input type="text" name="prop_bhk" placeholder="in BHk">
		</div>
	</div>
</div>
<div class="prop_box">
	<h4>Details of Owner:</h4>
	<div class="row">
		<div class="col-lg-6">
			<h5>Owner ID</h5>
			<input type="text" name="owner_id" placeholder="ex:733" required>
		</div>	
		<div class="col-lg-6">
			<h5>Owner Name</h5>
			<input type="text" name="owner_name" placeholder="ex:beerbal" required>
		</div>	
		<div class="col-lg-6">
			<h5>Email</h5>
			<input type="text" name="o_email" placeholder="ex:beerbal@gmail.com" required>
		</div>	
		<div class="col-lg-6">
			<h5>mobile</h5>
			<input type="text" name="o_mobile" placeholder="ex:7383732322" required>
		</div>	
	</div>
</div>
<div class="prop_box" style="border: none;">
	<h4>Address and Locality:</h4>
	<div class="row">
		<div class="col-lg-6">
			<h5>Address</h5>
			<input type="text" name="address" placeholder="ex:House no 2/113" required>
		</div>
		<div class="col-lg-6">
			<h5>Pincode</h5>
			<input type="text" name="pincode" placeholder="ex:209002" required>
		</div>
		<div class="col-lg-6">
			<h5>Locality</h5>
			<input type="text" name="locality" placeholder="ex:nawabganj" required>
		</div>
		<div class="col-lg-6">
			<h5>City</h5>
			<input type="text" name="city" placeholder="ex:kanpur" required>
		</div>
	</div>
</div>
<button type="submit" class="btn btn-primary btn-lg btn-block">Submit</button>
</form>
</div>
<?php
	include "ao_footer.php";
?>