//Abdallah Abada, 04/21/2023, It202-006, unit 3 assignemnt, aa2972@njit.edu
<?php
if (!isset($loginmessage)) {
  $loginmessage = 'LOG IN';
 }
 ?>
<!DOCTYPE html>
<html>
    <head>
        <link rel="stylesheet" href="style.css">
    </head>
    <body>
        <header>
            <nav>
                <ul>
                    <li><a href="Dessert_Shop.php">Home</a></li>
                    <li><a href="Shopping_Page.php">Shipping</a></li>
                    <?php if (isset($_SESSION['is_valid_admin'])): ?>
                        <li><a href="logout.php"><button class="logout-btn">LOGOUT</button></a></li>
                    <?php else: ?>
                        <li><a href="login.php"><button class="login-btn">LOGIN</button></a></li>
                    <?php endif; ?>
                </ul>
            </nav>
            <?php if (isset($_SESSION['is_valid_admin'])): ?>
              <h3><?php echo "Welcome " . $_SESSION['firstname'] . " ". $_SESSION['lastname'] . " (". $_SESSION['email'] . ")"; ?></h3>
            <?php endif; ?>
        </header>
        <main>
            <h1>Login</h1>
            <p><?php echo $loginmessage; ?></p>
            <form action="authentication.php" method="post">
                <label>Email:</label>
                <input type="text" name="email" value="">
                <br>
                <label>Password:</label>
                <input type="password" name="password" value="">
                <br>
                <input type="submit" value="Login">
            </form>
        </main>
        <footer>
            <p>Location: 191 Abada Ave, Newark, NJ, 07071</p>
        </footer>
    </body>
</html>