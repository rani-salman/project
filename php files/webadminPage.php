<?php
session_start();
if (!isset($_SESSION['username'])) {
  echo "pls log in first";
  header('Location: SignInPage.php');
  die();  //if user enter directly from url

}
include 'config.php';
include 'statistics.php';



?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Admin</title>
  <link rel="stylesheet" href="../css/adminstyle.css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css" />
  <script src="https://kit.fontawesome.com/74610e28b6.js" crossorigin="anonymous"></script>
</head>

<body>
  <section class="home">
    <h2 class="title">Welcome Admin <?php echo $_SESSION['username'] ?>. This is your dashboard </h2>

    <div class="Grid__Container" id="home">
      <div class="Stat__Card navbar">
        <div class="Stat__Container">
          <div class="Stat__Title">Multiple features</div>
          <div class="navflex">
            <div class="feature">Hired New staff? Add him/her <a href="addStaff.php">Add New Staff</a></div>
            <div class="feature">new room available? Add it <a href="addRoom.php">Add New Room</a></div>
            <div class="feature">see the concerns of users <a href="concerns.php">Messages</a></div>
            <div class="feature">got new table? Add it <a href="addTable.php">add new Table</a></div>

          </div>




        </div>
      </div>
      <div class="Stat__Card">
        <div class="Stat__Container">
          <div class="Stat__Title">Total Bookings</div>
          <div class="Stat__Content"><?php echo $total_booking ?></div>
        </div>
      </div>

      <div class="Stat__Card">
        <div class="Stat__Container">
          <div class="Stat__Title">Available Rooms</div>
          <div class="Stat__Content"><?php echo $available_rooms ?></div>
        </div>
      </div>
      <div class="Stat__Card">
        <div class="Stat__Container">
          <div class="Stat__Title">New Pending Requests</div>
          <div class="Stat__Content"><?php echo $total_pending_requests ?></div>
        </div>
      </div>
      <div class="Stat__Card">
        <div class="Stat__Container">
          <div class="Stat__Title">staff number</div>
          <div class="Stat__Content"><?php echo $staff_number ?></div>
        </div>
      </div>

      <div class="Stat__Card graph">
        <div class="Stat__Container">
          <div class="Stat__Title">ROOMS BOOKED</div>
          <div><?php echo $suite_percentage ?>% of booked rooms are suites</div>
          <div><?php echo $royal_suite_percentage ?>% of booked rooms are royal suites</div>
          <div><?php echo $single_percentage ?>% of booked rooms are single rooms</div>
          <div><?php echo $double_percentage ?>% of booked rooms are double rooms</div>
        </div>
      </div>
      <div class="Stat__Card tables">
        <div class="Stat__Container">
          <div class="Stat__Title">TABLES BOOKED</div>
          <div><?php echo $seasideview_percentage ?>% of booked tables have seaside view</div>
          <div><?php echo $smokingareaview_suite_percentage ?>% of booked tables have smoking area view</div>
          <div><?php echo $nonsmokingareview_percentage ?>% of booked tables have non smoking area view</div>

        </div>
      </div>
      <div class="Stat__Card rooms-status">
        <div class="Stat__Container">
          <div class="Stat__Title">Rooms Status</div>
          <table class='table' id="room-status-table">
            <thead>
              <tr>
                <th>Room Number</th>
                <th>Room Type</th>
                <th>status</th>
              </tr>

            </thead>
            <tbody>
              <?php
              $result = $room_collection->find();
              foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . $row['number'] . "</td>";
                echo "<td>" . $row['type'] . "</td>";
                // echo "<td>" . $row['status'] . "</td>";
                // $res2 = $room_collection->count(['status' => $row['number'], 'status' => 'active']);
                // echo $res2;
                echo ($row['status'] === 'active') ? "<td class='active-room'>Active</td>" : "<td class='deactive-room'>Free</td>";
                echo "</tr>";
              }
              ?>

            </tbody>




          </table>




        </div>
      </div>
      <div class="Stat__Card pending-requests">
        <div class="Stat__Container">
          <div class="Stat__Title">Pending Booking Rooms Requests</div>
          <table class="table" id="requests-pending-rooms">
            <thead>
              <tr>
                <th> Customer Name</th>
                <th>Room Number</th>
                <th>Start Date</th>
                <th>EndDate</th>
                <th>Accept</th>
                <th>Reject</th>
              </tr>
            </thead>
            <tbody>
              <?php
              $result = $book_collection->find(['status' => 'pending']);
              foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . $row['customerName'] . "</td>";
                echo "<td>" . $row['roomNumber'] . "</td>";
                echo "<td>" . $row['startDate'] . "</td>";
                echo "<td>" . $row['endDate'] . "</td>";
                echo "<td>
                <button type='button' class='accept-button'>Accept</button>
              </td>
              <td>
                <button type='button' class='reject-button'>reject</button>
              </td>";

                echo "</tr>";
              }
              ?>

            </tbody>
          </table>
        </div>
      </div>
      <div class="Stat__Card rooms-booked">
        <div class="Stat__Container">
          <div class="Stat__Title">Rooms Booked</div>
          <table class='table' id='accepted-rooms-bookings'>
            <thead>
              <tr>
                <th>Customer Name</th>
                <th>Room Number</th>
                <th>Start Date</th>
                <th>End Date</th>
              </tr>

            </thead>


            <tbody>
              <?php
              $result = $room_collection->find(['status' => 'active']);
              foreach ($result as $row) {
                echo "<tr>";
                $book_info = $book_collection->findOne(['$and' => [['roomNumber' => $row['number']], ['status' => 'accepted']]]);
                echo "<td>" . $book_info['customerName'] . "</td>";
                echo "<td>" . $row['number'] . "</td>";
                echo "<td>" . $book_info['startDate'] . "</td>";
                echo "<td>" . $book_info['endDate'] . "</td>";

                echo "</tr>";
              }
              ?>

            </tbody>



          </table>



        </div>
      </div>

      <div class="Stat__Card tablesbooked">
        <div class="Stat__Container">
          <div class="Stat__Title">Tables Booked</div>
          <table class='table' id="accepted-tables-bookings">
            <thead>
              <tr>
                <th>Customer Name</th>
                <th>Table View</th>
                <th>Date</th>
                <th>Time</th>
              </tr>

            </thead>

            <tbody>
              <?php
              $result = $reserve_collection->find();
              foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . $row['customerName'] . "</td>";
                echo "<td>" . $row['tableView'] . "</td>";
                echo "<td>" . $row['date'] . "</td>";
                echo "<td>" . $row['time'] . "</td>";

                echo "</tr>";
              }
              ?>

            </tbody>




          </table>



        </div>
      </div>


      <div class="Stat__Card staff-information">
        <div class="Stat__Container">
          <div class="Stat__Title">Staff Information</div>
          <table class="table" id="staff-table">
            <thead>
              <tr>
                <th>Name</th>
                <th>Mobile Number</th>
                <th>Email</th>
                <th>Current Role</th>
                <th>address</th>
                <th>Delete</th>
                <th>change role</th>
                <th>Assign Task</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $result = $staff_collection->find();
              foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['mobileNb'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "<td>" . $row['role'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td><i class='fa-solid fa-trash'></i></td>";
                echo '<td><button type="button" class="change-role-button">Change Role</button></td>';
                $name = str_replace(' ', '%20', $row['userName']);
                $link = 'addTask.php?staffname=' . $name;
                echo '<td><a href=' . $link . ' class=\"new-task-button\">New Task</a></td>';
                echo "</tr>";
              }

              ?>
            </tbody>
          </table>
        </div>
      </div>

      <div class="Stat__Card tasks">
        <div class="Stat__Container">
          <div class="Stat__Title">Staff Tasks</div>
          <table class="table" id="task-table">
            <thead>
              <tr>
                <th>User Name</th>
                <th>Current Task</th>
                <th>Due date</th>
                <th>Delete</th>
              </tr>
            </thead>

            <tbody>
              <?php
              $result = $task_collection->find();
              foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . $row['staffUserName'] . "</td>";
                echo "<td>" . $row['description'] . "</td>";
                echo "<td>" . $row['dueDate'] . "</td>";
                echo "<td><i class='fa-solid fa-trash'></i></td>";
                echo "</tr>";
              }
              ?>

            </tbody>
          </table>
        </div>
      </div>
      <div class="Stat__Card staff-ratings">
        <div class="Stat__Container">
          <div class="Stat__Title">Staff Ratings</div>
          <table class="table" id="rating-table">
            <thead>
              <tr>
                <th>Staff name</th>
                <th>Role</th>
                <th>Rating over 10</th>
              </tr>

            </thead>

            <tbody>
              <?php
              $result = $staff_collection->find();
              foreach ($result as $row) {
                echo "<tr>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['role'] . "</td>";
                echo "<td> <input type='range' min='0' max='10' value='" . $row['rate'] . "'/></td>";

                echo "</tr>";
              }
              ?>

            </tbody>

          </table>
        </div>
      </div>
    </div>


  </section>

  <script src="../JavaScript/adminJavaScript.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
</body>

</html>