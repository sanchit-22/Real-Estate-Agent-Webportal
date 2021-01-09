<!DOCTYPE html>
<html>
<head>
	<title>add new customer</title>
	<style type="text/css">
		@import"https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css";
		body
		{
			margin:0;
			padding:0;
			font-family: sans-serif;
			background:url(bg.jpg);
			background-size: cover;
		}
		.signup
		{
			width:280px;
			position: absolute;
			top:50%;
			left: 50%;
			transform: translate(-50%,-50%);
			color: white;
		}
		.signup h2{
			float: left;
			padding:13px 0;
		}
		.add_textbox input
		{
			border:none;
		}
		.add_textbox
		{
			width: 100%;
			overflow: hidden;
			font-size: 20px;
			padding: 8px 0;
			margin:8px 0;
			border-bottom: 1px solid #4caf50;
		}
		.add_textbox input
		{
			border:none;
			outline: none;
			background:none;
			font-size: 18px;
			width: 80%;
			float: left;
			margin:0 10px;
			color:white;
		}
		.add_textbox i{
			width: 26px;
			float: left;
			text-align: center;
		}
		.btn
		{
			width: 100%;
			background: none;
			border:2px solid #4caf50;
			color: white;
			padding: 5px;
			font-size: 18px;
			cursor: pointer;
			margin: 12px 0;
		}
	</style>
</head>
<body>
	<div class="signup">
		<h2>SignUp</h2>
	<form class="customer_add" method="post" action="addingcust.php">
		<div class="add_textbox">
			<i class="fa fa-user" aria-hidden="true"></i>
			<input type="text" name="cust_id" placeholder="Enter id" required>
		</div>
		<div class="add_textbox">
			<i class="fa fa-lock" area-hidden="true"></i>
			<input type="password" name="pass" placeholder="Enter password" required>
		</div>
		<div class="add_textbox">
			<i class="fa fa-address-card-o" aria-hidden="true"></i>
			<input type="text" name="name" placeholder="Enter full name" required>
		</div>
		<div class="add_textbox">
			<i class="fa fa-envelope" aria-hidden="true"></i>
			<input type="text" name="email" placeholder="Enter email" required>
		</div>
		<div class="add_textbox">
			<i class="fa fa-phone" area-hidden="true"></i>
			<input type="text" name="mobile" placeholder="Enter mobile" required>
		</div>
		<div class="add_textbox">
			<i class="fa fa-map-marker" aria-hidden="true"></i>
			<input type="text" name="address" placeholder="Enter address" required>
		</div>
		<button button type="submit" class="btn">SignUP</button>
	</form>
</div>
</body>
</html>