<?php
include_once(".\config.php");
$result = mysqli_query($mysqli, "SELECT * from faq");
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
  <title>FAQ</title>
</head>

<body>
  <header class="minimalist-header">
    <div class="wrapper">
      <a href="index.php" class="home-btn">Back to Home</a>
    </div>
  </header>

  <div class="wrapper">
    <main class="faq-main">
      <a href="#ask-Q-section" class="ask-Q-btn">Ask a Question</a>
      <ul class="faqs-list">
        <?php
        while ($res = mysqli_fetch_array($result)) {
          if (!isset($res['answer'])) continue;
          echo "<li class=\"faq\">
          <div class=\"question\">
            <span>Q</span>
            <p>" . $res['question'] . "</p>
          </div>
          <div class=\"answer\">
            <span>Answer</span>
            <p>" . $res['answer'] . "</p>
          </div>
        </li>";
        };
        ?>
      </ul>

      <section class="ask-Q-section" id="ask-Q-section">
        <h1>Ask a Question</h1>
        <form action="submitQuestion.php" class="ask-Q-form">
          <div>
            <label for="question_title">Enter Title</label>
            <input type="text" name="question_title" id="question_title" placeholder="Question title" required />
          </div>
          <textarea name="question_body" id="body" placeholder="Your question" required></textarea>
          <input class="submit-btn" type="submit" value="Submit" />
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