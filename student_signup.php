<?php
include('admin/dbcon.php');
session_start();
$username = $_POST['username'];
$password = $_POST['password'];
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$class_id = $_POST['class_id'];
$question1 = $_POST['question1'];
$question2 = $_POST['question2'];

$query = mysqli_query($con,"select * from student where username='$username' and firstname='$firstname' and lastname='$lastname' and class_id = '$class_id'")or die(mysqli_connect_error());
$row = mysqli_fetch_array($query);
$id = $row['student_id'];

$count = mysqli_num_rows($query);
if ($count > 0){
	$passwordEnc = md5($password);
	mysqli_query($con,"update student set password = '$passwordEnc',question1 = '$question1', question2 = '$question2', status = 'Registered' where student_id = '$id'")or die(mysqli_connect_error());
	$_SESSION['id']=$id;
	echo 'true';
}else{
echo 'false';
}
?>