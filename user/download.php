<?php
// Database connection details
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "mahaepass";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if passid is set and not empty
if(isset($_POST['passid']) && !empty($_POST['passid'])) {
    $passid = $_POST['passid'];
    
    // SQL query to retrieve data from the database based on passid
    $sql = "SELECT * FROM newpasses WHERE passid='$passid'";
    $result = $conn->query($sql);
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MAHA-E-PASS</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .invoice-container {
            width: 80%; /* Decreased width */
            margin: 20px auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            position: relative; /* Relative positioning for watermark */
        }
        .invoice-header {
            text-align: center;
            margin-bottom: 20px;
        }
        .invoice-header h1 {
            margin: 0;
            color: #333;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            position: auto; /* Relative positioning for watermark */
        }
        th, td {
            padding: 10px;
            border-bottom: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            max-width: 100px;
            max-height: 100px;
            display: block;
            margin: 0 auto;
        }
        .watermark {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 48px;
            color: rgba(0, 0, 0, 0.1); /* Light gray color for watermark */
            pointer-events: none; /* Ensure watermark doesn't interfere with table */
        }
        .form-container {
            margin-bottom: 20px;
        }
        .form-container input[type="text"] {
            padding: 8px;
            width: 200px;
        }
        .form-container input[type="submit"] {
            padding: 8px 20px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 16px;
        }
        .form-container input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
<!-- 
<div class="form-container">
    <form method="GET" action="">
        <label for="passid">Enter Pass ID:</label>
        <input type="text" id="passid" name="passid">
        <input type="submit" value="Fetch Record">
    </form>
</div> -->

<div class="invoice-container">
    <div class="invoice-header">
        <h1>MAHA-E-PASS</h1>
    </div>
    
    <table>
        <tr>
            <th>Photo</th>
            <th>Pass ID</th>
            <th>Name</th>
            <th>DOB</th>
    </tr>
<?php

if (isset($result) && $result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo "<td><img src='uploads/" . $row['photo'] . "' alt='User Photo'></td>";
        echo "<td>" . $row['passid'] . "</td>";
        echo "<td>" . $row['name'] . "</td>";
        echo "<td>" . $row['dob'] . "</td>";
        echo "</tr>";


?>
    <tr>
    <th>Postal Code</th>
            <th>Institute</th>
            <th>Address</th>
            <th>City</th>
    </tr>
    <?php
    
    echo "<tr>";
    echo "<td>" . $row['pin'] . "</td>";
    echo "<td>" . $row['institute'] . "</td>";
    echo "<td>" . $row['address'] . "</td>";
    echo "<td>" . $row['city'] . "</td>";
    echo "</tr>";
    echo "<tr>";
    ?>
    <tr>
          
            <th>Source</th>
            <th>Destination</th>
            <th>From</th>
            <th>To</th>
        </tr>
        <?php
        
        echo "<tr>";
      
        echo "<td>" . $row['source'] . "</td>";
        echo "<td>" . $row['destination'] . "</td>";
        echo "<td>" . $row['from'] . "</td>";
        echo "<td>" . $row['to'] . "</td>";
        echo "</tr>";
    }
} else {
    echo "<tr><td colspan='13'>No data available</td></tr>";
}
?>
        
        <!-- <?php
        // Output data if result contains rows
        if (isset($result) && $result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td><img src='uploads/" . $row['photo'] . "' alt='User Photo'></td>";
                echo "<td>" . $row['passid'] . "</td>";
                echo "<td>" . $row['name'] . "</td>";
                echo "<td>" . $row['email'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" . $row['dob'] . "</td>";
                echo "<td>" . $row['institute'] . "</td>";
                echo "<td>" . $row['address'] . "</td>";
                echo "<td>" . $row['city'] . "</td>";
                echo "</tr>";
                echo "<tr>";
                echo "<td>" . $row['pin'] . "</td>";
                echo "<td>" . $row['source'] . "</td>";
                echo "<td>" . $row['destination'] . "</td>";
                echo "<td>" . $row['from'] . "</td>";
                echo "<td>" . $row['to'] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='13'>No data available</td></tr>";
        }
        ?> -->
        <div class="watermark">MAHA-E-PASS</div>
    </table>

    <div class="print-button">
        <button onclick="window.print()">Print</button>
    </div>
</div>

<?php
// Close connection
$conn->close();
?>

</body>
</html>
