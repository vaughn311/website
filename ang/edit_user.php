<!doctype html>
<html lang="en">
<head>
	<title>Edit User Info</title>
	<meta charset = "utf-8">
	<link rel = "stylesheet" type="text/css" href="includes.css">
</head>
<body>
	<div id="container">
		<?php include('header.php'); ?>
		<?php include('edit-nav.php'); ?>
		<div id='content'>
			<h2>Edit User Record</h2>
			<?php 
				//checking for valid id
				if((isset($_GET['id'])) && (is_numeric($_GET['id']))){
				    $id = $_GET['id'];
				}elseif((isset($_POST['id'])) && (is_numeric($_POST['id']))){
					$id = $_POST['id'];				
				}else{// no id was found
					echo '<p class="error">This page has been accessed by mistake.</p>';
					exit();
				}
				require('mysqli_connect.php');
				if($_SERVER['REQUEST_METHOD'] == 'POST'){
					$errors = array();
					//check kung may laman yung first name, last name, and email
					//textbox
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
					if (empty($errors)){
						$q = "UPDATE users SET fname = '$fn', lname = '$ln', email = '$e' WHERE user_id = '$id' LIMIT 1"; //sanity check
						$result = @mysqli_query($dbcon, $q);
						if(mysqli_affected_rows($dbcon) == 1){
							echo '<h3>User was edited successfully!</h3>';
							echo '<p class="error">Click <a href="register-view-user.php">here</a> to view the users</p>';
						}else{
							echo '<h3> Edit unsuccessful.</h3>';
							echo '<p class="error">Click <a href="register-view-user.php">here</a> to view the users</p>';
						
						}
					}else{
						//display ang laman ng errors
						echo '<h2>Error!</h2>
						<p class="error">The following errors(s) occured:<br/>';
						foreach($errors as $msg){
							echo " - $msg<br/>\n";
					}			
						echo '<p>please try again</p>';
					}
				}
				$q = "SELECT fname, lname, email from users where user_id = '$id'";
				$result = @mysqli_query($dbcon, $q);
				if (mysqli_num_rows($result) == 1){
					$row = mysqli_fetch_array($result, MYSQLI_ASSOC);
					//create form
					echo '
				<form action="edit_user.php" method="post" class="form-container">
				<p><label class="edit-label" for="fname"> First Name:</label>
				<input type="text" id="fname" name="fname" size="30" maxlength="40"
				value="'.$row['fname'].'"> 
				</p>
				
				<p><label class="edit-label" for="lname">Last Name:</label>
				<input type="text" id="lname" name="lname" size="30" maxlength="40"
				value="'.$row['lname'].'"> 
				</p>
				
				<p><label class="edit-label" for="email">Email:</label>
				<input type="text" id="email" name="email" size="30" maxlength="40"
				value="'.$row['email'].'"> 
				<div class="edit-button">
				<p><input type="submit" id="submit" name="submit" value="Edit"></p>
				</div>				
				<p><input type = "hidden" name ="id" value = "'.$id.'">
				</p>
				</form>';
				}else{//invalid id
					echo '<h2>User not found</h2>';
					// tell the user to register instead
					echo '<p>do you want to register instead?</p>';
					echo '<p> You may now click <a href="register.php">here</a> to register</a></p>';		
				}
			
				mysqli_close($dbcon);
				?>
		</div>
        <?php include('info-col.php'); ?>
	</div>		
	<?php include('footer.php'); ?>
			
</body>
</html