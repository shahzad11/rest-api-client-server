# API Server
This is a simple API server built with PHP that provides CRUD operations for users and posts resources. The API server uses a MySQL database to store the data.

## Installation
To install the API server, follow these steps:

* Clone the repository to your local machine.
* Upload the repository files to your web server.
## Usage
The API server provides the following endpoints for working with users and posts resources:

## Users Endpoints
```
GET /users: Get a list of all users.
GET /users/{id}: Get the details of a specific user.
POST /users: Create a new user.
PUT /users/{id}: Update an existing user.
DELETE /users/{id}: Delete a user.
```
## Posts Endpoints
``` 
GET /posts: Get a list of all posts.
GET /posts/: Get a list of all posts.
GET /posts/{id}: Get the details of a specific post.
POST /posts: Create a new post.
PUT /posts/{id}: Update an existing post.
DELETE /posts/{id}: Delete a post.
```
To use the API server, make HTTP requests to the appropriate endpoint using a tool like cURL or Postman. For example, to create a new user, send a POST request to the /users endpoint with the user data in the request body:

```
POST http://example.com/api/users
Content-Type: application/json

{
    "name": "John Doe",
    "email": "john@example.com",
    "password": "secret"
}
```
The API server will respond with a JSON object containing the details of the new user, including the ID assigned by the database:

```
{
    "id": 1,
    "name": "John Doe",
    "email": "john@example.com",
    "password": "secret"
}
```
## Error Codes
The API server includes error handling for common error scenarios, such as invalid requests, missing parameters, and database errors. The API server will respond with an appropriate HTTP status code and error message in the response body. Here are the error codes that the API server may return:

* 400 Bad Request: The request was malformed or missing a required parameter.
* 401 Unauthorized: The request requires authentication, and either no credentials were provided or the credentials were invalid.
* 403 Forbidden: The request is not allowed for the current user or role.
* 404 Not Found: The requested resource could not be found.
* 409 Conflict: The request conflicts with the current state of the resource, such as attempting to create a resource that already exists.
* 500 Internal Server Error: An error occurred on the server that prevented the request from being completed.

In addition to the HTTP status code, the API server may include a more detailed error message in the response body, explaining what went wrong and how to fix the issue. Consumers of the API should check the response body for error messages when an error status code is returned.

# License
This API server is licensed under the MIT License. See the LICENSE file in the repository for details.

# Credents
[Shahzad Ahmad Mirza](https://shahzadmirza.com/) from [Designs Valley](https://designsvalley.com/)
