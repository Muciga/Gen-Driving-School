<?php
session_start();
include 'header.php';
$squery = "SELECT * FROM student";
$select = mysqli_query($conn,$squery);
$numrows = mysqli_num_rows($select);
$row = mysqli_fetch_array($select);
if ($numrows == 0){
	echo "no records here";
}
else{
 ?>
<table id="tables">
	<tr>
		<th>admission no</th>
		<th>national id</th>
		<th>name</th>
		<th>gender</th>
		<th>dob</th>
		<th>email</th>
		<th>phone</th>
		<th>town</th>
	</tr>
	<?php
while($row = mysqli_fetch_array($select)){
	?>
	<tr>
		<?php
		echo '<td>'.$row['adm'].'</td>';
		echo '<td>'.$row['natid'].'</td>';
		echo '<td>'.$row['fname']." ".$row['mname']." ".$row['lname'].'</td>';
		echo '<td>'.$row['gender'].'</td>';
		echo '<td>'.$row['dob'].'</td>';
		echo '<td>'.$row['email'].'</td>';
		echo '<td>'.$row['phone'].'</td>';
		echo '<td>'.$row['town'].'</td>';
		?>
	</tr>
	<?php
}
	?>
</table>
<?php
}
include 'footer.php';
?>