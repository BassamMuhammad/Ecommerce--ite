<?php
include_once(".\config.php");
session_start();
$skip = false;
if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
  $skip = true;
} else {
  $result = mysqli_query($mysqli, "SELECT * from products");
  $products = array();
  $total = 0;
  while ($res = mysqli_fetch_array($result)) {
    if (in_array($res['id'], $_SESSION['cart'])) {
      array_push($products, $res);
      $total += $res['price'];
    }
  }
  $mysqli->close();
}

?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/main.css" />
  <title>Your Cart</title>
</head>

<body>
  <header class="minimalist-header">
    <div class="wrapper">
      <a href="index.php" class="home-btn">Back to Home</a>
      <a class="logo" href="index.php">FastCommerce</a>
    </div>
  </header>
  <?php
  if (!$skip) {
    echo "<div class=\"wrapper\">
    <main class=\"cart-main\">
      <h1 class=\"your-cart-h\">Your Cart</h1>
      <h1 class=\"total-price-h\">Total Cost: $<span>" . $total . "</span></h1>
      <button type=\"button\" class=\"checkout-btn\" id=\"checkout-btn\">
        Proceed to Checkout
      </button>
      <ul class=\"cart-items-list\">";
    foreach ($products as $key => $value) {
      echo "  <li class=\"cart-item\">";
      echo "    <div class=\"cart-item__image\">";
      echo "      <img src=" . $value['imageUrl'] . " alt=\"product image\" />";
      echo "    </div>";

      echo "    <div class=\"cart-item__content\">";
      echo "      <p class=\"name\">" . $value['name'] . "</p>";
      echo "      <p class=\"quantity\">Price: $" . $value['price'] . "</p>";
      echo "      <a href=\"removeFromCart.php?id=" . $value['id'] . "\" class=\"remove-btn\">Remove</a>";
      echo "    </div>";
      echo "  </li>";
    }

    echo "</ul>
</main>
</div>";
  } else {
    echo "<h1> Cart is empty :( </h1>";
  }
  ?>
  <footer>
    <div class="wrapper footer-grid">
      <a class="logo" href="index.php">FastCommerce</a>
      <ul class="footer-links-list">
        <li><a class="footer-link" href="#">Return Policy</a></li>
        <li><a class="footer-link" href="faq.php">FAQ</a></li>
        <li><a class="footer-link" href="#">About Us</a></li>
        <li><a class="footer-link" href="#">Contact</a></li>
        <li><a class="footer-link" href="#">Privacy Policy</a></li>
      </ul>
    </div>
  </footer>
  <script src="js/header.js"></script>
  <script src="js/cart.js"></script>
</body>

</html>