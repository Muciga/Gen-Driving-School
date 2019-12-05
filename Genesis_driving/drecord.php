<?php
include 'header.php';
$id = $_GET['id'];
$squery = "SELECT * FROM users";
$select = mysqli_query($conn,$squery);	
$dquery = "DELETE FROM users WHERE id = '$id'";
$delete = mysqli_query($conn, $dquery);
echo "successfully deleted";
?>
<br><a href="change_profile.php">back</a>	