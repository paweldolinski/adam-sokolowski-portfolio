<!doctype html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/main.css" type="text/css" rel="stylesheet">

    <title>Validation form success</title>
</head>

<body>
    <nav class="nav">
        <div class="nav__wrapper">
            <div class="nav__logo">
                <a href='index.html'>
                    <h1>ADAM SOKOLOWSKI</h1>
                </a>
            </div>
            <div class="nav__toggleBtn">
                <span></span>
                <span></span>
                <span></span>
            </div>
            <ul>
                <li><a href="index.html">HOME</a></li>
                <li><a href="about.html">ABOUT ME</a></li>
                <li><a href="portfolio.html">PORTFOLIO</a></li>
                <li><a href="contact.html">CONTACT</a></li>
            </ul>
        </div>
    </nav>
    <div class="contactForm">
        <h1>Message has been sent!!</h1>
        <button><a href="index.html">Back to the website.</a></button>
    </div>

</body>

</html>


<?php 
    $name = $_POST['name'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $email_from = '';
    
    $email_body = "User Name: $name,$lastName.\n".
                    "User Email: $email.\n".
                        "User Message: $message.\n";

    $to = "asfotarto@gmail.com";

    mail($to, $email, $email_body);
    header("Location: contact.html");
?>