<?php

    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;

    require_once 'phpmailer/Exception.php';
    require_once 'phpmailer/PHPMailer.php';
    require_once 'phpmailer/SMTP.php';

    $mail = new PHPMailer(true);
    $alert = '';

    if(isset($_POST['submit'])){
        $fname = $_POST['firstname'];
        $lname = $_POST['lastname'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];

        try{
            $mail->isSMTP();
            $mail->Host = 'smtp.mailtrap.io'; //gmail use: smtp.gmail.com
            $mail->CharSet = PHPMailer::CHARSET_UTF8;
            $mail->SMTPAuth = true;
            $mail->Username = 'b55e6690f39c76'; //gmail adress you want use
            $mail->Password = '9ff29f402fc929'; //your password gmail
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
            $mail->Port = '2525'; //gmail use: 587

            $mail->setFrom('richar.silvamacedo@gmail.com'); //gmail adress which you used as smtp
            $mail->addAddress('richar.silvamacedo@gmail.com'); // Email address where you want to receive emails

            $mail->isHTML(true);
            $mail->Subject = "$lname Say's Hello from - Contact Page";
            $mail->Body = "<h3>Name: $fname <br>Email: $email <br>Message : $message</h3>";

            $mail->send();
            $alert = '<div class="alert-sucess"><span>Thank you for contacting.</span></div>';

        } catch(Exception $e){
            $alert = '<div class="alert-error"><span>'.$e->getMessage().'</span></div>';
        }
    }

?>