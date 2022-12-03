<!DOCTYPE html>
<html>


<?php 
ini_set ('display_errors', 1); 
ini_set ('display_startup_errors', 1); 
error_reporting (E_ALL);


//<div class="nav-link-wrapper active-nav-link">
?>

<header>
<!-- style sheet -->
<head>
    <html lang="en">
    <meta charset="UTF-8">
    <meta name="viewport" content="width-device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title> PHP Assassin Shop </title>
    <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
    <link href='https://fonts.googleapis.com/css?family=Bungee' rel='stylesheet'>
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="../view/css/header_style.css"/>

</head>
</header>
<?php
    
    if(isset($_SERVER['QUERY_STRING']))
    {
        $current_query = $_SERVER['QUERY_STRING'];
        $current_page = explode("=", $current_query);
        //echo $current_page[1];

    }
    // if(empty($_GET)) {
    //     //No variables are specified in the URL.
    //     //Do stuff accordingly
    //     echo "No variables specified in URL...";
    // } else {
    //     //Variables are present. Do stuff:
    //     echo "Here are all the variables in the URL!\n";
    //     print_r($_GET);
    // }
?>
</div>

<div class="container1">
    <div class="nav-wrapper">
    <div class="left-side">

    <div class="nav-link-wrapper <?php if (isset($current_page) && $current_page[1] == 'home') echo 'active-nav-link';?>">
        <a href="../controller/index.php?user_Action=home">Home </a>
    </div>



    <div class="nav-link-wrapper <?php if (isset($current_page) && $current_page[1] == 'categories') echo 'active-nav-link';?>">
        <a href="../controller/index.php?user_Action=categories">Categories</a>
    </div>


    <div class="nav-link-wrapper <?php if (isset($current_page) && $current_page[1] == 'orders') echo 'active-nav-link';?>">
        <a href="../controller/index.php?user_Action=orders">Orders</a>
    </div>

    <div class="nav-link-wrapper">
        <a href="../controller/index.php?user_Action=Cart" class= "uil uil-shopping-cart"></a>
    </div>


    </div>

    <div class="right-side">
    <?php 
    $buttonName = "Login";
    $href ="../controller/index.php?user_Action=login"; 
    

    if(!empty($_GET)) {
        if(isset($current_page) && ($current_page[1] == 'register' || $current_page[1] == 'registerAddress')) {
            $buttonName = "Signup";
            $href ="../controller/index.php?user_Action=register";
        }
    }
    ?>

    <div class="nav-link-wrapper <?php if (isset($current_page) && ($current_page[1] == 'login' || $current_page[1] == 'register' || $current_page[1] == 'registerAddress')) echo 'active-nav-link';?>">
        <a href=<?=$href?>><?=$buttonName?></a>
    </div>
                

    
    <div class="brand">
        PHP Assassin Shop
    </div>

    </div>
    </div>


<body>
