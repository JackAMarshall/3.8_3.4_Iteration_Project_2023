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
			if($count < 1) {
				$_SESSION['login_user'] = $myusername;
				header("location: main.php");
			} else {
				$error = "ERROR! Your Login Name or Password is invalid";
				}
			}
	ob_end_flush();
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
		<login>
		<div class = "wrapper">
			<div class = "nav">
				<ul>
					<li><a href = "landing.php">Home</a></li>
				</ul>
			</div>
			<div class = "title_login">
				<h1>Title</h1>
				<h3>Sub-Header</h3>
			</div>
			<div class = "content">
				<form method = "post" id= "login">
					<input type = "text" name = "username" placeholder="Create Username"/><br />
					<input type = "text" name = "password" placeholder="Create Password"/><br />
					<input type = "text" name = "password_2" placeholder="Confirm Password"/><br />
					<input type = "submit" value = " Log In "/><br />
				</form>
				<?php
					//connect.php (tells where to connect servername, username, password, dbaseName)
					require "assessment_mysqli.php";
						
					$UserID = $_POST["username"]; 
					$PW = $_POST["password"];

					//create a variable to store sql code for the 'Add Users' query
					$insertquery = "INSERT INTO user( Username, Password ) VALUES( '$UserID' , '$PW' )";

					if (mysqli_query($conn,$insertquery))
						{
						echo "<p class = 'grey'>Record inserted:</p>";
						}
					else
						{
						echo "<p class = 'grey'>Error inserting record:</p>";
						}
				?>
				<h3 class = "grey"><?php echo $error; ?></h3>
			</div>
			<div class = "footer">
				<p>Copyright Statement</p>
			</div>
		</div>
		</login>
	</body>
