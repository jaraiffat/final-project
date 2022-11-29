<?php
session_start();
if (!isset($_SESSION["logged_in"]) || $_SESSION["logged_in"] !== true) {
    header("location: index.php");
    exit;
}

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
                        <a href="manage_author.php" class="dropdown-item">Manage Authors</a>
                    </div>
                </li>
                <li class="nav-item">
                    <a href="issue_book.php" class="nav-link">Issue Book</a>
                </li>
                <li class="nav-item">
                    <a href="pdf_up.php" class="nav-link">PDF Books</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="py-3">
        <marquee>This is library Management System. Library opens at 8:00 AM and close at 8:00 PM</marquee>
    </div>

    <div class="container-fluid admin-dash">
        <div class="container">
            <h3 class="text-center text-light pb-4">Manage Category</h3>
            <table class="table thead-dark table-bordered table-hover table-secondary">
                <thead class="bg-dark text-light">
                    <tr class="text-center">

                        <th>ID</th>
                        <th>Category</th>
                        <th>Edit</th>
                        <th>Delete</th>

                    </tr>
                </thead>
                <?php
                include 'Connection.php';

                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }

                $num_per_page = 05;
                $start_from = ($page - 1) * 05;
                $query = "select * from category order by cat_id desc limit $start_from,$num_per_page";
                $query_run = mysqli_query($con, $query);
                while ($row = mysqli_fetch_array($query_run)) {
                ?>
                    <tr class=" text-center">

                        <td><?php echo $row['cat_id']; ?></td>
                        <td><?php echo $row['cat_name']; ?></td>
                        <td>
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#exampleModal<?php echo $row['cat_id'] ?>">
                                Edit
                            </button>

                        </td>
                        <td>
                            <a onclick="if (confirm('Delete selected item?')){return true;}else{event.stopPropagation(); event.preventDefault();};" class="btn btn-danger" href="cat_delete.php? bn=<?php echo $row['cat_id'] ?>">Delete</a>
                        </td>


                        <!-- Button trigger modal -->
                        <div class="modal fade" id="exampleModal<?php echo $row['cat_id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h2 class="modal-title" id="exampleModalLabel">Edit</h2>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">

                                        <form action="cat_edit.php" method="post" enctype="multipart/form-data">
                                            <?php

                                            $cat_id = $row['cat_id'];
                                            $select_query = "SELECT * FROM category where cat_id='$cat_id'";
                                            $result_edit = mysqli_query($con, $select_query);
                                            $result_edit_row = mysqli_fetch_row($result_edit);



                                            ?>
                                            <input book_id="cat_id" type="hidden" name="cat_id" value="<?php echo $result_edit_row[0] ?>">
                                            <div class="form-group">

                                                <label>Category</label>
                                                <input type="text" class="form-control" value="<?php echo $result_edit_row[1] ?>" required name="cat_name">

                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                                    <button onclick="confirm('Do you want to save changes?')" type="submit" class="btn btn-primary">Save changes</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </tr>
                <?php
                }
                ?>
            </table>

            <?php

            $pr_query  = "select * from category";
            $pr_result = mysqli_query($con, $pr_query);
            $total_record = mysqli_num_rows($pr_result);

            $total_pages = ceil($total_record / $num_per_page);


            if ($page > 1) {
                echo "<a href='manage_cat.php?page=" . ($page - 1) . "' class='btn btn-danger mx-1 mb-5'>Previous</a>";
            }

            for ($i = 1; $i < $total_pages; $i++) {
                echo "<a href='manage_cat.php?page=" . $i . "'class='btn btn-primary mx-1 mb-5'>" . $i . "</a>";
            }

            if ($i > $page) {
                echo "<a href='manage_cat.php?page=" . ($page + 1) . "' class='btn btn-danger mx-1 mb-5'>Next</a>";
            }

            ?>
        </div>
    </div>




    <footer class="bg-light text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3 text-light bg-dark">
            © 2021 Copyright:
            <a class="text-light" href="https://istiaq66.com/">Istiaq66.com</a>
        </div>
        <!-- Copyright -->
    </footer>


</body>

</html>