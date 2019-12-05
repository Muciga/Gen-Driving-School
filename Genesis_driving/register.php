<?php 
include 'header.php';
 if(isset($_POST['submit'])){
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
$pass = md5($_POST['pass']);
$pass2 = md5($_POST['pass2']);
$admin = $_POST['admin'];
$selectu = mysqli_query($conn,"SELECT * FROM users WHERE uname = '$uname'") or die("echo 'could not connect to table';");
$duchk = mysqli_num_rows($selectu);
$selecteid = mysqli_query($conn,"SELECT emp_id FROM users WHERE emp_id = '$empid'") or die("echo 'could not connect to table';");
$deidchk = mysqli_num_rows($selecteid);
$selecte = mysqli_query($conn,"SELECT email FROM users WHERE email = '$email'") or die("echo 'could not connect to table';");
$dechk = mysqli_num_rows($selecte);
if($duchk != 0){
	echo 'name in use, <a href="register.php">try again.</a>';
}
else if($deidchk != 0){
	echo 'employee id in use, <a href="register.php">try again.</a>';
}
else if(!preg_match("/^[a-zA-Z0-9 ]*$/", $empid)){
	echo "employee id not correct format, <a href='register.php'>try again.</a>";
}
else if(!preg_match("/^[0-9]*$/", $natid)){
	echo "national id not correct format <a href='register.php'>try again.</a>";
}
else if(!preg_match("/^[a-zA-Z ]*$/", $fname)){
	echo "first name not correct format <a href='register.php'>try again.</a>";
}
else if(!preg_match("/^[a-zA-Z ]*$/", $mname)){
	echo "middle name not correct format <a href='register.php'>try again.</a>";
}
else if(!preg_match("/^[a-zA-Z ]*$/", $lname)){
	echo "last name not correct format <a href='register.php'>try again.</a>";
}
else if(!preg_match("/^[a-zA-Z]*$/", $gender)){
	echo "gender not correct format, <a href='register.php'>try again</a>";
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	echo "email not correct format, <a href='register.php'>try again</a>";
}
else if($dechk != 0){
	echo "email in use, <a href='register.php'>try again</a>";
}
else if(!preg_match("/^[0-9]*$/", $phone)){
	echo "phone not correct format, <a href='register.php'>try again</a>";
}
else if(!preg_match("/^[a-zA-Z ]*$/", $town)){
	echo "town not correct format, <a href='register.php'>try again</a>";
}
else if(!preg_match("/^[a-zA-Z ]*$/", $job)){
	echo "job not correct format, <a href='register.php'>try again</a>";
}
else if($pass != $pass2){
	echo 'passwords do not match, <a href="register.php">try again</a>';
}
else if(!preg_match("/^[a-zA-Z ]*$/", $uname)){
	echo "not correct format, <a href='register.php'>try again</a>";
}
else{
$iquery = "INSERT INTO users (emp_id,nat_id,fname,mname,lname,gender,dob,email,phone,town,job,uname,pass,admin) VALUES ('$empid','$natid','$fname','$mname','$lname','$gender','$fdob','$email','$phone','$town','$job','$uname', '$pass','$admin')";
$insert = mysqli_query($conn, $iquery) or die(mysqli_error($conn));
if ($insert){
	echo "successfully inserted<br><a href='register.php'>back</a>";
}
}
}
else{
?>
<form name = "register" method="post"  action="<?php echo $_SERVER['PHP_SELF']; ?>">
employee id<br>
<input type="text" name="empid" required maxlength="5"><br>
national id<br>
<input type="text" name="natid" required maxlength="8"><br>
first name<br>
<input type="text" name="fname" required><br>
middle name<br>
<input type="text" name="mname"><br>
last name<br>
<input type="text" name="lname" required><br>
gender<br>
<input type = "radio" name = "gender" value = "m" checked>male
<input type = "radio" name = "gender" value = "f">female
<input type = "radio" name = "gender" value = "o">other<br>
date of birth<br>
<input type="date" name="dob" required><br>
email<br>
<input type="text" name="email" required><br>
phone<br>
<input type="text" name="phone" required maxlength="12" value="2547"><br>
town<br>
<input type="text" name="town" required><br>
job<br>
<input type="text" name="job" required><br>
username<br>
<input type="text" name="uname" required><br>
password<br>
<input type="password" name="pass" required><br>
confirm password<br>
<input type="password" name="pass2" required><br>
admin<br>
<input type="radio" name="admin" value="1">yes
<input type="radio" name="admin" value="0">no<br>
<input type = "submit" name = "submit" value = "register"> 
</form>
<a href="change_profile.php">back</a>
<?php	
}
include 'footer.php';
?>
