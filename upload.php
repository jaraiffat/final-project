<?php

include 'Connection.php';

if (isset($_POST['save'])) {
   

 

    $filename = $_FILES['myfile']['name'];


    $destination = '../uploads/' . $filename;

 
    $extension = pathinfo($filename, PATHINFO_EXTENSION);


    $file = $_FILES['myfile']['tmp_name'];
    $size = $_FILES['myfile']['size'];
    
    
    $number =$size/ (float) 1000000.00;
    $mb = round($number, 2);

    if (!in_array($extension, ['zip', 'pdf', 'docx'])) {
        echo '<script type="text/javascript">';
        echo 'alert("You file extension must be .zip, .pdf or .docx");';
        echo 'window.location.href = "pdf_up.php";';
        echo '</script>';
    } else if ($mb > 20) { // file shouldn't be larger than 10Megabyte
        echo '<script type="text/javascript">';
        echo 'alert("File too large!");';
        echo 'window.location.href = "pdf_up.php";';
        echo '</script>';
    } else {
    
        if (move_uploaded_file($file, $destination)) {
            $sql = "INSERT INTO files (name, size, downloads) VALUES ('$filename', '$mb', '$destination')";
            if (mysqli_query($con, $sql)) {
                echo '<script type="text/javascript">';
                echo 'alert("File uploaded successfully");';
                echo 'window.location.href = "pdf_up.php";';
                echo '</script>';
            }
        } else {
            echo '<script type="text/javascript">';
            echo 'alert("Failed to upload file!");';
            echo 'window.location.href = "pdf_up.php";';
            echo '</script>';
        }
    }
}
