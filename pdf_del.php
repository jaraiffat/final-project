<?php

$pdf = $_REQUEST['bn'];
include 'Connection.php';

$delete_query = "DELETE FROM files WHERE name = '$pdf'";
$result = mysqli_query($con, $delete_query);

unlink("../uploads/".$pdf);



// if ($result) {
//     echo 'Data has been updated successfully';
// } else {
//     echo 'Update failed!';
// }

?>

<script type="text/javascript">
	alert("Updated successfully...");
	window.location.href = "pdf_up.php";
</script> 
