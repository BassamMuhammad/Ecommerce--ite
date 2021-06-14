<?php
$skip = true;
include_once(".\config.php");
$name = $_GET['product_name'];
$result = mysqli_query($mysqli, "SELECT * from products where name='$name'");
$mysqli->close();

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
    <header class="minimalist-header">
        <div class="wrapper">
            <a href="index.php" class="home-btn">Back to Home</a>
        </div>
    </header>
    <div class="wrapper">
        <main>
            <section class="product-details">
                <?php

                while ($res = mysqli_fetch_array($result)) {
                    $skip = false;
                    echo "  <div class=\"product-details__image\">";
                    echo "    <img src=" . $res['imageUrl'] . " alt=\"product image\" />";
                    echo "  </div>";
                    echo "  <div class=\"product-details__content\">";
                    echo "    <p class=\"product-details__content__name\">" . $res['name'] . "</p>";
                    echo "    <p class=\"product-details__content__price\">$" . $res['price'] . "</p>";
                    echo "    <a href=\"addToFavourite.php?id=" . $res['id'] . "\" class=\"add-to-favourites-btn\">Add to Favourites</a>";
                    echo "  </div>";
                    echo "  <form class=\"product-details__cta-btns\">";
                    echo "    <div class=\"quantity-field\">";
                    echo "      <label for=\"qauntity\">Quantity</label>";
                    echo "      <select id=\"quantity\" name=\"quantity\">";
                    echo "        <option value=\"1\">1</option>";
                    echo "        <option value=\"2\">2</option>";
                    echo "        <option value=\"3\">3</option>";
                    echo "        <option value=\"4\">4</option>";
                    echo "      </select>";
                    echo "    </div>";
                    echo "    <a href=\"addressInfo.php\" class=\"buy-btn\">Buy</a>";
                    echo "    <a href=\"addToCart.php?id=" . $res['id'] . "\"  class=\"add-to-cart-btn\">  Add to Cart</a>";
                    echo "  </form>";
                    echo "  <div class=\"product-details__description\">";
                    echo "    <h2>Description</h2>";
                    echo "    <p>" . $res['description'] .
                        "</p>";
                    echo " </div>";
                }
                if ($skip) {
                    echo "<h1>No product found :( </h1>";
                }
                ?>

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
    <?php
    if (!$skip)
        echo "<script src=\"js/productDetails.js\"></script>";
    ?>
</body>

</html>