<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>Premium Subscription Form</title>
    <link rel="stylesheet" href="\GP SLIIT\Premium\styles.css">
    <script src="\GP SLIIT\Premium\script.js"></script>
    <?php include 'insert.php';?>
</head>
<body>
    <header>
        <div class="hero">
            <!-- <img src="bi.jpg" alt="Knowledge Center" class="hero-image"> -->
            <h1>Knowledge Center Premium Subscription</h1>
        </div>
    </header>

    <main>
        <section class="subscription-form">
            <div class="form-card">
                <h2>Become a Premium User</h2>
                <form action="insert.php" method="post" id="subscriptionForm">
                    <div class="form-group">
                        <label for="fullName">Full Name</label>
                        <input type="text" id="fullName" name="fullName" required>
                    </div>

                    <div class="form-group">
                        <label for="email">Email Address</label>
                        <input type="email" id="email" name="email" required>
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" id="password" name="password" required>
                    </div>

                    <div class="form-group">
                        <label for="subscriptionPlan">Select Subscription Plan</label>
                        <select id="subscriptionPlan" name="subscriptionPlan" required>
                            <option value="monthly">Monthly - $10/month</option>
                            <option value="yearly">Yearly - $100/year</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="cardNumber">Credit Card Number</label>
                        <input type="text" id="cardNumber" name="cardNumber" required pattern="[0-9]{13,19}" placeholder="1234567891011121">
                    </div>

                    <div class="form-group">
                        <label for="expiryDate">Expiration Date</label>
                        <input type="month" id="expiryDate" name="expiryDate" required>
                    </div>

                    <div class="form-group">
                        <label for="cvv">CVV</label>
                        <input type="text" id="cvv" name="cvv" maxlength="4" pattern="[0-9]{3,4}" placeholder="123" required>
                    </div>
                    
                   
                    <button type="submit" class="subscribe-btn"onclick="myFunction()">Subscribe Now</button>
                    <!-- <button type="submit" class="subscribe-btn" onclick="location.href='/GP%20SLIIT/HTML/home.php'">Subscribe Now</button> -->
                </form>
            </div>
        </section>
    </main>

    <footer>
        <p>&copy; Supportify</p>
    </footer>

    
</body>
</html>

