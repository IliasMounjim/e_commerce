
<!-- ===== Iconscout CSS ===== -->
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

<!-- ===== CSS ===== -->
<?php

include('../view/header.php');

?>

<link rel="stylesheet" href="../view/css/Login_style.css"/>



 
<main>        
    <!--<title>Login & Registration Form</title>-->
    <div class="body">
            
        <div class="container">
            <div class="forms">
                <div class="form login">
                    <span class="title">Login</span>

                    <form action="."method="post" id="logged_in">
                        <input type="hidden" name="user_Action" value="logged_in">
                        <div class="input-field">
                            <input name="emailAddress" type="text" placeholder="Enter your email" required>
                            <i class="uil uil-envelope icon"></i>
                        </div>
                        <div class="input-field">
                            <input name="userPassword"type="password" class="password" placeholder="Enter your password" required>
                            <i class="uil uil-lock icon"></i>
                            <i class="uil uil-eye-slash showHidePw"></i>
                        </div>

                        <div class="checkbox-text">
                            <div class="checkbox-content">
                                <input type="checkbox" id="logCheck">
                                <label for="logCheck" class="text">Remember me</label>
                            </div>
                            
                            <a href="#" class="text">Forgot password?</a>
                        </div>

                        <div class="input-field button">
                            
                            <input type="submit" value="Login" name="logged_in">
                            
                        </div>
                    </form>

                    <div class="login-signup">
                        <span class="text">Not a member?
                            <a href="../controller/index.php?user_Action=register"class="text signup-link"><strong>Signup Now</strong></a>
                        </span>
                    </div>


                </div>
            </div>
        </div>
    </div>
    
</main> 

<script src="login_script.js"></script>

<?php include('../view/footer.php'); ?>
