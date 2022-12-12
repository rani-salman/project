<?php
include 'config.php';
if (isset($_POST["submitted"])) {
    $staffName = $_POST["staffName"];
    $staffMobileNb = $_POST["staffMobileNb"];
    $staffRole = $_POST["staffRole"];
    $staffAdress = $_POST["staffAddress"];
    $userName = $_POST['staffUserName'];
    $password = $_POST['staffPassword'];
    $email = $_POST['staffEmail'];
    $staff_collection->insertOne(['userName' => $userName, 'email' => $email, 'password' => $password, 'name' => $staffName, 'mobileNb' => $staffMobileNb, 'role' => $staffRole, 'address' => $staffAdress, 'rate' => '5']);
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
    <title>Add staff</title>
</head>

<body>
    <div class="form-body" id="form-body">
        <div class="form" id="form">
            <form action="addstaff.php" method="post">
                <h1>Add Staff</h1>
                <div class="row">
                    <div class="title">FullName</div>
                    <input type="text" size="25" class="fill" id="staff-name" name="staffName" required />
                </div>
                <div class="row">
                    <div class="title">UserName (will used for log in)</div>
                    <input type="text" size="25" class="fill" name="staffUserName" required />
                </div>
                <div class="row">
                    <div class="title">Email Address</div>
                    <input type="text" size="25" class="fill" name="staffEmail" required />
                </div>
                <div class="row">
                    <div class="title">Password</div>
                    <input type="password" size="25" class="fill" name="staffPassword" required />
                </div>

                <div class="row">
                    <div class="title">Phone Number</div>
                    <input type="text" size="25" class="fill" name="staffMobileNb" required />
                </div>

                <div class="row">
                    <div class="title">Address</div>
                    <input type="text" size="25" class="fill" name="staffAddress" required />
                </div>
                <div class="row">
                    <div class="title">Role</div>
                    <select name="staffRole" id="role-form" class="fill">
                        <option value="house keeping">house keeping</option>
                        <option value="receptionist">receptionist</option>
                    </select>
                </div>
                <div class="row" id="lastrow">
                    <!-- <button id="submit-staff" onclick="submitFunction()" >
              Add Staff
            </button> -->
                    <input type="submit" value="submit" name="submitted">
                    <a href="webadminPage.php">Back</a>
                </div>
            </form>
        </div>
    </div>

</body>

</html>