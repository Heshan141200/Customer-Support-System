<?php
    include 'header.php'; 
    include 'udbcon.php'; 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $sql = "SELECT * FROM ticket WHERE ticket_Id = $id";
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $ticket = $result->fetch_assoc();
            
        } else {
            echo "Ticket not found.";
            exit();
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $title = $_POST['title'];
        $category = $_POST['category'];
        
        $sql = "UPDATE ticket SET title='$title', category='$category' WHERE ticket_Id = $id";
        
        if ($conn->query($sql) === TRUE) {
            header("Location: ticket_mgt.php");
            exit(); 
        } else {
            echo "Error updating ticket: " . $conn->error;
        }
    }
?>

<main>
    <h2>Edit Ticket</h2>
    <form method="post" action="">

        <label>Title:</label>
        <input type="text" name="title" value="<?php echo $ticket['title']; ?>" required><br><br>

        <label>Category:</label>
        <select name="category" required>
            <option value="Technical Support" <?php if($ticket['category'] == 'Technical Support') echo 'selected'; ?>>Technical Support</option>
            <option value="Human Resources" <?php if($ticket['category'] == 'Human Resources') echo 'selected'; ?>>Human Resources</option>
            <option value="Technology" <?php if($ticket['category'] == 'Technology') echo 'selected'; ?>>Technology</option>
            <option value="Legal" <?php if($ticket['category'] == 'Legal') echo 'selected'; ?>>Legal</option>
            <option value="Real Estate" <?php if($ticket['category'] == 'Real Estate') echo 'selected'; ?>>Real Estate</option>
        </select><br><br>
        
        <input type="submit" value="Update Ticket">
    </form>
</main>

<?php
    include 'footer.php'; 
?>
