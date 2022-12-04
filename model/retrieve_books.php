<?php
require ('../model/database.php');

// Get all books
function select_all_books()
{
    global $db;

    // Get books
    $select_query ='SELECT * FROM books';
    // Run the query
    $select_statement = $db->prepare($select_query);

    // Executes, gets the result to local array and frees up connection
    $select_statement->execute();
    $books = $select_statement->fetchAll();
    $select_statement->closeCursor();

    // Return the book array
    return $books;

}



// Get the book using book id
function select_by_id($book_Id)
{
    global $db;

    // Get all books if its name contain certain key words
    $select_query = 'SELECT * FROM books WHERE books.bookID = :bookid';
    $select_statement = $db->prepare($select_query);

    //bind value
    $select_statement->bindValue(':bookid', $book_Id);


    // Executes, gets the result to local array and frees up connection
    $select_statement->execute();
    $select_book = $select_statement->fetch();
    $select_statement->closeCursor();

    // Return the data of books
    return $select_book;
}


// Function that do the search in the home
// we may need to modify the query, I think it needs a ORDER BY clause to order the data it retrieve
// but I'm quite sure how
function select_by_book_name($book_name)
{
    global $db;

    // Get all books if its name contain certain key words
    $select_query = "SELECT * FROM books WHERE books.bookName LIKE CONCAT('%', :book, '%')";
    $select_statement = $db->prepare($select_query);

    //bind value
    $select_statement->bindValue(':book', $book_name);


    // Executes, gets the result to local array and frees up connection
    $select_statement->execute();
    $select_book_name = $select_statement->fetchAll();
    $select_statement->closeCursor();

    // Return the data of books
    return $select_book_name;
}



// Takes author name and returns all book that were writen by that author
function select_by_author($author_name)
{
    global $db;

    // Get all books that belongs an author
    $select_query = "SELECT * FROM books WHERE books.authors LIKE CONCAT('%', :author, '%')";
    $select_statement = $db->prepare($select_query);

    //bind value
    $select_statement->bindValue(':author', $author_name);


    // Executes, gets the result to local array and frees up connection
    $select_statement->execute();
    $select_author = $select_statement->fetchAll();
    $select_statement->closeCursor();

    // Return the data of books
    return $select_author;
}


// Get a book with isbn number
// It uses isbn-10
function select_by_isbn($isbn)
{
    global $db;

    // Find the book that has the matched isbn
    $select_query = "SELECT * FROM books WHERE books.isbn LIKE CONCAT('%', :isbn, '%')";
    $select_statement = $db->prepare($select_query);

    //bind value
    $select_statement->bindValue(':isbn', $isbn);


    // Executes, gets the result to local array and frees up connection
    $select_statement->execute();
    $select_isbn = $select_statement->fetchAll();
    $select_statement->closeCursor();

    // Return the data of the book
    return $select_isbn;
}

// Takes author name and returns all book that were writen by that author
function select_by_publisher($publisher_name)
{
    global $db;

    // Get all books that belongs an author
    $select_query = "SELECT * FROM books WHERE books.publisher LIKE CONCAT('%', :publisher, '%')";
    $select_statement = $db->prepare($select_query);

    //bind value
    $select_statement->bindValue(':publisher', $publisher_name);


    // Executes, gets the result to local array and frees up connection
    $select_statement->execute();
    $select_publisher = $select_statement->fetchAll();
    $select_statement->closeCursor();

    // Return the data of books
    return $select_publisher;
}

?>
