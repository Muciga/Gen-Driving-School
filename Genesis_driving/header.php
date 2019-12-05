<?php require "conndb.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Genesis Driving School</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="style.css"/>
</head>
<body>
	<div class="header">
	
	
	<h2>Genesis Driving School</h2>

	
		<h2></h2>
		<p style="font-size: 15px;"align="right"><span id="datetime"></span></p>
	<script>
		var dt = new Date();
		document.getElementById("datetime").innerHTML = (("0"+dt.getDate( )).slice(-2))+"."+(("0"+(dt.getMonth()+1)).slice(-2))+"."+(dt.getFullYear())+"."+(("0"+dt.getHours()).slice(-2))+":"+(("0"+dt.getMinutes()).slice(-2));
	</script>
	<p align="left" style="font-size: 15px;">Welcome to Genesis Driving School</p>
	</div>