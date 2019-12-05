<?php 
include 'header.php';
$squery = "SELECT * FROM logs"; 
$select = mysqli_query($conn, $squery);
$numrows = mysqli_num_rows($select);
	if($numrows!=0){
?>
<table id="tables">
	<tr>
		<th>no</th>
		<th>uname</th>
		<th>time</th>
	</tr>
<?php
while($row=mysqli_fetch_array($select)){
?>
    <tr>
		<td><?php echo $row['id']; ?></td>
		<td><?php echo $row['uname']; ?></td>
		<td><?php echo $row['log_time']; ?></td>
	</tr>
<?php	
}
?>
</table>
<?php
}else{
	echo 'no records';
}
?>
<a href="change_profile.php">back</a>
<?php include 'footer.php'; ?>