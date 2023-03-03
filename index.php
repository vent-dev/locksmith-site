<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <script src="script.js" defer></script>
    <script src="index.php" defer></script>
    <title>Secure Solution</title>
    <link rel="icon" href="images/favicon.png">
    <script src="https://kit.fontawesome.com/ad421c78bd.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<script>
    <?php

    if ($_POST) {
        $user_email = "";
        $user_subject = "";
        $user_message = "";
        $email_body = "<div>"; 

        if (isset($_POST['user_email'])) {
            $user_email = str_replace(array("\r", "\n", "%0a", "%0d"), '', $_POST['user_email']);
            $user_email = filter_var($user_email, FILTER_VALIDATE_EMAIL);
            $email_body .= "<div><label>Sender Email:</label>&nbsp;<span>".$user_email."</span></div>";
        }

        if (isset($_POST['user_subject'])) {
            $user_subject = filter_var($_POST['user_subject'], FILTER_SANITIZE_STRING);
            $email_body .= "<div><label>Subject:<label>&nbsp;<span>".$user_subject."</span></div>";
        }

        if (isset($_POST['user_message'])) {
            $user_message = htmlspecialchars($_POST['user_message']);
            $email_body .= "<div><label>Message:<label>&nbsp;<span>".$user_message."</span></div>";
        }

        $recipient = ""; // place recieving email here

        $email_body .= "</div>";

        $headers = "MIME-Version: 1.0" . "\r\n"
        ."Content-type: text/html; charset=utf-8" . "\r\n"
        ."From " . $user_email . "\r\n";

        if (mail($recipient, $user_subject, $email_body, $headers)){
            $output = "Thankyou for contacting us! You should recieve a response within 24 hours.";
        } else {
            $output = "Something went wrong. Please try again or give us a call!";
        }
    }
    ?>
    </script>

    <div class="nav-bar">
        <img src="images/logo.png" alt="">
        <div class="nav-links">
            <ul>
                <li><a href="/">Home</a></li>
                <li><a href="#our-team">Our Team</a></li>
                <li><a href="#our-services">Our Services</a></li>
                <li><a href="/">Contact Us</a></li>
                <img src="images/facebook.svg" alt="" style="width: 2rem; margin: 0">
            </ul>
        </div>
    </div>

    <div class="slideshow-container">
        <div class="slides">
            <img src="images/slide-1.avif" alt="">
            <div class="slide-info">   
                <p class="slide-header">Lorem ipsum dolor</p>
                <p class="slide-description">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                <div class="slide-button">Call us: 48859939482858952924</div>
            </div>
        </div>
        <div class="slides">
            <img src="images/slide-2.avif" alt="">
            <div class="slide-info">   
                <p class="slide-header">Lorem ipsum dolor</p>
                <p class="slide-description">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                <div class="slide-button">Call us: 48859939482858952924</div>
            </div>
        </div>
        <div class="slides">
            <img src="images/slide-3.avif" alt="">
            <div class="slide-info">   
                <p class="slide-header">Lorem ipsum dolor</p>
                <p class="slide-description">Lorem ipsum dolor, sit amet consectetur adipisicing elit.</p>
                <div class="slide-button">Call us: 48859939482858952924</div>
            </div>
        </div>
    </div>

    <div class="content">
        <p class="content-header" id="our-team">Who We Are</p>
        <p class="content-description">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eius, ipsa quidem. Voluptas, voluptatibus veritatis esse sapiente eveniet fugiat. Tenetur, architecto possimus. Delectus fugiat cumque quae nobis dolor pariatur, odit veritatis!</p>
        <div class="our-team">
            <div class="member-1">
                <img src="images/person-1.jpg" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="member-2">
                <img src="images/person-2.jpg" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
            <div class="member-3">
                <img src="images/person-3.jpg" alt="">
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit.</p>
            </div>
        </div>
    </div>

    <div class="service-container">
        <p class="services-header">Our Services</p>
        <p class="services-description">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nesciunt cupiditate doloremque, autem recusandae corporis fugiat sunt debitis dolores placeat ipsa. Dolores excepturi veritatis obcaecati natus eum, error laudantium rem aliquam.</p>
        <div class="our-services" id="our-services">
            <div class="first-services">
                <div class="first-service">
                    <img src="images/service-1.avif" alt="">
                    <p>Residential and Commercial Emergency Lockouts</p>
                </div>
                <div class="second-service">
                    <img src="images/service-2.avif" alt="">
                    <p>Residential Lock Changes</p>
                </div>
            </div>
            <div class="second-services">
                <div class="third-service">
                    <img src="images/service-3.avif" alt="">
                    <p>CCTV Install</p>
                </div>
                <div class="fourth-service">
                    <img src="images/service-4.avif" alt="">
                    <p>Physical Security Consultation</p>
                </div>
            </div>
        </div>

        <button class="book-now"><a href="/">Book Now</a></button>
    </div>

    <div class="contact-us">
        <p class=contact-header>Contact Us</p>
        <div class="contact-form">
            <form action="index.php" method="POST">
                Email Address:
                <input type="text" id="email" name="user_email">
                Subject:
                <input type="text" id="subject" name="user_subject">
                Message:
                <textarea name="user_message" id="user_message" cols="100" rows="30"></textarea>
                <button type="submit">Submit</button>
                <p class="output"><?php echo $output ?></p>
            </form>
        </div>
    </div>

    <div class="footer">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Similique, tempora quidem! Maiores distinctio ratione maxime, necessitatibus sequi iusto rerum omnis nemo quis nisi iure cumque laborum qui minus veniam mollitia!
    </div>
</body>
</html>