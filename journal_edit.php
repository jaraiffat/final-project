<?php

include 'Connection.php';


$id = $_POST['id'];
$cat = $_POST['cat'];
$name = $_POST['name'];
$link = $_POST['link'];



$update_query = "UPDATE journal set cat='$cat',name='$name',link='$link' WHERE id = $id";

$result = mysqli_query($con, $update_query);

if ($result) {
    echo 'Data has been updated successfully';
} else {
    echo 'Update failed!';
}


header('Location:journal_up.php');