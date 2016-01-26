


<!DOCTYPE html>
<html>
<body>

	<?php include 'dbcon.php'; 
		$sql = "SELECT ledPin, ledStatus FROM ledcontrol where ledpin = 4";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
	    	$row = $result->fetch_assoc();
		} else {
	    	echo "0 results";
		}
		$conn->close();
		print $row['ledStatus'];	
	?>
</body>
</html>