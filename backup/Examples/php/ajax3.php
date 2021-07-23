<?php

/**
 * This example shows how to handle a simple contact form safely.
 */

//Import PHPMailer class into the global namespace
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require_once 'phpmailer/Exception.php';
require_once 'phpmailer/PHPMailer.php';
require_once 'phpmailer/SMTP.php';

//Don't run this unless we're handling a form submission
if (array_key_exists('email', $_POST)) {
    date_default_timezone_set('Etc/UTC');
    // require '../vendor/autoload.php';
    $isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

    $token = $_POST['g-recaptcha-response'];

    //Create a new PHPMailer instance
    $mail = new PHPMailer();
    //Send using SMTP to localhost (faster and safer than using mail()) – requires a local mail server
    //See other examples for how to use a remote server such as gmail
    $mail->isSMTP();
    $mail->Host = 'smtp.mailtrap.io';
    $mail->Port = '2525';
    $mail->CharSet = PHPMailer::CHARSET_UTF8;
    $mail->SMTPAuth = true;
    $mail->Username = 'b55e6690f39c76'; //gmail adress you want use
    $mail->Password = '9ff29f402fc929'; //your password gmail
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;

    //Use a fixed address in your own domain as the from address
    //**DO NOT** use the submitter's address here as it will be forgery
    //and will cause your messages to fail SPF checks
    $mail->setFrom('from@example.com', 'First Last');
    //Choose who the message should be sent to
    //You don't have to use a <select> like in this example, you can simply use a fixed address
    //the important thing is *not* to trust an email address submitted from the form directly,
    //as an attacker can substitute their own and try to use your form to send spam
    $addresses = [
        'sales' => 'sales@example.com',
        'support' => 'support@example.com',
        'accounts' => 'accounts@example.com',
    ];
    //Validate address selection before trying to use it
    if (array_key_exists('dept', $_POST) && array_key_exists($_POST['dept'], $addresses)) {
        $mail->addAddress($addresses[$_POST['dept']]);
    } else {
        //Fall back to a fixed address if dept selection is invalid or missing
        $mail->addAddress('support@example.com');
    }
    //Put the submitter's address in a reply-to header
    //This will fail if the address provided is invalid,
    //in which case we should ignore the whole request
    if ($mail->addReplyTo($_POST['email'], $_POST['name'])) {
        $mail->Subject = 'PHPMailer contact form';
        //Keep it simple - don't use HTML
        $mail->isHTML(false);
        //Build a simple message body
        $mail->Body = <<<EOT
        Email: {$_POST['email']}
        Name: {$_POST['name']}
        Message: {$_POST['message']}
        EOT;
        $url = 'https://www.google.com/recaptcha/api/siteverify';
        $data = array(
            'secret' => '6LcJUYYbAAAAAGn_BTk7s6qFLlwkr3okDwP6QhWo',
            'response' => $_POST["g-recaptcha-response"]
        );
        $options = array(
            'http' => array(
                'method' => 'POST',
                'content' => http_build_query($data)
            )
        );

        $context = stream_context_create($options);
        $verify = file_get_contents($url, false, $context);
        $captcha_success = json_decode($verify);

        if($captcha_success->success == true) {
            if(!$mail->send()){
                if($isAjax) {
                    http_response_code(500);
                }

                $response = [
                    "status" => false,
                    "message" => 'Sorry something went wrong. Please try again later'
                ];
            } 
                else {
                    $response = [
                        "status" => true,
                        "message" => 'Message sent! Thanks for contacting me.'
                        ];
                }
        } else {
            $response = [
                "status" => false,
                "message" => 'Invalid captcha.'
             ];
            }
    } else {
        $response = [
            "status" => false,
            "message" => 'Invalid email address, message igonored.'
         ];
        }
    if($isAjax) {
        header('Content-type:application/json;charset=utf-8');
        echo json_encode($response);
        exit();
    }

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact form</title>
    <style>
        button.disabled,
        button[disabled]{
            box-shadow: none;
            cursor: not-allowed;
            opacity: 0.5;
            pointer-events: none;
        }
    </style>
</head>
<body>
<h1>Contact us</h1>
<h2 id="status-message"><?php if (isset($response)) {
    echo $response['message'];
                        }?></h2>
<form method="POST" id="contact-form">
    <label for="name">Name: <input type="text" name="name" id="name"></label><br>
    <label for="email">Email address: <input type="email" name="email" id="email"></label><br>
    <label for="message">Message: <textarea name="message" id="message" rows="8" cols="20"></textarea></label><br>
    <label for="dept">Send query to department:</label>
    <select name="dept" id="dept">
        <option value="sales">Sales</option>
        <option value="support" selected>Technical support</option>
        <option value="accounts">Accounts</option>
    </select><br>
    <div class="g-recaptcha" data-sitekey="6LcJUYYbAAAAAPFrjJNQ0EHMhbYy_xpmf7VrkJjA"></div><br>
    <button type="submit" class="btnSend" value="Send">Send
</form>

<script type="application/javascript">
    const form = document.getElementById("contact-form")
    const btnDis = document.querySelector('.btnSend')

    function email(data) {
        const message = document.getElementById("status-message")
        fetch("", {
            method: "POST",
            body: data,
            headers: {
               'X-Requested-With' : 'XMLHttpRequest'
            }
        })
            .then(response => response.json())
            .then(response => {message.innerHTML = response.message})
            .then(response=> {form.reset()})
            .then(response => {btnDis.classList.remove('disabled')})
            // .then(btnDis.textContent = btnDis.getAttribute('data-original'))
            .then(response => {btnDis.textContent = 'Send'})
            .then(response => {grecaptcha.reset()})
            .catch(error => {
                error.json().then(response => {
                    message.innerHTML = response.message
                })
            })
    }
    const submitEvent = form.addEventListener("submit", (event) => {
        event.preventDefault();
        btnDis.classList.add('disabled');
        btnDis.setAttribute('data-original', btnDis.textContent);
        btnDis.textContent = 'Submiting...';
        // btnDis.textContent = btnDis.getAttribute('data-original');
        

        const formData = new FormData(form);

        email(formData);
    })
</script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>