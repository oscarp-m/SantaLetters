<?php
session_start();
include("connect.php");

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

$email = $_SESSION['email'];
$messages = [];

$query = $conn->query("SELECT message FROM messages WHERE email='$email' ORDER BY id ASC");
while ($row = $query->fetch_assoc()) {
    $messages[] = $row['message'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adult Messages</title>
</head>
<body>
    <h2>Messages for <?php echo htmlspecialchars($email); ?></h2>
    <?php if (empty($messages)): ?>
        <p>No messages found.</p>
    <?php else: ?>
        <?php foreach ($messages as $msg): ?>
            <div style="border:1px solid #ccc; padding:10px; margin-bottom:10px;">
                <?php echo nl2br(htmlspecialchars($msg)); ?>
            </div>
        <?php endforeach; ?>
    <?php endif; ?>
    <a href="childrenletter.php">Back</a>
</body>
</html>