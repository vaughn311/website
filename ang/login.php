<!doctype html>
<html lang="en">
<head>
	<title>Website ni Ang</title>
	<meta charset = "utf-8">
	<link rel = "stylesheet" type="text/css" href="includes.css">
</head>
<body>
<div id="container">
<?php include('header.php'); ?>
<?php include('login-nav.php'); ?>
<div id='form-container'>
<?php
	if ($_SERVER['REQUEST_METHOD'] == 'POST'){
		require('mysqli_connect.php');
		//validate email
		if(!empty($_POST['email'])){
			$e = mysqli_real_escape_string($dbcon, trim($_POST['email']));					
		}else{
			echo'<p class="error">Please input your email.</p>';	
			$e = NULL;						
		}
		//validate password
		if(!empty($_POST['psword1'])){
			$p = hash('md5', mysqli_real_escape_string($dbcon, trim($_POST['psword1'])));			
		}else{
			$p = NULL;
			echo'<p class="error">Please input your password.</p>';	

		}
		if ($e && $p){
		//get user's information dba_close
			$q = "SELECT user_id, fname, user_level from users where email = '$e' AND psword = '$p'";
			$result = mysqli_query($dbcon, $q);
			if (@mysqli_num_rows($result) == 1){ //kung isa lang ang nakuha
				session_start();
				$_SESSION = mysqli_fetch_array($result, MYSQLI_ASSOC);
				//sanity checkd
				$_SESSION['user_level'] = (int) $_SESSION['user_level'];

				$url = ($_SESSION['user_level'] === 1) ? 'admin.php' : 'member.php';
				header('Location: '.$url);
				exit();
				mysqli_free_result($result);
				mysqli_close($dbcon);
			}else{//wala sa db
			   echo '<p class="error">User not found.</p>';
													
			}
		}else{//may problema
			echo '<p class="error">Please try again.</p>';
		}
		mysqli_close($dbcon);
	}
?>
<div id="loginfields">
<?php include ('login_page.inc.php'); ?>
</div><br>
<?php include('info-col.php'); ?>
<?php include ('footer.php');?>	
</div>
</div>		
</body>
</html>