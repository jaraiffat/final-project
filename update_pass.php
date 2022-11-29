<?php
	session_start();
    include 'Connection.php';
	$password = "";
	$query = "select * from admin where email = '$_SESSION[email]'";
	$query_run = mysqli_query($con,$query);
	while($row = mysqli_fetch_assoc($query_run)){
		$password = $row['password'];
	}
	if($password == $_POST['old_password']){
		$query = "update users set password = '$_POST[new_password]' where email = '$_SESSION[email]'";
		$query_run = mysqli_query($con,$query);
		echo '<script type="text/javascript">';
		echo 'alert("Password changed successfully....You may login again.");';
		echo 'window.location.href = "index.php";';
		echo '</script>';
	}

	else{
		echo '<script type="text/javascript">';
		echo 'alert("Please enter correct old password");';
		echo 'window.location.href = "change_pass.php";';
		echo '</script>';
	}
