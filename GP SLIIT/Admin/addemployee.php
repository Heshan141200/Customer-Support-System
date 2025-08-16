<?php
    include 'header.php';
    include 'udbcon.php';

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $username = $_POST['username'];
        $password=$_POST['password']; 
        $F_name = $_POST['F_name'];
        $L_name = $_POST['L_name'];
        $specialization=$_POST['specialization']; 
        $email = $_POST['email'];
        $age = $_POST['age'];
        $phone = $_POST['phone'];


        $sql = "INSERT INTO  employee(username,password,F_name,L_name,specialization,email,age,phone) VALUES ('$username','$password','$F_name','$L_name','$specialization','$email', '$age','$phone')";


        if ($conn->query($sql) === TRUE) {
            echo "New Employee added successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>

<main>
    <h2>Add New Employee</h2>
    <form method="post" action="">

    <label>Username:</label>
    <input type="text" name="username" required><br><br>

    <label>Password:</label>
    <input type="password" name="password" required><br><br>

    <label>First Name:</label>
    <input type="text" name="F_name" required><br><br>

    <label>Last Name:</label>
    <input type="text" name="L_name" required><br><br>

    <label>Speacialization:</label>
    <input type="text" name="specialization" required><br><br>

    <label>Email:</label>
    <input type="email" name="email" required><br><br>
        
    <label>Age:</label>
    <input type="number" name="age" required><br><br>

    <label>Phone:</label>
    <input type="number" name="phone" required><br><br>

        <input type="submit" value="Add employee">
    </form>
</main>

<?php
    include 'footer.php';
?>
