<?php
include_once(".\config.php");
session_start();
$skip = false;
if (isCartEmpty()) {
  $skip = true;
} else {
  $result = mysqli_query($mysqli, "SELECT * from products");
  $products = array();
  $total = 0;
  while ($res = mysqli_fetch_array($result)) {
    foreach ($_SESSION['cart'] as $product) {
      if ($product['id'] === $res['id']) {
        array_push(
          $products,
          ['id' => $product['id'], 'name' => $res['name'], 'quantity' => $product['quantity'], 'imageUrl' => $res['imageUrl']]
        );
        $total += $res['price'] * $product['quantity'];
        break;
      }
    }
  }
  $mysqli->close();
}

function isCartEmpty()
{
  return !isset($_SESSION['cart']) || empty($_SESSION['cart']);
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
    </div>
  </header>
  <?php if (!$skip) { ?>
    <div class="wrapper">
      <main class="cart-main">
        <h1 class="your-cart-h">Your Cart</h1>
        <h1 class="total-price-h">Total Cost: $<span><?php echo $total ?></span></h1>
        <button type="button" class="checkout-btn" id="checkout-btn">
          Proceed to Checkout
        </button>
        <ul class="cart-items-list">
          <?php foreach ($products as $key => $value) { ?>
            <li class="cart-item">
              <div class="cart-item__image">
                <img src=<?php echo $value['imageUrl'] ?>alt="product image" />
              </div>

              <div class="cart-item__content">
                <p class="name"> <?php echo $value['name'] ?> </p>
                <p class="quantity">Quantity: <?php echo $value['quantity'] ?> </p>
                <a href="removeFromCart.php?id=<?php echo $value['id'] ?>" class="remove-btn">Remove</a>
              </div>
            </li>
          <?php } ?>
        </ul>
      </main>
    </div>
  <?php } else {
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