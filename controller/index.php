<?php  

require("../model/database.php");

// Check user action to determine what they want to do
$user_Action = filter_input (INPUT_POST, 'user_Action');

if(isset($_GET['user_Action']))
	$user_Action = $_GET['user_Action'];

// Default case, if user does not specify
// Getting user action from form or url
if ($user_Action == null)
{
    // Always displays the home page
	$user_Action = 'home';
}


if($user_Action == 'home')
{

    include('../view/home.php');
}




if($user_Action == 'categories')
{

    include('../view/categories.php');
}


if($user_Action == 'authors')
{




    include('../view/authors.php');
}




if($user_Action == 'products')
{

    include('../view/products_list.php');
}



if($user_Action == 'add_products')
{




    include('../view/add_products.php');
}


if($user_Action == 'orders')
{




    include('../view/orders.php');
}


if($user_Action == 'login')
{

	include('../view/login.php');
}

if($user_Action == 'register')
{

	include('../view/register.php');
}



if($user_Action == 'logged_in')
{

	include('../view/home.php');
}
?>
