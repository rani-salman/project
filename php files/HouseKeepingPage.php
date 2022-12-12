<!DOCTYPE html>
<?php
include 'config.php';
$staffrows = $staff_collection->find();
$taskrows = $task_collection->find();


session_start();
$username = $_SESSION["username"];
$result = $staff_collection->findOne(["userName" => $username]);
$resultTasks = $task_collection->find(["staffUserName" => $username]);


?>

<html lang="en">

<head>
    <meta charset="UTF-8" />
    <title>House Keeping | Palm Spring Hotel</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="../css/housekeeping.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/css/bootstrap.min.css" />
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />
</head>

<body class="housekeepingBody">
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

        <div class="shiftSchedule">
            <div class="TitleForStaff"> Shift Schedule </div>
            <div class="weekdiv"> For the Week of: <strong>October 4th </strong>
                <div class="divForweekday">
                    <table class="weekdayTable">
                        <tr>
                            <th>Monday</th>
                            <th> 7:00am </th>
                            <th> 8:00am </th>
                            <th> 9:00am </th>
                            <th> 10:00am </th>
                            <th> 11:00am </th>
                            <th> 12:00am </th>
                            <th> 1:00pm </th>
                            <th> 2:00pm </th>
                            <th> 3:00pm </th>
                        </tr>

                        <tr>
                            <td> Yara </td>
                            <td> Room 201 </td>
                            <td>Floor 1</td>
                            <td>Kitchen</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td> Rana </td>
                            <td> Room 201 </td>
                            <td>Floor 1</td>
                            <td>Kitchen</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td> Ali </td>
                            <td></td>
                            <td>Room 202</td>
                            <td>Lobby</td>
                            <td>Room 203 </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td> rani </td>
                            <td></td>
                            <td>Room 202</td>
                            <td>Lobby</td>
                            <td>Room 203 </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="weekdiv">
                <div class="divForweekday">
                    <table class="weekdayTable">
                        <tr>
                            <th>Tuesday</th>
                            <th> 7:00am </th>
                            <th> 8:00am </th>
                            <th> 9:00am </th>
                            <th> 10:00am </th>
                            <th> 11:00am </th>
                            <th> 12:00am </th>
                            <th> 1:00pm </th>
                            <th> 2:00pm </th>
                            <th> 3:00pm </th>
                        </tr>

                        <tr>
                            <td> Yara </td>
                            <td> Room 201 </td>
                            <td>Floor 1</td>
                            <td>Kitchen</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td> Rana </td>
                            <td> Room 201 </td>
                            <td>Floor 1</td>
                            <td>Kitchen</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td> Ali </td>
                            <td></td>
                            <td>Room 202</td>
                            <td>Lobby</td>
                            <td>Room 203 </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td> rani </td>
                            <td></td>
                            <td>Room 202</td>
                            <td>Lobby</td>
                            <td>Room 203 </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="weekdiv">
                <div class="divForweekday">
                    <table class="weekdayTable">
                        <tr>
                            <th>Wednesday</th>
                            <th> 7:00am </th>
                            <th> 8:00am </th>
                            <th> 9:00am </th>
                            <th> 10:00am </th>
                            <th> 11:00am </th>
                            <th> 12:00am </th>
                            <th> 1:00pm </th>
                            <th> 2:00pm </th>
                            <th> 3:00pm </th>
                        </tr>

                        <tr>
                            <td> Yara </td>
                            <td> Room 201 </td>
                            <td>Floor 1</td>
                            <td>Kitchen</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td> Rana </td>
                            <td> Room 201 </td>
                            <td>Floor 1</td>
                            <td>Kitchen</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td> Ali </td>
                            <td></td>
                            <td>Room 202</td>
                            <td>Lobby</td>
                            <td>Room 203 </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td> rani </td>
                            <td></td>
                            <td>Room 202</td>
                            <td>Lobby</td>
                            <td>Room 203 </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="weekdiv">
                <div class="divForweekday">
                    <table class="weekdayTable">
                        <tr>
                            <th>Thursday</th>
                            <th> 7:00am </th>
                            <th> 8:00am </th>
                            <th> 9:00am </th>
                            <th> 10:00am </th>
                            <th> 11:00am </th>
                            <th> 12:00am </th>
                            <th> 1:00pm </th>
                            <th> 2:00pm </th>
                            <th> 3:00pm </th>
                        </tr>

                        <tr>
                            <td> Yara </td>
                            <td> Room 201 </td>
                            <td>Floor 1</td>
                            <td>Kitchen</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td> Rana </td>
                            <td> Room 201 </td>
                            <td>Floor 1</td>
                            <td>Kitchen</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td> Ali </td>
                            <td></td>
                            <td>Room 202</td>
                            <td>Lobby</td>
                            <td>Room 203 </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td> rani </td>
                            <td></td>
                            <td>Room 202</td>
                            <td>Lobby</td>
                            <td>Room 203 </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="weekdiv">
                <div class="divForweekday">
                    <table class="weekdayTable">
                        <tr>
                            <th>Friday</th>
                            <th> 7:00am </th>
                            <th> 8:00am </th>
                            <th> 9:00am </th>
                            <th> 10:00am </th>
                            <th> 11:00am </th>
                            <th> 12:00am </th>
                            <th> 1:00pm </th>
                            <th> 2:00pm </th>
                            <th> 3:00pm </th>
                        </tr>

                        <tr>
                            <td> Yara </td>
                            <td> Room 201 </td>
                            <td>Floor 1</td>
                            <td>Kitchen</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td> Rana </td>
                            <td> Room 201 </td>
                            <td>Floor 1</td>
                            <td>Kitchen</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td> Ali </td>
                            <td></td>
                            <td>Room 202</td>
                            <td>Lobby</td>
                            <td>Room 203 </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td> rani </td>
                            <td></td>
                            <td>Room 202</td>
                            <td>Lobby</td>
                            <td>Room 203 </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>

            <div class="weekdiv">
                <div class="divForweekday">
                    <table class="weekdayTable">
                        <tr>
                            <th>Saturday</th>
                            <th> 7:00am </th>
                            <th> 8:00am </th>
                            <th> 9:00am </th>
                            <th> 10:00am </th>
                            <th> 11:00am </th>
                            <th> 12:00am </th>
                            <th> 1:00pm </th>
                            <th> 2:00pm </th>
                            <th> 3:00pm </th>
                        </tr>

                        <tr>
                            <td> Yara </td>
                            <td> Room 201 </td>
                            <td>Floor 1</td>
                            <td>Kitchen</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td> Rana </td>
                            <td> Room 201 </td>
                            <td>Floor 1</td>
                            <td>Kitchen</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td> Ali </td>
                            <td></td>
                            <td>Room 202</td>
                            <td>Lobby</td>
                            <td>Room 203 </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td> rani </td>
                            <td></td>
                            <td>Room 202</td>
                            <td>Lobby</td>
                            <td>Room 203 </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
            <div class="weekdiv">
                <div class="divForweekday">
                    <table class="weekdayTable">
                        <tr>
                            <th>Sunday</th>
                            <th> 7:00am </th>
                            <th> 8:00am </th>
                            <th> 9:00am </th>
                            <th> 10:00am </th>
                            <th> 11:00am </th>
                            <th> 12:00am </th>
                            <th> 1:00pm </th>
                            <th> 2:00pm </th>
                            <th> 3:00pm </th>
                        </tr>

                        <tr>
                            <td> Yara </td>
                            <td> Room 201 </td>
                            <td>Floor 4</td>
                            <td>Salon2</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td> Rana </td>
                            <td> Room 201 </td>
                            <td>Floor 1</td>
                            <td>Kitchen</td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>

                        <tr>
                            <td> Ali </td>
                            <td></td>
                            <td>Room 202</td>
                            <td>Lobby</td>
                            <td>Room 203 </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        <tr>
                            <td> rani </td>
                            <td></td>
                            <td>Room 202</td>
                            <td>Lobbies</td>
                            <td>Room 203 </td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <script src="staff.js"></script>

</body>

</html>