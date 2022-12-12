<?php
include 'config.php';
if (isset($_POST["submitted"])) {
    $tableView = $_POST["tableView"];

    $table_collection->insertOne(['view' => $tableView]);
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
    <title>Add Table</title>
</head>

<body>
    <div class="form-body" id="form-body">
        <div class="form" id="form">
            <form action="addTable.php" method="post">
                <h1>Add Table</h1>
                <div class="row">
                    <div class="title">Table View</div>
                    <input type="text" size="25" class="fill" id="view" name="tableView" required />
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