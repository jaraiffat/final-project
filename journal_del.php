<?php

$pdf = $_REQUEST['bn'];
include 'Connection.php';
$delete_query = "DELETE FROM journal WHERE id = '$pdf'";

$result = mysqli_query($con, $delete_query);

// if ($result) {
//     echo 'Data has been updated successfully';
// } else {
//     echo 'Update failed!';
// }

?>
<script type="text/javascript">
	alert("Updated successfully...");
	window.location.href = "journal_up.php";
</script>