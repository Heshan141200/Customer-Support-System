<?php
    
    include 'dbcon.php';

    if (isset($_GET['id'])) {
        $ticket_id = $_GET['id'];

        $sql = "UPDATE ticket SET status = 'approved' WHERE ticket_id = $ticket_id";

        if ($conn->query($sql) === TRUE) {
            header("Location:ticket_mgt.php");
            exit(); 
        } else {
            echo "Error updating status: " . $conn->error;
        }
    } else {
        echo "Invalid request.";
    }
?>
