//Abdallah Abada, 02/17/2023, It202-006, unit 3 assignemnt, aa2972@njit.edu
<?php
session_start();
require_once('database.php');
$db = new PDO('mysql:host=localhost;dbname=dessert_shop', 'web_user', 'pa55word');
$dessertCategoryID = filter_input(INPUT_GET, 'dessertCategoryID', FILTER_VALIDATE_INT) ?: 1;
$queryCategory = 'SELECT * FROM dessertcategories WHERE dessertCategoryID = :dessertCategoryID';
$one = $db->prepare($queryCategory);
$one->execute([':dessertCategoryID' => $dessertCategoryID]);
$category = $one->fetch();
$category_name = $category ? $category['dessertCategoryName'] : '';
$queryAllCategories = 'SELECT * FROM dessertcategories ORDER BY dessertCategoryID';
$two = $db->query($queryAllCategories);
$categories = $two->fetchAll();
$two->closeCursor();
$queryProducts = 'SELECT * FROM dessert WHERE dessertCategoryID = :dessertCategoryID ORDER BY dessertID';
$three = $db->prepare($queryProducts);
$three->execute([':dessertCategoryID' => $dessertCategoryID]);
$desserts = $three->fetchAll();
$three->closeCursor();
?>

<html>
<head>
    <title>Dessert Shop</title>
    <link rel="shortcut icon" href="desi.jpg">
    <link rel="stylesheet" href="style.css">
    <style>
    
</style>
</head>
<body>
<header>
<img src="dessert.jpeg" alt="Image1" height="250">
    <h1>Abdallah's Desserts</h1>
        <nav>
      <ul>
      <?php if (isset($_SESSION['is_valid_admin'])) { ?>
      <h3><?php echo "Welcome, " . $_SESSION['firstname'] . " " . $_SESSION['lastname'] . " (" . $_SESSION['email'] . ")"; ?></h3>
    <?php } ?>
        <li><a href="Dessert_Shop.php">Home</a></li>
        <li><a href="Shopping_Page.php">Shipping</a></li>
        <?php if (isset($_SESSION['is_valid_admin'])) { ?>
          <li><a href="logout.php"><button class="logout-btn">LOGOUT</button></a></li>
        <?php } else { ?>
          <li><a href="login.php"><button class="login-btn">LOGIN</button></a></li>
        <?php } ?>
      </ul>
    </nav>
</header>
<main>
    <aside>
        <h2>Categories</h2>
        <nav>
            <select name="dessertCategoryID" onchange="window.location.href=this.value">
                <?php foreach ($categories as $category) {
                    $chosen = $category['dessertCategoryID'] == $dessertCategoryID ? 'selected' : '';
                    echo "<option value='?dessertCategoryID={$category['dessertCategoryID']}' {$chosen}>{$category['dessertCategoryName']}</option>";
                } ?>
            </select>
        </nav>
    </aside>
    <section>
        <h2><?php echo $category_name; ?></h2>
        <table>
            <thead>
                <tr>
                    <th>Dessert Category</th>
                    <th>Dessert Code</th>
                    <th>Dessert Name</th>
                    <th>Dessert Description</th>
                    <th>Dessert Price</th>
                </tr>
    </thead>
    <tbody>
  <?php foreach ($desserts as $dessert): ?>
    <tr>
      <td><p1><?= $category_name ?></p1></td>
      <td><a href="details.php?dessert_id=<?= $dessert['dessertID'] ?>"><?= $dessert['dessertCode'] ?></a></td>
      <td><?= $dessert['dessertName'] ?></td>
      <td><?= $dessert['description'] ?></td>
      <td><?= $dessert['price'] ?></td>
      <td>
        <form action="delete.php" method="post" onsubmit="return confirm('Do you want to delete this item?')">
          <input type="hidden" name="dessert_id" value="<?= $dessert['dessertID'] ?>">
          <input type="hidden" name="category_id" value="<?= $dessert['dessertCategoryID'] ?>">
          <button type="submit">Delete</button>
        </form>
      </td>
    </tr>
  <?php endforeach ?>
</tbody>
</table>
<style>
    table {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 20px;
    }

    th, td {
        text-align: left;
        padding: 8px;
        border: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }

        body {
            font-family: Arial, sans-serif;
            background-color: peachpuff;
            font-size: 16px;
            line-height: 1.5;
            margin: 0;
            padding: 0;
        }
    header {
        background-color: orange;
        padding: 20px;
    }

    header img {
        height: 100px;
        width: 100px;
        object-fit: cover;
        border-radius: 50%;
        margin-right: 20px;
    }

    header h1 {
        font-size: 36px;
        margin: 0;
    }

    nav {
        display: inline-block;
        vertical-align: middle;
        margin-left: auto;
    }

    nav ul {
        list-style: none;
        margin: 0;
        padding: 0;
    }

    nav li {
        display: inline-block;
        margin-right: 20px;
    }

    nav a {
        color: #333;
        text-decoration: none;
    }

    nav a:hover {
        color: #666;
    }

    main {
        margin: 20px;
        display: flex;
        flex-direction: row;
        align-items: flex-start;
    }

    aside {
        width: 25%;
        padding-right: 20px;
    }

    aside h2 {
        font-size: 24px;
        margin-top: 0;
    }

    select {
        display: block;
        margin-top: 10px;
        width: 100%;
        padding: 10px;
        font-size: 16px;
        border-radius: 5px;
        border: none;
        background-color: #f2f2f2;
        color: #333;
        cursor: pointer;
    }

    section {
        width: 75%;
    }

    section h2 {
        font-size: 32px;
        margin-top: 0;
    }

    table {
        border-collapse: collapse;
        width: 100%;
        margin-bottom: 20px;
    }

    th, td {
        text-align: left;
        padding: 8px;
        border: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    tr:nth-child(even) {
        background-color: #f2f2f2;
    }

    tr:hover {
        background-color: #ddd;
    }
    footer{
        background-color: peachpuff;
        text-align: center;
        margin-bottom: 20px;
    }

    
</style>

</section>
</main>
<footer>
    <p> Location: 191 Abada ave, Newark, NJ, 07071</p>
    </footer>
</body>
</html>