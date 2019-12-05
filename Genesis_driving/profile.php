<?php
$id=$_GET['id'];
if(!is_numeric($id)){
	echo 'data error';
	exit;
}
include 'header.php'; 
$squery = "SELECT * FROM users WHERE id = '$id'";
$select = mysqli_query($conn, $squery);
$numrows = mysqli_num_rows($select);
while ($row = mysqli_fetch_array($select)){ 
?>
username
<input type="text" name="uname" value = "<?php echo $row['uname'];?>"><br>
password
<input type="text" name="pass" value = "<?php echo $row['pass'];?>"><br>
<a href="urecord.php">update</a><br>
<a href="drecord.php">delete</a>
<?php 
}
?>