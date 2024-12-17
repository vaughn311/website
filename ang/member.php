<?php
	session_start();
	if(!isset($_SESSION['user_level']) or ($_SESSION['user_level']!=0)){
		header("Location: login.php");
		exit();
	}
?>
<!doctype html>
<html lang="en">
<head>
	<title>Member's Page</title>
	<meta charset = "utf-8">
	<link rel = "stylesheet" type="text/css" href="includes.css">
</head>
<body>
<div id="container">
        <?php include('header.php'); ?> <!-- Keep the header as is -->
        <?php include('member-nav.php'); ?> <!-- Keep the navigation as is -->
        <?php include('searchbox.php'); ?>
        
        <!-- Content Section: Only this part will be centered -->
        <div class="movie-container">
    
            <h2 class="gallery-title">Discover Your Next Favorite Show or Movie!</h2>
            <p class="gallery-text">"Explore a world of entertainment at your fingertips. Whether you're in the mood for heart-pounding thrillers, side-splitting comedies, or epic dramas, we've got something just for you.</p>
            <div id="movie-gallery">
                <div class="movie-item">
                    <img src="media/venom.jpg" alt="Movie 1">
                </div>
                <div class="movie-item">
                    <img src="media/thor.jpg" alt="Movie 2">
                </div>
                <div class="movie-item">
                    <img src="media/moana.jpg" alt="Movie 3">
                </div>
                <div class="movie-item">
                    <img src="media/cm.jpg" alt="Movie 4">
                </div>
                <!-- Add more movies here -->
            </div>
        </div>
    <?php include('info-col.php'); ?>
    </div>
    <?php include('footer.php'); ?> <!-- Keep the footer as is -->
</body>
</html>