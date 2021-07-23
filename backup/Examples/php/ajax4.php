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
    
</h2>
<form method="POST" id="contact-form">
    <label for="firstname">Name: <input type="text" name="firstname" class="form_data" id="fname"></label><br>
    <span class="text-danger" id="lname_error"></span>
    <label for="lastname">Last Name: <input type="text" class="form_data" name="lastname" id="lname"></label><br>
    <span class="text-danger" id="email_error"></span>
    <label for="email">Email address: <input type="email" class="form_data" name="email" id="email"></label><br>
    <span class="text-danger" id="message_error"></span>
    <label for="message">Message: <textarea name="message" class="form_data" id="message" rows="8" cols="20"></textarea></label><br>
    
    <div class="g-recaptcha" data-sitekey="6LcJUYYbAAAAAPFrjJNQ0EHMhbYy_xpmf7VrkJjA"></div><br>
    <button type="submit" class="btnSend" onclick="save_data(); return false;" value="Send">Send
</form>

<script type="application/javascript">

    function save_data() {

        const btnDis = document.querySelector('.btnSend')
        btnDis.classList.add('disabled');
        btnDis.setAttribute('data-original', btnDis.textContent);
        btnDis.textContent = 'Submiting...';
        // btnDis.textContent = btnDis.getAttribute('data-original');

        // const btnDis = document.querySelector('.btnSend')
        var form_element = document.getElementsByClassName('.form_data')
        var form_data = new FormData();
        console.log(form_element);

        for(var count = 0; count < form_element.length; count++){
            form_data.append(form_element[count].name, form_element[count].value);
        }
        console.log(form_data);

        var ajax_request = new XMLHttpRequest();
        ajax_request.open('POST', 'validex.php');
        ajax_request.send(form_data);
        console.log(ajax_request);

        ajax_request.onreadystatechange = function(){
            if(ajax_request.readyState == 4 && ajax_request.status == 200) {
                var response = JSON.parse(ajax_request.responseText);
                console.log(response);

                if(response.success != '') {
                    document.getElementById('contact-form').reset();

                    document.getElementById('status-message').innerHTML = response.response;

                    setTimeout(() => {
                        document.getElementById('status-message').innerHTML = '';
                    }, 5000);

                    document.getElementById('lname_error').innerHTML = '';
                    document.getElementById('fname_error').innerHTML = '';
                    document.getElementById('email_error').innerHTML = '';
                    document.getElementById('message_error').innerHTML = '';
                }
                else {
                    document.getElementById('lname_error').innerHTML = response.lnameErr;
                    document.getElementById('fname_error').innerHTML = response.fnameErr;
                    document.getElementById('email_error').innerHTML = response.emailErr;
                    document.getElementById('message_error').innerHTML = response.messageErr;
                }
            }
        }  

        // const formData = new FormData(form);
        // email(formData);

    }
</script>
<script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>
</html>