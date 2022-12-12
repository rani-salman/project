<?php
session_start();
$username = $_SESSION['username'];
//$username = "ali youssef";
if (!isset($_COOKIE['firsttime'])) {
  setcookie("firsttime", "no", time() + 3600 * 24 * 365);
  header('Location: first-time-payment.php');
  exit();
} else {
  header('Location: exist-payment.php');
  exit();
}
