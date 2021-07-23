<?php include 'validar.php'; ?> 

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="title" content="Lucas Sukeyosi • Design and Economist">
    <meta name="description"
        content="This is Lucas Sukeyosi's resume. • You can either check online or download the pdf version on about page">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://lusuke.com">
    <meta property="og:title" content="Lucas Sukeyosi • Design and Economist">
    <meta property="og:description"
        content="This is Lucas Sukeyosi's resume. • You can either check online or download the pdf version on about page">
    <meta property="og:image" content="https://lusuke.com/lucas-sukeyosi.jpg">
    <meta property="og:locale" content="en_US">
    <meta property="og:site_name" content="lusuke">
    <meta property="twitter:card" content="summary_large_image">
    <meta property="twitter:url" content="https://lusuke.com">
    <meta property="twitter:title" content="Lucas Sukeyosi • Design and Economist">
    <meta property="twitter:image" content="https://lusuke.com/lucas-sukeyosi.jpg">
    <meta name="twitter:site" content="@lusuke">
    <meta name="twitter:image:src" content="https://lusuke.com/lucas-sukeyosi.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Lucas Sukeyosi • Design and Economist">
    <meta name="twitter:description"
        content="This is Lucas Sukeyosi's resume. • You can either check online or download the pdf version on about page">
    <meta name="keywords" content="ui developer, ux developer, ui designer, web designer, designer, economist">
    <meta name="author" content="Lucas Sukeyosi">
    <meta property="twitter:description" content="Website Lucas Sukeyosi - Designer with a degree in Economics">
    <link rel="stylesheet" href="https://lusuke.com.br/site/v1/about.1fc1036c.css">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&amp;family=Syncopate:wght@400;700&amp;display=swap"
        rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css">
    <title>Lusuke</title>
    <style>
        .general--errors {
            background-color: #E40;
            color: #FFFFFF;
            font-size: 24px;
            font-weight: 600;
            padding: 5px 5px;
            position: absolute;
            top: 0;
            left: 0;
        }
        .general--sucess {
            background-color: #1C1;
            color: #FFFFFF;
            font-size: 24px;
            font-weight: 600;
            padding: 5px 5px;
            position: absolute;
            top: 0;
            right: 0;
        }
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
    <header class="menu"><a class="menu__logotype" href="https://lusuke.com.br/site/v1/index.html"><img
                class="menu__logotype--mobile" src="https://lusuke.com.br/site/v1/icon-logo.0ec3ab2c.svg"
                alt="Lusuke Website"><img class="menu__logotype--desktop"
                src="https://lusuke.com.br/site/v1/lusuke__logo--desktop.1847ef81.svg" alt="Lusuke Website"></a><label
            for="menu__mob">&#9776;</label><input class="menu--mobile" type="checkbox" name="menu__mob" id="menu__mob">
        <nav class="menu--nav">
            <ul class="menu__navigation">
                <li class="menu__item"><a class="menu__link" href="https://lusuke.com.br/site/v1/work.html">work</a>
                </li>
                <li class="menu__item"><a class="menu__link" href="https://lusuke.com.br/site/v1/about.html">about</a>
                </li>
                <li class="menu__item"><a class="menu__link" href="https://lusuke.com.br/site/v1/contact.html">say
                        hello</a></li>
            </ul>
        </nav>
    </header>
    <main class="main">
        <section class="main__page">
            <h1 class="main__page--title">Contact me</h1>
            <p class="main__page--desc"><strong>I’d love to hear from you,</strong> feel free <span
                    class="main--green">to send me an email</span> for more information, trade some ideas, or just talk
                about life. </p><a class="main__goto" href="#">
                <div class="main__circle">
                    <div class="main__circle--right"></div>
                    <div class="main__circle--left"></div>
                </div>Keep scrolling
            </a>
        </section>
        <section class="main__form">
            <form class="main__form--contact" id="contact-form" method="post">
                <div class="main__form--grid">
                    <label class="main__form--label" for="firstname">First name</label>
                     <input class="main__form--input form--field" type="text" name="firstname" id="firstname" required
                        placeholder="Enter your first name please">
                        <span class="fname--error"></span>
                </div>

                <div class="main__form--grid">
                    <label class="main__form--label" for="lastname">Last Name</label>
                    <input class="main__form--input form--field" type="text" name="lastname" id="lastname" required
                        placeholder="What is your surname?">
                        <span class="lname--error"></span>
                </div>
                <div class="main__form--grid">
                    <label class="main__form--label" for="email">Email</label>
                    <input class="main__form--input form--field" type="email" name="email" id="email"
                        required
                        placeholder="Enter your email that I can reach you back!">
                        <span class="email--error"></span>
                </div>

                <div class="main__form--grid">
                    <label class="main__form--label" for="phone">Phone number</label>
                    <input class="main__form--input form--field" type="tel" name="phone" id="phone" placeholder="This one is optional">
                </div>

                <div class="main__form--grid">
                    <label class="main__form--label" for="message">Message</label>
                    <textarea class="main__form--textarea form--field" name="message" id="message" cols="30" rows="10" required
                            placeholder="Say hello! Enter your message">
                    </textarea>
                    <span class="message--error"></span>
                </div>

                <div class="main__form--grid">
                    <label class="main__form--label" for="email">Captcha</label>
                    <div class="g-recaptcha form--field" data-sitekey="6LcJUYYbAAAAAPFrjJNQ0EHMhbYy_xpmf7VrkJjA"></div>
                    <span class="captcha--error"></span>
                </div>

                <!-- <div></div> -->
                <button onclick="send_email(); return false;" class="main__form--submit" name="submit" type="submit">send<i
                        class="bi bi-arrow-right main__form--icon"></i></button>
            </form>
        </section>

            <!-- Erro -->
            <span class="general--errors"></span>
            <!-- Sucesso -->
            <span class="general--success"></span>

    </main>
    <footer class="footer">
        <div class="footer__items footer__logo"><img
                src="https://lusuke.com.br/site/v1/lusuke__logo--footer.bf27fd48.png" alt="Lusuke Website" width="114"
                height="43">
            <p class="padding-48">&copy; 2021 – Some rights reserved. Lucas Sukeyosi aka lusuke. Website typefaces: <a
                    class="main--green" href="https://fonts.google.com/specimen/Syncopate" target="_blank"
                    rel="nofollow noopener noreferrer">Syncopate</a> & <a class="main--green"
                    href="https://fonts.google.com/specimen/Lato" target="_blank"
                    rel="nofollow noopener noreferrer">Lato</a>. A sincere thanks to <a class="main--green"
                    href="https://github.com/richarallan" target="_blank" rel="nofollow noopener noreferrer">Richar</a>
                that borrow his expertise in development, made it possible.</p>
        </div>
        <div class="footer__items">
            <p class="footer__items--text">You scroll it All the way Through</p>
            <ul class="footer__menu">
                <li><a href="https://lusuke.com.br/site/v1/work.html">work</a></li>
                <li><a href="https://lusuke.com.br/site/v1/about.html">about</a></li>
                <li><a href="https://lusuke.com.br/site/v1/contact.html">Lets Talk</a></li>
            </ul>
        </div>
        <div class="footer__items footer--align">
            <p class="footer__items--text">Let's drink a e-coffee</p>
            <ul class="footer__socialm">
                <li> <a href="https://www.instagram.com/sukeyosi/" target="_blank" rel="nofollow noopener noreferrer"><i
                            class="bi bi-instagram"></i><span>/sukeyosi</span></a></li>
                <li> <a href="https://www.linkedin.com/in/sukeyosi/" target="_blank"
                        rel="nofollow noopener noreferrer"><i class="bi bi-linkedin"></i><span>/sukeyosi</span></a></li>
                <li> <a href="https://twitter.com/lusuke" target="_blank" rel="nofollow noopener noreferrer"><i
                            class="bi bi-twitter"></i><span>/lusuke</span></a></li>
            </ul>
        </div>
    </footer>
    <script type="text/javascript">

        function send_email(){
            const form_element = document.getElementsByClassName('form--field');
            const form_data = new FormData();
            const btnDis = document.querySelector('.main__form--submit');

            for(var count = 0; count < form_element.length; count++){
                form_data.append(form_element[count].name, form_element[count].value);
            }

            const ajax_request = new XMLHttpRequest();
            ajax_request.open('POST', 'validar.php');
            ajax_request.send(form_data);

            ajax_request.onreadystatechange = function(){
                if(ajax_request.readyState == 4 && ajax_request.status == 200){
                    //Alterar essa parte, porque disable é bad
                    btnDis.classList.remove('disabled');
                    btnDis.textContent = btnDis.getAttribute('data-original');
                    btnDis.textContent = 'Send';

                    var response = JSON.parse(ajax_request.responseText);
                    if(response.success != '')
                    {
                        document.getElementById('contact-form').reset();
                        document.getElementById('general--success').innerHTML = response.success;
                    }

                    setTimeout(function(){
                        document.getElementClassName('general--errors').innerHTML = '';
                    }, 5000);

                    document.getElementClassName('fname--error').innerHTML = '';
                    document.getElementClassName('lname--error').innerHTML = '';
                    document.getElementClassName('email--error').innerHTML = '';
                    document.getElementClassName('message--error').innerHTML = '';
                    // document.getElementClassName('captcha--error').innerHTML = '';
                }
                else{
                    //display error
                    document.getElementClassName('fname--error').innerHTML = response.fnameErr;
                    document.getElementClassName('lname--error').innerHTML = response.lnameErr;
                    document.getElementClassName('email--error').innerHTML = response.emailErr;
                    // document.getElementClassName('captcha--error').innerHTML = response.captchaErr;
                }
            }
        }

    // const submitEvent = form.addEventListener('submit', (event) => {
    //     event.preventDefault();
    //     btnDis.classList.add('disabled');
    //     btnDis.setAttribute('data-original', btnDis.textContent);
    //     btnDis.textContent = 'Submiting...';

    //     const formData = new formData();
    //     //call function
    //     email(formData);

    // })


    </script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
</body>

</html>