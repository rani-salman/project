<!DOCTYPE html>
<?php
include 'config.php';
$roomrows = $room_collection->find();
$bookCollection = $book_collection;
session_start();


if (isset($_POST["submit"])) {
  $roomFound = 'Demo';
  foreach ($roomrows as $roomrow) {
    if ($roomrow->type == $_POST['Type'] && $roomrow->status == "free") {
      $roomFound = $roomrow->number;
      break;
    }
  }
  // if ($roomFound === "Demo") {
  //   echo "<p class='red'>There are no free rooms with this types</p>";
  //   die();
  // }
  $wook =
    [
      'customerName' => $_SESSION["username"],
      'roomNumber' => $roomFound,
      'startDate' => $_POST['startDate'],
      'endDate' => $_POST['endDate'],
      'status' => 'pending',
      'roomType' => $_POST['Type']
    ];

  $_SESSION['roomInfo'] = $wook;
  header("Location: payments.php");


  //$result = $bookCollection->insertOne($wook);
}

?>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8" />
  <title>Room Reservation | Palm Spring Hotel</title>
  <link rel="stylesheet" href="../css/roomReservation.css" />
</head>

<body>
  <section>
    <div class="createProfileForm" id="div1">
      <h1>RESERVE A ROOM</h1>
      <br />
      <br />
      <form class="" action="roomReservation.php" method="post">
        <label for="">Room Type</label>
        <select class="fill" name="Type" required>
          <option value="single">Single Room</option>
          <option value="double">Double Room</option>
          <option value="suite">Suite</option>
          <option value="royal suite">Royal Suite</option>
        </select>
        <br />
        <br />
        <p></p>
        <p>
          <label class="startdate"> Start Date</label>
          <input class="fill" type="date" id="start" name="startDate" value="2022-11-01" min="2022-11-01" max="2022-12-31" required />
          <label class="enddate">End Date</label>
          <input class="fill" type="date" id="end" name="endDate" value="2022-11-01" min="2022-11-01" max="2022-12-31" required />
        </p>
        <br />
        <br />
        <br />
        <p>
          <input type="reset" value="CLEAR" class="button2" />
          <input type="submit" value="SUBMIT" class="button1" name="submit" />
        </p>
      </form>
    </div>

    <div class="createProfileImg">
      <img src="../photos and videos/hotel2.jpg" alt="" />
    </div>
  </section>
</body>

</html>