<!DOCTYPE html>
<?php

include 'config.php';
if (isset($_POST["submit"])) {


  $Username = $_POST['name'];
  $Password = $_POST['password'];

  $result = $customer_collection->findOne(["username" => $Username, "password" => $Password]);
  if ($result == null) {
    //print("<div><strong>Please Enter a Valid Username and Password</strong></div>");

    $result2 = $admin_collection->findOne(["username" => $Username, "password" => $Password]);
    if ($result2 == null) {

      $result3 = $staff_collection->findOne(["userName" => $Username, "password" => $Password, "role" => "receptionist"]);
      if ($result3 == null) {
        $result4 = $staff_collection->findOne(["userName" => $Username, "password" => $Password, "role" => "house keeping"]);
        if ($result4 == null) {
          print("<div><strong>Please Enter a Valid Username and Password</strong></div>");
        } else {
          session_start();
          $_SESSION["username"] = $Username;
          header("Location: HouseKeepingPage.php");
          exit();
        }
      } else {
        session_start();
        $_SESSION["username"] = $Username;
        header("Location: staff.php");
        exit();
      }
    } else {
      session_start();
      $_SESSION["username"] = $Username;
      header("Location: webadminPage.php");
      exit();
    }
  } else {
    session_start();
    $_SESSION["username"] = $Username;
    header("Location: ../html/homepageLoggedIn.html");
    exit();
  }
}
?>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8" />
  <title>Sign In | Palms Spring Hotel</title>
  <link rel="stylesheet" href="../css/signInStyles.css" />
</head>

<body>
  <section>
    <div class="signin">
      <h1>SIGN IN</h1>
      <br />
      <br />
      <form class="" action="" method="post">
        <label for="username" class="username">Username</label>
        <input name="name" type="text" size="25" required class="username fill" />
        <br />
        <br />
        <label for="password" class="password">Password</label>
        <input name="password" type="password" size="25" required class="password fill" />
        <br />
        <br />

        <p>
          Don't have an account? <a href="../php files/createProfile.php">Register</a>
        </p>

        <input type="submit" value="SUBMIT" class="button1" name="submit" />
      </form>
    </div>

    <div class="createProfileImg">
      <img src="../photos and videos/hotel2.jpg" alt="" />
    </div>
  </section>
</body>

</html>