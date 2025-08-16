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
    $fullName = $_POST['fullName'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT); 
    $subscriptionPlan = $_POST['subscriptionPlan'];
    $cardNumber = $_POST['cardNumber'];
    $expiryDate = $_POST['expiryDate'];
    $cvv = $_POST['cvv'];

    $sql = "INSERT INTO subscriptions (full_name, email, password, subscription_plan, card_number, expiry_date, cvv)
            VALUES ('$fullName', '$email', '$password', '$subscriptionPlan', '$cardNumber', '$expiryDate', '$cvv')";

    if ($conn->query($sql) === TRUE) {
        header("Location:\GP SLIIT\HTML\home.php");

    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
