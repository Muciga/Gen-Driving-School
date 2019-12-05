<?php
include 'header.php';
$id=$_GET['id'];
if(!is_numeric($id)){
	echo 'data error';
	exit;
} 
$adm = strtoupper($_POST['adm']);
$natid = $_POST['natid'];
$fname = ucfirst($_POST['fname']);
$mname = ucfirst($_POST['mname']);
$lname = ucfirst($_POST['lname']);
$gender = strtoupper($_POST['gender']);
$dob = date_create($_POST['dob']);
$fdob = date_format($dob, "Y/m/d");
$email = $_POST['email'];
$phone = $_POST['phone'];
$town = ucfirst($_POST['town']);
$uquery = "UPDATE student SET adm = '$adm', natid = '$natid', fname = '$fname', mname = '$mname', lname = '$lname', gender = '$gender', dob = '$fdob', email = '$email', phone = '$phone', town = '$town' WHERE id = '$id'";
$update = mysqli_query($conn, $uquery);
echo "successfully updated";
?>
<br><a href="change_profile.php">back</a>