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

			$sql = "SELECT country_id,country_name,countries.region_id,region_name FROM countries,regions WHERE countries.region_id = regions.region_id ORDER BY region_name";
			$result = $conn->query($sql);
			if ($result->num_rows > 0) {
			while($row = $result->fetch_assoc()) {
    			echo $row["country_id"]. "  " .$row["country_name"] ."  " .$row["region_id"]. "  " .$row["region_name"]."<br>" ;
 			 }
			} else {
  			echo "0 results";
			}
			$conn->close();
			?>