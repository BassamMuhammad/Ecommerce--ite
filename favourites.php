<?php
include_once(".\config.php");
session_start();
$skip = false;
if (!isset($_SESSION['favourite']) || empty($_SESSION['favourite'])) {
  echo "<h1> Favourites is empty :( </h1>";
  $skip = true;
} else {
  $result = mysqli_query($mysqli, "SELECT * from products");
  $products = array();
  $total = 0;
  while ($res = mysqli_fetch_array($result)) {
    if (in_array($res['id'], $_SESSION['favourite'])) {
      array_push($products, $res);
      $total += $res['price'];
    }
  }
  $mysqli->close();
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="css/main.css" />
  <title>Your Favourites</title>
</head>

<body>
  <header class="minimalist-header">
    <div class="wrapper">
      <a href="index.php" class="home-btn">Back to Home</a>
    </div>
  </header>
  <?php
  if (!$skip) {
    echo "<div class=\"wrapper\">
    <main class=\"favourites-main\">
      <h1 class=\"favourites-h\">Your Favourites</h1>
      <ul class=\"favourite-items-list\">
        <li class=\"favourite-item\">";
    foreach ($products as $key => $value) {
      echo " <div class=\"favourite-item__image\">
            <img src=" . $value['imageUrl'] . " alt=\"product image\" />
          </div>

          <div class=\"favourite-item__content\">
            <p class=\"name\">" . $value['name'] . "</p>
            <p class=\"price\">$" . $value['price'] . "</p>
            <a href=\"removeFromFavourite.php?id=" . $value['id'] . "\" class=\"remove-btn\">Remove</a>
          </div>";
    }
    echo "</li>
        
      </ul>
    </main>
  </div>";
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
  <script src="js/main.js"></script>
  <script src="js/header.js"></script>
</body>

</html>