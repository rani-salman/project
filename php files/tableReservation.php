<!DOCTYPE html>
<?php
include 'config.php';
session_start();
if (isset($_POST["submit"])) {
  $table =
    [
      'tableView' => $_POST['view'],
      'guest' => $_POST['nbofGuests'],
      'time' => $_POST['time'],
      'date' => $_POST['date'],
      'customerName' => $_SESSION["username"]
    ];


  $result = $reserve_collection->insertOne($table);
}
?>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8" />
  <title>Table Reservation | Palms Spring Hotel</title>
  <link rel="stylesheet" href="../css/tableReservationStyles.css" />
</head>

<body>
  <section>
    <div class="createProfileForm" id="div1">
      <h1>RESERVE A TABLE</h1>
      <br />
      <br />
      <form class="" action="tableReservation.php" method="post">
        <label for="">Table View</label>
        <select class="fill" name="view">
          <option value="Seaside">Seaside</option>
          <option value="Smoking Area">Smoking Area</option>
          <option value="Non-Smoking Area">Non-Smoking Area</option>
        </select>
        <br />
        <br />
        <br />
        <label for="">Nb of Guests</label>
        <select class="fill" name="nbofGuests">
          <option value="2">2</option>
          <option value="4">4</option>
          <option value="6">6</option>
          <option value="8">8</option>
        </select>
        <br />
        <br />
        <br />

        <label for="">Time</label>
        <input class="fill" type="time" id="appt" name="time" min="17:00" max="01:00" required />
        <br />
        <br />
        <p></p>
        <p>
          <label for="">Date</label>
          <input class="fill" type="date" id="start" name="date" value="2022-11-01" min="2022-11-01" max="2022-12-31" required />
        </p>
        <br />
        <p>
          <input type="reset" value="CLEAR" class="button2" />
          <input type="submit" name="submit" value="SUBMIT" class="button1" id="b1" />
        </p>
      </form>
    </div>

    <div class="createProfileImg">
      <img src="../photos and videos/hotel2.jpg" alt="" />
    </div>
  </section>
</body>

</html>