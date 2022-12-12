<?php
include 'config.php';
if (isset($_POST["submitted"])) {
    $number = $_POST["number"];
    $size = $_POST['size'];
    $price = $_POST['price'];
    $type = $_POST['type'];
    $room_collection->insertOne(['number' => $number, 'price' => $price, 'type' => $type, 'status' => 'free', 'roomService' => 'No']);
    header('Location: webadminPage.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/form.css" />
    <title>Add Room</title>
</head>

<body>
    <div class="form-body" id="form-body">
        <div class="form" id="form">
            <form action="addRoom.php" method="post">
                <h1>Add Room</h1>
                <div class="row">
                    <div class="title">Number</div>
                    <input type="text" size="25" class="fill" id="number" name="number" required />
                </div>
                <div class="row">
                    <div class="title">type</div>
                    <select name="type" id="role-form" class="fill">
                        <option value="single">single</option>
                        <option value="double">double</option>
                        <option value="royal suite">royale suite</option>
                        <option value="suite">suite</option>
                    </select>
                </div>
                <!-- <div class="row">
                    <div class="title">Number of Beds</div>
                    <input type="text" size="25" class="fill" name="nBeds" required />
                </div>
                <div class="row">
                    <div class="title">Number of Bathrooms</div>
                    <input type="text" size="25" class="fill" name="nBathRooms" required />
                </div> -->
                <!-- <div class="row">
                    <div class="title">View</div>
                    <input type="text" size="25" class="fill" name="view" required />
                </div> -->


                <!-- <div class="row">
                    <div class="title">size</div>
                    <input type="text" size="25" class="fill" name="size" required />
                </div> -->

                <div class="row">
                    <div class="title">price</div>
                    <input type="text" size="25" class="fill" name="price" required />
                </div>
                <!-- <div class="row">
                    <div class="title">Occupancy</div>
                    <input type="text" size="25" class="fill" name="occupancy" required />
                </div> -->
                <!-- <div class="row">
                    <div class="title">description</div>
                    <input type="text" size="25" class="fill" name="description" required />
                </div> -->

                <div class="row" id="lastrow">
                    <!-- <button id="submit-staff" onclick="submitFunction()" >
              Add Staff
            </button> -->
                    <input type="submit" value="add" name="submitted">
                    <a href="webadminPage.php">Back</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>