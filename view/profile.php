
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
            <div class="form signup">
                <span class="title">Profile Information</span>
                <form action="."method="post" id="update-profile">
                        <input type="hidden" name="user_Action" value="update_profile">
                        
                        <?php if (isset($_COOKIE['userName'])) {
                                $value = filter_input (INPUT_COOKIE, 'userName', FILTER_VALIDATE_INT);
                                //print_r($_COOKIE);
                                if ($value === false || $value == 0) {
                                        //echo "No USER Found\nCookie is ", $value;
                                }
                                else {
                                    $user = get_user($value);
                                    $customer = $user['userName'];
                                    ?>
                                     <input type="hidden" name="userID" value="<?= $user['userID']?>">
                                    <div class="mb-3">
                                        <label for="userName">Name</label>
                                        <input name="userName" id="userName"type="text" class="form-control"value="<?= $user['userName']?>" style="text-transform: capitalize;" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="emailAddress">Email Address</label>
                                        <input name="emailAddress" id="emailAddress"type="text" class="form-control"value="<?= $user['emailAddress']?>" style="text-transform: capitalize;" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="line1">Address Line 1</label>
                                        <input name="line1" id="line1"type="text" class="form-control"value="<?= $user['line1']?>" style="text-transform: capitalize;" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="line2">Line 2 (optional)</label>
                                        <input name="line2" id="line2"type="text" class="form-control"value="<?= $user['line2']?>" style="text-transform: capitalize;" required>
                                    </div>
                                    <input name="addressID" type="hidden" value="<?= $user['shipAddressID']?>" style="text-transform: capitalize;" required>
                                    <div class="mb-3">
                                        <label for="city">City</label>
                                        <input name="city" id="city"type="text" class="form-control"value="<?= $user['city']?>" style="text-transform: capitalize;" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="state">State</label>
                                        <input name="state" id="state"type="text" class="form-control"value="<?= $user['address_State']?>" style="text-transform: capitalize;" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="zipCode">Zip Code</label>
                                        <input name="zipCode" id="zipCode"type="text" class="form-control"value="<?= $user['zipCode']?>" style="text-transform: capitalize;" required>
                                    </div>
                                    <div class="mb-3">
                                        <label for="phone">Phone</label>
                                        <input name="phone" id="phone"type="text" class="form-control"value="<?= $user['phone']?>" style="text-transform: capitalize;" required>
                                    </div>

                                    
                                   
                                    <?php
                        
                                }
                            }
                            ?>
                        <div class="input-field button">
                            <input type="submit" value="Save Changes"> </input>
                        </div>
            
                    </form>
                    <form action="."method="post" id="logout">
                        <input type="hidden" name="user_Action" value="logout">
                        <div class="input-field button">
                            <input style="background-color:crimson"href="../controller/index.php?user_Action=logout"type="submit" value="Log out"> </input>
                        </div>
                    </form>
                    <div class="login-signup">
                        <span class="text">Change Your Password?
                            <a href="../controller/index.php?user_Action=profile"class="text signup-link"><strong>Click Here</strong></a>
                        </span>
                    </div>


        </div>    
    </div>    
 
</div>


</main> 

<script src="login_script.js"></script>

<?php include('../view/footer.php'); ?>
