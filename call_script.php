<?php
// Turn on error reporting for debugging
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Define the URL to be called
$url = "https://ctrlaltachieve.wuaze.com/send_to_local.php?key=CTRLALT_API_2025&i=1";

// Initialize cURL session
$ch = curl_init();

// Set cURL options
curl_setopt($ch, CURLOPT_URL, $url);  // Set the URL
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);  // Return response as a string
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);  // Follow any redirects
curl_setopt($ch, CURLOPT_HEADER, false);  // Exclude headers from the output (we will handle headers manually)

// Execute the cURL request
$response = curl_exec($ch);

// Check if the request was successful
if($response === false) {
    echo "Error: " . curl_error($ch);  // Show cURL error message
} else {
    // Get the HTTP response code
    $http_code = curl_getinfo($ch, CURLINFO_HTTP_CODE);
    echo "HTTP Response Code: " . $http_code . "<br>";

    // If the response code is 200, print the response
    if ($http_code == 200) {
        echo "Response Body: " . $response;  // Print only the body of the response
    } else {
        echo "Error: No response, status code: " . $http_code;
    }
}

// Close cURL session
curl_close($ch);
?>
