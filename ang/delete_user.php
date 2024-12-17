<!doctype html>
<html lang="en">
<head>
	<title>Deleting User</title>
	<meta charset = "utf-8">
	<link rel = "stylesheet" type="text/css" href="includes.css">
</head>
<body>
	<div id="container">
		<?php include('header.php'); ?>
		<?php include('delete-nav.php'); ?>		
		<div id='edit-delete'>
			<h2>Deleting Record</h2>
			<?php
			//checking for valid id
				if((isset($_GET['id'])) && (is_numeric($_GET['id']))){
				    $id = $_GET['id'];
				}elseif((isset($_POST['id'])) && (is_numeric($_POST['id']))){
					$id = $_POST['id'];				
				}else{// no id was found
					echo '<p class="error">This page has been accessed by mistake.</p>';
					include('footer.php');
					exit();
				}
				require('mysqli_connect.php');
				if($_SERVER['REQUEST_METHOD'] == 'POST'){
					if($_POST['sure'] == 'Yes'){
						//Delete query
						$q = "delete from users where user_id = $id"; //
						$result = @mysqli_query($dbcon, $q);
						if(mysqli_affected_rows($dbcon) == 1){
							//no problem
							echo '<h3>The record has been deleted</h3>';
							echo '<p class="del-error">Click <a href="register-view-user.php">here</a> to view the users</p>';
						}else{//hindi nadelete
							echo '<h3>Hindi nadelete boy, di ko alam</h3>';

						}

					}else{
						echo '<h3 class="del">The record has not been deleted</h3>';
						echo '<p class="del-error">Click <a href="register-view-user.php">here</a> to view the users</p>';
					}
				

				}else{
					//display the information of user
					$q = "SELECT CONCAT(fname, ' ', lname) from users where user_id = $id";
					$result = @mysqli_query($dbcon, $q);
					if (mysqli_affected_rows($dbcon) == 1){ //merong user na ganung id
						$row = mysqli_fetch_array($result, MYSQLI_NUM);
						echo "<h3>Are you sure you want to permanenly delete $row[0]?</h3>";

						echo '
						<form action="delete_user.php" method="post">
						<div class="button-container">
						   <input id="submit-yes" type="submit" name="sure" value="Yes">
						   <input id="submit-no" type="submit" name="sure" value="No">
						</div>
						<input type="hidden" name="id" value="'.$id.'">
						</form>
						';						
					}else{
						//walang ganung user
						echo 'walang ganung user boi';
					}   

				}	
				mysqli_close($dbcon);				
			?>
			
		</div>
        <?php include('info-col.php'); ?>
	</div>
	<?php include('footer.php'); ?>
</body>
</html