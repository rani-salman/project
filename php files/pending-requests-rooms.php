<?php
include 'config.php';

if (isset($_POST['customerName_accept']) && isset($_POST['roomNumber_accept'])) {
    $book_collection->updateOne(
        ['$and' => [['customerName' => $_POST['customerName_accept']], ['roomNumber' => $_POST['roomNumber_accept']]]],
        ['$set' => ['status' => "accepted"]]
    );
    $room_collection->updateOne(
        ['number' => $_POST['roomNumber_accept']],
        ['$set' => ['status' => "active"]]
    );
}
if (isset($_POST['customerName_reject']) && isset($_POST['roomNumber_reject'])) {
    $book_collection->updateOne(
        ['$and' => [['customerName' => $_POST['customerName_reject']], ['roomNumber' => $_POST['roomNumber_reject']]]],
        ['$set' => ['status' => "rejected"]]
    );
}
$booked_rooms = $room_collection->find(['status' => 'active'])->toArray();
foreach ($booked_rooms as $row) {
    $book_info = $book_collection->findOne(['roomNumber' => $row['number']]);
    $customer_name = $book_info['customerName'];
    $row['customerName'] = $customer_name;
    $row['startDate'] = $book_info['startDate'];
    $row['endDate'] = $book_info['endDate'];
}
echo (json_encode($booked_rooms));
