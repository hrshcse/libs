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
#id2:hover
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
				<div class = "container-fluid" style = "word-wrap:break-word;">
								<h1 id-"id1" style="color:red">KIOT Library</h1>
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
					</li>
				</ul>
			</div>
			<div class = "col-lg-1"></div>
			<div class = "col-lg-9 well" style = "margin-top:50px;background-color:gray;height:40em;width:79em;border-radius:1em;">
				<div class = "alert alert-info">Book</div>
					<button id = "add_book" type = "button" class = "btn btn-primary"><span class = "glyphicon glyphicon-plus"></span> Add new</button>
					<button id = "show_book" type = "button" style = "display:none;" class = "btn btn-success"><span class = "glyphicon glyphicon-circle-arrow-left"></span> Back</button>
					<br />
					<br />
					<div id = "book_table">
						<table id = "table" class = "table table-bordered">
							<thead class = "alert-success">
								<tr>
									<th>Book Title</th>
									<th>Category</th>
									<th>Author</th>
									<th>Date Published</th>
									<th>Available</th>
									<th>Action</th>
								</tr>
							</thead>
							<tbody>
								<?php
									$qbook = $conn->query("SELECT * FROM `book`") or die(mysqli_error());
									while($fbook = $qbook->fetch_array()){
										
								?>
								<tr>
									<td><?php echo $fbook['book_title']?></td>
									<td><?php echo $fbook['book_category']?></td>
									<td><?php echo $fbook['book_author']?></td>
									<td><?php echo date("m-d-Y", strtotime($fbook['date_publish']))?></td>
									<td><?php echo $fbook['qty']?></td>
									<td><a  id="id2" class = "btn btn-danger delbook_id" value = "<?php echo $fbook['book_id']?>"><span class = "glyphicon glyphicon-remove"></span> Delete</a> <a id="id2" value = "<?php echo $fbook['book_id']?>" class = "btn btn-warning ebook_id"><span class = "glyphicon glyphicon-edit"></span> Edit</a></td>
								</tr>
								<?php
									}
								?>
							</tbody>
						</table>
					</div>
					<div id = "edit_form"></div>
					<div id = "book_form" style = "display:none;">
						<div class = "col-lg-3"></div>
						<div class = "col-lg-6">
							<form method = "POST" action = "save_book_query.php" enctype = "multipart/form-data">
								<div class = "form-group">
									<label>Book Title:</label>
									<input type = "text" name = "book_title" required = "required" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Book Description:</label>
									<input type = "text" name = "book_desc" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Book Category:</label>
									<input type = "text" name = "book_category" class = "form-control" required = "required"/>
								</div>
								<div class = "form-group">
									<label>Book Author:</label>
									<input type = "text" name = "book_author" class = "form-control" required = "required" />
								</div>
								<div class = "form-group">
									<label>Date Published:</label>
									<input type = "date" name = "date_publish" required = "required" class = "form-control" />
								</div>
								<div class = "form-group">
									<label>Quantity:</label>
									<input type = "number" min = "0" name = "qty" required = "required" class = "form-control" />
								</div>
								<div class = "form-group">
									<button name = "save_book" class = "btn btn-primary"><span class = "glyphicon glyphicon-save"></span> Submit</button>
								</div>
							</form>		<br> <br> <br>
						</div>	
					</div>
			</div>
		</div>
		<br />
		<br />
		<br />
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
	<script type = "text/javascript">
		$(document).ready(function(){
			$('#table').DataTable();
		});
	</script>
	<script type = "text/javascript">
		$(document).ready(function(){
			$('#add_book').click(function(){
				$(this).hide();
				$('#show_book').show();
				$('#book_table').slideUp();
				$('#book_form').slideDown();
				$('#show_book').click(function(){
					$(this).hide();
					$('#add_book').show();
					$('#book_table').slideDown();
					$('#book_form').slideUp();
				});
			});
		});
	</script>
	<script type = "text/javascript">
		$(document).ready(function(){
			$result = $('<center><label>Deleting...</label></center>');
			$('.delbook_id').click(function(){
				$book_id = $(this).attr('value');
				$(this).parents('td').empty().append($result);
				$('.delbook_id').attr('disabled', 'disabled');
				$('.ebook_id').attr('disabled', 'disabled');
				setTimeout(function(){
					window.location = 'delete_book.php?book_id=' + $book_id;
				}, 1000);
			});
			$('.ebook_id').click(function(){
				$book_id = $(this).attr('value');
				$('#show_book').show();
				$('#show_book').click(function(){
					$(this).hide();
					$('#edit_form').empty();
					$('#book_table').show();
					$('#book_admin').show();
				});
				$('#book_table').fadeOut();
				$('#add_book').hide();
				$('#edit_form').load('load_book.php?book_id=' + $book_id);
			});
		});
	</script>
</html>