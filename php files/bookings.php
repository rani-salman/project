<!DOCTYPE html>
<?php
include 'config.php';
$bookingCollection = $book_collection;
$tableCollection =
  $reserve_collection;
session_start();
$resultRooms =
  $bookingCollection->find(["customerName" => $_SESSION["username"]]);
$TableRooms
  = $tableCollection->find(["customerName" => $_SESSION["username"]]); ?>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../css/bookings.css" />
  <title>Bookings | Palm Spring Hotel</title>
</head>

<body>
  <div id="navigation"></div>
  <div class="header">
    <h2><em>Your Bookings:</em></h2>
  </div>
  <?php foreach ($resultRooms as $roomrow) : ?>
    <div class="Book" id="b1">
      <p class="title">Room Booking</p>
      <p class="info">Room type: <?php echo $roomrow->roomType ?></p>
      <p class="date">
        <?php echo $roomrow->startDate ?> to
        <?php echo $roomrow->endDate ?>
      </p>
      <p>Room number: <?php echo $roomrow->roomNumber ?></p>
      <span><a href="OrderMeal.php"><button class="buttons" style="color: black">Order a Meal</button></a>
        <!-- <button class="buttons" style="color: black">Cancel</button></span> -->
    </div>
  <?php endforeach; ?>

  <?php foreach ($TableRooms as $tablerow) : ?>
    <div class="Book" id="b2">
      <p class="title">Restaurant Table Booking</p>
      <p class="info">
        Table for
        <?php echo $tablerow->guest ?>
      </p>
      <p class="info">
        View:
        <?php echo $tablerow->tableView ?>
      </p>
      <p class="date">
        <?php echo $tablerow->date ?> at
        <?php echo $tablerow->time ?>
      </p>
      <button class="buttons" style="color: black">Cancel</button>
    </div>
  <?php endforeach; ?>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script>
    $(function() {
      $("#navigation").load("../html/navbarLoggedIn.html");
    });
  </script>
</body>

</html>