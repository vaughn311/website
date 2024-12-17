<?php
	session_start();
	if(!isset($_SESSION['user_level']) or ($_SESSION['user_level']!=1)){
		header("Location: login.php");
		exit();
	}
?>
<!doctype html>
<html lang="en">
<head>
<title>Page for administrator</title>
<meta charset = "utf-8">
<link rel = "stylesheet" type="text/css" href="includes.css">
<style type="text/css">
p {text-align:center;}
</style>
</head>
<body>
<div id="container">
<?php include('header.php'); ?>
<?php include('admin-nav.php'); ?>
<div id='content'>
<img id = "ad" src = "media/nalysis.png">
			
	</div>
<?php include('info-col.php'); ?>
</div>
<?php include('footer.php'); ?>
			
</body>
</html