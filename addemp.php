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
			echo '<form action="addemp.php" method="POST">';
 			echo 'EmployeeID: <input name="EmployeeID" type="number" min="1"><br/>';
  			echo 'Contact No: <input name="ContactNo" type="number" required><br/>';
			echo 'Employee Name: <input name="EmpName" type="text" required><br/>';
 			echo '<input type="Submit">';
  			echo '</form>';
{
			$stmt = $conn->prepare("INSERT INTO employee (EmployeeID,ContactNo,EmpName) values (?,?,?)");
			$eid = $_POST['EmployeeID'];
			$econtact = $_POST['ContactNo'];
			$ename = $_POST['EmpName'];
			$ok = $stmt->bind_param("iis",$eid,$econtact,$ename);
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