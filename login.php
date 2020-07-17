<?php
		include('admin/dbcon.php');
		session_start();
		$username = $_POST['username'];
		$password = $_POST['password'];
		$passwordEnc = md5($password);
		/* student */
			$query = "SELECT * FROM student WHERE username='$username' AND password='$passwordEnc'";
			$result = mysqli_query($con,$query)or die(mysqli_connect_error());
			$row = mysqli_fetch_array($result);
			$num_row = mysqli_num_rows($result);
		/* teacher */
		$query_teacher = mysqli_query($con,"SELECT * FROM teacher WHERE username='$username' AND password='$passwordEnc'")or die(mysqli_connect_error());
		$num_row_teacher = mysqli_num_rows($query_teacher);
		$row_teahcer = mysqli_fetch_array($query_teacher);
		if( $num_row > 0 ) { 
		$_SESSION['id']=$row['student_id'];
		echo 'true_student';	
		}else if ($num_row_teacher > 0){
		$_SESSION['id']=$row_teahcer['teacher_id'];
		echo 'true';
		
		 }else{ 
				echo 'false';
		}	
				
		?>