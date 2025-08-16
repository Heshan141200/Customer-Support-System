
<link rel="stylesheet" href="\GP SLIIT\Premium\read.css">
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "user";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM subscriptions";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    echo "<table><tr><th>Subscription ID</th><th>Full Name</th><th>Email</th><th>Subscription Plan</th><th>Action</th></tr>";
    while($row = $result->fetch_assoc()) {
        echo "<tr><td>" . $row["subscriptionId"]. "</td><td>" . $row["full_name"]. "</td><td>" . $row["email"]. "</td><td>" . $row["subscription_plan"]. "</td>
              <td>
                  <a href='edit.php?id=".$row['subscriptionId']."'>Edit</a>
                  <a href='delete.php?id=".$row['subscriptionId']."'>Delete</a>
              </td></tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
