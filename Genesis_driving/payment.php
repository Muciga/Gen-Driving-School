<?php
session_start(); 
include 'header.php';
 if(isset($_POST['submit'])){
$transactid = $_POST['transactid'];
$paidfor = $_POST['paid_for'];
$paidby = $_POST['paid_by'];
$amount = $_POST['amount'];
$squeryu = "SELECT * FROM users";
$selectu = mysqli_query($conn, $squeryu);
$select = mysqli_query($conn,"SELECT * FROM payment WHERE transact_id = '$transactid'") or die("echo 'could not connect to table';");
$duchk = mysqli_num_rows($select);
$row = mysqli_fetch_array($selectu);

if($duchk != 0){
	echo 'duplicate transaction, try again.';
}
else if(!preg_match("/^[0-9]*$/", $transactid)){
	echo "not correct format";
}
else if(!preg_match("/^[0-9]*$/", $paidfor)){
	echo "not correct format";
}
else if(!preg_match("/^[0-9]*$/", $paidby)){
	echo "not correct format";
}
else if(!preg_match("/^[0-9]*$/", $amount)){
	echo "not correct format";
}
else{
	$id = $_SESSION['name'];
$iquery = "INSERT INTO payment (transact_id,paid_for,paid_by,paid_to,amount) VALUES ('$transactid','$paidfor','$paidby','$id','$amount')";
$insert = mysqli_query($conn, $iquery) or die(mysqli_error($conn));
if ($insert){
	echo "successfully processed";
	header("Location: tuto5.php");
}
}
}
else{
echo "logged in as ".$_SESSION['name']."<a href='logout.php'></a>";
?>
<form name = "payment" method="post"  action="<?php echo $_SERVER['PHP_SELF']; ?>">
transact id<br>
<input type="text" name="transactid" required maxlength="5"><br>
paid for<br>
<input type="text" name="paid_for" required maxlength="5"><br>
paid by<br>
<input type="text" name="paid_by" required maxlength="5"><br>
amount<br>
<input type="text" name="amount" required maxlength="5"><br>
<input type = "submit" name = "submit" value = "process transaction"> 
</form>
<a href="change_profile.php">back</a>
<?php	
}
include 'footer.php';
?>
