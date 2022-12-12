<?php
include 'config.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/concerns.css" />
    <title>Users Responses</title>
</head>

<body>
    <h1>See who contact the Hotel</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>email</th>
            <th>Phone number</th>
            <th>Concern type</th>
            <th>Concern content</th>
        </tr>
        <tr>
            <?php
            $result = $customer_concern_collection->find();
            foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['phoneNb'] . "</td>";
                echo "<td>" . $row['concernType'] . "</td>";
                echo "<td>" . $row['concernContent'] . "</td>";

                echo "</tr>";
            }

            ?>
        </tr>
    </table>

</body>

</html>