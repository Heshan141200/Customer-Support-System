<?php
include 'header.php'; 
include 'udbcon.php'; 

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    
    $sql = "SELECT * FROM employee WHERE employee_Id = $id"; 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $employee = $result->fetch_assoc();
    } else {
        echo "Employee not found.";
        exit();
    }
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['username'];
    $password = $_POST['password']; 
    $F_name = $_POST['F_name'];
    $L_name = $_POST['L_name'];
    $specialization = $_POST['specialization'];
    $email = $_POST['email'];
    $age = $_POST['age'];
    $phone = $_POST['phone'];

    
    if (!empty($password)) {
        $sql = "UPDATE employee SET username='$username', Password='$password', F_name='$F_name', L_name='$L_name', specialization='$specialization', email='$email', age='$age', phone='$phone' WHERE employee_Id=$id";
    } else {
        $sql = "UPDATE employee SET username='$username', F_name='$F_name', L_name='$L_name', specialization='$specialization', email='$email', age='$age', phone='$phone' WHERE employee_Id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        header("Location: employee_mgt.php");
        exit(); 
    } else {
        echo "Error updating employee: " . $conn->error;
    }
}
?>

<main>
    <h2>Edit Employee</h2>
    <form method="post" action="">
        <label>Username:</label>
        <input type="text" name="username" value="<?php echo $employee['username']; ?>" required><br><br>

        <label>Password:</label>
        <input type="password" name="password" placeholder="Enter new password"><br><br> 

        <label>First Name:</label>
        <input type="text" name="F_name" value="<?php echo $employee['F_name']; ?>" required><br><br>

        <label>Last Name:</label>
        <input type="text" name="L_name" value="<?php echo $employee['L_name']; ?>" required><br><br>

        <label>Specialization:</label>
        <input type="text" name="specialization" value="<?php echo $employee['specialization']; ?>" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $employee['email']; ?>" required><br><br>

        <label>Age:</label>
        <input type="number" name="age" value="<?php echo $employee['age']; ?>" required><br><br> 

        <label>Phone:</label>
        <input type="number" name="phone" value="<?php echo $employee['phone']; ?>" required><br><br> 

        <input type="submit" value="Update Employee">
    </form>
</main>

<?php
include 'footer.php'; 
?>
