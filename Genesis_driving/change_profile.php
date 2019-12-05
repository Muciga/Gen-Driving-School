<?php
session_start();
?>
<html>
<body>
<?php
include 'header.php';
$squery = "SELECT * FROM users";
$select = mysqli_query($conn,$squery);
$numrows = mysqli_num_rows($select);
$row = mysqli_fetch_array($select);
echo "logged in as ".$_SESSION['name']." <a href='logout.php'>log out</a>";
?>
<br><a href="register.php">add new user</a><br> 
<a href="reg_users.php">view registered users</a><br>
<a href="updatepage.php">update user records</a><br>
<a href="logs.php">logs</a><br>
<a href="student.php">register new student</a><br>
<a href="viewstudents.php">view registered student</a><br>
<a href="updatestudent.php">update student records</a><br> 
<a href="payment.php">process payment</a><br> 
<?php include 'footer.php'; ?>
</body>
</html>