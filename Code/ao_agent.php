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
</style>
<?php
	include "header_aohome_agent.php";
?>

<div class="container">
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
	<div class="personal">
		<h2>Agent Report</h2>
<form class="boxed1" method="POST" action="second.php">
	<input type="radio" name="type1" id="buy_fil" value="sell" checked><label for="buy_fil">Sell Report for all agents</label>
	<br>
	<input type="radio" name="type1" value="rent" id="rent_fil"><label for="rent_fil">Rent Report for all agents</label>
	<button type="submit" class="btn btn-primary btn-lg btn-block"> search</button>
</form>
</div>
<h2>Agent Report According to Year</h2>
<form class="boxed" method="POST" action="third.php">
	<input type="radio" name="type2" id="buy_fill" value="buy" checked><label for="buy_fill">Sold</label>
	<input type="radio" name="type2" value="rent" id="rent_fill"><label for="rent_fill">Rent</label>
	<span class="box1" style="padding-left: 20px;">
	<div class="input-group input-group-lg">
   		<input type="text" class="form-control" aria-label="Sizing example input" placeholder="enter Year" aria-describedby="inputGroup-sizing-lg" name="year">
   	</div>
   </span>
	<button type="submit" class="btn btn-primary btn-lg btn-block">Search</button>
</form>
<?php
	include "ao_footer.php";
?>
</div>
</body>
</html>