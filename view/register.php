
<!-- ===== Iconscout CSS ===== -->
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

<!-- ===== CSS ===== -->
<?php

include('../view/header.php');
?>

<link rel="stylesheet" href="../view/css/signup_style.css"/>


 
<main>

    <div class="body">
            
        <div class="container">
            <div class="forms">
            <div class="form login">
                <span class="title">Sign up</span>

                <form action="."method="post" id="addUser" onsubmit="return checkPassword(this);">
                    <input type="hidden" name="user_Action" value="addUser">
                    <div class="input-field">
                        <input type="text" name="userName" placeholder="Enter your name" required>
                        <i class="uil uil-user"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" name="email" placeholder="Enter your email" required>
                        <i class="uil uil-envelope icon"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" id="password"name="password" placeholder="Create a password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>
                    <div class="input-field">
                        <input type="password" id="password1" name="password1" placeholder="Confirm a password" required>
                        <i class="uil uil-lock icon"></i>
                        <i class="uil uil-eye-slash showHidePw"></i>
                    </div>

                    <div class="checkbox-text">
                        <div class="checkbox-content">
                            <input type="checkbox" id="termCon" required>
                            <label for="termCon" class="text">I accepted all terms and conditions</label>
                        </div>
                    </div>

                    <div class="input-field button">
                        <input name="addUser" type="submit" value="Signup">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text">Already a member?
                        <a href="../controller/index.php?user_Action=login" class="text login-link"><strong>Login Now</strong></a>
                    </span>
                </div>
            </div>
        </div>
    </div>

    <script src="login_script.js"> </script>
       
</main> 


<?php include('../view/footer.php'); ?>
