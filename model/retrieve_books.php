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


// Get all categories in database
function select_all_genre()
{
    global $db;

    // Get employee list
    $select_query ='SELECT * FROM genres';
    // Run the query
    $select_statement = $db->prepare($select_query);

    // Executes, gets the result to local array and frees up connection
    $select_statement->execute();
    $book_genres = $select_statement->fetchAll();
    $select_statement->closeCursor();

    // Return the book genre array
    return $book_genres;
}

// 12/2/2022
function select_a_genre($genreID)
{
    global $db;

    // Get all books if its name contain certain key words
    $select_query = 'SELECT genres.genreName FROM genres WHERE genres.genreID = :genreID';
    $select_statement = $db->prepare($select_query);

    //bind value
    $select_statement->bindValue(':genreID', $genreID);


    // Executes, gets the result to local array and frees up connection
    $select_statement->execute();
    $select_book = $select_statement->fetch();
    $select_statement->closeCursor();

    // Return the data of books
    return $select_book;
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


/* 11/20/2022 */

// Get product by its type, aka genre of the book
// 1 = arts
// 2 = Sci-Fi
// 3 = Education
// 4 = Literature
// 5 = Science
// 6 = Comic
// 7 = computer science
function select_by_genre($genre)
{
    global $db;

    // Get all books that belongs a genre
    $select_query = 'SELECT * FROM books WHERE books.genreID  = :genre';
    $select_statement = $db->prepare($select_query);

    //bind value
    $select_statement->bindValue(':genre', $genre);


    // Executes, gets the result to local array and frees up connection
    $select_statement->execute();
    $select_genre = $select_statement->fetchAll();
    $select_statement->closeCursor();

    // Return the data of books
    return $select_genre;
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
