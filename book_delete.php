<?php

$book_no = $_REQUEST['bn'];
include 'Connection.php';
$delete_query="DELETE FROM books WHERE book_no = '$book_no'";
if(mysqli_query($con,$delete_query))
{
    echo 'Data has been deleted successfully';
}else
{
    echo 'Failed!';
}

 
header('Location:manage_book.php');