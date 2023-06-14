//Abdallah Abada, 02/17/2023, It202-006, unit 3 assignemnt, aa2972@njit.edu
<html>
<head>
	<title>Shipping</title>
	<link rel="stylesheet" href="styles.css">
	<style>
label {
display: block;
margin-bottom: 5px;
}
input[type="text"], input[type="date"] {
padding: 5px;
margin-bottom: 4px;
border: 1px solid black;
border-radius: 3px;
box-sizing: border-box;
width: 100%;
}
input[type="submit"] {
background-color: blue;
color: white;
padding: 10px 20px;
border: none;
border-radius: 3px;
cursor: pointer;
font-size: 16px;
}
input[type="submit"]:hover {
background-color:pink;
}
body{
font-family: Helvetica, sans-serif;
background-color: peachpuff;
margin: 0;
padding: 0;
}
header {
display: flex;
justify-content: space-between;
align-items: center;
padding: 19px;
background-color: orange;
box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
nav {
display: flex;
justify-content: space-between;
align-items: right;
width: 57%;
}
form {
margin: 0 10px;
}
button {
background: none;
border: none;
font-size: 18px;
font-weight: bold;
cursor: pointer;
}
button:hover {
color: blue;
}
p{
align-items: center;
}
</style>
	
</head>
<header>
	<nav>
	  <form method="POST" action="Dessert_Shop.php">
		<button type="submit">Home</button>
	  </form>
	  <form method="POST" action="Shopping_Page.php">
		<button type="submit">Shipping</button>
	  </form>
	 
	</nav>
	<?php
    session_start();
	?>
	<?php if (isset($_SESSION['user_id'])): ?>
		<p>Welcome <?php echo $_SESSION['firstName'] . ' ' . $_SESSION['lastName']; ?> (<?php echo $_SESSION['email']; ?>)</p>
		<a href="logout.php">Logout</a>
	<?php else: ?>
		<a href="login.php">Login</a>
	<?php endif; ?>
  </header>
<body>
	<form method="POST" action="shipping_label.php">
		<label>First name: </label>
		<input type="text" name="first_name"><br>
		<label>Last name: </label>
		<input type="text" name="last_name"><br>
		<label>Street address: </label>
		<input type="text" name="street_address"><br>
		<label>City: </label>
		<input type="text" name="city"><br>
		<label>State: </label>
		<input type="text" name="state"><br>
		<label>Zip code: </label>
		<input type="text" name="zip_code"><br>
		<label>Ship date: </label>
		<input type="date" name="ship_date"><br>
		<label>Order Number: </label>
		<input type="text" name="order_number"><br>
		<label>Height </label>
		<input type="text" name="width"><br>
        <label>Length</label> </label>
		<input type="text" name="height"><br>
        <label>Width </label>
		<input type="text" name="length"><br>
		<label>Package Weight: </label>
		<input type="text" name="weight"><br>
		<input type="submit" value="Submit">
	</form>
</body>
<footer>
	<p> 
		Location: 191 Abada ave, Newark, NJ, 07071</p>
</footer>
</html>