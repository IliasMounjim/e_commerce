<?php
require ('../model/database.php');



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

?>