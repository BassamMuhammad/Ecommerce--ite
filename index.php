<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: signin.html');
}
include_once(".\config.php");
$result = mysqli_query($mysqli, "SELECT * from products");
$mysqli->close();

?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/main.css" />
  <title>Home</title>
</head>

<body>
  <header class="header">
    <div class="wrapper">
      <nav class="nav">
        <a href="#" class="hamburger-link">
          <img src="images/hamburger.svg" alt="hamburger icon" class="hamburger" />
        </a>
        <a class="logo" href="index.php">FastCommerce</a>
        <form action="searchProduct.php" class="search-form">
          <div class="search-field">
            <input type="text" placeholder="search products" name="product_name" required />
            <button class="submit-btn" type="submit"></button>
          </div>
        </form>

        <div class="nav__links">
          <a href="cart.php" class="shopping-cart-link">
            <img src="images/shopping-cart.svg" alt="shopping cart" class="shopping-cart" />
          </a>
          <a href="#" class="down-arrow-link">
            <img src="images/down-arrow.svg" alt="down arrow" class="down-arrow" />
          </a>
        </div>
      </nav>
      <section class="secondary-links secondary-links--hidden">
        <div class="secondary-links__flex">
          <div class="temp-hidden-links">
            <a class="logo" href="index.php">FastCommerce</a>

            <a href="cart.php" class="shopping-cart-link">
              <span> Cart</span>
              <img src="images/shopping-cart.svg" alt="shopping cart" class="shopping-cart" />
            </a>
          </div>
          <div class="secondary-links__list">
            <a href="accountSettings.php">Account Settings</a>
            <a href="favourites.php">Favourites</a>
            <a href="history.php">History</a>
            <a href="">Return Policy</a>
            <a href="faq.php">FAQ</a>
            <a href="">About Us</a>
            <a href="">Contact</a>
            <a href="">Privacy Policy</a>
            <a href="signout.php">Log out</a>
          </div>
        </div>
      </section>
    </div>
  </header>

  <div class="wrapper">
    <main>
      <div class="products-list">
        <?php
        while ($res = mysqli_fetch_array($result)) {
          echo "<div href=\"#\" class=\"product\" tabindex=\"1\" id=" . $res['id'] . ">";
          echo "  <div id=" . $res['id'] . " class=\"product__image\">";
          echo "    <img id=" . $res['id'] . " src=" . $res['imageUrl'] . " alt=\"product image\" />";
          echo "  </div>";
          echo "  <div id=" . $res['id'] . " class=\"product__details\">";
          echo "    <p id=" . $res['id'] . " class=\"product__name\">" . $res['name'] . "</p>";
          echo "    <p id=" . $res['id'] . " class=\"product__price\">$" . $res['price'] . "</p>";
          echo "    <a id=" . $res['id'] . " href=\"addToFavourite.php?id=" . $res['id'] . "\" class=\"add-to-favourites-btn\">Add to Favourites</a>";
          echo "    <a id=" . $res['id'] . " href=\"addToCart.php?id=" . $res['id'] . "\" class=\"add-to-cart-btn\">Add to Cart</a>";
          echo "  </div>";
          echo "</div>";
        }
        ?>

      </div>
    </main>
  </div>

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

  <script src="js/index.js"></script>
  <script src="js/header.js"></script>
</body>

</html>