<!DOCTYPE html>
<html>
<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-with, initial-scale=1">
 <title>Crypto Currency</title>

 <link rel="stylesheet" href="#" />
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
 <link rel="icon" href="images/logo.avif"/>
 <script src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>
</head>
<body style="color: white;background-color: rgb(78, 56, 48);">
<div class="body">
        <nav>
            
            <ul>
            <li><a  style="color: darkorange;"href="crud.php">CRUD Data </a></li> 
            <li><a href="crud.html">CRUD Application</a></li>
              <li><a href="index.html">Home</a></li>
              <li><a href="chart.html">Real Time Chart Widget</a></li>
                <li><a href="livepricechart.html"> Price Chart</a></li>
                <li><a href="indexcheng.html">Convert</a></li>
                <li><a href="about.html">About Cryptocurrencies</a></li>
                
            </ul>
            
        </nav>
    </div>

<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "Lak123456789*";
$database = "cryptodata";

$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// If form submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Escape user inputs for security
    $firstName = $conn->real_escape_string($_POST['firstName']);
    $lastName = $conn->real_escape_string($_POST['lastName']);
    $rollNo = $conn->real_escape_string($_POST['rollNo']);

    // Insert data
    $sql = "INSERT INTO students (first_name, last_name, favorite_cryptos) VALUES ('$firstName', '$lastName', '$rollNo')";
    if ($conn->query($sql) === TRUE) {
        echo "*";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// If delete link is clicked
if (isset($_GET['delete_id'])) {
    $delete_id = $_GET['delete_id'];
    // Delete data
    $delete_sql = "DELETE FROM students WHERE id = $delete_id";
    if ($conn->query($delete_sql) === TRUE) {
        echo "";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

// Fetch data from database
$sql = "SELECT * FROM students";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while ($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td>" . $row['first_name'] . "</td>";
        echo "<td>" . $row['last_name'] . "</td>";
        echo "<td>" . $row['favorite_cryptos'] . "</td>";
        echo "<td><a href='#' class='btn btn-warning btn-sm edit'></a> <a href='?delete_id=".$row['id']."' class='btn btn-danger btn-sm delete'>Delete</a></td>";
        echo "</tr>";
    }
} else {
    echo "0 results";
}

$conn->close();
?>
</body>
</html>
<style>
.able {
    width: 100%;
    border-collapse: collapse;
    background-color: #ffc107;
}

/* Style for table headers */
.th {
    background-color: #f2f2f2;
    padding: 8px;
    text-align: left;
}

/* Style for table data cells */
.td {
    border: 1px solid #ddd;
    padding: 8px;
}

/* Style for delete button */
.delete {
    color: white;
    background-color: #dc3545;
    border: none;
    padding: 5px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    cursor: pointer;
    border-radius: 3px;
}

/* Style for edit button */
.edit {
    color: white;
    background-color: #ffc107;
    border: none;
    padding: 5px 10px;
    text-align: center;
    text-decoration: none;
    display: inline-block;
    cursor: pointer;
    border-radius: 3px;
}

/* Style for buttons container */
.buttons-container {
    display: flex;
    justify-content: space-between;
}
</style>