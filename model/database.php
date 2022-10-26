
<?php 
$dsn = 'mysql:host=localhost; dbname=e_commerce';
$username = 'employee_manager';
$password = 'pa55word';

try {
    $db = new PDO($dsn, $username, $password);
    //echo '<p>You are successfuly connected to the database!</p>';
   
 } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>An error occurred while connecting to the database: $error_message </p>";
        include('view/error.php');
        exit();
   }


// $query = "SELECT EMP_NUM, EMP_LNAME, EMP_FNAME, EMP_INITIAL, EMP_HIREDATE, JOB_DESCRIPTION, JOB_CHARGE_HOUR
// FROM Employee INNER JOIN. Job 
// WHERE Employee.JOB_CODE = Job.JOB_CODE
// ORDER BY Employee.EMP_NUM";

// $statement = $db->prepare($query);
// // $statement→bindValue (':ProductId', $productId);
// $statement->execute();
// $employees = $statement->fetchAll();
// $statement->closeCursor();

//used later to show a dropdown option of jobs
// $query1 = "SELECT *
// FROM Job 
// ORDER BY Job.JOB_CODE";
// $statement1 = $db->prepare($query1);
// // $statement→bindValue (':ProductId', $productId);
// $statement1->execute();
// $jobs = $statement1->fetchAll();
// $statement1->closeCursor();



// //used later for Employee ID
// $query2 = "SELECT MAX(EMP_NUM) FROM Employee";
// $statement2 = $db->prepare($query2);
// $statement2->execute();
// $nextEmpNum = $statement2->fetch();
// $nextEmpNum = $nextEmpNum[0]+1;
// $nextEmpNum = strval($nextEmpNum);
// $statement2->closeCursor();

?>