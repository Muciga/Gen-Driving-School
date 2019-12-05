<?php
include 'header.php';
$id=$_GET['id'];
if(!is_numeric($id)){
	echo 'data error';
	exit;
} 
$empid = strtoupper($_POST['empid']);
$natid = $_POST['natid'];
$fname = ucfirst($_POST['fname']);
$mname = ucfirst($_POST['mname']);
$lname = ucfirst($_POST['lname']);
$gender = strtoupper($_POST['gender']);
$dob = date_create($_POST['dob']);
$fdob = date_format($dob, "Y/m/d");
$email = $_POST['email'];
$phone = $_POST['phone'];
$town = strtoupper($_POST['town']); 
$job = strtoupper($_POST['job']); 
$uname = $_POST['uname'];
$pass = $_POST['pass'];
$admin = $_POST['admin'];
$uquery = "UPDATE users SET emp_id = '$empid', nat_id = '$natid', fname = '$fname', mname = '$mname', lname = '$lname', gender = '$gender', dob = '$fdob', email = '$email', phone = '$phone', town = '$town', job = '$job', uname = '$uname', pass = '$pass', admin = '$admin' WHERE id = '$id'";
$update = mysqli_query($conn, $uquery);
echo "successfully updated";
?>
<br><a href="change_profile.php">back</a>
<?php include 'footer.php'; ?>