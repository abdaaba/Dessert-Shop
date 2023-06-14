//Abdallah Abada, 04/12/2023, It202-006, unit 3 assignemnt, aa2972@njit.edu
<?php
require_once('database.php');
require_once('admitting.php');
session_start();
$db = new PDO('mysql:host=localhost;dbname=dessert_shop', 'web_user', 'pa55word');
$email = filter_input(INPUT_POST, 'email');
$password = filter_input(INPUT_POST, 'password');
if (adminlogin($email, $password)) {
    $_SESSION['is_valid_admin'] = true;
    $queryCategory = 'SELECT * FROM dessertmanagers WHERE emailAddress = :email';
    $statement1 = $db->prepare($queryCategory); 
    $statement1->bindValue(':email', $email); 
    $statement1->execute(); 
    $info = $statement1->fetch(); 
    $_SESSION['firstname'] = $info['firstName']; 
    $_SESSION['lastname'] = $info['lastName']; 
    $_SESSION['email'] = $email; 
    $statement1->closeCursor(); 
    header('Location: Dessert_Shop.php');
    exit;
} else {
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if ($email == NULL && $password == NULL) { $loginmessage = 'You need to log in.';}
         else {$loginmessage = 'Wrong login.';}
        include('login.php');
    }
}
?>