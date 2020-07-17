<?php
include('admin/dbcon.php');
session_start();
$username = $_POST['username'];
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$question1 = $_POST['question1'];
$question2 = $_POST['question2'];

$query = mysqli_query($con,"select * from student where username='$username' and firstname='$fname' and lastname='$lname' and question1 = '$question1' and question2 = '$question2'")or die(mysqli_connect_error());
$row = mysqli_fetch_array($query);
$id = $row['student_id'];

$count = mysqli_num_rows($query);
if ($count > 0){
	$_SESSION['id']=$id;
	echo 'true';
}else{
echo 'false';
}
?>