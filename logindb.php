<?php 

$email = $_POST['email'];
$password = $_POST['password'];

$conn = new mysqli("localhost", "root", "", "mahaepass");
if ($conn->connect_error) {
    die('connection failed :' .$conn->connect_error);
} else {
    $stmt = $conn->prepare("SELECT * FROM `users` WHERE `emailid` = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt_result = $stmt->get_result();
    if($stmt_result->num_rows > 0){

        $data = $stmt_result->fetch_assoc();

        if($data['password'] === $password){ // Corrected the index name for the password field
            header("location:user/index.php");
        } else{
            echo "invalid email or password";
        }
    } else{
        echo "invalid email or password";
    }
}
?>  
