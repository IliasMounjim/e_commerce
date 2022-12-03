<?php
require ('../model/database.php');

function add_orders($userID, $bookID)
{
    global $db;

    // Get the target book name for later display
    $select_query ='SELECT * FROM users WHERE users.userID = :userID';
    $select_statement = $db->prepare($select_query);
    //bind value
    $select_statement->bindValue(':userID', $userID);
    // Run the query
    $select_statement->execute();
    $user_info = $select_statement->fetch();
    // End
    $select_statement->closeCursor();

    // Get the target book name for later display
    $select_query ='SELECT books.listPrice, books.discountPercent FROM books WHERE books.bookID = :bookID';
    $select_statement = $db->prepare($select_query);
    //bind value
    $select_statement->bindValue(':bookID', $bookID);
    // Run the query
    $select_statement->execute();
    $book_info = $select_statement->fetch();
    // End
    $select_statement->closeCursor();


    // Add the employee 
    $add_query = 'INSERT INTO ORDER (userID, orderDate, shipAmount, taxAmount, shipDate, shipAddressID, cardType, cardNumber, cardExpires, billingAddressID) VALUES (:userID, :orderDate, :shipAmount, :taxAmount, :shipDate, :shipAddressID, :cardType, :cardNumber, :cardExpires, :billingAddressID)';
    $add_statement = $db->prepare($add_query);
    // Bind values
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


    $add_statement->bindValue(':shipAmount', $price);
    $add_statement->bindValue(':taxAmount', '0.02');
    $add_statement->bindValue(':shipDate', $discountPercent);
    $add_statement->bindValue(':shipAddressID', $isbn);
    $add_statement->bindValue(':cardType', $authors);
    $add_statement->bindValue(':cardNumber', $publisher);
    $add_statement->bindValue(':cardExpires', $pictureName);
    $add_statement->bindValue(':billingAddressID', $pictureName);


    // Execute and frees up connection
    $add_statement->execute();
    $add_statement->closeCursor();
    // Construct adding successful message

    $Msg= "Successfully added&emsp;".$bookName."&emsp;into database";

    // Return message
    return $Msg;
}
?>