<?php

/*
 * Description: 
 * Author - Eli Mounjim
 * Version - 20221022
 */
?>

<?php
ini_set ('display_errors', 1); 
ini_set ('display_startup_errors', 1); 
error_reporting (E_ALL);
?>

<html lang="en">
 <head>
   <meta charset="UTF-8">
   <meta name="viewport" content="width-device-width, initial-scale=1.0">
   <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> PHP Assassin Shop </title>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    
    <link rel="stylesheet" href="css/styles.css"/>

 </head>

 <body>

  <div class="container">
    <div class="nav-wrapper">
      <div class="left-side">
        <div class="nav-link-wrapper">
          <a href="home.php">Home</a>
        </div>

        <div class="nav-link-wrapper">
          <a href="categories.php">Categories</a>
        </div>

        <div class="nav-link-wrapper">
          <a href="orders.php">Orders</a>
        </div>

      </div>

      <div class="right-side">
         <div class="nav-link-wrapper active-nav-link">
          <a href="login.php">Login</a>
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
   </body>
</html>
