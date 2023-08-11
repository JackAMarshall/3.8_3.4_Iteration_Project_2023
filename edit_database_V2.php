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
			<div class = "nav">
				<ul>
					<li><a href = "admin.php">Admin Home</a></li>
				</ul>
			</div>
			<div class = "title">
				<h1>Edit Database</h1>
			</div>
			<div class = "content">
				<!---------------------------------------------------------------------------------------------------------------------------------------->
				<h2>Insert Into Main Databse</h2>
				<form method = "post" id= "login">
					<input type = "text" name = "title" placeholder="Title"/><br />
					<input type = "text" name = "Album" placeholder="Album"/><br />
					<input type = "text" name = "Genre" placeholder="Genre"/><br />
					<input type = "text" name = "artist" placeholder="Artist"/><br />
					<input type = "text" name = "Track" placeholder="Track"/><br />
					<input type = "text" name = "Duration" placeholder="Duration"/><br />
					<input type = "text" name = "Size" placeholder="Size"/><br />
					<input type = "text" name = "Filename" placeholder="Filename"/><br />
					<input type = "submit" value = " Update "/><br />
				</form>
				<?php
				//connect.php (tells where to connect servername, username, password, dbaseName)
				require "assessment_mysqli.php";

				$title = $_POST["title"]; 
				$album = $_POST["Album"];
				$genre = $_POST["Genre"]; 
				$artist = $_POST["artist"];
				$track = $_POST["Track"]; 
				$duration = $_POST["Duration"];
				$size = $_POST["Size"]; 
				$filename = $_POST["Filename"];

				//create a variable to store sql code for the 'Add Users' query
				$insertquery = "INSERT INTO main( title, track, duration, size, filename ) VALUES( '$title' , '$track' , '$duration' , '$size' , '$filename')";

				if (mysqli_query($conn,$insertquery))
				{
					echo "<p class = 'grey'>Record inserted:</p>";
				}
				else
				{
					echo "<p class = 'grey'>Error inserting record:</p>";
				}
				?>
				
				<!---------------------------------------------------------------------------------------------------------------------------------------->
				<h2>Delete User</h2>
				<form method = "post" id= "delete">
					<input type = "text" name = "username" placeholder="Delete Username"/><br />
					<input type = "submit" value = " Update "/><br />
				</form>
				<?php
				//connect.php (tells where to connect servername, username, password, dbaseName)
				require "assessment_mysqli.php";

				$UserID = $_POST['username'];

				//create a variable to store sql code for the 'Add Users' query
				$deletequery = "DELETE FROM user WHERE Username = '$UserID'";

				if (mysqli_query($conn,$deletequery))
				{
					echo "<p class = 'grey'>Record deleted:</p>";
				}
				else
				{
					echo "<p class = 'grey'>Error deleting record:</p>";
				}
				?>

				<!---------------------------------------------------------------------------------------------------------------------------------------->
				<h2>Add User</h2>
				<form method = "post" id= "add">
					<input type = "text" name = "username2" placeholder="Create Username"/><br />
					<input type = "text" name = "password" placeholder="Create Password"/><br />
					<input type = "text" name = "password_2" placeholder="Confirm Password"/><br />
					<input type = "submit" value = " Insert "/><br />
				</form>
				<?php
				//connect.php (tells where to connect servername, username, password, dbaseName)
				require "assessment_mysqli.php";

				$UserID2 = $_POST["username2"]; 
				$PW = $_POST["password"];

				//create a variable to store sql code for the 'Add Users' query
				$insertquery = "INSERT INTO user( Username, Password ) VALUES( '$UserID2' , '$PW' )";

				if (mysqli_query($conn,$insertquery))
				{
					echo "<p class = 'grey'>Record inserted:</p>";
				}
				else
				{
					echo "<p class = 'grey'>Error inserting record:</p>";
				}
				?>
				<!---------------------------------------------------------------------------------------------------------------------------------------->
				<h2>Update User</h2>
				<form method="post" id="update"  >
					<input type="text" name = "ExistingUserName" placeholder = "Enter existing user name"/><br />
					<input type="text" name = "NewUserName" placeholder = "Enter new user name"/><br />
					<input type="submit" value="Update" /><br />
				</form>

				<?php
				require "assessment_mysqli.php";
				print "<p class = 'grey'>Connected to server</p>";

				$ExistingUserID = $_POST["ExistingUserName"]; 
				$NewUserID = $_POST["NewUserName"]; 

					//create a variable to store sql code for the 'Add Users' query
				$updatequery = "UPDATE user SET Username = '$NewUserID' WHERE Username = '$ExistingUserID'";
				if (mysqli_query($conn,$updatequery))
				{
					echo "<h3>Record updated</h3>";
				}
				else
				{
					echo "<h3>Error updatinging record:</h3> ";
				}
				?>
			</div>
			<div class = "footer">
				<p>Copyright Statement</p>
			</div>
		</div>
	</body>
