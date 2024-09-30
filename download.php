<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mahaepass";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if passid is set and not empty
if(isset($_GET['passid']) && !empty($_GET['passid'])) {
    $passid = $_GET['passid'];
    
    // SQL query to retrieve data from the database based on passid
    $sql = "SELECT * FROM newpasses WHERE passid='$passid'";
    $result = $conn->query($sql);
}
?>
<!DOCTYPE html>
<!-- This site was created in Webflow. http://www.webflow.com --><!-- Last Published: Tue Nov 23 2021 13:22:05 GMT+0000 (Coordinated Universal Time) -->
<html data-wf-domain="moon-project.webflow.io" data-wf-page="5e9315a67d769327cc93564e"
    data-wf-site="5d3b05ac6e3cf05bd80dd91c" data-wf-status="1" lang="en">

<head>
    <meta charset="utf-8" />
    <title>MAHA-E-PASS | Download</title>
    <?php include_once('includes/header.php');?>
    <div class="intro">
        <div class="intro-section-top"><img
                src="images/whitelogo3.png"
                width="240" alt="" class="logo-overlay" /></div>
        <div class="intro-section-bottom"></div>
    </div>
    <div class="outro">
        <div class="outro-section-1"><img
                src="images/whitelogo3.png"
                width="240" alt="" class="o-image" /></div>
        <div class="outro-section-2"></div>
    </div>
    <div class="contact-pop-up">
        <div data-w-id="a9db47ab-c979-d4cb-9f0c-4f9b49f0017d" class="close-parent">
            <div class="close-bar-1"></div>
            <div class="close-bar-2"></div>
        </div>
        <div class="container-70 c-form">
            <div class="columns-2 w-row">
                <div class="no-pad-2 pull-top w-col w-col-5">
                    <h1 class="main-head-2 center p-light">Hit us up-</h1>
                    <div class="contact-side"><a href="#" class="contact-service w-inline-block"><img
                                src="https://assets.website-files.com/5d3b05ac6e3cf05bd80dd91c/5dac87df508f04217cfe30a4_live-chat.svg"
                                width="20" alt="" class="icon-c" />
                            <div class="contact-link">Live Chat</div>
                        </a><a href="#" class="contact-service w-inline-block"><img
                                src="https://assets.website-files.com/5d3b05ac6e3cf05bd80dd91c/5dac87df4c72cc3a46f0cbff_support.svg"
                                width="20" alt="" class="icon-c" />
                            <div class="contact-link">Support</div>
                        </a><a href="mailto:support@moonselfie.me?subject=Support%20Email%20Request"
                            class="contact-service w-inline-block"><img
                                src="https://assets.website-files.com/5d3b05ac6e3cf05bd80dd91c/5dac87df06d0778285e31921_email.svg"
                                width="20" alt="" class="icon-c" />
                            <div class="contact-link">support@moonselfie.me</div>
                        </a>
                        <div class="contact-social-m"><a rel="noopener" data-w-id="a9db47ab-c979-d4cb-9f0c-4f9b49f00193"
                                href="https://www.instagram.com/mymoonultra/" target="_blank"
                                class="f-link w-inline-block"><img
                                    src="https://assets.website-files.com/5d3b05ac6e3cf05bd80dd91c/5dac67a465b2d9c6140d785a_instagram-brands%20(1).svg"
                                    width="20" alt="" /></a><a rel="noopener"
                                data-w-id="a9db47ab-c979-d4cb-9f0c-4f9b49f00195" href="#" target="_blank"
                                class="f-link w-inline-block"><img
                                    src="https://assets.website-files.com/5d3b05ac6e3cf05bd80dd91c/5dac67a4d26b0a7800d6f247_facebook-square-brands.svg"
                                    width="20" alt="" /></a><a rel="noopener"
                                data-w-id="a9db47ab-c979-d4cb-9f0c-4f9b49f00197" href="https://twitter.com/mymoonultra"
                                target="_blank" class="f-link w-inline-block"><img
                                    src="https://assets.website-files.com/5d3b05ac6e3cf05bd80dd91c/5dac67a465b2d917ef0d785b_twitter-square-brands.svg"
                                    width="20" alt="" /></a><a rel="noopener"
                                data-w-id="a9db47ab-c979-d4cb-9f0c-4f9b49f00199"
                                href="https://www.pinterest.com/moonultra/" target="_blank"
                                class="f-link w-inline-block"><img
                                    src="https://assets.website-files.com/5d3b05ac6e3cf05bd80dd91c/5dac67a406d07745b7e21eaf_pinterest-square-brands.svg"
                                    width="20" alt="" /></a><a rel="noopener"
                                data-w-id="f7b4fcfa-e9fc-b1fb-98ce-4407004d2af6"
                                href="https://www.linkedin.com/company/mymoonultra" target="_blank"
                                class="f-link w-inline-block"><img
                                    src="https://assets.website-files.com/5d3b05ac6e3cf05bd80dd91c/5db3654024bb983c71b51a69_linked-in.svg"
                                    width="20" alt="" /></a><a rel="noopener"
                                data-w-id="a9db47ab-c979-d4cb-9f0c-4f9b49f0019b"
                                href="https://www.youtube.com/channel/UCGDkJCwXRpwYYYXqVJgx1lQ" target="_blank"
                                class="link-block w-inline-block"><img
                                    src="https://assets.website-files.com/5d3b05ac6e3cf05bd80dd91c/5dac67a3508f046a3cfd2d6b_youtube-brands%20(1).svg"
                                    width="24" alt="" class="fb" /></a></div>
                        <div class="csm-txt hide">Follow Us on Social Media</div>
                    </div>
                </div>
                <div class="no-pad-2 w-col w-col-7">
                    <div class="form-block w-form">
                        <form id="email-form" name="download" data-name="Email Form" class="form w-clearfix" >
                            <label
                                for="Name-3" class="label">Name -</label><input type="text" class="field w-input"
                                maxlength="256" name="Name" data-name="Name" placeholder=""
                                data-w-id="a9db47ab-c979-d4cb-9f0c-4f9b49f001a4" id="Name-3" required="" />
                            <div class="border-line"></div><label for="Email-3" class="label">Email -</label><input
                                type="email" class="field w-input" maxlength="256" name="Email" data-name="Email"
                                placeholder="" data-w-id="a9db47ab-c979-d4cb-9f0c-4f9b49f001a8" id="Email-3"
                                required="" />
                            <div class="border-line"></div><label for="Phone-3" class="label">Phone -</label><input
                                type="tel" class="field w-input" maxlength="256" name="Phone" data-name="Phone"
                                placeholder="" data-w-id="a9db47ab-c979-d4cb-9f0c-4f9b49f001ac" id="Phone-3"
                                required="" />
                            <div class="border-line"></div><label for="Message-3" class="label">Message
                                -</label><textarea class="field text w-input" maxlength="5000" name="Message"
                                data-name="Message" placeholder="" data-w-id="a9db47ab-c979-d4cb-9f0c-4f9b49f001b0"
                                id="Message-3"></textarea>
                            <div class="border-line"></div><input type="submit" value="Send" data-wait="Please wait..."
                                class="form-btn w-button" />
                        </form>
                        <div class="success w-form-done">
                            <div>Thank you! Your submission has been received!</div>
                        </div>
                        <div class="error w-form-fail"><img
                                src="https://assets.website-files.com/5d3b05ac6e3cf05bd80dd91c/5dac77424c72cc7a84f031d0_warning-sign.svg"
                                width="16" alt="Error" class="error-icon" />
                            <div class="error-text">An error occurred</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="terms-parent-1">
        <div class="container-50-terms-from">
            <div class="w-row">
                <div data-w-id="43267168-dc49-15f4-a308-bc0f90e799d2"
                    style="-webkit-transform:translate3d(0, 80PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 80PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 80PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 80PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0"
                    class="pad-col-right w-col w-col-6">
                    <div class="border-txt">pass</div>
                    <div class="border"></div>
                    <h1 class="main-head-3 warm">DOWNLOAD</h1>
                    <div class="w-form">
                        <form id="email-form-2" name="email-form-2" data-name="Email Form 2"
                            class="form-block-2 w-clearfix" method="post" action="user/download.php">
                            <div class="sign-up-parent"><label for="Login-Email" class="label-sm-b">Pass ID</label><input
                                    type="number" class="sign-up-1 w-input" maxlength="256" name="passid"
                                    data-name="Login Email" placeholder="" id="Login-Email" />
                                <div class="border-line-black"></div>
                            </div>
                            <div class="sign-up-parent-1"><label for="Login-Password"
                                    class="label-sm-b">DOB</label><input type="date" class="sign-up-1 w-input"
                                    maxlength="256" name="Login-Password" data-name="Login Password" placeholder=""
                                    id="Login-Password" name="dob"/>
                                <div class="border-line-black"></div>
                            </div><input type="submit"
                                value="Download" data-wait="Please wait..." class="sign-up-btn-1 w-button" />
                           
                        </form>
                        <div class="w-form-done">
                            <div>Thank you! Your Download is started!</div>
                        </div>
                        <div class="w-form-fail">
                            <div>Oops! Something went wrong while submitting the form.</div>
                        </div>
                    </div>
                </div>
                <!-- <div data-w-id="43267168-dc49-15f4-a308-bc0f90e799d3"
                    style="opacity:0;-webkit-transform:translate3d(0, 80PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 80PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 80PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 80PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)"
                    class="pad-col-left w-col w-col-6">
                    <h1 class="main-head-3 warm">Create Account</h1>
                    <div class="form-block-2 w-form">
                        <form id="email-form-2" name="email-form-2" data-name="Email Form 2" class="w-clearfix">
                            <div class="sign-up-parent"><label for="Login-First-Name" class="label-sm-b">First
                                    Name*</label><input type="email" class="sign-up-1 w-input" maxlength="256"
                                    name="Login-First-Name" data-name="Login First Name" placeholder=""
                                    id="Login-First-Name" required="" />
                                <div class="border-line-black"></div>
                            </div>
                            <div class="sign-up-parent-2"><label for="Login-Last-Name" class="label-sm-b">Last
                                    Name*</label><input type="text" class="sign-up-1 w-input" maxlength="256"
                                    name="Login-Last-Name" data-name="Login Last Name" placeholder=""
                                    id="Login-Last-Name" required="" />
                                <div class="border-line-black"></div>
                            </div>
                            <div class="sign-up-parent-2"><label for="Login-Email-2"
                                    class="label-sm-b">Email*</label><input type="email" class="sign-up-1 w-input"
                                    maxlength="256" name="Login-Email" data-name="Login Email" placeholder=""
                                    id="Login-Email-2" required="" />
                                <div class="border-line-black"></div>
                            </div>
                            <div class="sign-up-parent-2"><label for="Password-3"
                                    class="label-sm-b">Password*</label><input type="password" class="sign-up-1 w-input"
                                    maxlength="256" name="Password-2" data-name="Password 2" placeholder=""
                                    id="Password-2" />
                                <div class="border-line-black"></div>
                            </div><input type="submit" value="Create" data-wait="Please wait..."
                                class="sign-up-btn-1 top w-button" />
                        </form>
                        <div class="w-form-done">
                            <div>Thank you! Your submission has been received!</div>
                        </div>
                        <div class="w-form-fail">
                            <div>Oops! Something went wrong while submitting the form.</div>
                        </div>
                    </div>
                </div> -->
            </div>
        </div>
    </section>
    <?php include_once('includes/footer.php');?>

    <script src="https://d3e54v103j8qbb.cloudfront.net/js/jquery-3.5.1.min.dc5e7f18c8.js?site=5d3b05ac6e3cf05bd80dd91c"
        type="text/javascript" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0="
        crossorigin="anonymous"></script>
    <script src="https://assets.website-files.com/5d3b05ac6e3cf05bd80dd91c/js/webflow.e070aad5a.js"
        type="text/javascript"></script>
    <!--[if lte IE 9]><script src="//cdnjs.cloudflare.com/ajax/libs/placeholders/3.0.2/placeholders.min.js"></script><![endif]-->
    <script>



        $('.button, .logo-link, .hero-link, .footer-link, .menu-link').click(function (e) {
            e.preventDefault();                   // prevent default anchor behavior
            var goTo = this.getAttribute("href"); // store anchor href

            setTimeout(function () {
                window.location = goTo;
            }, 1200);
        });

        (function (d) {
            var config = {
                kitId: 'vqw1kwc',
                scriptTimeout: 1200,
                async: true
            },
                h = d.documentElement, t = setTimeout(function () { h.className = h.className.replace(/\bwf-loading\b/g, "") + " wf-inactive"; }, config.scriptTimeout), tk = d.createElement("script"), f = false, s = d.getElementsByTagName("script")[0], a; h.className += " wf-loading"; tk.src = 'https://use.typekit.net/' + config.kitId + '.js'; tk.async = true; tk.onload = tk.onreadystatechange = function () { a = this.readyState; if (f || a && a != "complete" && a != "loaded") return; f = true; clearTimeout(t); try { Typekit.load(config) } catch (e) { } }; s.parentNode.insertBefore(tk, s)
        })(document);

    </script>

    <script>
        $(window).bind("pageshow", function (event) {
            if (event.originalEvent.persisted) {
                window.location.reload()
            }
        });
    </script>
