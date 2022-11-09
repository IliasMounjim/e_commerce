
<!-- ===== Iconscout CSS ===== -->
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

<!-- ===== CSS ===== -->
<?php

include('../view/header.php');
?>

<link rel="stylesheet" href="../view/css/signup_style.css"/>


 
<main>
    <!--<title>Login & Registration Form</title>-->
    <div class="body">
            
        <div class="container">
            <div class="forms">
            <div class="form login">
                <span class="title">Sign up</span>

                <form action="#">
                    <div class="input-field">
                        <input type="text" placeholder="Enter your name" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" placeholder="Enter your email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Create a password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" class="password" placeholder="Confirm a password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="termCon">
                            <label for="termCon" class="text">I accepted all terms and conditions</label>
                        </div>
                    </div>

                    <div class="input-field button">
                        <input type="button" value="Signup">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Already a member?
                        <a href="../controller/index.php?user_Action=login" class="text login-link">Login Now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <script src="login_script.js"></script>
       
</main> 


<?php include('../view/footer.php'); ?>
