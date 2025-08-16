<?php
    include 'udbcon.php'; 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];

       
        $sql = "DELETE FROM employee WHERE employee_Id = $id";

        if ($conn->query($sql) === TRUE) {
            echo "Employee deleted successfully.";
        } else {
            echo "Error deleting employee: " . $conn->error;
        }

        
        header("Location: employee_mgt.php");
        exit();
    } else {
        echo "No employee ID provided.";
        exit();
    }
?>

