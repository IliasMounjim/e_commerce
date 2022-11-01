<?php

/*
* Description: Ecommerce website
* Author - Eli Mounjim/ Hongshen Lin 
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
    <div class="nav-link-wrapper active-nav-link">
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
    <div class="nav-link-wrapper">
        <a href="../controller/controller.php?user_Action=login">Login</a>
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

<?php include('../view/footer.php'); ?>

