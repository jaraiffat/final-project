<?php

$cat = $_REQUEST['bn'];
include 'Connection.php';
$delete_query="DELETE FROM category WHERE cat_id = '$cat'";
if(mysqli_query($con,$delete_query))
{
    echo 'Data has been deleted successfully';
}else
{
    echo 'Failed!';
}

 
header('Location:manage_cat.php');