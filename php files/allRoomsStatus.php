<?php
include 'config.php';
$rooms = $room_collection->find()->toArray();
echo (json_encode($rooms));
