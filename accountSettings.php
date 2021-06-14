<?php
session_start();
if (!isset($_SESSION['user'])) {
  header('Location: signin.html');
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
  <title>Account Settings</title>
</head>

<body>
  <header class="minimalist-header">
    <div class="wrapper">
      <a href="index.php" class="home-btn">Back to Home</a>
    </div>
  </header>

  <div class="wrapper">
    <main class="account-settings-main">
      <section class="edit-account-section">
        <form action="changeNameAndEmail.php" method="POST" class="edit-account-form" id="no-password-form">
          <button type="button" class="edit-btn">Edit</button>
          <div>
            <label for="name">Name</label>
            <input type="text" name="name" id="name" value="<?php echo $_SESSION['user'][0] ?>" disabled>
          </div>
          <div>
            <label for="email">Email</label>
            <input type="email" name="email" id="email" value="<?php echo $_SESSION['user'][1] ?>" disabled />
          </div>
          <input type="submit" class="submit-btn submit-btn--disabled" value="Save" disabled />

        </form>

        <form action="changePassword.php" method="POST" class="edit-account-form change-password-form">
          <button type="button" class="edit-btn change-password-btn">
            Change Password
          </button>
          <div>
            <input type="password" name="old_password" id="old_password" placeholder="Enter old password" disabled required />
            <input type="password" name="new_password" id="new_password" placeholder="Enter new password" disabled required />
          </div>
          <input type="submit" value="Change" class="submit-btn submit-btn--disabled" disabled />
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

  <script src="js/accountSettings.js"></script>
</body>

</html>