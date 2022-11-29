<?php

$isu = $_REQUEST['bn'];
include 'Connection.php';


$find = mysqli_query($con,"SELECT student_id,book_name,issue_date,due_date FROM issued_books WHERE s_no = '$isu'");

$row = mysqli_fetch_assoc($find);

$student_id =  $row['student_id'];
$book_name =  $row['book_name'];
$book_no =  $row['issue_date'];
$issue =  $row['issue_date'];
$due =  $row['due_date'];

$insert="INSERT INTO rnt (student_id,book_name,issue_date,due_date) VALUES ('$student_id','$book_name','$issue','$due')";
$result1 = mysqli_query($con, $insert);

$delete_query = "DELETE FROM issued_books WHERE s_no = '$isu'";
$result2 = mysqli_query($con, $delete_query);



?>

<script type="text/javascript">
	alert("Updated successfully...");
	window.location.href = "view_issued_book.php";
</script> 
