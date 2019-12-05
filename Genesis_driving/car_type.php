<?php 
include 'header.php';
 if(isset($_POST['submit'])){
$cat = $_POST['cat_id']; 	
$type = ucfirst($_POST['type']);
$name = $_POST['name'];
$price = $_POST['price'];
$csquery = "SELECT id FROM ccat";
$cselect = mysqli_query($conn, $csquery);
$tselect = mysqli_query($conn,"SELECT * FROM ctype WHERE type = '$type'") or die("echo 'could not connect to table';");
$duchk = mysqli_fetch_array($tselect);
if($duchk != 0){
	echo 'type defined, try again.';
}
else if(!preg_match("/^[a-zA-Z0-9 ]*$/", $type)){
	echo "not correct format";
}
else if(!preg_match("/^[0-9]*$/", $price)){
	echo "price can only be number";
}
else{	
$iquery = "INSERT INTO ctype (cat_id, type, name, price) VALUES ('$cat','$type','$name','$price')";
$insert = mysqli_query($conn, $iquery) or die(mysqli_error($conn));
if ($insert){
	echo "success, ";
	echo "<a href = 'car_type.php'>continue inserting</a>";
}
}
}
else{
?>
<form name = "catype" method="post"  action="<?php echo $_SERVER['PHP_SELF']; ?>">
category<br>
<input type = "text" name = "cat_id" required><br>
type<br>
<input type="text" name="type" required><br>
name<br>
<input type="text" name="name" required><br>
price<br>
<input type="text" name="price" required><br>
<input type = "submit" name = "submit" value = "add"> 
</form>
<?php	
}
?>