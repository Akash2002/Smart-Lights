<!DOCTYPE html>
<html>

<script>
function LoadStatus()
{
	//alert (document.getElementById("Status").value);
	window.location = "DisplayStatus.php?ledstatus=" + document.getElementById("Status").value;
}
</script>

<body onload="LoadStatus()">
	<?php include 'dbcon.php';

		if ( $_GET["Led"] == "On") 
			$Status = "ledon";
		else
			$Status = "ledoff";
			 
		$sql = "update ledcontrol set ledStatus = '".$Status. "'";
		print $sql;
		$result = $conn->query($sql);

		$conn->close();
	?>

	<form>
        <input type="hidden" name="Status" id="Status" value = "<?php echo $Status ?>"> 
    </form>

</body>
</html>