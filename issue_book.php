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

    <button onclick="topFunction()" id="myBtn" title="Go to top"></button>

    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.php">HOME</a>
            </div>
            <font style="color: white"><span><strong>Welcome: <?php echo $_SESSION['name']; ?></strong></span></font>
            <font style="color: white"><span><strong>Email: <?php echo $_SESSION['email']; ?></strong></span></font>
            <ul class="nav navbar-nav navbar-right">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" data-toggle="dropdown">My Profile</a>
                    <div class="dropdown-menu">
                        <a class="dropdown-item" href="view_prof.php">View Profile</a>
                        <a class="dropdown-item" href="edit_pro.php"> Edit Profile</a>
                        <a class="dropdown-item" href="change_password.php">Change Password</a>
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
                <li class="nav-item">
                    <a href="journal_up.php" class="nav-link">Journals</a>
                </li>
            </ul>
        </div>
    </nav>

    <div class="py-3">
        <marquee>This is library Management System. Library opens at 8:00 AM and close at 8:00 PM</marquee>
    </div>

    <div class="container-fluid admin-dash text-light">
        <div class="container">
            <h3 class="text-center text-light pb-4">Issue Books</h3>
            <div class="row">
                <div class="col-md-4"></div>
                <div class="col-md-4">
                    <form action="" method="post">
                        <div class="form-group">
                            <label>Book Name:</label>
                            <input type="text" name="book_name" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Book Author:</label>
                            <select class="py-2 my-2" name="book_author">
                                <option class="text-dark">-Select author-</option>
                                <?php
                                include 'Connection.php';
                                $query = "select author_name from author";
                                $query_run = mysqli_query($con, $query);
                                while ($row = mysqli_fetch_assoc($query_run)) {
                                ?>
                                    <option><?php echo $row['author_name']; ?></option>
                                <?php
                                }
                                ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Book Number:</label>
                            <input type="text" name="book_no" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Student ID:</label>
                            <input type="text" name="student_id" class="form-control" required="">
                        </div>
                        <div class="form-group">
                            <label>Issue Date:</label>
                            <input type="text" name="issue_date" class="form-control" value="<?php echo date("yy-m-d"); ?>" required="">
                        </div>
                        <div class="form-group">
                            <label>Due Date:</label>
                            <input type="text" name="due_date" value="<?php echo date("yy-m-d"); ?>" class="form-control" required="">
                        </div>

                        <button class="btn btn-primary" name="issue_book">Issue Book</button>
                </div>
                </form>
            </div>
        </div>
    </div>
    </div>



    <footer class="bg-light text-center text-lg-start">
        <!-- Copyright -->
        <div class="text-center p-3 text-light bg-dark">
            © 2022 Copyright
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


<?php
if (isset($_POST['issue_book'])) {
    $book_no = $_POST['book_no'];
    $book_name = $_POST['book_name'];
    $book_author = $_POST['book_author'];
    $student_id = $_POST['student_id'];
    $issue_date = $_POST['issue_date'];
    $due_date = $_POST['due_date'];
    $query = "INSERT INTO issued_books(book_no,book_name,book_author,student_id,issue_date,due_date) VALUES ('$book_no','$book_name','$book_author','$student_id','$issue_date','$due_date')";

    // $query = "insert into issued_books values(null,'$_POST[book_no]','$_POST[book_name]','$_POST[book_author]',$_POST[student_id],'$_POST[issue_date]')";
    $query_run = mysqli_query($con, $query);
}
?>