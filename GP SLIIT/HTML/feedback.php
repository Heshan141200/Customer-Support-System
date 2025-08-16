<?php
    include('./udbcon.php');

    if (isset($_POST["subbtn"])) {

        $name = $_POST['name'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $message = $_POST['message'];

        $query = "INSERT INTO contact_us(name,email,phone,message) VALUES ('$name','$email','$phone','$message')";
        $res = mysqli_query($conn,$query);

        if($res) {
            echo "<script>myFunction()</script>";
            header('Location: feedback.php');
        } else {
            echo "<script>myErrorFunction()</script>";
            header('Location: feedback.php');
        }
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback</title>
    <link rel="stylesheet" href="../CSS/feedback.css">
    </head><link rel="stylesheet" href="../CSS/navbar.css">
    <script src="../JS/navbar.js" defer></script>
    <link rel="stylesheet" href="../CSS/footer.css">
    <script src="../JS/footer.js" defer></script>
    <script>
        function myFunction() {
            alert('You have successfully sent a Feedback!');
        }
        function myErrorFunction() {
            alert('There might be a problem. Please check and try again!');
        }
    </script>
</head>    
<body>

    <header>
        <div id="logo"><img src="\GP SLIIT\Admin\download.jpeg" alt="Logo"width='50'length='25'></div>
        <div id="navbar-placeholder"></div>
    </header>

    <section class="contact-section">
        <div class="contact-form">
            <h1>Feedback</h1>
            <form action="feedback.php" method="POST">
                <input type="text" name="name" placeholder="Name" required>
                <input type="email" name="email" placeholder="Email" required>
                <input type="text" name="phone" placeholder="Phone" required>
                <textarea name="message" placeholder="Message" required></textarea>

        <div class="sub-form">        
                <button type="submit" name="subbtn">Submit</button>
        </div>        
        
            </form>
        </div>
        <div class="contact-info">
            <h2>Contact Information</h2>
            <p>Tel: 077 - 569 9854</p>
            <p>Email: ABCD@gmail.com</p>
        </div>
    </section>

    <footer>
        <div id="content"></div>
    </footer>
</body>
</html>
