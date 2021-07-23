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


// $fnameErr = "";
// $lnameErr = "";
// $emailErr = "";
// $messageErr = "";
// $error = '';
// $tokenErr = '';
$response = '';

if(isset($_POST["submit"])) {
    $fname = checkInput($_POST["firstname"]);
    $lname = checkInput($_POST["lastname"]);
    $email = checkInput($_POST["email"]);
    $message = checkInput($_POST["message"]);
    $token = $_POST["g-recaptcha-response"];

    date_default_timezone_set('Etc/UTC');
    // require '../vendor/autoload.php';
    $isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) &&
        strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

    if(empty($fname)) {
        $response = [
            'message' => 'First name is required'
    ];
    } else if(!preg_match("/^[a-zA-ZÀ-Úà-ú ]*$/", $fname)) 
            {
                $response = [
                    'message' => 'Only letters and white space allowed'
                ];
            }

    //Last name server validation
    if(empty($lname)) {
        $response = [
            'message' => 'Last name is required'
        ];
    } else if(!preg_match("/^[a-zA-ZÀ-Úà-ú ]*$/", $lname)) 
            {
                $response = [
                    'message' => 'Only letters and white space allowed'
                ];
            }
    
    // //Email validation
    // if(empty($email)) {
    //     $response = 
    //     [
    //         'message' => 'Email is required'
    //     ];
    // } else
    //     {
    //         if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email))
    //         { //Talvez aplicar vilter_validate_email
    //             $response = 'Email format is not valid';
    //         }
    //     }

    if(empty($message)) {
        $response = [
            'message' => 'Message is required'
        ];
    } else if(!preg_match("/[a-z0-9À-Úà-ú ]+/", $message)) { //rever caso necessário
                $response = [
                    'message' => 'Only letters and white space allowed'
                ];
            }
    
        if( $fnameErr == '' && $lnameErr =='' && $emailErr == '' && $messageErr == '' ) {

            

            //Create a new PHPMailer instance
            $mail = new PHPMailer();
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io';
            $mail->SMTPAuth = true;
            $mail->CharSet = PHPMailer::CHARSET_UTF8;
            $mail->Username = 'b55e6690f39c76';
            $mail->Password = '9ff29f402fc929';
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = '2525';
     
            $mail->setFrom($email);
            $mail->addAddress('im@lusuke.com');

            $mail->isHTML(false);
            $mail->Subject = "Lusuke Site - Contact Page";
            $mail->Body = "Name: $fname \nEmail: $email \nMessage: $message";

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

            if ($captcha_success->success == false){
                echo "<p> You are a bot!</p>";
            }
            else if($captcha_success->success == true) {
                if(!$mail->send()) {
                    if($isAjax) {
                        http_response_code(500);
                    }
                    $response = [
                        "status" => false,
                        "message" => 'Sorry something went wrong. Please try again later'
                    ];
                } else {
                    $response = [
                        'status' => true,
                        'message' => 'Message sent! Thanks for Contacting us'
                    ];
                }
            }
        }
    if($isAjax) {
        while($linha = $response->empty > 0) {
            header('Content-type:application/json;charset=utf-8');
            $response[] = $linha;
            echo json_decode($response);
            exit();
        }
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
<h2 id="status-message">
    <?php if (isset($response)) {
        echo $response['message'];
    }
    ?>
</h2>
<form method="POST" id="contact-form">
    <label for="name">First Name: <input type="text" name="firstname" id="name"></label><br>
    <label for ="">Last Name: <input type="text" name="lastname" id="lname"></label><br>
    <label for="email">Email address: <input type="email" name="email" id="email"></label><br>
    <label for="message">Message: <textarea name="message" id="message" rows="8" cols="20"></textarea></label><br>
    <div class="g-recaptcha" data-sitekey="6LcJUYYbAAAAAPFrjJNQ0EHMhbYy_xpmf7VrkJjA"></div>
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
            // captcha: grecaptcha.getResponse()
        })
            .then(response => response.json())
            .then(response => {message.innerHTML = response.message})
            .then(response=> {form.reset()})
            .then(response => {btnDis.classList.remove('disabled')})
            // .then(btnDis.textContent = btnDis.getAttribute('data-original'))
            .then(response => {btnDis.textContent = 'Send'})
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