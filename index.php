<?php
session_start(); // Start the session to manage session variables

// Database connection details
$host = "localhost";
$user = "root";
$pass = "";
$db = "php-mysqli";

// Establish a connection to the database
$connection = mysqli_connect($host, $user, $pass, $db);

// Check if the connection is successful, else print an error message
if (!$connection) {
    echo "Cannot connect to database";
}

// Declare inputs
$data_productID = "";
$data_productName = "";
$data_amount = "";
$data_customerName = "";
$data_status = "";
$data_createBy = "";
$success = "";
$error = "";

// Retrieve success and error messages from session
$success = $_SESSION['success'] ?? "";
$error = $_SESSION['error'] ?? "";

// Clear session messages after displaying
unset($_SESSION['success']);
unset($_SESSION['error']);

// Check if 'op' parameter exists in the URL to determine the operation (edit or new)
if (isset($_GET['op'])) {
    $op = $_GET['op'];
} else {
    $op = ""; // Default operation is empty (new)
}

// If the operation is 'edit', fetch the existing data for editing
if ($op == 'edit') {
    $data_id = $_GET['data_id']; // Get the data ID from URL
    $sql1 = "SELECT * FROM viewdata WHERE data_id = '$data_id'"; // Query to fetch data by ID
    $q1 = mysqli_query($connection, $sql1); // Execute query
    $r1 = mysqli_fetch_array($q1); // Fetch the result as an array
    // Assign values to the variables for editing
    $data_productID = $r1['data_productID'];
    $data_productName = $r1['data_productName'];
    $data_amount = $r1['data_amount'];
    $data_customerName = $r1['data_customerName'];
    $data_status = $r1['data_status'];
    $data_createBy = $r1['data_createBy'];
}

// Save Input/Edit Data
if (isset($_POST['save'])) {
    $data_productID = $_POST['data_productID'];
    $data_productName = $_POST['data_productName'];
    $data_amount = $_POST['data_amount'];
    $data_customerName = $_POST['data_customerName'];
    $data_status = $_POST['data_status'];
    $data_createBy = $_POST['data_createBy'];

    if ($data_productID && $data_productName && $data_amount && $data_customerName && $data_status && $data_createBy || $op == 'edit') {
        if ($op == 'edit') {
            // If it's an edit operation, update the data in the database
            $data_id = $_GET['data_id'];
            $sql1 = "UPDATE viewdata SET data_productID = '$data_productID', data_productName = '$data_productName', data_amount = '$data_amount', data_customerName = '$data_customerName', data_status = '$data_status', data_transactionDate = NOW(), data_createBy =  '$data_createBy' WHERE data_id = '$data_id'";
            $q1 = mysqli_query($connection, $sql1);
            if ($q1) {
                $_SESSION['success'] = "Success to edit data";
            } else {
                $_SESSION['error'] = "Fail to edit data";
            }
        } else {
            // If it's a new data entry, insert the data into the database
            $sql1 = "INSERT INTO viewdata (data_productID, data_productName, data_amount, data_customerName, data_status, data_transactionDate, data_createBy, data_createOn) VALUES ('$data_productID', '$data_productName', '$data_amount', '$data_customerName', '$data_status', NOW(), '$data_createBy', NOW())";
            $q1 = mysqli_query($connection, $sql1);
            if ($q1) {
                $_SESSION['success'] = "Success to add data";
            } else {
                $_SESSION['error'] = "Fail to add data";
            }
        }
        header("Location: index.php");
        exit();    
    } else {    
        $_SESSION['error'] = "Please enter all the data";
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Data</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <!-- Styling the page -->
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<body>
    <div class="mx-auto">
        <!-- input data -->
        <div class="card"><span class="border border-white">
                <div class="card-header bg-secondary text-light">
                    <?php echo $op == 'edit' ? 'Edit Data' : 'Create Data'; ?>
                </div>
                <div class="card-body">
                    <?php
                    if ($error) {
                        // Display error message if there is any
                        ?>
                        <div class="alert alert-danger" role="alert">
                            <?php echo $error ?>
                        </div>
                        <?php
                    }
                    ?>
                    <?php
                    if ($success) {
                        // Display success message if there is any
                        ?>
                        <div class="alert alert-success" role="alert">
                            <?php echo $success ?>
                        </div>
                        <?php
                    }
                    ?>
                    <!-- Form for creating or editing data -->
                    <form action="" method="POST">
                        <!-- Input fields for data -->
                        <div class="mb-3 row">
                            <label for="data_productID" class="col-sm-2 col-form-label">Product ID</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="data_productID" name="data_productID" value="<?php echo $data_productID ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="data_productName" class="col-sm-2 col-form-label">Product Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="data_productName" name="data_productName" value="<?php echo $data_productName ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="data_amount" class="col-sm-2 col-form-label">Amount</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="data_amount" name="data_amount" value="<?php echo $data_amount ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="data_customerName" class="col-sm-2 col-form-label">Customer Name</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="data_customerName" name="data_customerName" value="<?php echo $data_customerName ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="data_status" class="col-sm-2 col-form-label">Status</label>
                            <div class="col-sm-10">
                                <input type="number" class="form-control" id="data_status" name="data_status" value="<?php echo $data_status ?>">
                            </div>
                        </div>

                        <div class="mb-3 row">
                            <label for="data_createBy" class="col-sm-2 col-form-label">Create By</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" id="data_createBy" name="data_createBy" value="<?php echo $data_createBy ?>">
                            </div>
                        </div>
    
                        <div class="col-12">
                            <input type="submit" name="save" value="Save Data" class="btn btn-primary" />
                        </div>    
                    </form>    
                </div>    
        </div>    
        </span>    
    
        <!-- Table displaying the data -->  
        <div class="card"><span class="border border-white">
                <div class="card-header bg-secondary text-light">
                    Products Data    
                </div>    
                <div class="card-body">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col" style="color: white">#</th>
                                <th scope="col" style="color: white">Product ID</th>
                                <th scope="col" style="color: white">Product Name</th>
                                <th scope="col" style="color: white">Amount</th>
                                <th scope="col" style="color: white">Customer Name</th>
                                <th scope="col" style="color: white">Status</th>
                                <th scope="col" style="color: white">Transaction Date</th>
                                <th scope="col" style="color: white">Create By</th>
                                <th scope="col" style="color: white">Create On</th>
                                <th scope="col" style="color: white">Action</th>
                            </tr>
                        <tbody>
                            <?php
                            // Fetch and display all the records from the database
                            $sql2 = "SELECT * FROM viewdata ORDER BY data_transactionDate ASC";
                            $q2 = mysqli_query($connection, $sql2);
                            $sort = 1;

                            while ($r2 = mysqli_fetch_array($q2)) {
                                // Loop through the results and display each record
                                $data_id = $r2['data_id'];
                                $data_productID = $r2['data_productID'];
                                $data_productName = $r2['data_productName'];
                                $data_amount = $r2['data_amount'];
                                $data_customerName = $r2['data_customerName'];
                                $data_status = $r2['data_status'];
                                $data_transactionDate = $r2['data_transactionDate'];
                                $data_createBy = $r2['data_createBy'];
                                $data_createOn = $r2['data_createOn'];
                                ?>
                                <tr>
                                    <th scope="row" style="color: white"><?php echo $sort++ ?></th>
                                    <td scope="row" style="color: white"><?php echo $data_productID ?></td>
                                    <td scope="row" style="color: white"><?php echo $data_productName ?></td>
                                    <td scope="row" style="color: white"><?php echo $data_amount ?></td>
                                    <td scope="row" style="color: white"><?php echo $data_customerName ?></td>
                                    <td scope="row" style="color: white"><?php echo $data_status ?></td>
                                    <td scope="row" style="color: white"><?php echo $data_transactionDate ?></td>
                                    <td scope="row" style="color: white"><?php echo $data_createBy ?></td>
                                    <td scope="row" style="color: white"><?php echo $data_createOn ?></td>
                                    <td scope="row">
                                        <a href="index.php?op=edit&data_id=<?php echo $data_id ?>"><button type="button" class="btn btn-light">Edit</button></a>
                                    </td>
                                </tr>
                                <?php
                            }
                            ?>
                        </tbody>
                        </thead>
                    </table>
                </div>
            </span>
        </div>
    </div>
</body>

</html>