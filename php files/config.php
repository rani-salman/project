<?php

require 'vendor/autoload.php';

$client = new MongoDB\Client("mongodb://localhost:27017");
$book_collection = $client->HotelDatabase->Book;
$reserve_collection = $client->HotelDatabase->Reserve;
$room_collection = $client->HotelDatabase->Room;
$staff_collection = $client->HotelDatabase->Staff;
$task_collection = $client->HotelDatabase->Task;
$table_collection = $client->HotelDatabase->Table;
$order_collection = $client->HotelDatabase->Order;
$admin_collection = $client->HotelDatabase->Admin;
$customer_collection = $client->HotelDatabase->Customer;
$customer_concern_collection = $client->HotelDatabase->Customer_Concern;
$meal_collection = $client->HotelDatabase->Meal;
$payments_collection = $client->HotelDatabase->Payments;
