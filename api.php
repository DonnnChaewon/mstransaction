<?php
// Add Header
header("Content-Type: application/json");
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
header("Access-Control-Allow-Headers: Content-Type, Authorization");

// Database connection
$host = "localhost";
$user = "root";
$pass = "";
$db = "php-mysqli";

$connection = mysqli_connect($host, $user, $pass, $db);

if (!$connection) {
    echo json_encode(["error" => "Cannot connect to database"]);
    exit();
}

// Get the HTTP method
$method = $_SERVER['REQUEST_METHOD'];
$input = json_decode(file_get_contents('php://input'), true);

switch ($method) {
    case 'GET':
        // Handle GET request to fetch data
        $id = isset($_GET['id']) ? $_GET['id'] : null;
        if ($id) {
            // Fetch a specific record based on data_id
            $query = "SELECT * FROM viewdata WHERE data_id = '$id'";
            $result = mysqli_query($connection, $query);
            if ($result && mysqli_num_rows($result) > 0) {
                $data = mysqli_fetch_assoc($result);
                echo json_encode($data);
            } else {
                echo json_encode(["error" => "No record found"]);
            }
        } else {
            // Fetch all records ordered by data_transactionDate ASC
            $query = "SELECT * FROM viewdata ORDER BY data_transactionDate ASC";
            $result = mysqli_query($connection, $query);
            if ($result && mysqli_num_rows($result) > 0) {
                $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
                echo json_encode($data);
            } else {
                echo json_encode(["error" => "No records found"]);
            }
        }
        break;
    case 'POST':
        // Handle POST request to insert data
        if (!isset($input['data_productID']) || !isset($input['data_productName']) || !isset($input['data_amount']) || !isset($input['data_customerName']) || !isset($input['data_status']) || !isset($input['data_createBy'])) {
            echo json_encode(["error" => "All fields are required"]);
            exit();
        }
        $data_productID = mysqli_real_escape_string($connection, $input['data_productID']);
        $data_productName = mysqli_real_escape_string($connection, $input['data_productName']);
        $data_amount = mysqli_real_escape_string($connection, $input['data_amount']);
        $data_customerName = mysqli_real_escape_string($connection, $input['data_customerName']);
        $data_status = mysqli_real_escape_string($connection, $input['data_status']);
        $data_createBy = mysqli_real_escape_string($connection, $input['data_createBy']);

        // INSERT query
        $query = "INSERT INTO viewdata (data_productID, data_productName, data_amount, data_customerName, data_status, data_transactionDate, data_createBy, data_createOn) 
                  VALUES ('$data_productID', '$data_productName', '$data_amount', '$data_customerName', '$data_status', NOW(), '$data_createBy', NOW())";

        // Error Handling
        if (mysqli_query($connection, $query)) {
            echo json_encode(["message" => "Data created successfully"]);
        } else {
            echo json_encode(["error" => "Failed to create data"]);
        }
        break;
    case 'PUT':
        // Handle PUT request to update data
        if (!isset($input['data_id']) || !isset($input['data_productID']) || !isset($input['data_productName']) || !isset($input['data_amount']) || !isset($input['data_customerName']) || !isset($input['data_status']) || !isset($input['data_createBy'])) {
            echo json_encode(["error" => "All fields are required"]);
            exit();
        }
        $data_id = mysqli_real_escape_string($connection, $input['data_id']);
        $data_productID = mysqli_real_escape_string($connection, $input['data_productID']);
        $data_productName = mysqli_real_escape_string($connection, $input['data_productName']);
        $data_amount = mysqli_real_escape_string($connection, $input['data_amount']);
        $data_customerName = mysqli_real_escape_string($connection, $input['data_customerName']);
        $data_status = mysqli_real_escape_string($connection, $input['data_status']);
        $data_createBy = mysqli_real_escape_string($connection, $input['data_createBy']);

        // UPDATE query
        $query = "UPDATE viewdata 
                  SET data_productID = '$data_productID', 
                      data_productName = '$data_productName', 
                      data_amount = '$data_amount', 
                      data_customerName = '$data_customerName', 
                      data_status = '$data_status', 
                      data_transactionDate = NOW(), 
                      data_createBy = '$data_createBy' 
                  WHERE data_id = '$data_id'";

        // Error Handling
        if (mysqli_query($connection, $query)) {
            echo json_encode(["message" => "Data updated successfully"]);
        } else {
            echo json_encode(["error" => "Failed to update data"]);
        }
        break;
}

?>