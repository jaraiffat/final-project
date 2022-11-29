<?php
if (isset($_POST['save'])) {
    include 'Connection.php';

    $cat = $_POST['cat'];
    $name = $_POST['name'];
    $link = $_POST['link'];

    $query = "INSERT INTO journal (cat,name,link) VALUES ('$cat','$name','$link')";
   if( $query_run = mysqli_query($con, $query)){
    echo '<script type="text/javascript">';
    echo 'alert("Uploaded successfully");';
    echo 'window.location.href = "journal_up.php";';
    echo '</script>';
   }
   else{
    echo '<script type="text/javascript">';
    echo 'alert("Failed!");';
    echo 'window.location.href = "journal_up.php";';
    echo '</script>';
   }
}
?>