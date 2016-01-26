<!DOCTYPE html>
<html>

<body onload="LoadStatus()">

	<?php include 'dbcon.php'; 
		$sql = "SELECT ledPin, ledStatus FROM ledcontrol where ledpin = 4";
		$result = $conn->query($sql);

		if ($result->num_rows > 0) {
	    	$row = $result->fetch_assoc();
		} else {
	    	echo "0 results";
		}
		$conn->close();
	
		

	?>

<script>
function LoadStatus()
{
	
	var value = "<?php echo $row["ledStatus"] ?>";
	window.location = "DisplayStatus.php?ledstatus=" + value;
}
</script>

</body>
</html>