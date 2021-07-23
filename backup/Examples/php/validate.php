<?php

    //Impot the phpmailer
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require_once 'phpmailer/Exception.php';
    require_once 'phpmailer/PHPMailer.php';
    require_once 'phpmailer/SMTP.php';

//Errors message
$fnameErr = "";
$lnameErr = "";
$emailErr = "";
$messageErr = "";

$alert ="";

if(isset($_POST["submit"])) {
    $fname = checkInput($_POST["firstname"]);
    $lname = checkInput($_POST["lastname"]);
    $email = checkInput($_POST["email"]);
    $message = checkInput($_POST["message"]);

    //First Name Server validate
    if(empty($fname)) {
        $fnameErr = 'First name is required';
    } else
        {
            if(!preg_match("/^[a-zA-ZÀ-Úà-ú ]*$/", $fname)) 
            {
                $fnameErr = 'Only letters and white space allowed';
            }
        }

    //Last name server validation
    if(empty($lname)) {
        $lnameErr = 'Last name is required';
    } else
        {
            if(!preg_match("/^[a-zA-ZÀ-Úà-ú ]*$/", $lname)) 
            {
            $lnameErr = 'Only letters and white space allowed';
            }
        }
    
    //Email validation
    if(empty($email)) {
        $emailErr = 
        'Email is required';
    } else
        {
            if(!preg_match("/^([a-z0-9\+_\-]+)(\.[a-z0-9\+_\-]+)*@([a-z0-9\-]+\.)+[a-z]{2,6}$/ix", $email))
            { //Talvez aplicar vilter_validate_email
                $emailErr = 'Email format is not valid';
            }
        }

    if(empty($message)) {
        $messageErr = 'Message is required';
    } else
        {
            if(!preg_match("/[a-z0-9À-Úà-ú ]+/", $message)) { //rever caso necessário
                $messageErr = 'Only letters and white space allowed';
            }
        }

    if( $fnameErr == '' && $lnameErr =='' && $emailErr == '' && $messageErr == '' ) {

        try {
            //phpmailer variables
            $mail = new PHPMailer(true);

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
     
            //google capctcha
            $response = $_POST["g-recaptcha-response"];
            $url = 'https://www.google.com/recaptcha/api/siteverify';
            $data = array(
                'secret'=> '6LcJUYYbAAAAAGn_BTk7s6qFLlwkr3okDwP6QhWo',
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
     
             if($captcha_success->success==false) {
                 echo "Captcha wrong";
             } else if ($captcha_success->success==true) {
                 if($mail->send()) {
                     $alert = '
                     <div class="alert-sucess">
                         <span>Thank for contacting</span>
                     </div>';
                 } else {
                    echo 'something Wrong';
                 }
             }
     
        } catch (Exception $e) {
             $alert='
                 <div class="alert-error">
                     <span>'. $e->getMessage().'<span>
                 </div>';
        }
    }

}

function checkInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

?>