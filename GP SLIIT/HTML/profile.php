<?php
include('./udbcon.php');

session_start();

if (!isset($_SESSION['User_id'])) {
    header("Location: login.php");
    exit();
}

$User_id = $_SESSION['User_id'];
$query = "SELECT Username FROM users WHERE User_id = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("i", $User_id);
$stmt->execute();
$result = $stmt->get_result();
$user = $result->fetch_assoc();

$ticket_query = "SELECT * FROM ticket WHERE User_id = ?";
$ticket_stmt = $conn->prepare($ticket_query);
$ticket_stmt->bind_param("i", $User_id);
$ticket_stmt->execute();
$ticket_result = $ticket_stmt->get_result();

if (isset($_GET['ticket_id'])) {
    $ticket_id = $_GET['ticket_id'];

    $delete_query = "DELETE FROM ticket WHERE ticket_id = ?";
    $stmt = $conn->prepare($delete_query);
    $stmt->bind_param("i", $ticket_id);

    if ($stmt->execute()) {
        header("Location: profile.php");
        exit();
    }
}

if (isset($_POST['update_Username'])) {
    $new_Username = $_POST['Username'];
    $update_query = "UPDATE users SET Username = ? WHERE User_id = ?";
    $update_stmt = $conn->prepare($update_query);
    $update_stmt->bind_param("si", $new_Username, $User_id);
    if ($update_stmt->execute()) {
        echo "Username updated successfully!";
        $_SESSION['Username'] = $new_Username; 
    }
}

if (isset($_POST['update_Password'])) {
    $new_Password = Password_hash($_POST['Password'], PASSWORD_DEFAULT);
    $update_Password_query = "UPDATE users SET Password = ? WHERE User_id = ?";
    $update_Password_stmt = $conn->prepare($update_Password_query);
    $update_Password_stmt->bind_param("si", $new_Password, $User_id);
    if ($update_Password_stmt->execute()) {
        echo "Password updated successfully!";
    }
}

if (isset($_POST['delete_account'])) {
    $delete_query = "DELETE FROM users WHERE User_id = ?";
    $delete_stmt = $conn->prepare($delete_query);
    $delete_stmt->bind_param("i", $User_id);
    if ($delete_stmt->execute()) {
        session_destroy();
        header("Location: goodbye.php"); 
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Profile</title>
    <link rel="stylesheet" href="../CSS/profile.css">
    <link rel="stylesheet" type="text/css" href="../CSS/navbar.css">
    <script src="../JS/navbar.js" defer></script>
    <link rel="stylesheet" type="text/css" href="../CSS/footer.css">
    <script src="../JS/footer.js" defer></script>
</head>
<body>
<header>
        <div id="logo"><img src="\GP SLIIT\CSA\download.jpeg"width=50px length=25px></div>
        <div id="navbar-placeholder"></div>
    </header>

    <h2>User Profile</h2>
    
    <p>Welcome, <?php echo htmlspecialchars($user['Username']); ?>!</p>
    <hr>

    <h3>Your Ticket</h3>
    <table class="ticket-table">
        <thead>
            <tr>
                <th>Ticket ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($ticket = $ticket_result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $ticket['ticket_id']; ?></td>
                <td><?php echo htmlspecialchars($ticket['title']); ?></td>
                <td><?php echo htmlspecialchars($ticket['description']); ?></td>
                <td><?php echo htmlspecialchars($ticket['status']); ?></td>
                <td>
                    <a href="ticketedit.php?ticket_id=<?php echo $ticket['ticket_id']; ?>">Edit</a> |
                    <a href="profile.php?ticket_id=<?php echo $ticket['ticket_id']; ?>" onclick="return confirm('Are you sure you want to delete this ticket?');">Delete</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

    <hr>
    <h3>Update Username</h3>
    <form method="post">
        <label for="Username">New Username:</label>
        <input type="text" name="Username" id="Username" required>
        <button type="submit" name="update_Username">Update Username</button>
    </form>

    <h3>Update Password</h3>
    <form method="post">
        <label for="Password">New Password:</label>
        <input type="Password" name="Password" id="Password" required>
        <button type="submit" name="update_Password">Update Password</button>
    </form>
    <hr>
   
    <h3>Delete Account</h3>
    <form method="post">
        <button type="submit" name="delete_account" onclick="return confirm('Are you sure you want to delete your account? This cannot be undone.')">Delete Account</button>
    </form>

  
<hr>
<div class="center-button">
    <!-- <button type="submit" name="premiumupdate" onclick="location.href='\GP SLIIT\Premium\read.php'">Manage Subscription</button> -->
     <button type="submit" class="subscribe-btn" onclick="location.href='/GP%20SLIIT/Premium/read.php'">Manage Subscription</button>  
</div>
<hr>

    <footer>
        <div id="content"></div>
        <!-- <p>WeSupport &copy 2024</p> -->
    </footer>
</body>
</html>
