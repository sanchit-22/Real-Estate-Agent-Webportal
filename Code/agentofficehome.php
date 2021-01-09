    <?php
	session_start();
	//echo $_SESSION['user_id'];\
	$user_id=$_SESSION['user_id'];
	//echo $user_id;
	$user_id=$_SESSION['user_id'];
	if($user_id==6969)
	{

	}
	else if($user_id!=6969)
	{
		header('Location:loginpage2.php');
	}
	include "header_aohome.php";
	?>
	<style type="text/css">
	</style>
	<div class="container">
  		<div class="jumbotron jumbotron-fluid">
  			<div class="container">
    			<h1 class="display-4">Mega Real Estate</h1>
    			<p class="lead">A Leader's Job is to look into the future and see the organization not as it is,but as it</p>
  			</div>
		</div>
		<div class="row">
			<div class="col-lg-6"  style="padding-left: 150px">
	<div class="card" style="width: 18rem;">
		<img class="card-img-top" src="property.jpg" alt="Card image cap">
	  <div class="card-body">
	    <a href="ao_property.php" class="card-link">Property</a>
	  </div>
	</div>
</div>
<div class="col-lg-6" style="padding-left: 100px">
	<div class="card" style="width: 18rem;">
		<img class="card-img-top" src="agent.jpg" alt="Card image cap">
	  <div class="card-body">
	    <a href="ao_agent.php" class="card-link">Agent</a>
	  </div>
	</div>
	</div>	
</div>
</div>
<?php
	include "ao_footer.php";
?>
  </body>
</html>