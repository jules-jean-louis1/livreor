<?php
include 'connect.php';

$valid = true;
$errors = array();

// Check if the form has been posted
if (isset($_POST['login'], $_POST['password'], $_POST['password_conf'])) {
    if (empty($_POST['login'])) {
        $valid = false;
        $errors['login'] = "Le champs login est vide.";
    }
    if (empty($_POST['password'])) {
        $valid = false;
        $errors['password'] = "Le champs password est vide.";
    }
    if (empty($_POST['password_conf'])) {
        $valid = false;
        $errors['password_conf'] = "Le champs confirmation du password est vide.";
    }
    /* if ($valid) {
        // The email address the email will be sent to
        $to = "business@example.com";
        // The email subject
        $subject = "Contact Form Submission";
        // Set the from and reply-to address for the email
        $headers = "From: website@example.com\r\n"
                 . "X-Mailer: PHP/" . phpversion();
        // Build the body of the email
        $mailbody = "The contact form has been filled out.\n\n"
                  . "Name: " . $_POST['name'] . "\n"
                  . "Email: " . $_POST['email'] . "\n"
                  . "Message:\n" . $_POST['message'];
        // Send the email
        mail($to, $subject, $mailbody, $headers);
        // Go to the thank you page
        header("location: thankyou.html");
        exit;
    } */
}

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Contact Us</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <form action="test2.php" method="post" accept-charset="utf-8">
        <fieldset>
            <legend>Contact Us</legend>
                <div class="error">
                    <?php foreach($errors as $message):?>
                        <div><?php echo htmlspecialchars($message); ?></div>
                    <?php endforeach; ?>
                </div>
            <div class="row">
                <input id="log" type="text" name="login" value="login" placeholder="Login">
            </div>
            <div class="row">
                <input id="log" type="password" name="password" value="password" placeholder="Password">
            </div>
            <div class="row">
                <input id="log" type="password" name="password_conf" value="password" placeholder="Confirmer le password">
            </div>
            <div class="row">
                <input type="submit" value="s'inscrire">
            </div>
        </fieldset>
    </form>
</body>
</html>