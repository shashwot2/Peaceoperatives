<!DOCTYPE html>
<html>
<head>
	<meta charset="UTF-8" />
	<title>The peace operatives</title>
	<link rel="stylesheet" type="text/css" href="css/altstyle.css" />
	
</head>
<body>
	<div id="page">
		<div id="header">
			<div>
				<a href="default.html"><img src="" alt="To add image" /></a>
			</div>
			<ul>
				<li><a href="default.html"><span>Employees</span></a></li>
				<li><a href="vehicles.php"><span>Vehicles</span></a></li>
				<li><a href="access.php"><span>Access Levels</span></a></li>
				<li class="current"><a href="missions.php"><span>Missions</span></a></li>
				<li><a href="partners.php"><span>Partners</span></a></li>
			</ul>
		</div>
			
		<div id="body">
		


			<ul>
				<li>
					<h1><?php
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

			$sql = "SELECT missionemployee.MissonID,Duration,Description,Location,EmployeeID FROM mission,missionemployee,missionlocation WHERE mission.MissonID = missionemployee.MissonID AND missionlocation.MissonID = mission.MissonID;";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			echo "<table border=2 font-size:80%><tr><th>MissonID</th><th>Duration</th><th>Description</th><th>Location</th><th>Assigned EmpID</th></tr>";
			while($row = $result->fetch_assoc()) {
    			echo "<tr><td>".$row["MissionID"]. "</td><td>" . $row["Duration"]. "</td><td>" .$row["Description"]. "</td><td>".$row["Location"]."</td><td>".$row["EmployeeID"]."</td></tr>";
 			 }
			echo "</table>";
			} else {
  			echo "0 results";
			}
			$conn->close();
			?></a></h1>
					<div>
						<a href="Add an employee"><img src="" alt="To add a + image" /></a>
					</div>
			</ul>

		</div>
		<div id="footer">
		</div>
	</div>
</body>
</html>