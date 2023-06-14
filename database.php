//Abdallah Abada, 04/21/2023, It202-006, unit 3 assignemnt, aa2972@njit.edu
<?php
function callToDatabase(){
    $dsn = 'mysql:host=localhost;dbname=dessert_shop';
    $username = 'web_user';
    $password = 'pa55word';

    try{
        $db = new PDO($dsn, $username, $password);
    }catch(PDOException $exception){
        $error_message = $exception ->getMessage();
        include('error.php');
        exit();
    }}
    ?>
    