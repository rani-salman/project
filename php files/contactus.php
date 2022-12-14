<!DOCTYPE html>
<?php
include 'config.php';
if (isset($_POST["submit"])) {

  $meal =
    [
      'name' => $_POST['Name'],
      'email' => $_POST['Email'],
      'phoneNb' => $_POST['Phone'],
      'concernType' => $_POST['reason'],
      'concernContent' => $_POST['parag']
    ];


  $result = $customer_concern_collection->insertOne($meal);
}

?>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>Contact us | Palm Spring Hotel</title>
  <link rel="stylesheet" href="../css/contactusStyles.css">
</head>
<div id="navigation"></div>

<body>

  <div class="container1">
    <p class="p1">Palm Spring Hotels and Resorts</p>

    <h1>CONTACT US</h1>
    <hr class="lines">
    <div class="">

      <p class="p6 p2">ADDRESS</p>
      <p class="p3">MARTYR'S SQUARE, BEIRUT</p>
      <hr class="lines">
      <p class="p4 p2">RESERVATIONS</p>
      <a href="tel:96101555777">+961 01 555 777</a>
      <hr class="lines">
      <p class="p5 p2">FRONT DESK</p>
      <a href="tel:96101555723">+961 01 555 723</a>

    </div>

    <div class="container2">
      <h1>LET YOUR VOICE BE HEARD</h1>
      <form class="" action="contactus.php" method="post">

        <input type="text" name="Name" value="" placeholder="Full Name" required>
        <input type="email" name="Email" value="" placeholder="Email" required>
        <br>
        <input type="text" name="Phone" value="" placeholder="Phone Number" required>
        <select class="reason" name="reason">
          <option value="Make or Change Reservation">Make or Change Reservation</option>
          <option value="General Question">General Question</option>
          <option value="Comments & Concerns">Comments & Concerns</option>
        </select>
        <br>

        <textarea name="parag" rows="8" cols="80" placeholder="How can we help you?"></textarea>
        <br>
        <input name="submit" type="submit" value="SUBMIT" class="button1">
      </form>

    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script>
      $(function() {
        $("#navigation").load("../html/navbar.html");
      });
    </script>
</body>

</html>