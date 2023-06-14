//Abdallah Abada, 04/21/2023, It202-006, unit 3 assignemnt, aa2972@njit.edu
<?php
    require_once('database.php');
    
    function adminlogin($email, $password) {
        $db = new PDO('mysql:host=localhost;dbname=dessert_shop', 'web_user', 'pa55word');
        $query = 'SELECT password FROM dessertmanagers WHERE emailAddress = :email';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->execute();
        $each = $statement->fetch();
        $statement->closeCursor();
        if($each === false){return false;}
        else{
            $hash = $each['password'];
            return password_verify($password, $hash);
        }
    }
    function add_dessert_manager($email, $password, $firstName, $lastName) {
        $db = new PDO('mysql:host=localhost;dbname=dessert_shop', 'web_user', 'pa55word');
        $hash = password_hash($password, PASSWORD_DEFAULT);
        $query = 'INSERT INTO dessertmanagers (emailAddress, password, firstName, lastName)
                  VALUES (:email, :password, :firstName, :lastName)';
        $statement = $db->prepare($query);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':password', $hash);
        $statement->bindValue(':firstName', $firstName);
        $statement->bindValue(':lastName', $lastName);
        $statement->execute();
        $statement->closeCursor();
    }
    
?>
