//Abdallah Abada, 04/21/2023, It202-006, unit 3 assignemnt, aa2972@njit.edu
<?php
require_once('database.php');
$db = new PDO('mysql:host=localhost;dbname=dessert_shop', 'web_user', 'pa55word');

$statement = $db->prepare('SELECT * FROM dessert WHERE dessertID = :dessertID');
$statement->bindValue(':dessertID', filter_input(INPUT_GET, 'dessert_id', FILTER_VALIDATE_INT)); // get the id and make sure is validated 
$statement->execute();
$dessert = $statement->fetch(PDO::FETCH_ASSOC);

if (!$dessert) {
    echo 'Error: Dessert does not exist'; // error message
    exit();
}
//details
$dessertCode = $dessert['dessertCode'];
$dessertName = $dessert['dessertName'];
$description = $dessert['description'];
$price = $dessert['price'];
//connection is closed
$db = null;
?>
<html>
<head>
    <link rel="shortcut icon" type="image/x-icon" href="desi.jpg" />
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <div class="logo">
            <img src="desi.jpg" alt="logo" class="complogo">
        </div>
        <nav>
            <ul>
                <li><a href="Dessert_Shop.php"><b>Home</b></a></li>
                <li><a href="dessert.php"><b>Our Stock</b></a></li>
                <?php
                session_start();
                if (isset($_SESSION['is_valid_admin'])) {
                ?>
                    <li><a href="shipping_form.php"><b>Shipping</b></a></li>
                    <li><a href="create.php"><b>Create</b></a></li>
                <?php } ?>
                <li><a href="<?= isset($_SESSION['is_valid_admin']) ? 'logout.php' : 'login.php' ?>">
                    <b><?= isset($_SESSION['is_valid_admin']) ? 'LOGOUT' : 'LOGIN' ?></b></a>
                </li>
            </ul>
        </nav>
    </header>
    <br><br><br><br>
    <ul style="text-align: center;">
        <li>
            <div>
                <h2><?= $dessertName ?></h2>
                <p6><?= $description ?></p6><br><br><br>
                <p7>$<?= $price ?></p7><br><br><br>
                <?php
                $imagePath = 'images/' . $dessertCode . '.jpg';
                if (file_exists($imagePath)) {
                    ?>
                    <div id="image_rollovers">
                        <img src="<?= $imagePath ?>" alt="<?= $dessertName ?>">
                    </div>
                    <?php
                } else {
                    ?>
                    <p>No image available</p>
                    <?php
                }
                ?>
            </div>
        </li>
    </ul>
    <br><br><br><br>
    <footer>
        <p>Location: 191 Abada ave, Newark, NJ, 07071</p>
    </footer>
</body>

  
</html>