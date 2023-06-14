//Abdallah Abada, 04/21/2023, It202-006, unit 3 assignemnt, aa2972@njit.edu
<?php
require_once('database.php');
$dessertCategoryID = filter_input(INPUT_POST, 'category_id', FILTER_VALIDATE_INT);
$dessertID = filter_input(INPUT_POST, 'dessert_id', FILTER_VALIDATE_INT);
//getting the id 
if ($dessertCategoryID != false && $dessertID != false) {
    $query = 'DELETE FROM dessert WHERE dessertID = :dessertID LIMIT 1'; // Then deletes the chosen items 
    $db = $db = new PDO('mysql:host=localhost;dbname=dessert_shop', 'web_user', 'pa55word');
    $statement = $db->prepare($query);
    $statement->bindValue(':dessertID', $dessertID);
    $good = $statement->execute();
    $statement->closeCursor();
}
header('Location: dessert.php');
exit;
?>