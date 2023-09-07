<?php
        session_start();
        if(!isset($_SESSION['login_user'])){
                header("location:login.php");
				}
		else{
			$User = $_SESSION['login_user'];
        }
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!--The meta data-->
		<title>Greames Music</title>
		<meta charset="UTF-8" />
		<meta name="description" content="Website for Greames Music" />
		<meta name="keywords" content="Greame, Music, Wesbite, Jack Marshall" />
		<meta name="author" content="Jack Marshall" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--The link below links the page to the websites css sheet-->
		<link rel = "stylesheet" href = "style3.css"/>
	</head>
	<body>
		<img src = "images/background.jpg" alt = "Bacground Image" class = "background_image" />
		<div class = "wrapper">
			<div class = "nav-fixed">
				<div class = "nav">
					<h32>Graemes Music</h32>
					<div class = "nav-buttons">
						<ul>
							<li><a href = "landing.php">Log Out</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class = "title_login">
				<h1>Graeme's Music</h1>
				<h3>The Greatest Tunes Return</h3>
			</div>
			<div class = "grid">
				<a href = "view_users.php">
					<button class = "grid-button">View Users</button>
				</a>
				<a href = "edit_database.php">
					<button class = "grid-button">Edit Database</button>
				</a>
			</div>
			<div class = "footer">
				<p>©Jack Marshall 2023</p>
			</div>
		</div>
	</body>
