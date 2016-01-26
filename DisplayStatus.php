<!DOCTYPE html>
<html>

<script>
function SwitchOn()
{
	if ("<?php echo $_GET['ledstatus'] ?>" == "ledon") {
		document.getElementById("switchOn").checked = true; 
		document.getElementById("messageoff").style.display = 'none'; 
	}
	else {
		document.getElementById("switchOff").checked = true;
		document.getElementById("messageon").style.display = 'none'; 
	}
}
</script>

<body onload="SwitchOn()">
	<link rel="stylesheet" type="text/css" href="techFairStyling.css">
	<div class="header">
		<h4>Arduino Project</h4>
		<p>This is a project which can turn on or turn off an led through a wireless network using PHP,SQL,C,C++,HTML,CSS and JAVASCRIPT.</p>
	    <img src = "\led.png"/>
	</div>

	<form action="save.php" method="get">
		<div class="msg">
			<label id="messageon">LED has been turned on</label>
			<label id="messageoff">LED has been turned off</label></br></br>
		</div>
		<div class="radio">
        	<input type="radio" name="Led" id="switchOn" value = "On">Switch On
        	<input type="radio" name="Led" id="switchOff" value = "Off">Switch Off </br> </br>
        	<input class= "button" type="submit" value = "Save">
    	</div>
    </form>

<div class = "top">
<h2>Wireless Led Control</h2>
</div>

<div

</body>

</html>