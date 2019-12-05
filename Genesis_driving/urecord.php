<?php
include 'header.php';
$id=$_GET['id'];
if(!is_numeric($id)){
	echo 'data error';
	exit;
} 
$squery = "SELECT * FROM users WHERE id = '$id'";
$select = mysqli_query($conn, $squery);
$numrows = mysqli_num_rows($select);
while ($row = mysqli_fetch_array($select)){ 
?>
<form method = 'post' action = '<?php echo 'update.php?id='.$row['id']; ?>'>
employee id<br>
<input type="text" name="empid" value = "<?php echo $row['emp_id'];?>" required><br>
national id<br>
<input type="text" name="natid" value = "<?php echo $row['nat_id'];?>" required maxlength="8"><br>
first name<br>
<input type="text" name="fname" value = "<?php echo $row['fname'];?>" required><br>
middle name<br>
<input type="text" name="mname" value = "<?php echo $row['mname'];?>"><br>
last name<br>
<input type="text" name="lname" value = "<?php echo $row['lname'];?>" required><br>
gender<br>
<input type = "radio" name = "gender" value = "m" checked>male
<input type = "radio" name = "gender" value = "f">female
<input type = "radio" name = "gender" value = "o">other<br>
date of birth<br>
<input type="date" name="dob" value = "<?php echo $row['dob'];?>" required><br>
email<br>
<input type="text" name="email" value = "<?php echo $row['email'];?>" required><br>
phone<br>
<input type="text" name="phone" required maxlength="12" value="<?php echo $row['phone'];?>""><br>
town<br>
<input type="text" name="town" value = "<?php echo $row['town'];?>" required><br>
job<br>
<input type="text" name="job" value = "<?php echo $row['job'];?>" required><br>
username<br>
<input type="text" name="uname" value = "<?php echo $row['uname'];?>" required><br>
password<br>
<input type="text" name="pass" value = "<?php echo $row['pass'];?>" required><br>
admin<br>
<input type="radio" name="admin" value="1">yes
<input type="radio" name="admin" value="0" checked>no<br>
<input type = "submit" name = "submit" value = "update">
</form>
<?php 
}
include 'footer.php';
?>