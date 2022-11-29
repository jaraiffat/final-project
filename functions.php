<?php
function get_user_count()
{
    include 'Connection.php';

    $user_count = "";
    $query = "select count(*) as user_count from users";
    $query_run =  mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($query_run)) {
        $user_count = $row['user_count'];
    }
    return ($user_count);
}



function get_book_count()
{

    // The Conncetion file occurs an error when we include it so I wrote it manually here //
    $con = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($con,"final");
    $book_count = "";
    $query = "select count(*) as book_count from books";
    $query_run =  mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($query_run)) {


        $book_count = $row['book_count'];
    }
    return ($book_count);
}


function get_catagory_count()
{
    $con = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($con,"final");
    $cat_count = "";
    $query = "select count(*) as cat_count from category";
    $query_run =  mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($query_run)) {


        $cat_count = $row['cat_count'];
    }
    return ($cat_count);
}



function get_auth_count()
{
    $con = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($con,"final");
    $auth_count = "";
    $query = "select count(*) as auth_count from author";
    $query_run =  mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($query_run)) {


        $auth_count = $row['auth_count'];
    }
    return ($auth_count);
}


function get_issued_book_count()
{
    $con = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($con,"final");
    $issued_book_count = "";
    $query = "select count(*) issued_book_count from issued_books";
    $query_run =  mysqli_query($con, $query);
    while ($row = mysqli_fetch_assoc($query_run)) {


        $issued_book_count = $row['issued_book_count'];
    }
    return ($issued_book_count);
}