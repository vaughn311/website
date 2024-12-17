<?php require("./mysqli_connect.php"); ?>

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
		<?php include('register-nav.php'); ?>
		<div id='form-container'>
		<?php
		if($_SERVER['REQUEST_METHOD'] == 'POST'){
			//error array to store all errors
			$errors = array();
			// may nilagay ba na first name?
			if(empty($_POST['fname'])){
				$errors[] = 'please input your First name.';
			}else{
				$fn = trim($_POST['fname']);
			}
			if(empty($_POST['lname'])){
				$errors[] = 'please input your Last Name.';
			}else{
				$ln = trim($_POST['lname']);
			}
			if(empty($_POST['email'])){
				$errors[] = 'please input your email.';
			}else{
				$e = trim($_POST['email']);
			}
			// check if last name and email is empty
			// parehas ba yung password at repeat password?
			if(!empty($_POST['psword1'])){
				if($_POST['psword1'] != $_POST['psword2']){
					$errors[] = 'your passwords do not match';
				}else{
					$p = hash('md5', trim($_POST['psword1']));
				}
			}else{
			$errors[] = 'Please input your password.';
			}
			//all fields are successful
		if(empty($errors)){
			$sql = "INSERT INTO users (fname, lname, email, psword, registration_date, user_level) VALUES ('$fn', '$ln', '$e', '$p', NOW(),0)";
			$result = @mysqli_query($dbcon, $sql);

			if ($result){
				// Clear Form inputs and redirect to same page
				header("Location: register-success.php");
				exit();
			}else{
				echo '<h2>System Error</h2>
				<p class="error".>Sorry for the inconvenience.</p>';
				echo '<p>'.mysqli_error($dbcon) .'</p>';
			}
			mysqli_close($dbcon);
			exit();
		}else{
			echo '<h2>Error!</h2>
			<p class="error">The following errors(s) occured:<br/>';
			foreach($errors as $msg){
				echo " - $msg<br/>\n";
			}
			echo '</p><h3>Please try again!</h3></br></br>';
		}
		}
		
		?>
			<h2>Register</h2>
			<form action ="register.php" method="post">
				<p><label class="label" for="fname"></label>
				<input type="text" id="fname"  name="fname" size="30" maxlength="40"
				value="<?php if (isset($_POST['fname'])) echo $_POST['fname'];?>"
				placeholder="First Name">
				</p>
				
				<p><label class="label" for="lname"></label>
				<input type="text" id="lname" name="lname" size="30" maxlength="40"
				value="<?php if (isset($_POST['lname'])) echo $_POST['lname'];?>"
				placeholder="Last Name">
				</p>
				
				<p><label class="label" for="email"></label>
				<input type="text" id="email" name="email" size="30" maxlength="40"
				value="<?php if (isset($_POST['email'])) echo $_POST['email'];?>"
				placeholder="Email">
				</p>
				
				<p><label class="label" for="psword1"></label>
				<input type="password" id="psword1" name="psword1" size="20" maxlength="40"
				value="<?php if (isset($_POST['psword1'])) echo $_POST['psword1'];?>"
				placeholder="Password">
				</p>
				
				<p><label class="label" for="psword2"></label>
				<input type="password" id="psword2" name="psword2" size="20" maxlength="40"
				value="<?php if (isset($_POST['psword2'])) echo $_POST['psword2'];?>"
				placeholder="Repeat Password">
				</p>
				<div class="register-button">
				<p><input type="submit" id="submit" name="submit" value="Register"></p>
				</div>
			</form>
		</div>
        <?php include('info-col.php'); ?>
	</div>
	<?php include('footer.php'); ?>
			
</body>
</html>