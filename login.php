<?php
	ob_start();
	session_start();
	   $error = NULL;
	   if($_SERVER["REQUEST_METHOD"] == "POST") {
			//connect.php (tells where to connect servername, dbaseName, username, password)
			require "assessment_mysqli.php";
			// username and password sent from form 
			$myusername = mysqli_real_escape_string($conn,$_POST['username']);
			$mypassword = mysqli_real_escape_string($conn,$_POST['password']); 

			$query = "SELECT Username FROM user WHERE Username = '$myusername' and Password = '$mypassword'";
						
			$result = mysqli_query($conn,$query);
			$row = mysqli_fetch_array($result,MYSQLI_ASSOC);
		  
			$count = mysqli_num_rows($result);
		  
			// If result matched $myusername and $mypassword, table row must be 1 row
			if($myusername == "Graeme" or $myusername == "graeme" and $count == 1){
				$_SESSION['login_user'] = $myusername;
				header("location: admin.php");
			}
		   elseif($myusername != "Graeme" and $myusername != "graeme" and $count == 1){
			   $_SESSION['login_user'] = $myusername;
				header("location: main.php");
		   }
		   else {
				$error = "ERROR! Your Login Name or Password is invalid";
				}
			}
	ob_end_flush();
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<!--The meta data-->
		<title>Graeme's Music</title>
		<meta charset="UTF-8" />
		<meta name="description" content="Website for Greames Music" />
		<meta name="keywords" content="Greame, Music, Wesbite, Jack Marshall" />
		<meta name="author" content="Jack Marshall" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<!--The link below links the page to the websites css sheet-->
		<link rel = "stylesheet" href = "style3.css"/>
	</head>
	<body>
		<login>
		<img src = "images/background.jpg" alt = "Bacground Image" class = "background_image" />
		<div class = "wrapper">
			<div class = "nav-fixed">
				<div class = "nav">
					<h32>Graemes Music</h32>
					<div class = "nav-buttons">
						<ul>
							<li><a href = "landing.php">Home</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class = "title_login">
				<h1>Graeme's Music</h1>
				<h3>The Greatest Tunes Return</h3>
				<p>Please use _ instead of spaces</p>
			</div>
			<div class = "content">
				<form method = "post" id= "login">
					<input type = "text" name = "username" placeholder="Enter user name"/><br />
					<input type = "text" name = "password" placeholder="Enter user password"/><br />
					<input type = "submit" value = " Log In "/><br />
				</form>
				<h42 class = "grey"><?php echo $error; ?></h42>
			</div>
			<div class = "footer">
				<p>©Jack Marshall 2023</p>
			</div>
		</div>
		</login>
	</body>
