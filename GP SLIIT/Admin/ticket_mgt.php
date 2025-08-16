<?php
    include 'header.php'; 
    include 'udbcon.php'; 

    
    $sql = "SELECT ticket_id, user_id, category, attachment, created_at FROM ticket";
    $result = $conn->query($sql); 
?>

<main>
    <h2>Ticket Management</h2>
    <p>Track and manage support tickets here.</p>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>ticket_id</th>
                <th>user_id</th>
                <th>category</th>
                <th>attachment</th>
                <th>created_at</th>
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
                                <td>
                                    <a href='editticket.php?id=" . $row["ticket_id"] . "'>
                                        <button type='button'>Edit</button>
                                    </a>
                                    <form action='deleteticket.php' method='GET' onsubmit=\"return confirm('Are you sure you want to delete this ticket?')\" style='display:inline-block;'>
                                        <input type='hidden' name='id' value='" . $row["ticket_id"] . "'>
                                        <button type='submit'>Delete</button>
                                    </form>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No tickets found</td></tr>";
                }
            ?>
        </tbody>
    </table>
</main>

<?php
    include 'footer.php'; 
?>
