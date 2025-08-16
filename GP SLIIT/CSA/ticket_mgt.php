<?php
    include 'header.php';
    include 'dbcon.php'; 

    $sql = "SELECT ticket_id, user_id, category, attachment, created_at, status FROM ticket";
    $result = $conn->query($sql);
?> 

<main>
    <h2>Ticket Management</h2>
    <p>Track and manage support tickets here.</p>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Ticket ID</th>
                <th>User ID</th>
                <th>Category</th>
                <th>Attachment</th>
                <th>Created At</th>
                <th>Status</th> 
                <th>Actions</th> 
            </tr>
        </thead>
        <tbody>
            <?php
                if ($result && $result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["ticket_id"]. "</td>
                                <td>" . $row["user_id"]. "</td>
                                <td>" . $row["category"]. "</td>
                                <td>" . $row["attachment"]. "</td>
                                <td>" . $row["created_at"]. "</td>
                                <td>" . $row["status"]. "</td>
                                <td>
                                    <a href='editticket.php?id=" . $row["ticket_id"] . "'>
                                        <button type='button'>Edit</button>
                                    </a>
                                    <a href='updatestatus.php?id=" . $row["ticket_id"] . "'>
                                        <button type='button'>Update Status</button>
                                    </a>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='7'>No tickets found</td></tr>";
                }
            ?>
        </tbody>
    </table>
</main>

<?php
    include 'footer.php';
?>
