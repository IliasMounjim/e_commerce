<?php
require ('../model/database.php');

function add_orders($userID, $bookID)
{
    global $db;

    // Get the user info
    $select_query ='SELECT * FROM users WHERE users.userID = :userID';
    $select_statement = $db->prepare($select_query);
    //bind value
    $select_statement->bindValue(':userID', $userID);
    // Run the query
    $select_statement->execute();
    $user_info = $select_statement->fetch();
    // End
    $select_statement->closeCursor();

    // Get the book info
    $select_query ='SELECT * FROM books WHERE books.bookID = :bookID';
    $select_statement = $db->prepare($select_query);
    //bind value
    $select_statement->bindValue(':bookID', $bookID);
    // Run the query
    $select_statement->execute();
    $book_info = $select_statement->fetch();
    // End
    $select_statement->closeCursor();


    // Add the employee 
    $add_query = 'INSERT INTO orders (bookID, userID, orderDate, totalAmount, taxAmount, shipDate, shipAddressID) VALUES (:bookID, :userID, :orderDate, :shipAmount, :taxAmount, :shipDate, :shipAddressID)';
    $add_statement = $db->prepare($add_query);
    // Bind values
    $add_statement->bindValue(':bookID', $book_info['bookID']);
    $add_statement->bindValue(':userID', $userID);
    $date = date('Y-n-d');
    $add_statement->bindValue(':orderDate', $date);


    if($book_info['discountPercent'] > 0.00) {

        //  Using s tag to cross out original price, and using number_format() to get it to display 2 decimal places
        $price = number_format(($book_info['listPrice'] *(1.00 - $book_info['discountPercent'])), 2, '.', '');
    }
    else{
        $price = $book_info['listPrice'];
    }

    $price = $price * 1.02;
    $add_statement->bindValue(':shipAmount', $price);
    $add_statement->bindValue(':taxAmount', 0.02);
    $ship = date('Y-m-d', strtotime("+7 day"));
    $add_statement->bindValue(':shipDate', $ship);
    $add_statement->bindValue(':shipAddressID', $user_info['shipAddressID']);


    // Execute and frees up connection
    $add_statement->execute();
    $add_statement->closeCursor();
    // Construct adding successful message

    $Msg= "Successfully ordered&emsp;".$book_info['bookName'].",&emsp;your book should be arrived on&emsp;".$ship;

    // Return message
    return $Msg;
}


function get_order_info($userID)
{
    global $db;

    // Get the user info
    $select_query ='SELECT * FROM orders WHERE orders.userID = :userID';
    $select_statement = $db->prepare($select_query);
    //bind value
    $select_statement->bindValue(':userID', $userID);
    // Run the query
    $select_statement->execute();
    $order_info = $select_statement->fetchAll();
    // End
    $select_statement->closeCursor();

    return $order_info;
}


function delete_order($bookID, $bookName){
    global $db;
 

    // Delete target book from database
    $delete_query = 'DELETE FROM orders WHERE orders.bookID = :bookid LIMIT 1';

    try { 
        
        $delete_statement = $db->prepare($delete_query);
        //bind value
        $delete_statement->bindValue(':bookid', $bookID);
        // Execute and frees up connection
        $delete_statement->execute();
        $delete_statement->closeCursor();
    
        // Return deleted employee's name and id for display
        $delete = "Successfully removed&emsp;".$bookName."&emsp;from Cart";
        return $delete;
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>An error occurred while fetching user: $error_message </p>";
    }
}



function get_address_info($userID)
{
    global $db;

    // Get the user info
    $select_query ='SELECT * FROM addresses WHERE addresses.userID = :userID';
    $select_statement = $db->prepare($select_query);
    //bind value
    $select_statement->bindValue(':userID', $userID);
    // Run the query
    $select_statement->execute();
    $address_info = $select_statement->fetch();
    // End
    $select_statement->closeCursor();

    return $address_info;
}
?>
