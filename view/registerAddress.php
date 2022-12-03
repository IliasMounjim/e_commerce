
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
                <span class="title">Signup -</span>
                <span class="title"> Address</span>
                <form action="."method="post" id="addAddress">
                    <input type="hidden" name="user_Action" value="addAddress">

                    <input type="hidden" name="id" value="<?=$id?>">

                    <div class="input-field">
                        <input type="text" . name="line1"  placeholder="Home address - Line 1" required>
                        <i class="uil uil-home" ></i>
                    </div>
                    <div class="input-field">
                        <input type="text" name="line2" placeholder="Line 2 (Optional)">
                        <i class="uil uil-home"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" name="city" placeholder="City" required>
                        <i class="uil uil-location-point"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" name="state" pattern="[A-Z]{2}"placeholder="State" required>
                        <i class="uil uil-location-point"></i>
                    </div>
                    <div class="input-field">
                        <input type="text" pattern="[0-9]{5}" name="zipCode" placeholder="Zip Code" required>
                        <i class="uil uil-building"></i>
                    </div>
                    <div class="input-field">
                        <input type="phone" name="phone" placeholder="Phone Number" required>
                        <i class="uil uil-phone"></i>
                    </div>

                    <div class="input-field button">
                        <input type="submit" value="Signup" name="addAddress">
                    </div>
                </form>

                <div class="login-signup">
                    <span class="text"><strong>Already a member?</strong>
                        <a href="../controller/index.php?user_Action=login" class="text login-link">Login Now</a>
                    </span>
                </div>
            </div>
        </div>
    </div>


    <script src="login_script.js"></script>
       
</main> 


<?php include('../view/footer.php'); ?>
