<?php

include 'Connection.php';

$cat_id = $_POST['cat_id'];
$cat = $_POST['cat_name'];


$update_query="UPDATE category set cat_name='$cat' WHERE cat_id = $cat_id";

$result=mysqli_query($con,$update_query);

if($result)
{
    echo 'Data has been updated successfully';
}else{
    echo 'Update failed!';
}

    
    header('Location:manage_cat.php');
    ?>