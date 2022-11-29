<?php

	include 'Connection.php';
    
    $id = $_POST['id'];
	$query = "update admin set name='$_POST[name]',email='$_POST[email]',mobile='$_POST[mobile]' WHERE admin_id = $id";
	$query_run = mysqli_query($con,$query);
?>
<script type="text/javascript">
	alert("Updated successfully...");
	window.location.href = "admin.php";
</script>