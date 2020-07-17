<?php
// mysqli_select_db('learningms',mysql_connect('localhost','root',''))or die(mysqli_connect_error());
$con = mysqli_connect('localhost','root','','learningms');
if (mysqli_connect_errno()){
    echo 'failed to init database'. mysqli_connect_error();
    exit();
}
?>