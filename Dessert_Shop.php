//Abdallah Abada, 02/17/2023, It202-006, unit 3 assignemnt, aa2972@njit.edu
<html>
<head>
	<title>Abdallah's Desserts</title>
	<link rel="stylesheet" href="styles.css">
	<style>
body {
font-family: Helvetica, sans-serif;
background-color: peachpuff;
margin: 0;
padding: 0;
}
h1 {
font-size: 2em;
text-shadow: 1px 1px 1px white;
text-align: center;
margin-bottom: 20px;
margin-top: 30px;
color: #333;

}
p {
font-size: 1.2em;
line-height: 1.5em;
margin: 0 auto;
width: 80%;
color: black;
text-align: center;
margin-bottom: 40px;
}
img {
display: inline-block;
margin: 20px;
box-shadow: 2px 2px 3px black;
border: 3px solid black;
border-radius: 5px;
}
header {
display: flex;
justify-content: space-between;
align-items: center;
padding: 20px;
background-color: orange;
box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
}
nav {
display: flex;
justify-content: space-between;
align-items: right;
width: 60%;
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
  </style>
	</style>
</head>
<header>
	<nav>
	  <form method="POST" action="Dessert_Shop.php">
		<button type="submit">Home</button>
	  </form>
	  <form method="POST" action="dessert.php">
		<button type="submit">Our Stock</button>
	  </form>
	  <form method="POST" action="Shopping_Page.php">
		<button type="submit">Shipping</button>
	  </form>
	  <form method="POST" action="create.php">
		<button type="submit">Create</button>
	  </form>
	  <form method="POST" action="login.php">
		<button type="submit">Login</button>
	  </form>
	</nav>
	<?php
  
	?>
  </header>
  <?php if(isset($_SESSION['is_valid_admin'])) { ?>
      <h2><?php echo "Welcome " . $_SESSION['firstname'] . " ". $_SESSION['lastname'] . " (". $_SESSION['email'] . ")"; ?></h2>
    <?php } ?>
<body>
	<h1> Abdallah's Desserts </h1>
	<p> Abdallah's Desserts is a family-owned dessert shop that has been serving the community since 2023. We are motivated by our love for utilizing only the best ingredients to make mouthwatering sweets. Our vast selection of sweets, which includes cakes, pastries, and cookies, is suitable for any celebration. Every dessert we create, in our opinion, should not only taste delicious but also be stunning and sophisticated in appearance.</p>
	<img src="dessert.jpeg" alt="Image1" height="250">
	<img src="desi.jpg" alt="Image2" height="250">
	<img src="dessert2.jpeg" alt="Image3" height="250">
	<img src="cookies.jpg" alt="Image4" height="250">
</body>
<footer>
	<p> Location: 191 Abada ave, Newark, NJ, 07071</p>
</footer>
</html>