<?php
session_start();
include 'config.php';
$username = $_SESSION['username'];
//$username = "ali youssef";
$info = $payments_collection->findOne(['username' => $username]);
if ($info === null) {
    header('Location: first-time-payment.php');
}
$cardHolderName = $info['cardHolderName'];
$code = $info['code'];
$number = $info['cardNumber'];
$expiryDate = $info['expiryDate'];
if (isset($_POST['payed'])) {
    if ($number !== $_POST['cardNumber'] || $code !== $_POST['code'] || $expiryDate !== $_POST['date'] || $_POST['cardHolderName'] !== $cardHolderName) {
        $payments_collection->insertOne(['username' => $username, 'cardHolderName' => $_POST['cardHolderName'], 'cardNumber' => $_POST['cardNumber'], 'code' => $_POST['code'], 'expiryDate' => $_POST['date']]);
    }
    $result = $book_collection->insertOne($_SESSION["roomInfo"]);
    // header('Location: webadminPage.php');
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
    <meta charset="utf-8" />
    <title>Payments | Palms Spring Hotel</title>
    <link rel="stylesheet" href="../css/payments.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" />
    <script src="https://kit.fontawesome.com/74610e28b6.js" crossorigin="anonymous"></script>
</head>

<body>
    <div class="payments-page">
        <div class="form" id="form">
            <form action="exist-payment.php" method="post">
                <h1>Pay for your booking</h1>
                <div class="row">
                    <div class="title">UserName</div>
                    <input type="text" size="25" class="fill" name="username" value="<?php echo $username ?>" required />
                </div>
                <div class="row">
                    <div class="title">Card Number</div>
                    <input type="text" size="25" class="fill" name="cardNumber" value="<?php echo $number ?>" required />
                </div>
                <div class="card-types">
                    <i class="fa-brands fa-cc-visa"></i>
                    <i class="fa-brands fa-cc-mastercard"></i>
                    <i class="fa-brands fa-cc-paypal"></i>
                    <i class="fa-brands fa-cc-amazon-pay"></i>
                </div>
                <div class="row">
                    <div class="title">Card Holder Name</div>
                    <input type="text" size="25" class="fill" name="cardHolderName" value="<?php echo $cardHolderName ?>" required />
                </div>
                <div class="row">
                    <div class="title">Security Code</div>
                    <div>
                        <i class="fa-regular fa-credit-card"></i> 3 digits on the back of
                        Card
                    </div>

                    <input type="Number" size="25" class="fill" id="code" name="code" value="<?php echo $code ?>" min="0" required />
                </div>
                <div class="row">
                    <div class="title">Expiry Date</div>
                    <input type="date" size="25" class="fill" name="date" value="<?php echo $expiryDate ?>" required />
                </div>
                <div class="row" id="lastrow">
                    <!-- <button id="submit">Pay Now</button> -->
                    <input type="submit" id="submit" value="pay now" name="payed">
                </div>
            </form>
        </div>
        <div class="image">
            <img src="../photos and videos/hotel2.jpg" alt="" />
        </div>
    </div>
    <script>
        // let button = document.getElementById("submit");

        // button.addEventListener("click", checkCode, false);

        // function checkCode() {
        //     if (document.getElementById("error")) {
        //         // document.getElementById("error").innerText = "";
        //         document
        //             .getElementById("lastrow")
        //             .removeChild(document.getElementById("error"));
        //     }
        //     let code = document.getElementById("code").value;

        //     var div, tag, text;
        //     if (code.length !== 3 || parseInt(code) < 0) {
        //         div = document.getElementById("lastrow");
        //         tag = document.createElement("p");
        //         tag.id = "error";
        //         text = document.createTextNode(
        //             "Your security code should be positive and equal to 3 digits"
        //         );
        //         //console.log(button);
        //         tag.appendChild(text);
        //         div.insertBefore(tag, button);
        //     }
        // }
    </script>
</body>

</html>