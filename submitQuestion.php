<?php
include_once(".\config.php");
$result = mysqli_query($mysqli, "INSERT INTO faq(question) VALUES ('" . $_GET['question_body'] . "')");
$mysqli->close();
header('Location: faq.php');
