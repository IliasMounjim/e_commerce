<?php  

require("../model/database.php");
require("../model/retrieve_books.php");

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
    // To hold all books' data
    $all_books = select_all_books();

    
    include('../view/home.php');
}


/* 11/20/2022 this ask user for a genre they want to find */ 
if($user_Action == 'categories')
{
    $book_genres = select_all_genre();
    include('../view/categories.php');
}

/* 11/20/2022 this display what user choose in categories.php */
/* 11/22/2022 updated else condition */
if($user_Action == 'categories_result')
{
    if(isset($_GET['genre']))
    {
        $genreId = $_GET['genre'];

        $select_books = select_by_genre($genreId);


        include('../view/categories_result.php');
    }
    else
    {
        include('../view/error.php');
    }
}

// 11/22/2022
if($user_Action =='book')
{
    if(isset($_GET['bookId']))
    {
        $bookId = $_GET['bookId'];

        $select_book = select_by_id($bookId);


        include('../view/book.php');
    }
    else
    {
        include('../view/error.php');
    }
    
}


if($user_Action == 'authors')
{




    include('../view/authors.php');
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
