//Abdallah Abada, 04/21/2023, It202-006, unit 3 assignemnt, aa2972@njit.edu
<html>
<body>
<?php 
  session_start();
  if (isset($_SESSION['is_valid_admin'])) { 
?>
    <p><a href="logout.php">Logout</a></p>
  <?php } else { ?>
    <p><a href="Dessert_Shop.php">Login</a></p>
  <?php } ?>
</body>
</html>