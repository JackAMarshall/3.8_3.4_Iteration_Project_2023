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
		<div class = "wrapper">
			<div class = "title">
				<h1>View Users</h1>
			</div>
			<div class = "container">
				<headers>
					<Username1><h42>Username</h42></Username1>
					<Password1><h42>Password</h42></Password1>
				</headers>
				<content>
					<?php
					require "assessment_mysqli.php";
					
					$query = ("SELECT Username, Password FROM user WHERE 1 ORDER BY user.Username ASC");
					
					$result = mysqli_query($conn,$query);

					while($output=mysqli_fetch_array($result))
					{
					?>
					<headers>
						<Username1><p2 class = 'white'><?php echo $output['Username']; ?></p2></Username1>
						<Password1><p2 class = 'white'><?php echo $output['Password']; ?></p2></Password1>
					</headers>
					<?php
					}
					?>
				</content>
			</div>
			<div class = "footer">
				<p>Copyright Statement</p>
			</div>
		</div>
	</body>
