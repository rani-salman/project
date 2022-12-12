<!DOCTYPE html>
<?php
include 'config.php';
if (isset($_POST["submit"])) {
  $meal = ['name' => $_POST['name'], 'Meal' => $_POST['Meal'], 'Date' =>
  $_POST['Date'], 'Time' => $_POST['Time'],];
  $result =
    $order_collection->insertOne($meal);
} ?>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8" />
  <title>Order Meal | Palm Spring Hotel</title>
  <link rel="stylesheet" href="../css/OrderMeal.css" />
</head>

<body>
  <script type="text/javascript">
    function start() {
      var button = document.getElementById("b1");
    }
    var count = 0;
    window.addEventListener("load", start, false);
  </script>

  <section>
    <div class="OrderMealForm" id="div1">
      <h1>Order a Meal</h1>
      <br />
      <br />
      <form class="" action="OrderMeal.php" method="post">
        <label for="name" class="nameLabel">Name</label>
        <input name="name" type="text" size="25" class="fill fillname username" required />

        <br />
        <br />
        <p>
          <br />
          <br />
          <label for="Meal">Meal</label>
          <select class="Meal" name="Meal" required>
            <option value="Marinated Sardines">Marinated Sardines</option>
            <option value="Pawn Saganaki">Prawn Saganaki</option>
            <option value="Mussels">Mussels</option>
            <option value="Red Mullet Ceviche">Red Mullet Ceviche</option>
            <option value="Falafel">Falafel</option>
            <option value="Mediterranean Mini Burgers">
              Mediterranean Mini Burgers
            </option>
            <option value="Mini Chicken Shawarma">
              Mini Chicken Shawarma
            </option>
            <option value="Cold Mezzah">Cold Mezzah</option>
            <option value="Hot Mezzah">Hot Mezzah</option>
            <option value="Yogurt">Yogurt</option>
            <option value="Tabboule">Tabboule</option>
            <option value="Fried Potatoes">Fried Potatoes</option>
            <option value="Fattoush">Fattoush</option>
            <option value="Lebanese Sausages">Lebanese Sausages</option>
          </select>

          <br />
          <br />
          <br />
          <br />
          <label for="date">Date</label>
          <input type="date" id="Date" name="Date" />

          <br />
          <br />
          <br />
          <br />
          <label for="Time">Time</label>
          <select class="Time" name="Time" required>
            <option value="8:00 am">8:00 am</option>
            <option value="9:00 am">9:00 am</option>
            <option value="10:00 am">10:00 am</option>
            <option value="11:00 am">11:00 am</option>
            <option value="12:00 am">12:00 am</option>
            <option value="1:00 pm">1:00 pm</option>
            <option value="2:00 pm">2:00 pm</option>
            <option value="3:00 pm">3:00 pm</option>
            <option value="4:00 pm">4:00 pm</option>
            <option value="5:00 pm">5:00 pm</option>
            <option value="6:00 pm">6:00 pm</option>
            <option value="7:00 pm">7:00 pm</option>
            <option value="8:00 pm">8:00 pm</option>
            <option value="9:00 pm">9:00 pm</option>
            <option value="10:00 pm">10:00 pm</option>
            <option value="11:00 pm">11:00 pm</option>
          </select>

          <br />
          <br />
          <br />
          <br />
        </p>

        <p>
          <input type="reset" value="CLEAR" class="button2" />
          <input type="submit" value="SUBMIT" class="button1" name="submit" id="b1" />
        </p>
      </form>
    </div>

    <div class="createProfileImg">
      <img src="../photos and videos\Meal.jpg" alt="" />
    </div>
  </section>
</body>

</html>