<?php
include('admin/dbcon.php');
include('session.php');
$password = $_POST['password'];
$cpassword = $_POST['cpassword'];

$query = mysqli_query($con,"select * from student where student_id = '$session_id'")or die(mysqli_connect_error());
$row = mysqli_fetch_array($query);
$id = $row['student_id'];

$count = mysqli_num_rows($query);
if ($count > 0){
	$passwordEnc = md5($password);
	mysqli_query($con,"update student set password = '$passwordEnc' where student_id = '$id'")or die(mysqli_connect_error());
	echo 'true';
}else{
echo 'false';
}
?>