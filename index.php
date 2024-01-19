<?php

header('Content-Type: application/json');

// Get JSON as a string
$json_str = file_get_contents('php://input');

// Decode the JSON string into an object
$data = json_decode($json_str);

// Check if the 'customData' is present and contains 'apikey'
if (isset($data->customData) && isset($data->customData->apikey)) {
    $apiKey = $data->customData->apikey;

    // Remove the apikey from customData before sending it to GHL
    unset($data->customData->apikey);

    // Proceed to send data to GHL
    echo json_encode(postToGHL($data, $apiKey));
} else {
    // Handle the error appropriately
    
    echo json_encode(['error' => 'API key not found']);
}


function postToGHL($data, $apiKey) {
    // Convert the data back to JSON
    $jsonData = json_encode($data);

    // Initialize cURL
    $ch = curl_init();

    // Set cURL options
    curl_setopt($ch, CURLOPT_URL, 'https://rest.gohighlevel.com/v1/contacts');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POST, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
    curl_setopt($ch, CURLOPT_HTTPHEADER, [
        'Authorization: Bearer ' . $apiKey,
        'Content-Type: application/json',
    ]);

    // Execute the request and fetch the response. Check for errors
    $response = curl_exec($ch);

    if (curl_errno($ch)) {
        // Handle cURL error
        return ['error' => 'cURL error: ' . curl_error($ch)];
    } else {
        // Handle successful response
        return json_decode($response, true);
    }

    // Close the cURL session
    curl_close($ch);
}

?>
