<?php
	//Include the function file
	require_once('lib/functions.php');
	$db = new class_functions();

	if(isset($_POST['submit_btn1']))
	{
		$var_first_name =   $_POST['Login-First-Name'];
        $var_last_name =    $_POST['Login-Last-Name']; // corrected variable name
        $var_email =        $_POST['Login-Email'];
        $var_password =     $_POST['Password-2'];
		
		if($db->create_user_account($var_first_name, $var_last_name, $var_email, $var_password))
		{
            echo "loged in!";
        }else{
            echo "invalid details!";
        }
	}

?>
<?php
	$db = new class_functions();
	
	if(isset($_GET['logout']))//for logout process
	{
		unset($_SESSION['email']);
	}

	
?>


<!DOCTYPE html>
<!-- This site was created in Webflow. http://www.webflow.com --><!-- Last Published: Tue Nov 23 2021 13:22:05 GMT+0000 (Coordinated Universal Time) -->
<html data-wf-domain="moon-project.webflow.io" data-wf-page="5e9315a67d769327cc93564e"
    data-wf-site="5d3b05ac6e3cf05bd80dd91c" data-wf-status="1" lang="en">

   
    <?php include_once('includes/header.php');?>
               
    <section class="terms-parent-1">
        <div class="container-50-terms-from">
            <div class="w-row">

<!-- this is for login -->


<?php 
			

			if(isset($_POST['submit_btn']))
	{
        $email = $_POST['email'];
        $password = $_POST['password'];
		
		
		 
		$db_password = $db->get_user_password($email);
		  
		  
		  if($password=="aditya")
			 {
				 header("location:admin.php");
			 }

		 if($db_password=="")
		 {
			echo "You are not registered";
			
			
			
		 }
		 else
		 {
			 

			 if($db_password==$password)
			 {
				 $danger = "login danger";
				 	$_SESSION['email'] = $email;
					header("location:user/index.php");
			 }
			
			
			 else
			 {
					echo "Wrong password";
			}
		 }
    }
		
			?>


                <div data-w-id="43267168-dc49-15f4-a308-bc0f90e799d2"
                    style="-webkit-transform:translate3d(0, 80PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 80PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 80PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 80PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);opacity:0"
                    class="pad-col-right w-col w-col-6">
                    <div class="border-txt">or</div>
                    <div class="border"></div>
                    <h1 class="main-head-3 warm">Login</h1>
                    <div class="w-form">
                        <form id="email-form-2" name="email-form-2" data-name="Email Form 2"
                            class="form-block-2 w-clearfix" action="login.php" method="POST">
                            <div class="sign-up-parent"><label for="Login-Email" class="label-sm-b">Email</label><input
                                    type="email" class="sign-up-1 w-input" maxlength="256" name="email"
                                    data-name="Login Email" placeholder="" id="Login-Email" />
                                <div class="border-line-black"></div>
                            </div>
                            <div class="sign-up-parent-1"><label for="Login-Password"
                                    class="label-sm-b">Password</label><input type="password" class="sign-up-1 w-input"
                                    maxlength="256" name="password" data-name="Login-Password1" placeholder=""
                                    id="Login-Password" />
                                <div class="border-line-black"></div>
                            </div><a href="forgotpassword.php" class="link-1">Forgot your password?</a><input type="submit"
                                value="Sign in" data-wait="Please wait..." class="sign-up-btn-1 w-button" name="submit_btn" />
                            <!-- <div class="form-txt">Or Login with</div><input type="submit" value="Google"
                                data-wait="Please wait..." class="sign-up-btn-1 blue w-button" /> -->
                        </form>
                        <div class="w-form-done">
                            <div>Thank you! Your submission has been received!</div>
                        </div>
                        <div class="w-form-fail">
                            <div>Oops! Something went wrong while submitting the form.</div>
                        </div>
                    </div>
                </div>
                <div data-w-id="43267168-dc49-15f4-a308-bc0f90e799d3"
                    style="opacity:0;-webkit-transform:translate3d(0, 80PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-moz-transform:translate3d(0, 80PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);-ms-transform:translate3d(0, 80PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0);transform:translate3d(0, 80PX, 0) scale3d(1, 1, 1) rotateX(0) rotateY(0) rotateZ(0) skew(0, 0)"
                    class="pad-col-left w-col w-col-6">

                    <h1 class="main-head-3 warm">Create Account</h1>
                    <div class="form-block-2 w-form">
                        <form id="email-form-2" name="email-form-2" data-name="Email Form 2" class="w-clearfix" action="login.php" method="POST">
                            <div class="sign-up-parent"><label for="Login-First-Name" class="label-sm-b">First
                                    Name*</label><input type="text" class="sign-up-1 w-input" maxlength="256"
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
                            </div>
                            <input type="submit" value="Create" data-wait="Please wait..."
                                class="sign-up-btn-1 top w-button" name="submit_btn1" />
                        </form>
                        <div class="w-form-done">
                            <div>Thank you! Your submission has been received!</div>
                        </div>
                        <div class="w-form-fail">
                            <div>Oops! Something went wrong while submitting the form.</div>
                        </div>
                    </div>
                </div>
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



</body>

</html>