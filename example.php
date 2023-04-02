<?php
// Initialize the API client with the base URL of the API server
$client = new APIClient('http://example.com/api');

// Send a GET request to the /users endpoint
$response = $client->get('/users');
if ($response !== false) {
    // Handle the response
    print_r($response);
} else {
    // Handle the error
    echo "Error: GET request failed\n";
}

// Send a POST request to the /users endpoint to create a new user
$data = array("name" => "John Doe", "email" => "john@example.com");
$response = $client->post('/users', $data);
if ($response !== false) {
    // Handle the response
    print_r($response);
} else {
    // Handle the error
    echo "Error: POST request failed\n";
}

// Send a PUT request to the /users endpoint to update an existing user
$id = 1;
$data = array("name" => "Jane Smith", "email" => "jane@example.com");
$response = $client->put('/users', $id, $data);
if ($response !== false) {
    // Handle the response
    print_r($response);
} else {
    // Handle the error
    echo "Error: PUT request failed\n";
}

// Send a DELETE request to the /users endpoint to delete an existing user
$id = 2;
$response = $client->delete('/users', $id);
if ($response !== false) {
    // Handle the response
    print_r($response);
} else {
    // Handle the error
    echo "Error: DELETE request failed\n";
}

?>
