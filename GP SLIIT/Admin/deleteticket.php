<?php
    include 'udbcon.php'; 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

       
        $sql = "DELETE FROM ticket WHERE ticket_id = $id";

        if ($conn->query($sql) === TRUE) {
            echo "Ticket deleted successfully.";
        } else {
            echo "Error deleting ticket: " . $conn->error;
        }

        
        header("Location: ticket_mgt.php");
        exit();
    } else {
        echo "No Ticket ID provided.";
        exit();
    }
?>
