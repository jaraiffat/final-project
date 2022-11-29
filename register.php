<?php

    $name = $_POST['name'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$mobile = $_POST['mobile'];
	$address = $_POST['address'];

	
	include 'Connection.php';

     $query = "INSERT INTO users (name,email,password,mobile,address) VALUES ('$name','$email','$password',$mobile,'$address')";
	 $result = mysqli_query($con, $query);
  

    if($result){
	echo '<script type="text/javascript">';
	echo 'alert("Registration successfully....You may login now.");';
	echo 'window.location.href = "index.php";';
	echo '</script>';

	}
	else{
		echo '<script type="text/javascript">';
		echo 'alert("Registration failed... Going back to home");';
		echo 'window.location.href = "index.php";';
		echo '</script>';
	}
?>
