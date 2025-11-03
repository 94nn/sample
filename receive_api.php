<?php
header("Content-Type: application/json");

// Security check
$API_KEY = "CTRLALT_API_2025";
if (!isset($_GET['key']) || $_GET['key'] !== $API_KEY) {
    die(json_encode(["status" => "unauthorized"]));
}

// Connect to your local database
$conn = new mysqli("localhost", "root", "", "sample");
if ($conn->connect_error) {
    die(json_encode(["status" => "error", "message" => $conn->connect_error]));
}

// Get JSON data from request body
$json = file_get_contents('php://input');
$data = json_decode($json, true);

// Insert or update data
foreach ($data as $row) {
    $User_Id = $conn->real_escape_string($row['User_Id']);
    $Name = $conn->real_escape_string($row['Name']);
    $Email = $conn->real_escape_string($row['Email']);

    $sql = "INSERT INTO user (User_Id, Name, Email)
            VALUES ('$User_Id', '$Name', '$Email')
            ON DUPLICATE KEY UPDATE Name='$Name', Email='$Email'";
    $conn->query($sql);
}

echo json_encode(["status" => "success", "count" => count($data)]);
$conn->close();
?>
