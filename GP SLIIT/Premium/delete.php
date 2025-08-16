<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_GET['id'])) {
    $subscriptionId = $_GET['id'];

    $sql = "DELETE FROM subscriptions WHERE subscriptionId=$subscriptionId";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "No subscription ID provided.";
}

$conn->close();
?>
