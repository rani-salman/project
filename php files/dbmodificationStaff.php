<?php
include 'config.php';


if (isset($_POST["roomNb"])) {
    $room_collection->updateOne(
        ['number' => $_POST["roomNb"]],
        ['$set' => ['status' => 'free']]
    );
    $toBeDeleted = [
        "roomNumber" => $_POST["roomNb"],
        "status" => "accepted"
    ];
    $book_collection->deleteOne($toBeDeleted);
}

if (isset($_POST["roomNum"])) {
    if ($room_collection->findOne(['number' => $_POST['roomNum']])->roomService === "No") {
        $room_collection->updateOne(
            ['number' => $_POST["roomNum"]],
            ['$set' => ['roomService' => 'Yes']]
        );
    } else {
        $room_collection->updateOne(
            ['number' => $_POST["roomNum"]],
            ['$set' => ['roomService' => 'No']]
        );
    }
}
