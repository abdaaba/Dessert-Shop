//Abdallah Abada, 02/17/2023, It202-006, unit 3 assignemnt, aa2972@njit.edu
<?php
if($_SERVER["REQUEST_METHOD"] == "POST") {
    $height = $_POST["height"];
    $weight = $_POST["weight"];
    $length = $_POST["length"];
    $width = $_POST["width"];
    if($height > 36 || $length > 36 || $width > 36  || $weight > 150) {$error = "Package weight and dimensions cannot exceed 150 pounds and 36.";}
    if(empty($error)) {include 'shipping_form.php';}
    else {echo $error;}
  }
  ?>
  