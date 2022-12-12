<?php
include 'config.php';

// $total_rooms_booked_query = $book_collection->find(['status' => 'accepted']);
// $total_tables_booked_query = $reserve_collection->find(['status' => 'accepted']);
$total_rooms_booked = $room_collection->count(['status' => 'active']);
$total_tables_booked = $reserve_collection->count();
$total_booking = $total_rooms_booked + $total_tables_booked;
//.........................................................................................
$available_rooms = $room_collection->count() - $total_rooms_booked;
//..................................................................................................
$staff_number = $staff_collection->count();
//..................................................................................
$total_rooms_pending = $book_collection->count(['status' => 'pending']);


$total_pending_requests = $total_rooms_pending;
//echo $total_pending_requests;
//.........................................................................................
$suite_percentage = ($room_collection->count(['type' => 'suite', 'status' => "active"]) / $total_rooms_booked) * 100;
$royal_suite_percentage = ($room_collection->count(['type' => 'royal suite', 'status' => "active"]) / $total_rooms_booked) * 100;
$single_percentage = ($room_collection->count(['type' => 'single', 'status' => "active"]) / $total_rooms_booked) * 100;
$double_percentage = ($room_collection->count(['type' => 'double', 'status' => "active"]) / $total_rooms_booked) * 100;
//....................................................................................................................................
$total_booked_tables = $reserve_collection->count();
$seasideview_percentage = ($reserve_collection->count(['tableView' => 'Seaside']) / $total_booked_tables) * 100;
$smokingareaview_suite_percentage = ($room_collection->count(['tableView' => 'Smoking Area']) / $total_booked_tables) * 100;
$nonsmokingareview_percentage = ($room_collection->count(['tableView' => 'Non-Smoking Area']) / $total_booked_tables) * 100;
