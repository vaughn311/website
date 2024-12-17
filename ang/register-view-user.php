<?php
	session_start();
	if(!isset($_SESSION['user_level']) or ($_SESSION['user_level'] !=1)){
		header("Location: login.php");
		exit();
	}
?>
<!doctype html>
<html lang="en">
<head>
	<title>Registered Users Page - Website ni Ang</title>
	<meta charset = "utf-8">
	<link rel = "stylesheet" type="text/css" href="includes.css">
</head>
<body>
	<div id="container">
		<?php include('header.php'); ?>
		<?php include('register-view-nav.php'); ?>
		
		<div id='content'>
			<h2>Registered Users</h2>
			<p>
			<?php
				require('mysqli_connect.php');
				$q = "SELECT user_id, fname, lname, email, Date_format(registration_date, '%M %d, %Y') as regdate from users order by registration_date ASC";
				$result = @mysqli_query($dbcon, $q);
				if ($result){
					echo '<table id = "register-view-user">
						<tr>
						<th>Name</th>
                        <th>Email</th>
						<th>Registration Date</th>
						<th colspan= "2">Actions</th>
						</tr>';
					while($row = mysqli_fetch_array($result, MYSQLI_ASSOC)){
						echo '<tr>
						<td>' . ucfirst($row['lname']) . ', ' . ucfirst($row['fname']) . '</td>
                        <td>' .$row['email'] . '</td>
						<td>' . $row['regdate'] . '</td>	
						<td><a href ="edit_user.php?id='.$row['user_id'].'">Edit</a></td>
						<td><a href ="delete_user.php?id='.$row['user_id'].'">Delete</a></td>					
						</tr>';
					}
					echo '</table>';
					mysqli_free_result($result);
				}else{//not successful
					echo '<p class= "error"> The current users could not be retrieved due to a system error. Please report this incident to the SysAdmin. Error Code: 17</p>';
				}
				mysqli_close($dbcon);
			?>
			</p>
		</div>
        <?php include('info-col.php'); ?>
	</div>
	<?php include('footer.php'); ?>
			
</body>
</html