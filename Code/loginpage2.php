<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title>Login Page</title>
	<style type="text/css">
		@import"https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css";
		body{
			margin:0;
			padding:0;
			font-family: sans-serif;
			background:url(bg.jpg);
			background-size: cover;
		}
		.Login-box
		{
			width:280px;
			position: absolute;
			top:50%;
			left: 50%;
			transform: translate(-50%,-50%);
			color: white;
		}
		.Login-box h2{
			float: left;
			padding:13px 0;
		}
		.radiotext1
		{
			color:#eeeeee70;
			width: 100%;
			overflow: hidden;
			font-size: 20px;
			border-top:1px solid #4caf50;
			border-left:1px solid #4caf50;
			border-right:1px solid #4caf50;
			background: none;		
		}
		.radiotext2
		{
			color:#eeeeee70;
			width: 100%;
			overflow: hidden;
			font-size: 20px;
			border-left:1px solid #4caf50;
			border-right:1px solid #4caf50;		
		}
		.radiotext3
		{
			color:#eeeeee70;
			width: 100%;
			overflow: hidden;
			font-size: 20px;
			border-bottom:1px solid #4caf50;
			border-left:1px solid #4caf50;
			border-right:1px solid #4caf50;		
		}
		.textbox
		{
			width: 100%;
			overflow: hidden;
			font-size: 20px;
			padding: 8px 0;
			margin:8px 0;
			border-bottom: 1px solid #4caf50;
		}
		.textbox2
		{
			width: 100%;
			overflow: hidden;
			font-size: 20px;
			padding: 8px 0;
			margin:8px 0;
			color:red;
		}
		.textbox i{
			width: 26px;
			float: left;
			text-align: center;
		}
		.textbox input
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
		a
		{
			color:#ff8100;
		}
	</style>
</head>
<body>
	<form action="process.php" method="post">
 		<div class="Login-box">
		<h2>Login as</h2>
			<div class="radiobox">
				<div class="radiotext1">
					<label><input type="radio" name="optradio[]" value="Agent"checked>Agent</label>
				</div>
				<div class="radiotext2">
					<label><input type="radio" name="optradio[]" value="Agent office"checked>Agent Office</label>
				</div>
				<div class="radiotext3">
					<label><input type="radio" name="optradio[]" value="Customer"checked>Customer</label>
				</div>
			</div>
			<div class="textbox">
				<i class="fa fa-user" aria-hidden="true"></i>
				<input type="text" placeholder="Userid" name="userid" required>
			</div>
			<div class="textbox">
				<i class="fa fa-lock" area-hidden="true"></i>
				<input type="password" placeholder="password" name="password" required>
			</div>
			<button button type="submit" class="btn">Login</button>
			<div class="textbox2">
				<a href="addcustomer.php">New Customer??</a>
			</div>
		</div>

	</form>
</body>
</html>