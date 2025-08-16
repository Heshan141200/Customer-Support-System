<?php
    include 'header.php'; 
    include 'dbcon.php'; 

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        
        $sql = "SELECT * FROM users WHERE User_id = $id"; 
        $result = $conn->query($sql);
        
        if ($result->num_rows > 0) {
            $user = $result->fetch_assoc(); 
        } else {
            echo "User not found.";
            exit();
        }
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $F_name = $_POST['F_name'];
        $L_name = $_POST['L_name'];
        $Email = $_POST['email'];
        $Username = $_POST['username'];
        $Password=$_POST['Password']; 
        $Age = $_POST['Age'];

        $sql = "UPDATE users SET F_name='$F_name', L_name='$L_name', Email='$Email', Username='$Username', Password='$Password', Age='$Age' WHERE User_id=$id";
        
        if ($conn->query($sql) === TRUE) {
            
            header("Location: user_mgt.php");
            exit(); 
        } else {
            echo "Error updating user: " . $conn->error;
        }
    }
?>

<main>
    <h2>Edit User</h2>
    <form method="post" action="">
        <label>First Name:</label>
        <input type="text" name="F_name" value="<?php echo $user['F_name']; ?>" required><br><br>

        <label>Last Name:</label>
        <input type="text" name="L_name" value="<?php echo $user['L_name']; ?>" required><br><br>

        <label>Email:</label>
        <input type="email" name="email" value="<?php echo $user['Email']; ?>" required><br><br>

        <label>Username:</label>
        <input type="text" name="username" value="<?php echo $user['Username']; ?>" required><br><br>

        <label>Password:</label>
        <input type="password" name="password" placeholder="Enter new password" required><br><br>

        <label>Age:</label>
        <input type="number" name="age" value="<?php echo $user['Age']; ?>" required><br><br>

        <input type="submit" value="Update User">
    </form>
</main>

<?php
    include 'footer.php'; 
?>
