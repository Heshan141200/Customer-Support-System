<link rel="stylesheet" href="\GP SLIIT\Premium\edit.css">

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

    $sql = "SELECT * FROM subscriptions WHERE subscriptionId=$subscriptionId";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        ?>

        <form action="update.php" method="post">
            <input type="hidden" name="subscriptionId" value="<?php echo $row['subscriptionId']; ?>">
            
            <label for="fullName">Full Name</label>
            <input type="text" name="fullName" value="<?php echo $row['full_name']; ?>" required>
            
            <label for="email">Email</label>
            <input type="email" name="email" value="<?php echo $row['email']; ?>" required>
            
            <label for="subscriptionPlan">Subscription Plan</label>
            <select name="subscriptionPlan">
                <option value="monthly" <?php if ($row['subscription_plan'] == 'monthly') echo 'selected'; ?>>Monthly</option>
                <option value="yearly" <?php if ($row['subscription_plan'] == 'yearly') echo 'selected'; ?>>Yearly</option>
            </select>
            
            <button type="submit">Update</button>
        </form>

        <?php
    } else {
        echo "Record not found";
    }
} else {
    echo "No subscription ID provided";
}

$conn->close();
?>
