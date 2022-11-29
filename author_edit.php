<?php

include 'Connection.php';

$id = $_POST['author_id'];
$name = $_POST['author_name'];


$update_query="UPDATE author set author_name='$name' WHERE author_id = $id";

$result=mysqli_query($con,$update_query);

if($result)
{
    echo 'Data has been updated successfully';
}else{
    echo 'Update failed!';
}

    
  header('Location:manage_author.php');
 ?>