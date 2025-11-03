<?php
header("Content-Type: application/json");

// Secure API key
$API_KEY = "CTRLALT_API_2025";
$LOCAL_API = "https://kyla-bindable-overfrankly.ngrok-free.dev/receive_api.php?key=CTRLALT_API_2025";

// Include web database connection
include("Connect.php");

// Example: Send all users (or only recent ones)
$query = "SELECT * FROM user";
$result = mysqli_query($connect, $query);

$data = [];
while ($row = mysqli_fetch_assoc($result)) {
    $data[] = $row;
}

$json = json_encode($data, JSON_UNESCAPED_UNICODE);

// Send to local API
$ch = curl_init($LOCAL_API);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    'Content-Type: application/json',
    'ngrok-skip-browser-warning: true'
]);

curl_setopt($ch, CURLOPT_POSTFIELDS, $json);

$response = curl_exec($ch);
$err = curl_error($ch);
curl_close($ch);

if ($err) {
    echo json_encode(["status" => "error", "message" => $err]);
} else {
    echo $response;
}
?>
