<?php 
include 'header.php';
$select = mysqli_query($conn,"SELECT * FROM users");
$numrows = mysqli_num_rows($select);
if($numrows!=0){
?>
<table id="tables">
	<tr>
		<th>employee id</th>
		<th>name</th>
		<th>gender</th>
		<th>dob</th>
		<th>email</th>
		<th>phone</th>
		<th>town</th>
		<th>job</th>
		<th>username</th>
		<th>admin</th>
	</tr>
<?php
while($row=mysqli_fetch_array($select)){
?>
    <tr>
    	<?php
    	echo '<td>'.$row['emp_id'].'</td>';
		echo '<td>'.$row['fname']." ".$row['mname']." ".$row['lname'].'</td>';
		echo '<td>'.$row['gender'].'</td>';
		echo '<td>'.$row['dob'].'</td>';
		echo '<td>'.$row['email'].'</td>';
		echo '<td>'.$row['phone'].'</td>';
		echo '<td>'.$row['town'].'</td>';
		echo '<td>'.$row['job'].'</td>';
	    echo '<td>'.$row['uname'].'</td>';
	    echo '<td>'.$row['admin'].'</td>';
	    ?>
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