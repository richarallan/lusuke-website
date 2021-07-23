<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require_once 'phpmailer/Exception.php';
    require_once 'phpmailer/PHPMailer.php';
    require_once 'phpmailer/SMTP.php';

    $mail = new PHPMailer(true);
    // $alert = '';

    if(isset($_POST['name'])){
        $fname = checkInput($_POST["firstname"]);
        $lname = checkInput($_POST["lastname"]);
        $email = checkInput($_POST["email"]);
        $message = checkInput($_POST["message"]);
        $token = $_POST['g-recaptcha-response'];
        //Erros
        $fnameErr = '';
        $lnameErr = '';
        $emailErr = '';
        $messageErr = '';
        $success = '';

        //Hugo Ways
        // if(!isset($_SERVER['HTTP_X_REQUESTED_WITH']) AND strlower($_SERVER[HTTP_X_REQUEST_WITH]) != 'xmlhttprequest') {
        //     $output = json_encode(array(
        //         'type' => 'error',
        //         'message' => 'The request needed ajax'
        //     ));
        //     die($output);
        // }

        // $isAjax = !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';

        //Will be remove
        if(empty($fname)) {
            $fnameErr = "First name is required";
        }else if(!preg_match("/^[a-zA-ZÀ-Úà-ú ]*$/", $fname)) 
        {
            $fnameErr = "Only letters and white space allowed";
        }
            
        if(empty($lname)) {
            $lnameErr = "First name is required";
        }else if(!preg_match("/^[a-zA-ZÀ-Úà-ú ]*$/", $lname)) 
        {
            $lnameErr = "Only letters and white space allowed";
        }  
        
        if(empty($email)) {
            $emailErr = "email is required";
        }else if(!filter_var($email, FILTER_VALIDATE_EMAIL)) 
        {
            $emailErr = "Please sign in with a valid email";
        }
        
        if(empty($message)) {
            $messageErr = "Message is required to know your request";
        }

        if(empty($fnameErr) && empty($lnameErr) && empty($emailErr) && empty($messageErr)) {
            
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io'; //gmail use: smtp.gmail.com
            $mail->CharSet = PHPMailer::CHARSET_UTF8;
            $mail->SMTPAuth = true;
            $mail->Username = 'b55e6690f39c76'; //gmail adress you want use
            $mail->Password = '9ff29f402fc929'; //your password gmail
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = '2525'; //gmail use: 587

            $mail->setFrom($email); //gmail adress which you used as smtp
            $mail->addAddress('iam@lusuke.com'); // Email address where you want to receive emails

            $mail->isHTML(true);
            $mail->Subject = "$lname Say's Hello from - Contact Page";
            $mail->Body = "<h3>Name: $fname <br>Email: $email <br>Message : $message</h3>";

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
                if($mail->send()) {
                    $success = '<div>Message Sent! yaya</div>';
                } else {
                    $success = 'Something went wrong';
                }
            } 
            else {
                $output = 'Invalid Captcha';
            }
        }
        $output = array(
            'success' => $success,
            'fnameErr' => $fnameErr,
            'lnameErr' => $lnameErr,
            'emailErr' => $emailErr,
            'messageErr' => $messageErr
        );

        echo json_encode($output);

        //Try do move this to ajaxOutput
        // echo json_encode($output);
        //IN CHECK
        // else {
        //     $response = [
        //         "status" => false,
        //         "message" => 'Invalid email address, message igonored.'
        //      ];
        //     }
        //Ajax
        // if($isAjax) {
        //     header('Content-type:application/json;charset=utf-8');
        //     echo json_encode($response);
        //     echo json_encode($output);
        //     exit();
        // }
        
    }

    //function trim fields
    function checkInput($input) {
        $input = trim($input);
        $input = stripslashes($input);
        $input = htmlspecialchars($input);
        return $input;
    }


?>