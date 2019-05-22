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
		<link rel = "stylesheet" type = "text/css" href = "css/chosen.min.css" />
		<link rel = "stylesheet" type = "text/css" href = "css/jquery.dataTables.css" />
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
#b:hover
{
	background-color:green;
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
							<li><a style = "font-size:18px; border-bottom:1px solid #d3d3d3;" href = "book.php"><i class = "glyphicon glyphicon-book"></i> Books</a></li>
							<li><a href = "borrowing.php" style = "font-size:18px;border-bottom:1px solid #d3d3d3;"><i class = "glyphicon glyphicon-random"></i> Borrowing</a></li>
							<li><a href = "returning.php" style = "font-size:18px;border-bottom:1px solid #d3d3d3;"><i class = "glyphicon glyphicon-random"></i> Returning</a></li>
						    <li><a style = "font-size:18px;color:red" href = "index.php"><i class = "glyphicon glyphicon-log-out"></i> Logout</a></li>
					
				</ul>
			</div>
			<div class = "col-lg-1"></div>
			<div class = "col-lg-9 well" style = "margin-top:50px;background-color:gray;height:40em;width:79em;border-radius:1em;">
				<div class = "alert alert-info">Transaction / Borrowing</div>
				<form method = "POST" action = "borrow.php" enctype = "multipart/form-data">
					<div class = "form-group pull-left">	
						<label>Student reg:</label>
						<br />
						<select name = "student_no" id = "student">
							<option value = "" selected = "selected" disabled = "disabled">Select Reg no</option>
							<?php
								$qborrow = $conn->query("SELECT * FROM `student` ORDER BY `student_no`") or die(mysqli_error());
								while($fborrow = $qborrow->fetch_array()){
							?>
								<option value = "<?php echo $fborrow['student_no']?>"><?php echo $fborrow['student_no']?></option>
							<?php
								}
							?>
						</select>
					</div>
					<div class = "form-group pull-right">	
						<button name = "save_borrow" class = "btn btn-primary" id="borrow"><span class = "glyphicon glyphicon-thumbs-up"></span> Borrow</button>
					</div> 
					<table id = "table" class = "table table-bordered">
						<thead class = "alert-success">
							<tr>
								<th>Select</th>
								<th>Book Title</th>
								<th>Book Category</th>
								<th>Book Author</th>
								<th>Date Published</th>
								<th>Quantity</th>
								<th>Left</th>
							</tr>
						</thead>
						<tbody>
							<?php
								$q_book = $conn->query("SELECT * FROM `book`" ) or die(mysqli_error());
								while($f_book = $q_book->fetch_array()){ {
								$q_borrow = $conn->query("SELECT SUM(qty) as total FROM `borrowing` WHERE `book_id` = '$f_book[book_id]' && `status` = 'Borrowed'") or die(mysqli_error());
								$new_qty = $q_borrow->fetch_array();
								$total = $f_book['qty'] - $new_qty['total']; }
							?> 
							<tr>
								<td>
									<?php
										if($total == 0){
											echo "<center><label class = 'text-danger'>Not Available</label></center>";
										}else{
											echo '<input type = "hidden" name = "book_id[]" value = "'.$f_book['book_id'].'"><center><input type = "checkbox" name = "selector[]" value = "1"></center>';
										}
									?>
								</td>
								<td><?php echo $f_book['book_title']?></td>
								<td><?php echo $f_book['book_category']?></td>
								<td><?php echo $f_book['book_author']?></td>
								<td><?php echo date("m-d-Y", strtotime($f_book['date_publish']))?></td>
								<td><?php echo $f_book['qty']?></td>
								<td><?php echo $total?></td> 
							</tr>
							<?php
								}
							?>
						</tbody>
					</table>
				</form>
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
	<script src = "js/jquery.dataTables.js"></script>
	<script src = "js/chosen.jquery.min.js"></script>	
	<script type = "text/javascript">
		$(document).ready(function(){
			$("#student").chosen({ width:"auto" });	
		})
	</script>
	<script type = "text/javascript">
		$(document).ready(function(){
			$("#table").DataTable();
		});
	</script>
</html>