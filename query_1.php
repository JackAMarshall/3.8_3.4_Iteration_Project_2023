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
					<button class="openbtn" onclick="openNav()">&#9776;</button>
					<script>
function openNav() {
  document.getElementById("mySidebar").style.width = "20vw";
  document.getElementById("main").style.marginRight = "20vw";
}

function closeNav() {
  document.getElementById("mySidebar").style.width = "0";
  document.getElementById("main").style.marginRight= "0";
}
</script>
				</ul>
				<div id="mySidebar" class="sidebar">
					<a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
					<ul>
						<li><a href = "main.php">Main Page</a></li>
						<li><a href = "query_1.php">Sort By Title</a></li>
						<li><a href = "query_2.php">Sort By Genre</a></li>
					</ul>
				</div>
			</div>
			<div class = "title">
				<h1>Sort by Title</h1>
			</div>
			<div class = "container">
				<headers>
					<Title1><h42>Title</h42></Title1>
					<Album1><h42>Album</h42></Album1>
					<Genre1><h42>Artist</h42></Genre1>
					<Artist1><h42>Genre</h42></Artist1>
					<Track1><h42>Track</h42></Track1>
					<Duration1><h42>Duration</h42></Duration1>
					<Size1><h42>Size</h42></Size1>
					<Filename1><h42>Filename</h42></Filename1>
				</headers>
				<content>
					<?php
						require "assessment_mysqli.php";
					
						$query = ("SELECT m.Song_ID, m.Filename, m.title, album.Album, a.artist, g.Genre, m.Track, m.Duration, m.Size 
FROM main As m
INNER JOIN album ON m.Album_ID = album.Album_ID
JOIN song_to_artist s ON m.Song_ID = s.Song_ID
JOIN artist a ON a.Artist_PK = s.Artist_PK
JOIN song_to_genre t ON m.Song_ID = t.Song_ID
JOIN genre g ON g.Genre_PK = t.Genre_FK
WHERE 1
ORDER BY m.title DESC, a.artist DESC");
					
					$result = mysqli_query($conn,$query);

					while($output=mysqli_fetch_array($result))
					{
					?>
					<headers>
						<Title1><p2 class = 'white'><?php echo $output['title']; ?></p2></Title1>
						<Album1><p2 class = 'white'><?php echo $output['Album']; ?></p2></Album1>
						<Genre1><p2 class = 'white'><?php echo $output['Genre']; ?></p2></Genre1>
						<Artist1><p2 class = 'white'><?php echo $output['artist']; ?></p2></Artist1>
						<Track1><p2 class = 'white'><?php echo $output['Track']; ?></p2></Track1>
						<Duration1><p2 class = 'white'><?php echo $output['Duration']; ?></p2></Duration1>
						<Size1><p2 class = 'white'><?php echo $output['Size']; ?></p2></Size1>
						<Filename1><p2 class = 'white'><?php echo $output['Filename']; ?></p2></Filename1>
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
