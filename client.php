<?php

class APIClient {

    private $base_url;

    public function __construct($base_url) {
        $this->base_url = $base_url;
    }

    /**
     * Send a GET request to the API server.
     *
     * @param string $endpoint The endpoint to send the request to.
     * @param array $params The query parameters to include in the request.
     *
     * @return mixed The response from the server, or false if there was an error.
     */
    public function get($endpoint, $params = array()) {
        $url = $this->base_url . $endpoint;
        if ($params) {
            $url .= '?' . http_build_query($params);
        }
        return $this->send_request('GET', $url);
    }

    /**
     * Send a POST request to the API server.
     *
     * @param string $endpoint The endpoint to send the request to.
     * @param array $data The data to include in the request body.
     *
     * @return mixed The response from the server, or false if there was an error.
     */
    public function post($endpoint, $data) {
        $url = $this->base_url . $endpoint;
        $data_string = json_encode($data);
        return $this->send_request('POST', $url, $data_string);
    }

    /**
     * Send a PUT request to the API server.
     *
     * @param string $endpoint The endpoint to send the request to.
     * @param string $id The ID of the resource to update.
     * @param array $data The data to include in the request body.
     *
     * @return mixed The response from the server, or false if there was an error.
     */
    public function put($endpoint, $id, $data) {
        $url = $this->base_url . $endpoint . '/' . $id;
        $data_string = json_encode($data);
        return $this->send_request('PUT', $url, $data_string);
    }

    /**
     * Send a DELETE request to the API server.
     *
     * @param string $endpoint The endpoint to send the request to.
     * @param string $id The ID of the resource to delete.
     *
     * @return mixed The response from the server, or false if there was an error.
     */
    public function delete($endpoint, $id) {
        $url = $this->base_url . $endpoint . '/' . $id;
        return $this->send_request('DELETE', $url);
    }

    /**
     * Send an HTTP request to the API server using cURL.
     *
     * @param string $method The HTTP method to use (e.g., GET, POST, PUT, DELETE).
     * @param string $url The URL to send the request to.
     * @param string $data_string The data to include in the request body (if any).
     *
     * @return mixed The response from the server, or false if there was an error.
     */
     private function send_request($method, $url, $data_string = null) {
     $curl = curl_init();
     curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
     curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
     curl_setopt($curl, CURLOPT_HTTPHEADER, array(
         'Content-Type: application/json',
         'Content-Length: ' . strlen($data_string)
     ));
     curl_setopt($curl, CURLOPT_CUSTOMREQUEST, $method);
     if ($method !== 'GET') {
         curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
     }
     curl_setopt($curl, CURLOPT_URL, $url);
     $result = curl_exec($curl);
     $http_code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
     curl_close($curl);
     if ($http_code >= 400) {
         return false;
     }
     return json_decode($result, true);
 }

}

?>
