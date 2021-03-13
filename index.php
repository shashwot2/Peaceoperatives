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
				<a href="index.html"><img src="" alt="To add iamge" /></a>
			</div>
			<ul>
				<li class="current"><a href="index.html"><span>Employees</span></a></li>
				<li><a href="vehicles.php"><span>Vehicles</span></a></li>
				<li><a href="access.php"><span>Access Levels</span></a></li>
				<li><a href="missions.php"><span>Missions</span></a></li>
				<li><a href="partners.php"><span>Partners</span></a></li>
			</ul>
		</div>
			
		<div id="body">
		


			<ul>
				<li>
					<h1><?php
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

			$sql = "SELECT * FROM employee";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			echo "<table border=2 font-size:80%><tr><th>Name</th><th>ID</th><th>Contact</th></tr>";
			while($row = $result->fetch_assoc()) {
    			echo "<tr><td>".$row["EmpName"]. "</td><td>" . $row["EmployeeID"]. "</td><td>" .$row["ContactNo"]. "</td></tr>";
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
