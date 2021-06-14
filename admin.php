<?php
session_start();
include_once(".\config.php");
if (!isset($_SESSION['user'])) {
  header('Location: signin.html');
}
if (
  'admin@gmail.com' !== $_SESSION['user'][1]
) {
  header('Location: index.php');
}
$result = mysqli_query($mysqli, "SELECT * from products");
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="./css/main.css" />
  <title>Home</title>
</head>

<body>
  <header class="header admin-header">
    <div class="wrapper">
      <nav class="nav">
        <a class="logo" href="admin.php">FastCommerce</a>
        <form action="adminSearchProduct.php" class="search-form">
          <div class="search-field">
            <input type="text" placeholder="search products" name="product_name" required />
            <button class="submit-btn" type="submit"></button>
          </div>
        </form>
        <a href="signout.php">Log out</a>

      </nav>
    </div>
  </header>

  <div class="wrapper">
    <main class="admin-main">
      <a href="addProduct.html" class="add-product-btn">Add New Product</a>
      <ul class="products-list products-list-admin">

        <?php
        while ($res = mysqli_fetch_array($result)) {
          echo "<li class=\"product\" tabindex=\"1\" id=" . $res['id'] . ">
          <div id=" . $res['id'] . " class=\"product__image\">
            <img id=" . $res['id'] . " src=" . $res['imageUrl'] . " alt=\"product image\" />
          </div>
          <div id=" . $res['id'] . " class=\"product__details\">
            <p id=" . $res['id'] . " class=\"product__name\">" . $res['name'] . "</p>
            <p id=" . $res['id'] . " class=\"product__price\">$" . $res['price'] . "</p>
            <div id=" . $res['id'] . " class=\"product__details__cta-btns\">
              <a id=" . $res['id'] . " href=\"deleteProduct.php?id=" . $res['id'] . "\" class=\"remove-btn\">Remove</a>
              <a id=" . $res['id'] . " href=\"editProduct.php?id=" . $res['id'] . "\" class=\"edit-btn\">Edit</a>
            </div>
          </div>
        </li>";
        }
        $mysqli->close();
        ?>
      </ul>
    </main>
  </div>

  <footer>
    <div class="wrapper footer-grid">
      <a class="logo" href="admin.php">FastCommerce</a>
      <ul class="footer-links-list">
        <li><a class="footer-link" href="#">Return Policy</a></li>
        <li><a class="footer-link" href="#">About Us</a></li>
        <li><a class="footer-link" href="#">Contact</a></li>
        <li><a class="footer-link" href="#">Privacy Policy</a></li>
      </ul>
    </div>
  </footer>
</body>

</html>