<?php
    include 'header.php';
    include 'udbcon.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $F_name = $_POST['F_name'];
        $L_name = $_POST['L_name'];
        $email = $_POST['email'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $Age= $_POST['Age'];
        

        $sql = "INSERT INTO users (F_name,L_name,email,username, password,Age) VALUES ('$F_name','$L_name','$email','$username','$password', '$Age')";
        
        if ($conn->query($sql) === TRUE) {
            echo "New user added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>

<main>
    <h2>Add New User</h2>
    <form method="post" action="">
        <label>First Name:</label>
        <input type="text" name="F_name" required><br><br>
        <label>Last Name:</label>
        <input type="text" name="L_name" required><br><br>
        <label>Email:</label>
        <input type="email" name="email" required><br><br>
        <label>Username:</label>
        <input type="text" name="username" required><br><br>
        <label>Password:</label>
        <input type="password" name="password" required><br><br>
        <label>Age:</label>
        <input type="text" name="Age" required><br><br>
        <input type="submit" value="Add User">
    </form>
</main>

<?php
    include 'footer.php';
?>
