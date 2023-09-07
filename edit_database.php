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
<?php error_reporting (E_ALL ^ E_NOTICE); ?> 
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
							<li><a href = "admin.php">Admin Home</a></li>
							<li><a href = "landing.php">Log Out</a></li>
						</ul>
					</div>
				</div>
			</div>
			<div class = "title">
				<h1>Edit Database</h1>
			</div>
			<div class = "content">
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

				$ExistingUserID = $_POST["ExistingUserName"]; 
				$NewUserID = $_POST["NewUserName"]; 

				//create a variable to store sql code for the 'Add Users' query
				$updatequery = "UPDATE user SET Username = '$NewUserID' WHERE Username = '$ExistingUserID'";
				
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
			</div>
			<div class = "footer">
				<p>©Jack Marshall 2023</p>
			</div>
		</div>
	</body>
