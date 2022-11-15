
<?php 
$dsn = 'mysql:host=localhost; dbname=e_commerce';
$username = 'mgs_user';
$password = 'pa55word';

try {
    $db = new PDO($dsn, $username, $password);
    //echo '<p>You are successfuly connected to the database!</p>';
   
 } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>An error occurred while connecting to the database: $error_message </p>";
        include('../view/error.php');
        exit();
   }



?>
