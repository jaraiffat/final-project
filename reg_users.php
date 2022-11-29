<?php

session_start();
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("location: index.php");
    exit;
}
include 'Connection.php';
$name = "";
$email = "";
$mobile = "";
$address = "";
$password = "";


if (isset($_GET['page'])) {
    $page = $_GET['page'];
} else {
    $page = 1;
}

$num_per_page = 05;
$start_from = ($page - 1) * 05;

$query = "select * from users order by id desc  limit $start_from,$num_per_page";
?>

<!DOCTYPE html>
<html>

<head>
    <title>Admin Dashboard</title>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="bootstrap-4.4.1/css/bootstrap.min.css">
    <script type="text/javascript" src="bootstrap-4.4.1/js/juqery_latest.js"></script>
    <script type="text/javascript" src="bootstrap-4.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="../tyle.css">
</head>

<body>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">Library Management System(LMS)</a>
            </div>
            <font style="color: white"><span><strong>Welcome: <?php echo $_SESSION['name']; ?></strong></span></font>
            <font style="color: white"><span><strong>Email: <?php echo $_SESSION['email']; ?></strong></span></font>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="view_prof.php">View Profile</a>
                        <a class="dropdown-item" href="edit_pro.php"> Edit Profile</a>
                        <a class="dropdown-item" href="change_pass.php">Change Password</a>
                    </div>
                </li>
                <li class="nav-item"><a class="nav-link" href="../logout.php">Logout</a></li>
            </ul>
        </div>
    </nav>


    <nav class="navbar navbar-expand-lg navbar-light" style="background-color: #e3f2fd">
        <div class="container-fluid">
            <ul class="nav navbar-nav navbar-center">
                <li class="nav-item">
                    <a href="admin.php" class="nav-link">Dashboard</a>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown">Book</a>
                    <div class="dropdown-menu">
                        <a href="add_book.php" class="dropdown-item">Add New Book</a>
                        <a href="manage_book.php" class="dropdown-item">Manage Books</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown">Category</a>
                    <div class="dropdown-menu">
                        <a href="add_cat.php" class="dropdown-item">Add New Category</a>
                        <a href="manage_cat.php" class="dropdown-item">Manage Category</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown">Author</a>
                    <div class="dropdown-menu">
                        <a href="add_author.php" class="dropdown-item">Add New Author</a>
                        <a href="manage_author.php" href="" class="dropdown-item">Manage Authors</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="issue_book.php" class="nav-link">Issue Book</a>
                </li>
                <li class="nav-item">
                    <a href="pdf_up.php" class="nav-link">PDF Books</a>
                </li>
                <li class="nav-item">
                    <a href="journal_up.php" class="nav-link">Journals</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="py-3">
        <marquee>Welcome to library Management System. Library opens at 8:00 AM and close at 8:00 PM</marquee>
    </div>



    <div class="container-fluid manage_books">
        <div class="container">
            <h3 class="text-center text-light pb-4">Registered Users</h3>
            <table class="table table-bordered table-hover table-secondary">
                <thead class="bg-dark text-light">
                    <tr class="text-center">
                        <th>Name:</th>
                        <th>Email:</th>
                        <th>Mobile:</th>
                        <th>Address:</th>
                    </tr>
                </thead>
                <?php
                $query_run = mysqli_query($con, $query);
                while ($row = mysqli_fetch_assoc($query_run)) {
                    $name = $row['name'];
                    $email = $row['email'];
                    $mobile = $row['mobile'];
                    $address = $row['address'];
                ?>
                    <tr class=" text-center">
                        <td><?php echo $name; ?></td>
                        <td><?php echo $email; ?></td>
                        <td><?php echo $mobile; ?></td>
                        <td><?php echo $address; ?></td>
                    </tr>
                <?php
                }
                ?>

            </table>

            <?php

            $pr_query  = "select * from users";
            $pr_result = mysqli_query($con, $pr_query);
            $total_record = mysqli_num_rows($pr_result);

            $total_pages = ceil($total_record / $num_per_page);


            if ($page > 1) {
                echo "<a href='reg_users.php?page=" . ($page - 1) . "' class='btn btn-danger mx-1 mb-5'>Previous</a>";
            }

            for ($i = 1; $i < $total_pages; $i++) {
                echo "<a href='reg_users.php?page=" . $i . "'class='btn btn-primary mx-1 mb-5'>" . $i . "</a>";
            }

            if ($i > $page) {
                echo "<a href='reg_users.php?page=" . ($page + 1) . "' class='btn btn-danger mx-1 mb-5'>Next</a>";
            }

            ?>


        </div>
    </div>


    <footer class="bg-light text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3 text-light bg-dark">
            © 2021 Copyright:
            <a class="text-light" href="https://www.istiaq66.codes">Istiaq66.com</a>
            <a href="../contact.php">Contact us</a>
        </div>
        <!-- Copyright -->
    </footer>


</body>

</html>