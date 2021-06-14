<?php
session_start();
include_once(".\config.php");
$result = mysqli_query($mysqli, "SELECT * from users where id='" . $_SESSION['user'][2] . "'");
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
  <title>Address & Contact</title>
</head>

<body>
  <header class="minimalist-header">
    <div class="wrapper">
      <a href="index.php" class="home-btn">Back to Home</a>
    </div>
  </header>
  
  <div class="wrapper wrapper-address-page">
    <main class="address-main">
      <section class="address-section">
        <h1 class="address-h">Address and Contact</h1>
        <form action="handleAddressInfo.php" method="POST" class="address-form">
          <?php
          while ($res = mysqli_fetch_array($result)) {
            $fullName = empty($res['fullName']) ? '' : $res['fullName'];
            echo "<div>
            <label for=\"name\">Full Name</label>
            <input type=\"text\" name=\"name\" id=\"name\"  value=\"" . $res['fullName'] . "\"  required/>
          </div>
          <div>
            <label for=\"phone_number\">Phone Number</label>
            <input type=\"tel\" name=\"phone_number\" id=\"phone_number\" value=\"" . $res['phoneNumber'] . "\" required />
          </div>
          <div>
            <label for=\"country\">Country</label>
            <input name=\"country\" id=\"country\" value=\"" . $res['country'] . "\" />
          </div>
          <div>
            <label for=\"state\">State/Province/Region</label>
            <input type=\"text\" name=\"state\" id=\"state\" value=\"" . $res['state'] . "\" required />
          </div>
          <div>
            <label for=\"city\">City</label>
            <input type=\"text\" name=\"city\" id=\"city\" value=\"" . $res['city'] . "\" required />
          </div>
          <div>
            <label for=\"address\">Full House Address</label>
            <input type=\"text\" name=\"address\" id=\"address\" value=\"" . $res['address'] . "\" required />
          </div>
          <div>
            <label for=\"zip_code\">Zip Code</label>
            <input type=\"text\" name=\"zip_code\" id=\"zip_code\" value=\"" . $res['zipCode'] . "\" required />
          </div>";
          }
          ?>
          <input type="submit" class="submit-btn" value="Submit" />
        </form>
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
</body>

</html>