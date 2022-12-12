<!DOCTYPE html>
<?php
include 'config.php';

session_start();
if (!isset($_SESSION['username'])) {
    echo "pls log in first";
    header('Location: SignInPage.php');
    die();  //if user enter directly from url

}

$staffrows = $staff_collection->find();
$taskrows = $task_collection->find();
$roomrows = $room_collection->find();
$mealrows = $order_collection->find();



$username = $_SESSION["username"];
$result = $staff_collection->findOne(["userName" => $username]);
$resultTasks = $task_collection->find(["staffUserName" => $username]);


?>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>Reciptionist Page | Palm Spring Hotel</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/staff.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>

<body class="staffBody">
    <section>
        <div class="welcomediv">
            <p> Welcome,<strong> <?php echo $result->name ?> </strong></p>
            <hr>

        </div>
        <div class="infoTitle"> Information</div>
        <div class="StaffInfo">
            <div class="info-status">
                <div class="for-info">
                    <div class="Stat__Title">Staff Information</div>
                    <table class="tableStaff">
                        <tr>
                            <td><strong>Full Name: </strong> <?php echo $result->name ?> </td>
                        </tr>
                        <tr>
                            <td><strong>Email: </strong> <?php echo $result->email ?> </td>
                        </tr>
                        <tr>
                            <td><strong>Phone Number: </strong> <?php echo $result->mobileNb ?></td>
                        </tr>
                        <tr>
                            <td><strong>Address: </strong><?php echo $result->address ?></td>
                        </tr>
                        <tr>
                            <td><strong>Role: </strong><?php echo $result->role ?></td>
                        </tr>
                        <tr>
                            <td><strong>Rating: </strong><?php echo $result->rate ?>/10</td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="info-status ">
                <div class="for-info">
                    <div class="Stat__Title">Job</div>
                    <table class="tableStaff">
                        <thead>
                            <th>Tasks</th>
                        </thead>
                        <?php foreach ($resultTasks as $resultTask) : ?>
                            <tr>
                                <td><?php echo $resultTask->description ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
        </div>


        <div class="TitleForStaff">Room Section </div>

        <?php foreach ($roomrows as $roomrow) :
            $resultEndDate = $book_collection->findOne(["roomNumber" => $roomrow["number"]]);

            if ($resultEndDate == null) {
                $endDate = "-";
            } else {
                $endDate = $resultEndDate->endDate;
            }

        ?>

            <div class="staff-card">
                <div class="staff-container">
                    <div class="TitleDown"><?php echo $roomrow->number ?></div>
                    <table class="tableStaff">
                        <tr>
                            <th></th>
                            <th>Status</th>
                            <th>Room Type</th>
                            <th>Room Service</th>
                            <th>End Date</th>

                        </tr>
                        <tr>
                            <td></td>
                            <?php if ($roomrow->status == "active") : ?>
                                <td class="active-room"><button class="buttonStaff"><?php echo $roomrow->status ?></button></td>
                            <?php endif; ?>
                            <?php if ($roomrow->status == "free") : ?>
                                <td class="deactive-room"><button><?php echo $roomrow->status ?></button></td>
                            <?php endif; ?>
                            <td><?php echo $roomrow->type ?></td>

                            <?php if ($roomrow->roomService == "Yes") : ?>
                                <td class="active-room"><button class="buttonRoomService"><?php echo $roomrow->roomService ?></button></td>
                            <?php endif; ?>
                            <?php if ($roomrow->roomService == "No") : ?>
                                <td class="deactive-room"><button class="buttonRoomService"><?php echo $roomrow->roomService ?></button></td>
                            <?php endif; ?>
                            <td><?php echo $endDate ?></td>
                        </tr>
                    </table>
                </div>
            </div>
        <?php endforeach; ?>
        <div class="TitleForStaff">Meal Order Section </div>

        <?php foreach ($mealrows as $mealrow) : ?>

            <div class="staff-card">
                <div class="staff-container">
                    <!-- <div class="TitleDown"><?php echo $roomrow->number ?></div> -->
                    <table class="tableStaff">
                        <tr>
                            <th></th>
                            <th>Name</th>
                            <th>Meal</th>
                            <th>Date</th>
                            <th>Time</th>

                        </tr>
                        <tr>
                            <td></td>

                            <td><?php echo $mealrow->name ?></td>
                            <td><?php echo $mealrow->Meal ?></td>
                            <td><?php echo $mealrow->Date ?></td>
                            <td><?php echo $mealrow->Time ?></td>


                        </tr>
                    </table>
                </div>
            </div>
        <?php endforeach; ?>


        </div>

        </div>
        <hr class="Finalseparator">
    </section>
    <script src="../JavaScript/staff.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</body>

</html>