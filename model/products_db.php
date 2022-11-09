<?php
require ('../model/database.php');



//this functions retreives all the employees in our DB and inner joins the Job table to display the employees job description and charge per hour.
function get_products() {
    global $db;
    try {
    $query =    "SELECT EMP_NUM, EMP_LNAME, EMP_FNAME, EMP_INITIAL, EMP_HIREDATE, JOB_DESCRIPTION, JOB_CHARGE_HOUR
                FROM Employee INNER JOIN. Job 
                WHERE Employee.JOB_CODE = Job.JOB_CODE
                ORDER BY Employee.EMP_NUM";

    $statement = $db->prepare($query);
    $statement->execute();
    $employees = $statement->fetchAll();
    $statement->closeCursor();
    return $employees;  //if successuful return  an array of all employees

    //if failed, PDOExeption is caught and proper error message is displayed along with error.php page.
    } catch (PDOException $e) {
        $error_message = "An error occurred while retreiving employees from the database: ";
        $error_message .= $e->getMessage();
        include('../view/error.php');
    }
}


//retreives one employee data to display the update-form with the  employees existing data.
function get_product($empNum) {
    global $db;

    try {
    $query =    "SELECT EMP_NUM, EMP_LNAME, EMP_FNAME, EMP_INITIAL, EMP_HIREDATE, JOB_CODE
                FROM Employee 
                WHERE EMP_NUM= :empNum";

    $statement = $db->prepare($query);
    $statement->bindValue(':empNum', $empNum);
    $statement->execute();
    $emp = $statement->fetchAll();
    $statement->closeCursor();
    return $emp;//if successuful returns an array with the employee in the first element

    //if failed, PDOExeption is caught and proper error message is displayed along with error.php page.

    } catch (PDOException $e) {
        $error_message = "An error occurred while retreiving employees from the database: ";
        $error_message .= $e->getMessage();
        include('view/error.php');
    }
}


//used later to show a dropdown option of jobs
function get_authors(){
    global $db;
    $query =   "SELECT *
                FROM Job 
                ORDER BY Job.JOB_CODE";
    try{
        $statement = $db->prepare($query);
        // $statement→bindValue (':ProductId', $productId);
        $statement->execute();
        $jobs = $statement->fetchAll();
        $statement->closeCursor();
        return $jobs;//if successuful returns an array of all jobs 

    //if failed, PDOExeption is caught and proper error message is displayed along with error.php page.
    }catch (PDOException $e) {   
        $error_message = "an error occurred retreiving data from the database: ";
        $error_message .= $e->getMessage();
        include('../view/error.php');
    }
}

//used to determine the ID of the next employee because EMP_NUM is not an integere and we can't do Auto Increment.
function getCategories(){
    global $db;
    //used later for Employee ID
    $query = "SELECT MAX(EMP_NUM) FROM Employee";

    try {
        $statement = $db->prepare($query);
    $statement->execute();
    $nextEmpNum = $statement->fetch();
    $statement->closeCursor();
    
    
    $nextEmpNum = $nextEmpNum[0]+1;
    //to make  sure we always have a 3 digit ID starting from 100.
    if ($nextEmpNum<100){
        $nextEmpNum=$nextEmpNum+100;
    }
    $nextEmpNum = strval($nextEmpNum);
    return $nextEmpNum;//if successuful returns the highest taken ID number, if no employees in the DB, it returns 100 as starting point

    //if failed, PDOExeption is caught and proper error message is displayed along with error.php page.
    }catch (PDOException $e) {   
        $error_message = "an error occurred while adding employee to the database: ";
        $error_message .= $e->getMessage();
        include('../view/error.php');
    }
}

//Adds new employee to the emp table.
function add_product($empNum, $fname, $lname, $initial, $hireDate ,$jobCode ) {
    $query = "INSERT INTO Employee (EMP_NUM, EMP_LNAME, EMP_FNAME, EMP_INITIAL, EMP_HIREDATE, JOB_CODE) 
    VALUES (:empNum, :fname,:lname,:initial,:hireDate, :jobCode)";
    global $db;

    try {
        $stmt= $db->prepare($query);
        $stmt->bindValue(':empNum', $empNum);
        $stmt->bindValue(':fname', $fname);
        $stmt->bindValue(':lname', $lname);
        $stmt->bindValue(':initial', $initial);
        $stmt->bindValue(':hireDate', $hireDate);
        $stmt->bindValue(':jobCode', $jobCode);
        if($stmt->execute()){
            $count =  $stmt->rowCount();
        };
        $stmt->closeCursor();
    //if successuful returns nothing

    //if failed, PDOExeption is caught and proper error message is displayed along with error.php page.

    } catch (PDOException $e) {
        $error_message = "An error occurred while adding employee to the database: ";
        $error_message .= $e->getMessage();
        include('../view/error.php');
    }
}



//updates an existing employee with $empID, if user only changed one field, all the other pre-existing info is sent as well to  make sure a uniform  update occurs.
function update_product($empNum, $fname, $lname, $initial, $hireDate ,$jobCode, $updateID ) {
    $query = "UPDATE Employee SET EMP_LNAME=:lname,EMP_FNAME=:fname,  EMP_INITIAL=:initial, EMP_HIREDATE=:hireDate, JOB_CODE =:jobCode
                  WHERE EMP_NUM =:updateID";         
    global $db;   

    try {
    $stmt= $db->prepare($query);
    $stmt->bindValue(':fname', $fname);
    $stmt->bindValue(':lname', $lname);
    $stmt->bindValue(':initial', $initial);
    $stmt->bindValue(':hireDate', $hireDate);
    $stmt->bindValue(':jobCode', $jobCode);
    $stmt->bindValue(':updateID', $updateID);
    if($stmt->execute()){
        $count =  $stmt->rowCount();
    };
    $stmt->closeCursor();    //if successuful returns nothing

    //if failed, PDOExeption is caught and proper error message is displayed along with error.php page.
    } catch (PDOException $e) {
    $error_message = "An error occurred while Updating employee to the database: ";
    $error_message .= $e->getMessage();
    include('../view/error.php');
    }
}


//deletea the employee with $deleteID
function delete_emp($deleteID ) {
    try{
        
        $query = "DELETE FROM Employee WHERE Employee.EMP_NUM =:deleteID";            
        global $db;   
        $stmt= $db->prepare($query);    
        $stmt->bindValue(':deleteID', $deleteID);
        if($stmt->execute()){
            $count =  $stmt->rowCount();
        };
        $stmt->closeCursor();//if employee deleted successufully, it returns nothing

        //if failed, PDOExeption is caught and proper error message is displayed along with error.php page.
    } catch (PDOException $e) {
        $error_message = "An error occurred while Deleting employee #";
        $error_message .= $deleteID;
        $error_message .= " from the database: ";
        $error_message .= $e->getMessage();
        include('../view/error.php');
    }
}

?>