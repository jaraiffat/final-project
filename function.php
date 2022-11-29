<?php

function get_pdf_count()
{
    $con = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($con,"final");
    
    $pdf_count = "";
    $query = "select count(*) as pdf_count from files";
    $query_run =  mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($query_run)) {
        $pdf_count = $row['pdf_count'];
    }
    return ($pdf_count);
}


function get_jan_count()
{
    include 'Connection.php';
    
    $jan_count = "";
    $query = "select count(*) as jan_count from journal";
    $query_run =  mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($query_run)) {
        $jan_count = $row['jan_count'];
    }
    return ($jan_count);
}





?>