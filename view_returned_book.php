<?php
session_start();
if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: index.php");
    exit;
}

include 'Connection.php';

if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$num_per_page = 05;
$start_from = ($page - 1) * 05;

$query = mysqli_query($con, "select rnt.book_name,rnt.issue_date,due_date from rnt where student_id = $_SESSION[id] order by issue_date desc limit $start_from,$num_per_page");


?>
<!DOCTYPE html>
<html lang="en">

<head>

    <title>User Dashboard</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
    <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="tyle.css">
</head>


<body>

    <button onclick="topFunction()" id="myBtn" title="Go to top"></button>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">

        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="user_dashboard.php">HOME</a>
            </div>
            <font style="color: white"><span><strong>Welcome: <?php echo $_SESSION['name']; ?></strong></span></font>
            <font style="color: white"><span><strong>Email: <?php echo $_SESSION['email']; ?></strong></span></font>

            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="view_profile.php">View Profile</a>
                        <a class="dropdown-item" href="edit_profile.php"> Edit Profile</a>
                        <a class="dropdown-item" href="change_password.php">Change Password</a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="logout.php">Logout</a></li>
            </ul>
        </div>

    </nav>


    <div class="py-3">
        <marquee>Library opens at 8:00 AM and close at 8:00 PM</marquee>
    </div>



    <div class="container-fluid manage_books">
        <div class="container">
            <h3 class="text-center text-light pb-4">Returned Books</h3>
            <table class="table table-bordered table-striped table-hover table-secondary">
                <thead class="bg-dark text-light">
                    <tr class="text-center">
                        <th>#</th>
                        <th>Book Name</th>
                        <th>Issue Date</th>
                        <th>Due Date</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    include 'Connection.php';
                    $i = 1;
                    while ($row = mysqli_fetch_assoc($query)) { ?>
                        <tr class="text-center">
                            <td><?php echo $i++; ?></td>
                            <td><?php echo $row['book_name']; ?></td>
                            <td><?php echo $row['issue_date']; ?></td>
                            <td><?php echo $row['due_date']; ?></td>

                        </tr>
                </tbody>
            <?php
                    }
            ?>

            </table>

            <?php

            $pr_query  = "select * from rnt where student_id = $_SESSION[id]";
            $pr_result = mysqli_query($con, $pr_query);
            $total_record = mysqli_num_rows($pr_result);

            $total_pages = ceil($total_record / $num_per_page);


            if ($page > 1) {
                echo "<a href='view_returned_book.php?page=" . ($page - 1) . "' class='btn btn-danger mx-1 mb-5'>Previous</a>";
            }

            for ($i = 1; $i < $total_pages; $i++) {
                echo "<a href='view_returned_book.php?page=" . $i . "'class='btn btn-primary mx-1 mb-5'>" . $i . "</a>";
            }

            if ($i > $page) {
                echo "<a href='view_returned_book.php?page=" . ($page + 1) . "' class='btn btn-danger mx-1 mb-5'>Next</a>";
            }

            ?>
        </div>
    </div>

    <footer class="bg-light text-center text-lg-start my-0">
        <!-- Copyright -->
        <div class="text-center py-3 text-light bg-dark">
            © 2021 Copyright:
            <a class="text-light" href="https://www.istiaq66.codes/">Istiaq66.com</a>
            <a href="../contact.php">Contact us</a>
        </div>
        <!-- Copyright -->
    </footer>



    <script>
        //Get the button
        var mybutton = document.getElementById("myBtn");

        // When the user scrolls down 20px from the top of the document, show the button
        window.onscroll = function() {
            scrollFunction()
        };

        function scrollFunction() {
            if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
                mybutton.style.display = "block";
            } else {
                mybutton.style.display = "none";
            }
        }

        // When the user clicks on the button, scroll to the top of the document
        function topFunction() {
            document.body.scrollTop = 0;
            document.documentElement.scrollTop = 0;
        }
    </script>




</body>

</html>