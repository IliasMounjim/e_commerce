<?php

/*
 * Description: Ecommerce website
 * Author - Eli Mounjim/ Hongshen Lin 
 * Version - 20221022
 */
?>

<?php
ini_set ('display_errors', 1); 
ini_set ('display_startup_errors', 1); 
error_reporting (E_ALL);
?>

<?php
require('model/database.php');
?>
  
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width-device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
   <title> PHP Assassin Shop </title>
   <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
   <link rel="stylesheet" href="view/css/styles.css"/>

</head>

   <body>
   
       <div class="container">
           <div class="nav-wrapper">
               <div class="left-side">
                   <div class="nav-link-wrapper active-nav-link">
                       <a href="index.php">Home</a>
                   </div>

                   <div class="nav-link-wrapper">
                       <a href="view/categories.php">Categories</a>
                   </div>

                   <div class="nav-link-wrapper">
                       <a href="view/orders.php">Orders</a>
                   </div>

               </div>

               <div class="right-side">
                   <div class="nav-link-wrapper">
                       <a href="view/login.php">Login</a>
                   </div>
                   <div class="brand">
                       PHP Assassin Shop
                   </div>
   
               </div>
           </div>
       <main>
       <div class="welcome-wrapper" style="text-align:center">
       <h1>E-commerce website coming soon </h1>
       </div>
       

       


   </main> 

   </body>
</html>

