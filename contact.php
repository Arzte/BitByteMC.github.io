<?php
    function mail_sent_correctly() {
        if (!isset($_POST["name"]) || !isset($_POST["email"]) || !isset($_POST["content"])) {
            return false;
        }
        $name = $_POST["name"];
        $email = $_POST["email"];
        $message = $_POST["content"];
        if ($name == "") {
            return false;
        }
        if ($email == "") {
            return false;
        }
        if (strlen($message) < 32) {
            return false;
        }
        $to = "contact@bytelab.pw";
        $subject = substr($message, 0, 32) . "...";
        $body = "From: $name<br/>Reply: $email<br/><br/>$message";
        $headers = "From: $name <$email>" . "\r\n";
        $headers .= "Reply-To: $email" . "\r\n";
        $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
        return @mail($to, $subject, $body, $headers) ? true : false;
    }
?>
<!DOCTYPE HTML>
<html>
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Byte Lab Innovations</title>
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/pure/0.5.0/pure-min.css">
    <link rel="stylesheet" href="style.css">
    <link rel="shortcut icon" href="logo.ico" type="image/x-icon">
    <link rel="icon" href="logo.ico" type="image/x-icon">
    <div class="byte-logo">
      <svg
         xmlns="http://www.w3.org/2000/svg"
         xmlns:cc="http://creativecommons.org/ns#"
         xmlns:dc="http://purl.org/dc/elements/1.1/"
         xmlns:rdf="http://www.w3.org/1999/02/22-rdf-syntax-ns#"
         xmlns:svg="http://www.w3.org/2000/svg"
         xmlns:xlink="http://www.w3.org/1999/xlink"
         version="1.1" width="200" height="170">
         <defs id="defs">
            <linearGradient id="glare-grad" x1="1" y1="1" x2="0" y2="0">
               <stop offset="0" stop-color="white" stop-opacity="0" />
               <stop offset="0.5" stop-color="white" stop-opacity="1" />
               <stop offset="0.5" stop-color="white" stop-opacity="0" />
               <stop offset="1" stop-color="white" stop-opacity="0" />
            </linearGradient>
            <mask id="glare-mask">
               <g id="rects">
                  <rect id="rect1_1" width="32" height="32" x="8" y="48" fill="rgb(0, 120, 255)" />
                  <rect id="rect1_2" width="32" height="32" x="8" y="88" fill="rgb(0, 102, 217)" />
                  <rect id="rect1_3" width="32" height="32" x="8" y="128" fill="rgb(0, 90, 191)" />
                  <rect id="rect2_1" width="32" height="32" x="48" y="48" fill="rgb(0, 102, 217)" />
                  <rect id="rect2_3" width="32" height="32" x="48" y="128" fill="rgb(0, 102, 217)" />
                  <rect id="rect3_1" width="32" height="32" x="88" y="48" fill="rgb(0, 90, 191)" />
                  <rect id="rect3_3" width="32" height="32" x="88" y="128" fill="rgb(0, 120, 255)" />
               </g>
            </mask>
         </defs>
         <use xlink:href="#rects" />
         <text id="text" x="48.976929" y="109.12685" transform="scale(0.94,1.06)" style="font-size:30;line-height:100%">
            <tspan style="font-size:30px;font-weight:300;text-align:left;line-height:100%;text-anchor:start;font-family:typograph_pro;">
              BYTE LAB</tspan>
         </text>
         <g id="glare" mask="url(#glare-mask)">
            <rect width="128" height="128" x="8" y="48" fill="url(#glare-grad)" style="opacity: 0.3;" />
         </g>
      </svg>
    </div>
    <div class="pure-menu pure-menu-open pure-menu-horizontal pure-menu-fixed byte-hotbar" align="center">
        <ul class="byte-hotbar-container">
          <li><a href="index.html">Home</a></li>
          <li><a href="products.html">Products</a></li>
          <li class="pure-menu-selected"><a href="#">The Team</a></li>
          <li><a href="#">Wiki</a></li>
          <li><a href="#">Contact</a></li>
        </ul>
    </div>
    <div class="byte-team-landing-image">
        <div class="bytelab-welcome">
            Contact us
        </div>
    </div>
  </head>
  <body>
    <div class="index-header">
    Contact us
    </div>
        <div class="index-container">
            <div class="index-box">
                <div class="ribbon l-box-lrg">
                    <h2 class="content-head content-head-ribbon is-center">Need to get ahold of us?</h2>
                        <p class="is-center"><i>That's alright, because we like hearing from you! Go ahead and fill out the form
                            below, or <a href="mailto:contact@bytelab.pw">email us</a>!</i></p>

                        <form class="pure-form pure-form-stacked is-center" action="contact.php" method="post">
                            <fieldset>
                                <label for="name">Your Name</label>
                                <input name="name" type="text" placeholder="Your Name">

                                <label for="email">Your Email</label>
                                <input name="email" type="email" placeholder="Your Email">

                                <label for="content">Your Message</label>
                                <textarea name="content" placeholder="Your Message"></textarea>
                            </fieldset>
                                <button name="submit" type="submit" class="pure-button">Contact Us!</button>
                                    <?php
                                        if (isset($_POST['submit'])) {
                                            echo "<p class=\"email-notice\">";
                                            if (mail_sent_correctly()) {
                                                echo "Your message was sent!";
                                            } else {
                                                echo "There was an error, please try again.";
                                            }
                                            echo "</p>";
                                        }
                                    ?>
                        </form>
                </div>
            </div>
        </div>
    </div>
  </body>
</html>