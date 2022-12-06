<?php
require ('../model/database.php');

function get_user($userID) {
    global $db;
    $query = 'SELECT * 
              FROM users JOIN addresses ON users.userID=addresses.userID
              WHERE users.userID =  :userID';
    try {   
        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $userID);
        $statement->execute();    
        $user = $statement->fetch();
        $statement->closeCursor();    
        return $user;
    } catch(PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>An error occurred while adding user to the database: $error_message </p>";
    }
}


//function add_user($emailAddress, $userPassword, $userName, $shipAddressID, $billingAddressID)
function add_user($emailAddress, $userPassword, $userName) {
    global $db;
	$userPassword = password_hash ($userPassword, PASSWORD_BCRYPT);
    $priv='1';
    $query = 'INSERT INTO users
                 (privileges, emailAddress, userPassword, userName)
              VALUES
                 (:privileges, :emailAddress, :userPassword, :userName)';
    
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':privileges', $priv);
        $statement->bindValue(':emailAddress', $emailAddress);
        $statement->bindValue(':userPassword', $userPassword);
        $statement->bindValue(':userName', $userName);
        $statement->execute();
        $id = $db->lastInsertId();
        $statement->closeCursor();
        return $id;

        //header('Location: index.php');
        
    
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>An error occurred while adding user to the database: $error_message </p>";
    }
    
}



function edit_user($userID, $emailAddress, $userPassword, $userName){
    global $db;
	$userPassword = password_hash ($userPassword, PASSWORD_BCRYPT);
    $query = 'UPDATE users SET  emailAddress=:emailAddress, userPassword=:userPassword, userName=:userName
             WHERE users.userID = :userID';
    
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':emailAddress', $emailAddress);
        $statement->bindValue(':userPassword', $userPassword);
        $statement->bindValue(':userName', $userName);
        $statement->bindValue(':userID', $userID);
        $statement->execute();
        $statement->closeCursor();
        // return true;

        //header('Location: index.php');
        
    
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>An error occurred while adding user to the database: $error_message </p>";
    }
}


function edit_Address($addressID, $line1, $line2, $city, $address_State, $zipCode, $phone){
    global $db;
    $query = 'UPDATE  addresses SET
                 line1 =:line1, line2=:line2, city=:city, address_State=:address_State, zipCode=:zipCode, phone=:phone
            
              WHERE addresses.addressID = :addressID  ';
   
    try {
        $statement = $db->prepare($query);

        $statement->bindValue(':addressID', $addressID);
        $statement->bindValue(':line1', $line1);
        $statement->bindValue(':line2', $line2);
        $statement->bindValue(':city', $city);
        $statement->bindValue(':address_State', $address_State);
        $statement->bindValue(':zipCode', $zipCode);
        $statement->bindValue(':phone', $phone);
        
        $statement->execute();
        
        $statement->closeCursor();
        // return true;

            //header('Location: index.php');
        
    
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>An error occurred while adding address to the database: $error_message </p>";
    }
}

function add_Admin($emailAddress, $userPassword, $userName) {
    global $db;
	$userPassword = password_hash ($userPassword, PASSWORD_BCRYPT);
    $priv='2';
    $query = 'INSERT INTO users
                 (privileges, emailAddress, userPassword, userName)
              VALUES
                 (:privileges, :emailAddress, :userPassword, :userName)';
    
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':privileges', $priv);
        $statement->bindValue(':emailAddress', $emailAddress);
        $statement->bindValue(':userPassword', $userPassword);
        $statement->bindValue(':userName', $userName);
        $statement->execute();
        $id = $db->lastInsertId();
        $statement->closeCursor();
        return $id;
        //header('Location: index.php');
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>An error occurred while adding Admin user to the database: $error_message </p>";
    }
    
}


function get_userPriv($emailAddress) {
    global $db;
    $query = '  SELECT privileges 
                FROM users
                WHERE emailAddress = :emailAddress';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':emailAddress', $emailAddress);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        if ($row != null) {
            $privileges = $row['privileges'];
            return $privileges;
        }
        else {
            return 0;
        }

    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>An error occurred while fetching user: $error_message </p>";
    }
    
}


function add_address($userID, $line1, $line2, $city, $state, $zipCode, $phone) {
    global $db;
    $address_Disabled='0';
    $query = 'INSERT INTO addresses
                 (userID, line1, line2, city, address_State, zipCode, phone, address_Disabled)
              VALUES
                 (:userID, :line1, :line2, :city, :address_State, :zipCode, :phone, :address_Disabled)';
   
    try {
        $statement = $db->prepare($query);

        $statement->bindValue(':userID', $userID);
        $statement->bindValue(':line1', $line1);
        $statement->bindValue(':line2', $line2);
        $statement->bindValue(':city', $city);
        $statement->bindValue(':address_State', $state);
        $statement->bindValue(':zipCode', $zipCode);
        $statement->bindValue(':phone', $phone);
        $statement->bindValue(':address_Disabled', $address_Disabled);
        
        $statement->execute();
        $id = $db->lastInsertId();
        $statement->closeCursor();
        return $id;

            //header('Location: index.php');
        
    
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>An error occurred while adding address to the database: $error_message </p>";
    }
    
}

function bind_address($userID,  $id){
    global $db;
    
    $query = "UPDATE users SET shipAddressID=:shipAddressID WHERE userID=:userID";
   
    try {
        $statement = $db->prepare($query);

        $statement->bindValue(':userID', $userID);
        $statement->bindValue(':shipAddressID', $id);
        $statement->execute();
        $id = $db->lastInsertId();
        $statement->closeCursor();
        return $id;

            //header('Location: index.php');
        
    
    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>An error occurred while adding address to the database: $error_message </p>";
    }
    
}



function is_valid_user($emailAddress, $userPassword) {
    global $db;
    $query = '  SELECT userPassword 
                FROM users
                WHERE emailAddress = :emailAddress';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':emailAddress', $emailAddress);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        if ($row != null) {
            $hash = $row['userPassword'];
            return password_verify($userPassword, $hash);
        }
        else {
            return 0;
        }

    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>An error occurred while logging in: $error_message </p>";
    }
    
}


function valid_userID($emailAddress) {
    global $db;
    $query = '  SELECT userID 
                FROM users
                WHERE emailAddress = :emailAddress';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':emailAddress', $emailAddress);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        if ($row != null) {
            $id = $row['userID'];
            return $id;
        }
        else {
            return 0;
        }

    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>An error occurred while fetching user: $error_message </p>";
    }
    
}


function valid_userName($emailAddress) {
    global $db;
    $query = '  SELECT userName 
                FROM users
                WHERE emailAddress = :emailAddress';
    try {
        $statement = $db->prepare($query);
        $statement->bindValue(':emailAddress', $emailAddress);
        $statement->execute();
        $row = $statement->fetch();
        $statement->closeCursor();
        if ($row != null) {
            $userName = $row['userName'];
            return $userName;
        }
        else {
            return 0;
        }

    } catch (PDOException $e) {
        $error_message = $e->getMessage();
        echo "<p>An error occurred while fetching user: $error_message </p>";
    }
    
}
