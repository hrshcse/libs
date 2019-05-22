<!DOCTYPE html>
<?php
	require_once 'valid.php';
?>	
<html lang = "eng">
	<head>
		<title>Library System</title>
		<meta charset = "utf-8" />
		<meta name = "viewport" content = "width=device-width, initial-scale=1" />
		<link rel = "stylesheet" type = "text/css" href = "css/bootstrap.css" />
	</head>
	<style>
li a:active {background-color:#4CAF50;color:white}

li a:hover:not(.active)
{
	background-color:#4CAF50;
	border-radius:1em;
	color:white;
}
#id1:hover
{
	<img src="" >
}
</style>
	<body style = "background-color:#d3d3d3;">
		<nav class = "navbar navbar-default navbar-fixed-top">
			<div class = "container-fluid">
				<div class = "navbar-header">
					<img src = "images/logo.png" width = "50px" height = "50px" />
					<h4 class = "navbar-text navbar-right">Library System</h4>
				</div>
			</div>
		</nav>
		<div class = "container-fluid">
			<div class = "col-lg-2 well" style = "margin-top:50px;margin-left:-12px;background-color:white;height:40em;border-radius:1em;">
				<div class = "container-fluid">
									<h1 id="id1" style="color:red">KIOT Library</h1>
					<br />
					<br />
					<?php require'account.php'; echo $name;?>
				</div>
				<hr style = "border:1px dotted #d3d3d3;"/>
				<ul id = "menu" class = "nav menu">
					
							<li><a href = "admin.php" style = "font-size:18px;border-bottom:1px solid #d3d3d3;"><i class = "glyphicon glyphicon-user"></i> Admin</a></li>
							<li><a href = "student.php" style = "font-size:18px;border-bottom:1px solid #d3d3d3;"><i class = "glyphicon glyphicon-user"></i> Student</a></li>
						     <li><a href = "borrowing.php" style = "font-size:18px;border-bottom:1px solid #d3d3d3;"><i class = "glyphicon glyphicon-random"></i> Borrowing</a></li>
							<li><a href = "returning.php" style = "font-size:18px;border-bottom:1px solid #d3d3d3;"><i class = "glyphicon glyphicon-random"></i> Returning</a></li>
						    <li><a style = "font-size:18px;color:red" href = "index.php"><i class = "glyphicon glyphicon-log-out"></i> Logout</a></li>
				 </ul>
			</div>
			<div class = "col-lg-1"></div>
			<div class = "col-lg-9 well" style = "margin-top:50px;background-color:gray;height:40em;width:79em;border-radius:1em;">
				<img src = "images/back2.jpg" height = "400px" width = "100%" />
			</div>
		</div>
		<nav class = "navbar navbar-default navbar-fixed-bottom">
			<div class = "container-fluid">
				<label class = "navbar-text pull-right">Library System </label>
			</div>
		</nav>
	</body>
	<script src = "js/jquery.js"></script>
	<script src = "js/bootstrap.js"></script>
	<script src = "js/login.js"></script>
	<script src = "js/sidebar.js"></script>
</html>