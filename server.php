<?php

// Define API class
class API {

    private $allowed_methods = array('GET', 'POST', 'PUT', 'DELETE');
    private $endpoints = array(
        "users" => array(
            "GET" => "get_users",
            "POST" => "create_user",
            "PUT" => "update_user",
            "DELETE" => "delete_user"
        ),
        "posts" => array(
            "GET" => "get_posts",
            "POST" => "create_post",
            "PUT" => "update_post",
            "DELETE" => "delete_post"
        )
    );

    // Constructor
    public function __construct() {
        // Set headers
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        // Handle request
        $this->handle_request();
    }

    // Handle request
    private function handle_request() {
        // Check if request method is allowed
        if (!in_array($_SERVER['REQUEST_METHOD'], $this->allowed_methods)) {
            $this->send_error_response(405, "Method not allowed");
            return;
        }
        // Parse the URI and get the endpoint and parameters
        $request_uri = explode('?', $_SERVER['REQUEST_URI'], 2);
        $uri = explode('/', $request_uri[0]);
        $endpoint = $uri[2];
        $params = $_REQUEST;
        // Check if endpoint exists
        if (!array_key_exists($endpoint, $this->endpoints)) {
            $this->send_error_response(404, "Endpoint not found");
            return;
        }
        // Call the appropriate method based on request method and endpoint
        $method = $this->endpoints[$endpoint][$_SERVER['REQUEST_METHOD']];
        if (!method_exists($this, $method)) {
            $this->send_error_response(405, "Method not allowed");
            return;
        }
        $result = $this->$method($params);
        if ($result === false) {
            $this->send_error_response(500, "Server error");
            return;
        }
        // Return the result as JSON
        echo json_encode($result);
    }

    // Send error response
    private function send_error_response($code, $message) {
        http_response_code($code);
        echo json_encode(array("error" => $message));
    }

    // Define API methods
    private function get_users($params) {
        // Return a list of users
        return array("users" => array(
            array("id" => 1, "name" => "John Doe"),
            array("id" => 2, "name" => "Jane Smith")
        ));
    }

    private function create_user($params) {
        // Create a new user
        // ...
        return array("status" => "success", "data" => $new_user);
    }

    private function update_user($params) {
        // Update an existing user
        // ...
        return array("status" => "success", "data" => $updated_user);
    }

    private function delete_user($params) {
        // Delete an existing user
        // ...
        return array("status" => "success");
    }

    private function get_posts($params) {
        // Return a list of posts
        // ...
        return array("posts" => $posts);
    }

    private function create_post($params) {
        // Create a new post
        // ...
        return array("status" => "success", "data" =>
    }
    private function create_post($params) {
    // Create a new post
    // ...
    return array("status" => "success", "data" => $new_post);
}

    private function update_post($params) {
        // Update an existing post
        // ...
        return array("status" => "success", "data" => $updated_post);
    }

    private function delete_post($params) {
        // Delete an existing post
        // ...
        if ($result === false) {
            return false;
        } else {
            return array("status" => "success");
        }
    }

}
