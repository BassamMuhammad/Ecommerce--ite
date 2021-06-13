<?php
include_once(".\config.php");
$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * from products where id=$id");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="css/main.css" />

  <title>Product Details</title>
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
          </div>
        </div>
      </section>
    </div>
  </header>
  <div class="wrapper">
    <main>
      <section class="product-details">
        <?php
        while ($res = mysqli_fetch_array($result)) { ?>
          <div class="product-details__image">
            <img src="<?php echo $res['imageUrl'] ?>" alt="product image" />
          </div>
          <div class="product-details__content">
            <p class="product-details__content__name"><?php echo $res['name'] ?></p>
            <p class="product-details__content__price">$<?php echo $res['price'] ?></p>
            <a href="addToFavourite.php?id=<?php echo $res['id'] ?>" class="add-to-favourites-btn">Add to Favourites</a>
          </div>
          <form class="product-details__cta-btns">
            <div class="quantity-field">
              <label for="qauntity">Quantity</label>
              <select id="quantity" name="quantity">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
              </select>
            </div>
            <a href="addressInfo.php" class="buy-btn">Buy</a>
            <a 
             
            id=<?php echo $res['id'] ?> class="add-to-cart-btn"> Add to Cart</a>
          </form>
          <div class="product-details__description">
            <h2>Description</h2>
            <p>
              <?php echo $res['description'] ?>
            </p>
          </div>
        <?php  } ?>

      </section>
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
  <script src="js/header.js"></script>
  <script src="js/productDetails.js"></script>
</body>

</html>