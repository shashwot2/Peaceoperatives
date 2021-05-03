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
			$servername = "";
			$username = "";
			$password = "";
			$dbname = "";

			// Create connection
			$conn = new mysqli($servername, $username, $password, $dbname);
			// Check connection
			if ($conn->connect_error) {
 			   die("Connection failed: " . $conn->connect_error);
			}
			echo '<form action="addvehicle.php" method="POST">';
 			echo 'Type of Vehicle: <input name="VehicleType" type="text" required><br/>';
  			echo 'VehicleID: <input name="VehicleID" type="number" required><br/>';
			echo 'Description: <input name="VehicleDescription" type="text" required><br/>';
			echo 'Equipment: <input name="VehicleEquipment" type="text" required><br/>';
			echo 'Installation date: <input name="Installationdate" type="text"><br/>';
 			echo '<input type="Submit">';
  			echo '</form>';
{
			$stmt = $conn->prepare("INSERT INTO vehicletype (VehicleType,VehicleID) values (?,?)");
			
			$stmt2 = $conn->prepare("INSERT INTO vehicledescription (VehicleDescription,VehicleID) values (?,?)");
			$stmt3 = $conn->prepare("INSERT INTO vehicleequipment (Equipment,InstallationDate,VehicleID) values (?,?,?)");
			$vt = $_POST['VehicleType'];
			$vi = $_POST['VehicleID'];
			$vdes= $_POST['VehicleDescription'];
			$ve = $_POST['VehicleEquipment'];
			$vins = $_POST['Installationdate'];
			$ok = $stmt->bind_param("si",$vt,$vi);
			$ok2 = $stmt2->bind_param("si",$vdes,$vi);
			$ok3 = $stmt3->bind_param("ssi,$ve,$vins,$vi");
			if (!$ok) { die("Bind param error"); }
 			$ok=$stmt->execute();
			$ok2 = $stmt2->execute();
			$ok3 = $stmt3->execute();
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