<?php
    include 'udbcon.php'; 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

        
        $sql = "DELETE FROM users WHERE User_id = $id";

        if ($conn->query($sql) === TRUE) {
            echo "User deleted successfully.";
        } else {
            echo "Error deleting user: " . $conn->error;
        }

        
        header("Location: user_mgt.php");
        exit();
    } else {
        echo "No user ID provided.";
        exit();
    }
?>
