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
	<title>TV Shows</title>
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
    
            <h2 class="gallery-title">New & Hot TV Shows Right Now</h2>
            <p class="gallery-text">Catch the latest TV series everyone's talking about. From thrilling dramas to addictive comedies, these are the shows you can't afford to miss!</p>
            <div id="movie-gallery">
                <div class="movie-item">
                    <img src="media/witch.jpg" alt="Movie 1">
                </div>
                <div class="movie-item">
                    <img src="media/mirror.jpg" alt="Movie 2">
                </div>
                <div class="movie-item">
                    <img src="media/brella.jpg" alt="Movie 3">
                </div>
                <div class="movie-item">
                    <img src="media/doves.jpg" alt="Movie 4">
                </div>
                <!-- Add more movies here -->
            </div>
        </div>
    <?php include('info-col.php'); ?>
    </div>
    <?php include('footer.php'); ?> <!-- Keep the footer as is -->
</body>
</html>