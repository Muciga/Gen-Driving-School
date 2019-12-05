<?php 
include 'header.php';
 if(isset($_POST['submit'])){
$cat = ucfirst($_POST['cat']);
$lessons = $_POST['lesson'];
$select = mysqli_query($conn,"SELECT * FROM ccat WHERE cat = '$cat'") or die("echo 'could not connect to table';");
$duchk = mysqli_num_rows($select);
if($duchk != 0){
	echo 'cat defined, try again.';
}
else if(!preg_match("/^[a-zA-Z ]*$/", $cat)){
	echo "not correct format";
}
else if(!preg_match("/^[0-9]*$/", $lessons)){
	echo "input number only";
}
else{
$iquery = "INSERT INTO ccat (cat, lessons) VALUES ('$cat', '$lessons')";
$insert = mysqli_query($conn, $iquery) or die(mysqli_error($conn));
if ($insert){
	echo "successfully inserted";
}
}
}
else{
?>
<form name = "categ" method="post"  action="<?php echo $_SERVER['PHP_SELF']; ?>">
category<br>
<input type="text" name="cat" required><br>
lessons<br>
<input type="text" name="lesson" required><br>
<input type = "submit" name = "submit" value = "add"> 
</form>
<?php	
}
?>