//Abdallah Abada, 03/21/2023, It202-006, unit 3 assignemnt, aa2972@njit.edu
<?php
require_once('database.php');

if (isset($_POST['submit'])) {
  $ca = $_POST['category'];
  $c = $_POST['code'];
  $n = $_POST['name'];
  $des = $_POST['description'];
  $p = $_POST['price'];
  
  $insertion = "INSERT INTO dessert (dessertCategoryID, dessertCode, dessertName, description, price, dateAdded)
   VALUES (:category, :code, :name, :description, :price, NOW())";
  $db = new PDO('mysql:host=localhost;dbname=dessert_shop', 'web_user', 'pa55word');
  $statement = $db->prepare($insertion);
  $statement->bindValue(':category', $ca);
  $statement->bindValue(':code', $c);
  $statement->bindValue(':name', $n);
  $statement->bindValue(':description', $des);
  $statement->bindValue(':price', $p);
  $success = $statement->execute();
  $statement->closeCursor();
  
  if ($success) {
    echo "Successful!";
  } else {
    echo "Failed!";
  }
}
?>
<html>
<header>
	<nav>
	  <form method="POST" action="Dessert_Shop.php">
		<button type="submit">Home</button>
	  </form>
	  <form method="POST" action="Shopping_Page.php">
		<button type="submit">Shipping</button>
	  </form>
	</nav>
  </header>
<body>

<h2>Dessert Insertion</h2>
<link rel="shortcut icon" href="desi.jpg">
 <link rel="stylesheet" href="style.css">

<form method="post">
  <label for="dessertCategoryID">Category:</label><br>
  <input type="text" id="category" name="category"><br>
  <label for="dessertCode">Code:</label><br>
  <input type="text" id="code" name="code"><br>
  <label for="dessertName">Name:</label><br>
  <input type="text" id="name" name="name"><br>
  <label for="description">Description:</label><br>
  <input type="text" id="description" name="description"></input><br>
  <label for="price">Price:</label><br>

  <script>
    const dessertCode = document.querySelector("#code");
    const dessertName = document.querySelector("#name");
    const dessertDescription = document.querySelector("#description");
    const dessertPrice = document.querySelector("#price");

    // FUNCTIONS TO VALIDATE THE COMPONENTS
    function validatecode() {
      const val = dessertCode.value.trim();
      if (val === "") {dessertCode.setCustomValidity("This field is empty");} 
      else if (val.length < 4) {dessertCode.setCustomValidity("minimum of 4 characters");} 
      else if (val.length > 10) {dessertCode.setCustomValidity("maximum of 10 characters");} 
      else {dessertCode.setCustomValidity("");}
    }
    function validatename() {
      const val = dessertName.value.trim();
      if (val === "") {dessertName.setCustomValidity("This field is empty");} 
      else if (val.length < 10) {dessertName.setCustomValidity("minimum of 10 characters");}
       else if (val.length > 100) {dessertName.setCustomValidity("maximum of 100 characters");} 
       else {dessertName.setCustomValidity("");}
    }

    function validatedescription() {
      const val = dessertDescription.value.trim();
      if (val === "") {dessertDescription.setCustomValidity("This field is empty"); } 
      else if (val.length < 10) {dessertDescription.setCustomValidity("minimum of 10 characters");} 
      else if (val.length > 255) {dessertDescription.setCustomValidity("maximum of 255 characters");} 
      else {dessertDescription.setCustomValidity("");}
    }
    function validateprice() {
      const val = parseFloat(dessertPrice.value.trim());
      if (isNaN(val)) {dessertPrice.setCustomValidity("This field is empty"); } 
      else if (val <= 0) {dessertPrice.setCustomValidity("cannot be negative or zero");} 
      else if (val > 100000) {dessertPrice.setCustomValidity("maximum is $100,000");} 
      else {dessertPrice.setCustomValidity("");}
    }
    // add EventListener
    dessertCode.addEventListener("input", validatecode);
    dessertName.addEventListener("input", validatename);
    dessertDescription.addEventListener("input", validatedescription);
    dessertPrice.addEventListener("input", validateprice);

  
</script>
  <input type="text" id="price" name="price"><br><br>
  <input type="reset" name="reset" value="Reset">
  <input type="submit" name="submit" value="Submit">
</form>



</body>
<footer>
	<p> Location: 191 Abada ave, Newark, NJ, 07071</p>
</footer>
</html>