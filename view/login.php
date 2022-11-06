<?php

/*
 * Description: 
 * Author - Eli Mounjim
 * Version - 20221022
 */

ini_set ('display_errors', 1); 
ini_set ('display_startup_errors', 1); 
error_reporting (E_ALL);
include('../view/header.php');
?>



  <div class="container">
    <div class="nav-wrapper">
      <div class="left-side">
        <div class="nav-link-wrapper">
          <a href="../controller/controller.php?user_Action=home">Home</a>
        </div>

        <div class="nav-link-wrapper">
          <a href="../controller/controller.php?user_Action=categories">Categories</a>
        </div>

        <div class="nav-link-wrapper">
          <a href="../controller/controller.php?user_Action=orders">Orders</a>
        </div>

      </div>

      <div class="right-side">
         <div class="nav-link-wrapper active-nav-link">
          <a href="../controller/controller.php?user_Action=login">Login</a>
        </div>
        <div class="brand">
          PHP Assassin Shop
        </div>
   
      </div>
    </div>
  



 
  <main>
    

    <form>
      <div class="form-wrapper" >
        <label for="InputEmail1" class="form-label" placeholder="abc@example.com">Email address</label>
        <input type="email" class="form-control" id="InputEmail" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
      </div>
      <div class="form-wrapper">
        <label for="InputPassword1" class="form-label">Password</label>
        <input type="password" class="form-control" id="InputPassword">
      </div>
      <div class="form-wrapper" style="padding-top:24px">
        <button type="submit" class="btn btn-primary ">Login</button>
      </div>
    </form>


  </main> 
  


   <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


<?php include('../view/footer.php'); ?>
