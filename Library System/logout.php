<?php
	session_start();
	session_unset($_SESSION['admin_id']);
	session_destroy();
	header("Location: index.php");
	exit();
	?>