<?php
    include 'header.php'; 
    include 'udbcon.php';
    
   
    $sql = "SELECT employee_Id,username,password,F_name,L_name ,specialization,email,age,phone FROM employee";
    $result = $conn->query($sql);
?>

<main>
    <h2>Employee Management</h2>
    <p>Here you can manage employee data, add new employees, or modify their roles.</p>
    <table border="1" cellpadding="10" cellspacing="0">
        <thead>
            <tr>
                <th>Employee_ID</th>
                <th>Username</th>
                <th>Password</th>
                <th>F_Name</th>
                <th>L_Name</th>
                <th>Specialization</th>
                <th>Email</th>
                <th>Age</th>
                <th>Phone</th>
                <th>Actions</th>
                
                
            </tr>
        </thead>
        <tbody>
            <?php
                if ($result->num_rows > 0) {
                    while($row = $result->fetch_assoc()) {
                        echo "<tr>
                                <td>" . $row["employee_Id"]. "</td>
                                <td>" . $row["username"]. "</td>
                                <td>" . $row["password"]. "</td>
                                <td>" . $row["F_name"]. "</td>
                                <td>" . $row["L_name"]. "</td>
                                <td>" . $row["specialization"]. "</td>
                                <td>" . $row["email"]. "</td>
                                <td>" . $row["age"]. "</td>
                                <td>" . $row["phone"]. "</td>
                                
                                <td>
                                    <form action='' method='POST' style='display:inline-block;'>
                                        <a href='editemployee.php?id=" . $row["employee_Id"] . "'>
                                            <button type='button'>Edit</button>
                                        </a>
                                    </form>
                                    <form action='deleteemployee.php' method='GET' onsubmit=\"return confirm('Are you sure you want to delete this user?')\" style='display:inline-block;'>
                                        <input type='hidden' name='id' value='" . $row["employee_Id"] . "'>
                                        <button type='submit'>Delete</button>
                                    </form>
                                </td>
                              </tr>";
                    }
                } else {
                    echo "<tr><td colspan='8'>No employees found</td></tr>";
                }
            ?>
        </tbody>
    </table>
    <p><a href="addemployee.php">Add New Employee</a></p>
</main>

<?php
    include 'footer.php'; 
