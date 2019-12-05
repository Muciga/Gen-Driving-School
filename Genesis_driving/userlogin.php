<?php
session_start();
include 'header.php';
if (isset($_POST['submit'])){
$uname = $_POST['uname'];
$pass = md5($_POST['pass']);
$squeryu  = "SELECT * FROM users WHERE uname = '$uname' AND admin = '0'";
$selectu = mysqli_query($conn, $squeryu);
$squeryl = "SELECT * FROM log";
$selectl = mysqli_query($conn, $squeryl);
$row = mysqli_fetch_array($selectu);
	if($uname != $row['uname'] || $pass != $row['pass']){
		echo "incorrect credentials";
	}else{
		$_SESSION['id'] = $row['id'];
		$_SESSION['name'] = $row['uname'];
		$id = $row['id'];
        $iquery = "INSERT INTO log(user_id) VALUES ('$id')";
        $insert = mysqli_query($conn, $iquery);
		header("Location: user.php");
	}
}else{
?>
<form name = "login" method="post"  action="<?php echo $_SERVER['PHP_SELF']; ?>">
username<br>
<input type="text" name="uname" required><br>
password<br>
<input type="password" name="pass" required><br>
<input type = "submit" name = "submit" value = "log in"> 
</form>
<a href="index.php">back</a>
<?php
}
?>