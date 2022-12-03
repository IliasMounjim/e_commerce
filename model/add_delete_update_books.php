<?php
require ('../model/database.php');

// Functions that adds new employee using validated user input
function add_book($genreID, $bookName, $bookDescription, $listPrice, $discountPercent, $isbn, $authors, $publisher, $pictureName)
{

    // The user enters valid data
    // execute SQL query to add this new employee
    // and display adding successfully later
    global $db;

    


    // Add the employee 
    $add_query = 'INSERT INTO books (genreID, bookName, bookDescription, listPrice, discountPercent, isbn, authors, publisher, pictureName) VALUES (:genreId, :bookname, :bookdescription, :listPrice, :discount, :isbn, :authors, :publisher, :picture)';
    $add_statement = $db->prepare($add_query);
    // Bind values
    $add_statement->bindValue(':genreId', $genreID);
    $add_statement->bindValue(':bookname', $bookName);
    $add_statement->bindValue(':bookdescription', $bookDescription);
    $add_statement->bindValue(':listPrice', $listPrice);
    $add_statement->bindValue(':discount', $discountPercent);
    $add_statement->bindValue(':isbn', $isbn);
    $add_statement->bindValue(':authors', $authors);
    $add_statement->bindValue(':publisher', $publisher);
    $add_statement->bindValue(':picture', $pictureName);
    // Execute and frees up connection
    $add_statement->execute();
    $add_statement->closeCursor();
    // Construct adding successful message

    $Msg= "Successfully added&emsp;".$bookName."&emsp;into database";

    // Return message
    return $Msg;

}



function update_book($bookID, $genreID, $bookName, $bookDescription, $listPrice, $discountPercent, $isbn, $authors, $publisher, $pictureName)
{

    // The user enters valid data
    // execute SQL query to add this new employee
    // and display adding successfully later
    global $db;


    // Update the employee 
    $update_query = 'UPDATE books SET genreID = :genreID, bookName = :bookName, bookDescription = :bookDescription, listPrice = :listPrice, discountPercent = :discountPercent, isbn = :isbn, authors = :authors, publisher = :publisher, pictureName = :pictureName WHERE books.bookID = :bookID';
    $update_statement = $db->prepare($update_query);
    // Bind values
    $update_statement->bindValue(':genreID', $genreID);
    $update_statement->bindValue(':bookName', $bookName);
    $update_statement->bindValue(':bookDescription', $bookDescription);
    $update_statement->bindValue(':listPrice', $listPrice);
    $update_statement->bindValue(':discountPercent', $discountPercent);
    $update_statement->bindValue(':isbn', $isbn);
    $update_statement->bindValue(':authors', $authors);
    $update_statement->bindValue(':publisher', $publisher);
    $update_statement->bindValue(':pictureName', $pictureName);
    $update_statement->bindValue(':bookID', $bookID);
    // Execute and frees up connection
    $update_statement->execute();
    $update_statement->closeCursor();


    

    $updated_message = "Successfully updated&emsp;".$bookName."&emsp;in database";

    // Return message
    return $updated_message;

}



function delete_book($bookID)
{
    global $db;

    // Get the target book name for later display
    $select_query ='SELECT books.bookName FROM books WHERE books.bookID = :bookId';
    $select_statement = $db->prepare($select_query);
    //bind value
    $select_statement->bindValue(':bookId', $bookID);
    // Run the query
    $select_statement->execute();
    $book_Name = $select_statement->fetch();
    // End
    $select_statement->closeCursor();


    // Delete target book from database
    $delete_query = 'DELETE FROM books WHERE books.bookID = :bookid';
    $delete_statement = $db->prepare($delete_query);
    //bind value
    $delete_statement->bindValue(':bookid', $bookID);
    // Execute and frees up connection
    $delete_statement->execute();
    $delete_statement->closeCursor();

    // Return deleted employee's name and id for display
    $delete = "Successfully deleted&emsp;".$book_Name[0]."&emsp;from database";
    return $delete;
}
?>