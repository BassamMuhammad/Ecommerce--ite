<?php
session_start();
include_once(".\config.php");
if (!isset($_SESSION['user'])) {
  header('Location: signin.html');
}
$result = mysqli_query($mysqli, "SELECT * from orders where user_id='" . $_SESSION['user'][2] . "'");
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
  <title>Order History</title>
</head>

<body>
  <header class="minimalist-header">
    <div class="wrapper">
      <a href="index.php" class="home-btn">Back to Home</a>
      <a class="logo" href="index.php">FastCommerce</a>
    </div>
  </header>

  <div class="wrapper">
    <main class="history-main">
      <h1 class="history-h">Orders History</h1>
      <ul class="history-items-list">
        <?php
        while ($res = mysqli_fetch_array($result)) {
          echo "<li class=\"order\">
            <div class=\"order__time\">
              <p>Order Date</p>
              <span>" . $res['createdAt'] . "</span>
            </div>

            <ul class=\"order__items-list\">
              <h2>Items Ordered</h2>";
          $result2 = mysqli_query($mysqli, "SELECT name,price from products,orders,ordered_products where products.id = product_id and orders.id = order_id and orders.id = '" . $res['id'] . "' and  user_id='" . $_SESSION['user'][2] . "'");
          $total = 0;
          while ($res2 = mysqli_fetch_array($result2)) {
            $total += $res2['price'];
            echo "<li class=\"order__item\">
                <p class=\"order__item__name\">" . $res2['name'] . "</p>
              </li>";
          }
          echo "</ul>
            <p class=\"order__cost\">Cost: <span>$" . $total . "</span></p>
            </li>";
        }
        $mysqli->close();
        ?>
      </ul>
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
</body>

</html>