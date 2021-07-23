<?php

//sucess
$success ='';
//Errors message
$fnameErr = "";
$lnameErr = "";
$emailErr = "";
$messageErr = "";


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
    
    if($fnameErr == '' && $lnameErr == '' && $emailErr == '' && $messageErr == '') {
        $success = 'Sucesso do Báu';
    }
    $output = array(
        'success' => $success,
        'fnameErr' => $fnameErr,
        'lnameErr' => $fnameErr,
        'emailErr' => $emailErr,
        'messageErr' => $messageErr
    );

    echo json_encode($output);

}

function checkInput($input) {
    $input = trim($input);
    $input = stripslashes($input);
    $input = htmlspecialchars($input);
    return $input;
}

?>