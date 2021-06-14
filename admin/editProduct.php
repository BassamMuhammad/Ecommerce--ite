<?php
include_once("../config.php");
$id = $_GET['id'];
$result = mysqli_query($mysqli, "SELECT * from products where id=$id");
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="../css/main.css" />
  <title>Edit Product</title>
</head>

<body>
  <header class="minimalist-header">
    <div class="wrapper">
      <a href="admin.php" class="home-btn">Back to Home</a>
    </div>
  </header>
  <div class="wrapper wrapper-address-page">
    <main class="edit-product-main">

      <section class="edit-product-section">
        <h1 class="product-form-h">Edit Product Details</h1>
        <form action="handleEditProduct.php" class="admin-product-form add-product-form">
          <?php
          while ($res = mysqli_fetch_array($result)) {
            echo "<div>
            <input type=\"hidden\" name=\"id\" id=\"id\" value=" . $res['id'] . "  />
          </div>
            <div>
            <label for=\"name\">Name</label>
            <input type=\"text\" name=\"name\" id=\"name\" value=" . $res['name'] . " required />
          </div>

          <div>
            <label for=\"image\">Image</label>
            <input type=\"text\" name=\"image\" id=\"image\" value=" . $res['imageUrl'] . " required />
          </div>

          <div>
            <label for=\"price\">Price</label>
            <input type=\"number\" name=\"price\" id=\"price\" value=" . $res['price'] . " required placeholder=\"In dollars\" />
          </div>

          
          <div>
            <label for=\"description\">Description</label>
            <textarea name=\"description\" id=\"description\" rows=\"10\">" . $res['description'] . "
              </textarea>
          </div>

          <input type=\"submit\" class=\"submit-btn\" value=\"Submit\"/>";
          }
          $mysqli->close();
          ?>

        </form>
      </section>
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