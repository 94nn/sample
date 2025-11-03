<?php
header("Content-Type: application/json");

// Security key
$API_KEY = "CTRLALT_API_2025";
if (!isset($_GET['key']) || $_GET['key'] !== $API_KEY) {
    die(json_encode(["status" => "unauthorized"]));
}

// Connect to your live InfinityFree database
include("Connect.php");

// Fetch data to send (you can limit or filter as needed)
$query = "SELECT * FROM user";
$result = mysqli_query($connect, $query);

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

echo json_encode($data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
?>
