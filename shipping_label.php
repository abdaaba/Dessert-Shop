//Abdallah Abada, 02/17/2023, It202-006, unit 3 assignemnt, aa2972@njit.edu
<html>
  <header>
    
</header>
<h1>Shipping Label</h1>
<body style="background-color:peachpuff;">
<table>
  <tr>
    <td>To Address: </td>
    <td><?php echo $_POST["first_name"]." ".$_POST["last_name"]."<br>".$_POST["street_address"]."<br>".$_POST["city"].", ".$_POST["state"]." ".$_POST["zip_code"]; ?></td>
  </tr>
  <tr>
    <td>Package Dimensions: </td>
    <td><?php echo $_POST["length"]." x ".$_POST["width"]." x ".$_POST["height"]." in"; ?></td>
  </tr>
  <tr>
    <td>Package Weight: </td>
    <td><?php echo $_POST["weight"]." lbs"; ?></td>
  </tr>
  <tr>
    <td>Shipping Company: </td>
    <td><?php echo "UPS"; ?></td>
  </tr>
  <tr>
    <td>Shipping Class: </td>
    <td><?php echo "Next Day Air"; ?></td>
  </tr>
  <tr>
    <td>Tracking Number: </td>
    <td><?php echo "21839621788549625"; ?></td>
  </tr>
  <tr>
    <td>Barcode: </td>
    <td><img src="barcode.png" alt="tracking number barcode" height="175"></td>
  </tr>
  <tr>
    <td>Order Number:</td>
    <td><?php echo $_POST["order_number"] ; ?></td>
  </tr>
  <tr>
    <td>Ship Date: </td>
    <td><?php echo $_POST["ship_date"]; ?></td>
  </tr>
<html>
  <style>
table{
font-family: Helvetica, sans-serif;
background-color: white;
margin: 0;
padding: 0;
}
    </style>
