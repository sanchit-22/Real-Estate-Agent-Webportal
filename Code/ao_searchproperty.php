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
	$user="root";
	$password="Sanchit.123";
	$db="estate_api";
	$conn=mysqli_connect('localhost',$user,$password,$db);
//	$check=$_POST['check'];
//	echo $check[0];
	$prop_id=$_POST['property_n_i'];
//	echo $prop_id;
	$check_flag1="yes";
	$check_flag2="no";
	$sql1="select owner.owner_id as owner_id,o_name,o_email,o_mobile from owner,property where property.p_id=$prop_id and owner.owner_id=property.owner_id";
	$result1=mysqli_query($conn,$sql1);
	$query1=mysqli_fetch_assoc($result1);
	$sql="select property.p_id as p_id,agent_id,a_name,avail,p_type,p_reg_date,email,mobile,agent.address,d.BHK as BHK,d.area as area,cost,locality,city,d.pincode as pincode,property.address as paddress from agent,property,detail d,pin_detail pd where agent.a_id=property.agent_id and property.p_id=d.p_id and d.pincode=pd.pincode and property.p_id=$prop_id";
	$result=mysqli_query($conn,$sql);
	$row=mysqli_num_rows($result);
	$query=mysqli_fetch_assoc($result);
	$check_type1="sell";
//	echo $query['avail'];
	if($row!=NULL)
	{
		
	}
	else if($row==NULL)
	{
		echo "No such property ID exists";
	}
		include "header_aohome_property.php";
		if(strcmp($check_flag1,$query['avail'])==0)
		{
		?>
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<h4>Property id:</h4>
					<div class="material">
						<?php
							echo $query['p_id'];
						?>
					</div>
				</div>
				<div class="col-lg-4">
					<h4>Type:</h4>
					<div class="material">
						<?php
						if(strcmp($check_type1,$query['p_type'])==0)
							echo "to sell";
						else 
							echo "to rent";
						?>
					</div>
				</div>
				<div class="col-lg-4">
					<h4>Availability:</h4>
					<div class="material">
						<?php
							echo "Yes";
						?>
					</div>
				</div>
			</div>
			<h4>Agent Alloted:</h4>
			<div class="row">
				<div class="col-lg-3">
				</div>
				<div class="col-lg-3">
					<table>
						<tr>
							<td class="heading">Agent ID:</td>
							<td>
								<?php
								echo $query['agent_id'];
								?>
							</td>
						</tr>
						<tr>
							<td class="heading">Agent Name:</td>
							<td>
								<?php
								echo $query['a_name'];
								?>
							</td>
						</tr>
						<tr>
							<td class="heading">Email:</td>
							<td>
								<?php
								echo $query['email'];
								?>
							</td>
						</tr>
						<tr>
							<td class="heading">Mobile:</td>
							<td>
								<?php
									echo $query['mobile'];
								?>
							</td>
						</tr>
						<tr>
							<td class="heading">Address:</td>
							<td>
								<?php
									echo $query['address'];
								?>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<h4>Property Details:</h4><br>
			<div class="row">
				<div class="col-lg-3">
				</div>
				<div class="col-lg-3">
					<table>
						<tr>
							<td class="heading">Rooms:</td>
							<td>
								<?php
								echo $query['BHK'];
								echo "BHk";
								?>
							</td>
						</tr>
						<tr>
							<td class="heading">Area:</td>
							<td>
								<?php
								echo $query['area'];
								echo "sq feet";
								?>
							</td>
						</tr>
						<tr>
							<td class="heading">Registered Date:</td>
							<td>
								<?php
								echo $query['p_reg_date'];
								?>
							</td>
						</tr>
						<tr>
							<td class="heading">Cost:</td>
							<td>
								<?php
									echo $query['cost'];
									echo "Rupees";
								?>
							</td>
						<tr>	
							<td class="heading">home address:</td>
							<td>
								<?php
									echo $query['paddress'];
									echo ",";
									echo $query['locality'];
									echo ",";
									echo $query['city'];
									echo ",";
									echo $query['pincode'];
								?>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<h4>
			<?php
			if(strcmp($query['p_type'],$check_type1)==0)
				echo "Seller Details:";
			else 
				echo "Landlord's Details:";
			?>
			</h4>
			<div class="row">
				<div class="col-lg-3">
				</div>
				<div class="col-lg-3">
					<table>
						<tr>
							<td class="heading">ID:</td>
							<td>
								<?php
								echo $query1['owner_id'];
								?>
							</td>
						</tr>
						<tr>
							<td class="heading">Name:</td>
							<td>
								<?php
								echo $query1['o_name'];
								?>
							</td>
						</tr>
						<tr>
							<td class="heading">Email:</td>
							<td>
								<?php
								echo $query1['o_email'];
								?>
							</td>
						</tr>
						<tr>
							<td class="heading">Mobile:</td>
							<td>
								<?php
									echo $query1['o_mobile'];
								?>
							</td>
						</tr>
					</table>
				</div>
			</div>			
			<?php
		//	echo $query['p_id'];
		}
		//echo $query['avail'];
		else if(strcmp($check_flag2,$query['avail'])==0)
		{
		//		echo "yes renter";
		?>
		<div class="container">
			<div class="row">
				<div class="col-lg-4">
					<h4>Property id:</h4>
					<div class="material">
						<?php
							echo $query['p_id'];
						?>
					</div>
				</div>
				<div class="col-lg-4">
					<h4>Type:</h4>
					<div class="material">
						<?php

						if(strcmp($check_type1,$query['p_type'])==0)
							echo "to sell";
						else 
							echo "to rent";
						?>
					</div>
				</div>
				<div class="col-lg-4">
					<h4>Availability:</h4>
					<div class="material">
						<?php
							echo "No";
						?>
					</div>
				</div>
			</div>
			<h4>Agent Alloted:</h4>
			<div class="row">
				<div class="col-lg-3">
				</div>
				<div class="col-lg-3">
					<table>
						<tr>
							<td class="heading">Agent ID:</td>
							<td>
								<?php
								echo $query['agent_id'];
								?>
							</td>
						</tr>
						<tr>
							<td class="heading">Agent Name:</td>
							<td>
								<?php
								echo $query['a_name'];
								?>
							</td>
						</tr>
						<tr>
							<td class="heading">Email:</td>
							<td>
								<?php
								echo $query['email'];
								?>
							</td>
						</tr>
						<tr>
							<td class="heading">Mobile:</td>
							<td>
								<?php
									echo $query['mobile'];
								?>
							</td>
						</tr>
						<tr>
							<td class="heading">Address:</td>
							<td>
								<?php
									echo $query['address'];
								?>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<h4>Property Details:</h4><br>
			<div class="row">
				<div class="col-lg-3">
				</div>
				<div class="col-lg-3">
					<table>
						<tr>
							<td class="heading">Rooms:</td>
							<td>
								<?php
								echo $query['BHK'];
								echo "BHk";
								?>
							</td>
						</tr>
						<tr>
							<td class="heading">Area:</td>
							<td>
								<?php
								echo $query['area'];
								echo "sq feet";
								?>
							</td>
						</tr>
						<tr>
							<td class="heading">Registered Date:</td>
							<td>
								<?php
								echo $query['p_reg_date'];
								?>
							</td>
						</tr>
						<tr>
							<td class="heading">Cost:</td>
							<td>
								<?php
									echo $query['cost'];
									echo "Rupees";
								?>
							</td>
						<tr>	
							<td class="heading">home address:</td>
							<td>
								<?php
									echo $query['paddress'];
									echo ",";
									echo $query['locality'];
									echo ",";
									echo $query['city'];
									echo ",";
									echo $query['pincode'];
								?>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<h4>
			<?php
			if(strcmp($query['p_type'],$check_type1)==0)
				echo "Seller Details:";
			else 
				echo "Landlord's Details:";
			?>
			</h4>
			<div class="row">
				<div class="col-lg-3">
				</div>
				<div class="col-lg-3">
					<table>
						<tr>
							<td class="heading">ID:</td>
							<td>
								<?php
								echo $query1['owner_id'];
								?>
							</td>
						</tr>
						<tr>
							<td class="heading">Name:</td>
							<td>
								<?php
								echo $query1['o_name'];
								?>
							</td>
						</tr>
						<tr>
							<td class="heading">Email:</td>
							<td>
								<?php
								echo $query1['o_email'];
								?>
							</td>
						</tr>
						<tr>
							<td class="heading">Mobile:</td>
							<td>
								<?php
									echo $query1['o_mobile'];
								?>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<h4>						
			<?php
			if(strcmp($query['p_type'],$check_type1)==0)
			{
				echo "Buyer's Details:";
				$sql2="select s_name as l_name,date from sell where p_id=$prop_id";
			}
			else
			{ 
				echo "Renter's Details:";
				$sql2="select r_name as l_name,date from rent where p_id=$prop_id";
			}
			$result2=mysqli_query($conn,$sql2);
			$query2=mysqli_fetch_assoc($result2);
			?>
			</h4>
			<div class="row">
				<div class="col-lg-3">
				</div>
				<div class="col-lg-3">
					<table>
						<tr>
							<td class="heading">Name:</td>
							<td>
								<?php
								echo $query2['l_name'];
								?>
							</td>
						</tr>
						<tr>
							<td class="heading">Date of buying property:</td>
							<td>
								<?php
								echo $query2['date'];
								?>
							</td>
						</tr>
					</table>
				</div>
			</div>
			<?php
		}
		include "ao_footer.php";
	?>
</div>