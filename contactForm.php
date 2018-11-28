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
        <div class="nav__logo">
            <a href="index.html">
                <img src="img/logobiale.svg">
            </a>
        </div>
        <ul class="nav__list">
            <li><a href="index.html">HOME</a></li>
            <li><a href="portfolio.html">WORK</a></li>
            <li><a href="contact.html">CONTACT</a>
        </ul>
    </nav>
    <div class="contactForm">
        <h1>Message has been sent!!</h1>
        <h1><a href="index.html">Back to the website.</a></h1>
    </div>

</body>

</html>





<?php 
    $name = $_POST['name'];
    $lastName = $_POST['lastName'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $email_from = 'nec87@wp.pl';
    
    $email_body = "User Name: $name,$lastName.\n".
                    "User Email: $email.\n".
                        "User Message: $message.\n";

    $to = "ocebeki@gmail.com";

    mail($to, $email, $email_body);
    header("Location: contact.html");


?>

<?php

    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        // access
        $secretKey = '6Lc2H3wUAAAAACSKawCnvRjqo8MC3nLmfzFOUTAJ';
        $captcha = $_POST['g-recaptcha-response'];

        if(!$captcha){
          echo '<p class="alert alert-warning">Please check the the captcha form.</p>';
          exit;
        }

        # FIX: Replace this email with recipient email
        $mail_to = "ocebeki@gmail.com";
        
        # Sender Data
        $subject = trim($_POST["subject"]);
        $name = str_replace(array("\r","\n"),array(" "," ") , strip_tags(trim($_POST["name"])));
        $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
        $phone = trim($_POST["phone"]);
        $message = trim($_POST["message"]);
        
        if ( empty($name) OR !filter_var($email, FILTER_VALIDATE_EMAIL) OR empty($phone) OR empty($subject) OR empty($message)) {
            # Set a 400 (bad request) response code and exit.
            http_response_code(400);
            echo '<p class="alert alert-warning">Please complete the form and try again.</p>';
            exit;
        }

        $ip = $_SERVER['REMOTE_ADDR'];
        $response=file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=".$secretKey."&response=".$captcha."&remoteip=".$ip);
        $responseKeys = json_decode($response,true);

        if(intval($responseKeys["success"]) !== 1) {
          echo '<p class="alert alert-warning">Please check the the captcha form.</p>';
        } else {
            # Mail Content
            $content = "Name: $name\n";
            $content .= "Email: $email\n\n";
            $content .= "Phone: $phone\n";
            $content .= "Message:\n$message\n";

            # email headers.
            $headers = "From: $name <$email>";

            # Send the email.
            $success = mail($mail_to, $subject, $content, $headers);
            if ($success) {
                # Set a 200 (okay) response code.
                http_response_code(200);
                echo '<p class="alert alert-success">Thank You! Your message has been sent.</p>';
            } else {
                # Set a 500 (internal server error) response code.
                http_response_code(500);
                echo '<p class="alert alert-warning">Oops! Something went wrong, we couldnt send your message.</p>';
            }
        }

    } else {
        # Not a POST request, set a 403 (forbidden) response code.
        http_response_code(403);
        echo '<p class="alert alert-warning">There was a problem with your submission, please try again.</p>';
    }

?>

