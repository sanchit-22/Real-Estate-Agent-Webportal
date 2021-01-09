<?php
$connect = mysqli_connect("localhost", "root", "Sanchit.123", "estate_api");
$output = '';
if(isset($_POST["query"]))
{
	$search = mysqli_real_escape_string($connect, $_POST["query"]);
	$query ="
	select agent_id,p.p_id,a_name,p_type,p.address,p.cost,locality,city from agent a,property p,pin_detail pd,detail d where a.a_id=p.agent_id and p.p_id=d.p_id and pd.pincode=d.pincode";
}
else
{
	$query = "select agent_id,p.p_id,a_name,p_type,p.address,p.cost,locality,city from agent a,property p,pin_detail pd,detail d where a.a_id=p.agent_id and p.p_id=d.p_id and pd.pincode=d.pincode
	";
}
$result = mysqli_query($connect, $query);
if(mysqli_num_rows($result) > 0)
{
	$output .= '<div class="table-responsive">
					<table class="table table bordered">
						<tr>
							<th>property_id</th>
							<th> agent id</th>
							<th>agent name</th>
							<th>property-type</th>
                            <th>address</th>
                            <th>cost</th>
						</tr>';
	while($row = mysqli_fetch_array($result))
	{
		$output .= '
			<tr>
				<td>'.$row["p_id"].'</td>
				<td>'.$row["agent_id"].'</td>
				<td>'.$row["a_name"].'</td>
				<td>'.$row["p_type"].'</td>
                <td>'.$row["address"].'</td>
                <td>'.$row["cost"].'</td>
			</tr>
		';
	}
	echo $output;
}
else
{
	echo 'Data Not Found';
}
?>