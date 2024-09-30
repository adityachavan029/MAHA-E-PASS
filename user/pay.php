<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Establish connection to your database
    $servername = "localhost"; // Change this to your database server name
    $username = "root"; // Change this to your database username
    $password = ""; // Change this to your database password
    $dbname = "mahaepass"; // Change this to your database name

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Prepare and bind SQL statement
    $stmt = $conn->prepare("INSERT INTO `payment`(`passid`, `cost`) VALUES (?, ?)");
    $stmt->bind_param("ss", $passid, $cost);

    // Set parameters
    $passid = $_POST['passid'];
    
    $cost = $_POST['cost'];

    // Execute SQL statement
    if ($stmt->execute()) {
        echo "Payment successful";
    } else {
        echo "Error: " . $stmt->error;
    }

    // Close statement and connection
    $stmt->close();
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAHA-E-PASS | Payment Gateway</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 20px;
        }
        .payment-form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            background-color: #f9f9f9;
        }
        .form-group {
            margin-bottom: 20px;
        }
        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }
        input[type="text"], input[type="number"], select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
       
        input[type="button"] {
            padding: 10px 20px;
            background-color: red;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        input[type="button"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

<div class="payment-form">
    <h2>MAHA-E-PASS | Payment</h2>
    <form id="paymentForm" acion="pay.php" method="POST">
    <div class="form-group">
            <label for="cardNumber">Pass ID:</label>
            <input type="text" id="passid" name="passid" required>
        </div>
        <div class="form-group">
            <label for="cardNumber">Card Number:</label>
            <input type="text" id="cardNumber" name="cardNumber" required>
        </div>
        <div class="form-group">
            <label for="expiryDate">Expiry Date:</label>
            <input type="text" id="expiryDate" name="expiryDate" placeholder="MM/YY" required>
        </div>
        <div class="form-group">
            <label for="cvv">CVV:</label>
            <input type="number" id="cvv" name="cvv" required>
        </div>
        <p>To View Pass Rates<a href="image/COST.pdf" title="View Pass Rates by Clicking Here"> Click Here</a></p>
        <div class="form-group">
            <label for="cvv">Cost:</label>
            <input type="number" id="cvv" name="cost" required>
        </div>
        <input type="submit" value="Pay Now">
       <a href="index.php"> <input type="button" value="cancel" href="index.php"> </a>
    </form>
</div>

<!-- <script>
    document.getElementById('paymentForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Prevent form submission
        
        // Simulate payment processing
        setTimeout(function() {
            alert('Payment successful! you will shortly recive your Pass Id');
            
            // window.location.href = "index.php";
            // You can redirect to a success page or perform other actions here
        }, 1000); // Simulating a 2-second payment processing delay
    });
</script> -->

</body>
</html>
