<?php
$var_first_name = $_POST['Login-First-Name'];
$var_last_name = $_POST['Login-Last-Name']; // corrected variable name
$var_email = $_POST['Login-Email'];
$var_password = $_POST['Password-2'];

$conn = new mysqli("localhost", "root", "", "mahaepass");


if ($conn->connect_error) {
    die('connection failed :' .$conn->connect_error);
} else {
    $stmt = $conn->prepare("INSERT INTO `users`(`firstname`, `lastname`, `emailid`, `password`) VALUES (?,?,?,?)");
    if ($stmt) {
        $stmt->bind_param("ssss", $var_first_name, $var_last_name, $var_email, $var_password);
        $stmt->execute();
echo '<script type="text/javascript">';
        echo 'alert("welcome")';
        echo '<script>';
        
        header("location:user/index.php");
        $stmt->close();
    } else {
        echo "Failed to prepare the statement.";
    }
    $conn->close();
}
?>
