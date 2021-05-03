<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>The peace operatives</title>
	<link rel="stylesheet" type="text/css" href="css/altstyle.css"/>
	
</head>
<body>
	<div id="page">
		<div id="header">
			<div>
				<a href="index.php"><img src="images/peacelogo.png" alt="To add iamge width="150" height="200"></a>
			</div>
			<ul>
				<li><a href="index.php"><span>Employees</span></a></li>
				<li><a href="vehicles.php"><span>Vehicles</span></a></li>
				<li><a href="access.php"><span>Access Levels</span></a></li>
				<li><a href="missions.php"><span>Missions</span></a></li>
				<li><a href="partners.php"><span>Partners</span></a></li>
				<a href="https://github.com/shashwot2/Peaceoperatives/wiki" style="float: right;"><img src="images/help.png" alt="No image" width=50 height=50></a>
			</ul>
		</div>

		<div id="body">
			<ul>
			<li>
			<h1>
			<?php
			$servername = "localhost";
			$username = "root";
			$password = "root";
			$dbname = "peaceop";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
 			   die("Connection failed: " . $conn->connect_error);
			}
			echo '<form action="addmissions.php" method="POST">';
 			echo 'MissionID: <input name="MissionID" type="number" min="1"><br/>';
  			echo 'Duration: <input name="Duration" type="text" required><br/>';
			echo 'Description <input name="Description" type="text" required><br/>';
 			echo '<input type="Submit">';
  			echo '</form>';
{
			$stmt = $conn->prepare("INSERT INTO mission (Duration,MissonID,Description) values (?,?,?)");
			$dur = $_POST['Duration'];
			$mid = $_POST['MissonID'];
			$mdes = $_POST['Description'];
			$ok = $stmt->bind_param("sis",$dur,$mid,$mdes);
			if (!$ok) { die("Bind param error"); }
 			$ok=$stmt->execute();
  			if (!$ok) { die(""); }
  			echo 'Data inserted OK';
}
			$conn->close();
			?></h1>
			</li>
			</ul>
		</div>	
	</div>
</body>
</html>