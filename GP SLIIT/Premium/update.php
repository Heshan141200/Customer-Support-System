<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $subscriptionId = $_POST['subscriptionId'];
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $subscriptionPlan = $_POST['subscriptionPlan'];

    $sql = "UPDATE subscriptions 
            SET full_name='$fullName', email='$email', subscription_plan='$subscriptionPlan'
            WHERE subscriptionId=$subscriptionId";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }

    $conn->close();
}
?>
