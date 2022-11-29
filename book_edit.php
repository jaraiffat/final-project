<?php

include 'Connection.php';

$book_id = $_POST['book_id'];
$book_name=$_POST['book_name'];
$book_author = $_POST['book_author'];
$cat = $_POST['cat_name'];
$book_no = $_POST['book_no'];
$book_price = $_POST['book_price'];


$update_query="UPDATE books set book_name='$book_name',book_author='$book_author',cat_name='$cat',book_no='$book_no',book_price='$book_price' WHERE book_id = $book_id";

$result=mysqli_query($con,$update_query);

if($result)
{
    echo 'Data has been updated successfully';
}else{
    echo 'Update failed!';
}

    
    header('Location:manage_book.php');
    ?>