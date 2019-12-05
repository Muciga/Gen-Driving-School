<?php 
include 'header.php';
 if(isset($_POST['submit'])){
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
$selecta = mysqli_query($conn,"SELECT * FROM student WHERE adm = '$adm'") or die("echo 'could not connect to table';");
$dachk = mysqli_num_rows($selecta);
$selecte = mysqli_query($conn, "SELECT email FROM student WHERE email = '$email'");
$dechk = mysqli_num_rows($selecte);
if($dachk != 0){
	echo 'admission in use, try again.';
}
else if(!preg_match("/^[a-zA-Z0-9 ]*$/", $adm)){
	echo "admission not correct format";
}
else if(!preg_match("/^[0-9]*$/", $natid)){
	echo "national id not correct format";
}
else if(!preg_match("/^[a-zA-Z ]*$/", $fname)){
	echo "first name not correct format";
}
else if(!preg_match("/^[a-zA-Z ]*$/", $mname)){
	echo "middle name not correct format";
}
else if(!preg_match("/^[a-zA-Z ]*$/", $lname)){
	echo "last name not correct format";
}
else if(!preg_match("/^[a-zA-Z]*$/", $gender)){
	echo "gender not correct format";
}
else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
	echo "email not correct format";
}
else if($dechk != 0){
	echo "email in use, try again";
}
else if(!preg_match("/^[0-9]*$/", $phone)){
	echo "phone not correct format";
}
else if(!preg_match("/^[a-zA-Z ]*$/", $town)){
	echo "town not correct format";
}
else{
$iquery = "INSERT INTO student (adm,natid,fname,mname,lname,gender,dob,email,phone,town) VALUES ('$adm','$natid','$fname', '$mname','$lname','$gender','$fdob','$email','$phone','$town')";
$insert = mysqli_query($conn, $iquery) or die(mysqli_error($conn));
if ($insert){
	echo "successfully registered new student, ";
	echo "<a href = 'student.php'>continue</a>";
}
}
}
else{
?>
<form name = "studentreg" method="post"  action="<?php echo $_SERVER['PHP_SELF']; ?>">
admission<br>
<input type="text" name="adm" required><br>
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
<input type = "submit" name = "submit" value = "add new"> 
</form>
<a href="change_profile.php">back</a>
<?php	
}
include 'footer.php';
?>