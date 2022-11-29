<?php
$message_sent = false;
if (isset($_POST['email']) && $_POST['email'] != '') {

    if (filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {  //submit the form


        $username = $_POST['name'];
        $useremail = $_POST['email'];
        $subject = $_POST['subject'];
        $message = $_POST['message'];

        $to = "c191051@ugrad.iiuc.ac.bd";
        $body = "";

        $body .= "From: " . $username . "\r\n";
        $body .= "Email: " . $useremail . "\r\n";
        $body .= "Message: " . $message . "\r\n";

    //    mail($to, $subject, $body);
   
        $message_sent = true;
    } else {
        $invalied_class_name = "form invalied";
    }
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="contact.css" media="all">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="main.js"></script>
</head>

<body>

    <?php
    if ($message_sent) :
    ?>

        <h3> Thanks, We will be in touch </h3>

    <?php
    else :
    ?>



        <div class="container">
            <form action="contact.php" method="POST" class="form">
                <h1 style="color: cadetblue;">Contact Form</h1>
                <div class="form-group">
                    <label for="name" class="form-label">Your Name</label>
                    <input type="text" class="form-control" id="name" name="name" placeholder="Karim" tabindex="1" required>
                </div>
                <div class="form-group">
                    <label for="email" class="form-label">Your Email</label>
                    <input type="email" <?= $invalied_class_name ?? "" ?> class="form-control" id="email" name="email" placeholder="Karim@gmail.com" tabindex="2" required>
                </div>
                <div class="form-group">
                    <label for="subject" class="form-label">Subject</label>
                    <input type="text" class="form-control" id="subject" name="subject" placeholder="Hello There!" tabindex="3" required>
                </div>
                <div class="form-group">
                    <label for="message" class="form-label">Message</label>
                    <textarea class="form-control" rows="5" cols="50" id="message" name="message" placeholder="Enter Message..." tabindex="4"></textarea>
                </div>
                <div>
                    <button type="submit" class="btn">Send Message!</button>
                </div>
            </form>
        </div>

    <?php
    endif;
    ?>

</body>


</html>