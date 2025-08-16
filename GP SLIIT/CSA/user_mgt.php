<?php
    include 'header.php'; 
    include 'dbcon.php'; 

    $sql = "SELECT User_id,F_name,L_name ,Email,username,password,Age  FROM users";
    $result = $conn->query($sql);
?>

<main>
    <h2>User Management</h2>
    <p>Manage your users here. You can view, edit, and delete user accounts.</p>

    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>User_ID</th>
                <th>F_Name</th>
                <th>L_Name</th>
                <th>Email</th>
                <th>Username</th>
                <th>Password</th>
                <th>Age</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php
                if ($result->num_rows > 0) {
                    
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["User_id"]. "</td>
                                <td>" . $row["F_name"]. "</td>
                                <td>" . $row["L_name"]. "</td>
                                <td>" . $row["Email"]. "</td>
                                <td>" . $row["username"]. "</td>
                                <td>" . $row["password"]. "</td>
                                <td>" . $row["Age"]. "</td>
                                <td>
                                    <form action='' method='POST' style='display:inline-block;'>
                                        <a href='edituser.php?id=" . $row["User_id"] . "'>
                                            <button type='button'>Edit</button>
                                        </a>
                                    </form>
                                    
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No users found</td></tr>";
                }
            ?>
        </tbody>
    </table>
    <p><a href="adduser.php">Add New User</a></p>
</main>


<?php
    include 'footer.php'; 
?>
