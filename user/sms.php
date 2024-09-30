<!DOCTYPE html>
<html>
<head>
    <title>Send Email</title>
</head>
<body>
    <h2>Send Email</h2>
    <form action="sms.php" method="post">
        <label for="sender_email">Your Email:</label><br>
        <input type="email" id="sender_email" name="sender_email" required><br><br>

        <label for="recipient_email">Recipient's Email:</label><br>
        <input type="email" id="recipient_email" name="recipient_email" required><br><br>

        <label for="subject">Subject:</label><br>
        <input type="text" id="subject" name="subject" required><br><br>

        <label for="message">Message:</label><br>
        <textarea id="message" name="message" rows="4" cols="50" required></textarea><br><br>

        <input type="submit" value="Send Email">
    </form>
</body>
</html>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $sender_email = $_POST['sender_email'];
    $recipient_email = $_POST['recipient_email'];
    $subject = $_POST['subject'];
    $message = $_POST['message'];

    // Additional headers
    $headers = 'From: ' . $sender_email . "\r\n" .
        'Reply-To: ' . $sender_email . "\r\n" .
        'X-Mailer: PHP/' . phpversion();

    // Send email
    if (mail($recipient_email, $subject, $message, $headers)) {
        echo 'Email sent successfully.';
    } else {
        echo 'Error sending email.';
    }
}
?>
