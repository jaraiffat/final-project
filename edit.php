<?php

	include 'Connection.php';
    
    $id = $_POST['id'];
	$query = "update users set name='$_POST[name]',email='$_POST[email]',mobile='$_POST[mobile]',address='$_POST[address]' WHERE id = $id";
	$query_run = mysqli_query($con,$query);
?>
<script type="text/javascript">
	alert("Updated successfully...");
	window.location.href = "user_dashboard.php";
</script>