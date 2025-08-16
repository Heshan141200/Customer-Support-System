<?php
include('udbcon.php');
session_start();

if (isset($_GET['ticket_id'])) {
    $ticket_id = $_GET['ticket_id'];

    $query = "SELECT * FROM ticket WHERE ticket_id = ?";
    $stmt = $conn->prepare($query);
    $stmt->bind_param("i", $ticket_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $ticket = $result->fetch_assoc();

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $title = $_POST['title'];
        $description = $_POST['description'];
        $attachment = $_POST['attachment'];

        $update_query = "UPDATE ticket SET title = ?, description = ?, attachment = ? WHERE ticket_id = ?";
        $update_stmt = $conn->prepare($update_query);
        $update_stmt->bind_param("sssi", $title, $description, $attachment, $ticket_id);

        if ($update_stmt->execute()) {
            header("Location: profile.php");
            exit();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Ticket</title>
    <link rel="stylesheet" type="text/css" href="../CSS/ticketedit.css">
</head>
<body>
<div class="container"> 
        <h3>Edit Ticket</h3> 
        <form method="post">
            <label for="title">Title:</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($ticket['title']); ?>" required><br>

            <label for="description">Description:</label>
            <textarea id="description" name="description" required><?php echo htmlspecialchars($ticket['description']); ?></textarea><br>

            <label for="attachment">Attachment</label><br>
            <input type="file" id="attachment" name="attachment"><br><br>

            <button type="submit">Update Ticket</button>
        </form>
    </div>
</body>
</html>