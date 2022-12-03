
<!-- ===== Iconscout CSS ===== -->
<link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">

<!-- ===== CSS ===== -->
<?php

include('../view/header.php');

?>

<link rel="stylesheet" href="../view/css/Login_style.css"/>



 
<main>        
<div class="body">
            
    <div class="container">
        <div class="forms">
            <div class="form login">
                <span class="title">Profile</span>
                <form action="."method="post" id="logout">
                        <input type="hidden" name="user_Action" value="logout">
                        
                        <?php if (isset($_COOKIE['userName'])) {
                                $value = filter_input (INPUT_COOKIE, 'userName', FILTER_VALIDATE_INT);
                                //print_r($_COOKIE);
                                if ($value === false || $value == 0) {
                                        //echo "No USER Found\nCookie is ", $value;
                                }
                                else {
                                    $user = get_user($value);
                                    $customer = $user['userName'];
                                    echo "Hello, ", $customer, "\n";
                                    $buttonName=$customer;
                                    $href="../controller/index.php?user_Action=profile";
                        
                                }
                            }
                            ?>
            
                        <div class="input-field button">

                                <input type="submit" value="Log Out" />
                                            
                        
                        </div>
                    </form>

                    <div class="login-signup">
                        <span class="text">Change Your info?
                            <a href="../controller/index.php?user_Action=editProfile"class="text signup-link"><strong>Edit Profile</strong></a>
                        </span>
                    </div>


        </div>    
    </div>    
 
</div>


</main> 

<script src="login_script.js"></script>

<?php include('../view/footer.php'); ?>
