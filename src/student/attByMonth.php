<?php 
	require '../dbcon.php';
	$month = $_POST['value'];
	$id = $_POST['id'];
	$query = "SELECT COUNT(*) AS `count` FROM `attendance` WHERE id = '$id' AND att_month = '$month' AND attendance = 'Present' ";
	$result = mysqli_query($con,$query);
	$row1 = mysqli_fetch_assoc($result);
	$count = $row1['count'];
	echo $count;
 ?>