<?php
session_start();
include("connect.php");

$messageSent = false;
$error = "";

if (isset($_SESSION['email'])) {
    $email = $_SESSION['email'];

    // Handle message submission
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['message'])) {
        $msg = $conn->real_escape_string($_POST['message']);
        $insert = "INSERT INTO messages (email, message) VALUES ('$email', '$msg')";
        if ($conn->query($insert)) {
            $messageSent = true;
        } else {
            $error = "Error: " . $conn->error;
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
</head>
<body>
    <p>
        Hello 
        <?php
        if (isset($email)) {
            $query = mysqli_query($conn, "SELECT * FROM userinfo WHERE email='$email'");
            if ($row = mysqli_fetch_assoc($query)) {
                echo htmlspecialchars($row['email']);
            } else {
                echo "User not found";
            }
        } else {
            echo "Guest";
        }
        ?>
    </p>

    <?php if (isset($email)): ?>
        <h3>Send your message to Santa:</h3>
        <?php if ($messageSent): ?>
            <p style="color:green;">Your message has been sent!</p>
        <?php endif; ?>
        <?php if (!empty($error)): ?>
            <p style="color:red;"><?php echo $error; ?></p>
        <?php endif; ?>
        <form method="post">
            <textarea name="message" rows="5" cols="40" required placeholder="Write your message here..."></textarea><br>
            <button type="submit">Send Message</button>
        </form>
    <?php endif; ?>
</body>
</html>
