<?php
session_start();
include("connect.php");

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

$email = $_SESSION['email'];

// Handle delete request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['delete_id'])) {
    $delete_id = intval($_POST['delete_id']);
    $conn->query("DELETE FROM messages WHERE id=$delete_id AND email='$email'");
}

$messages = [];
$query = $conn->query("SELECT id, message FROM messages WHERE email='$email' ORDER BY id ASC");
while ($row = $query->fetch_assoc()) {
    $messages[] = $row;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Adult Messages</title>
    <style>
        body {
            background: #6C8EAD;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            height: 56px;
            background: #1F2232;
            display: flex;
            align-items: center;
            padding: 0 18px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
            z-index: 1000;
        }
        .btn-back {
            background: #F45B69 !important;
            color: #fff !important;
            border: none;
            border-radius: 6px;
            padding: 8px 12px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            text-decoration: none;
            transition: background 0.2s;
        }
        .btn-back:hover {
            background: #b71c1c !important;
        }
        .main-content {
            display: flex;
            flex-direction: row;
            justify-content: flex-start;
            align-items: flex-start;
            margin-top: 80px;
            gap: 32px;
            margin-left: 40px;
            margin-right: 40px;
        }
        .container {
            flex: 1 1 0;
            max-width: 600px;
            min-width: 320px;
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.12);
            padding: 32px 24px;
            min-height: 400px;
        }
        .right-column {
            display: flex;
            flex-direction: column;
            gap: 32px;
            flex: 1 1 0;
            max-width: 600px;
            min-width: 320px;
            margin-left: auto; /* Added margin-left: auto; */
        }
        .right-container {
            background: #fff;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.12);
            padding: 32px 24px;
            min-height: 400px;
        }
        h2 {
            text-align: center;
            color: #222;
        }
        .message-box {
            border:1px solid #ccc;
            padding:10px;
            margin-bottom:10px;
            border-radius: 8px;
            background: #f9f9f9;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .delete-form {
            margin: 0;
        }
        .btn-delete {
            background: #F45B69;
            color: #fff;
            border: none;
            border-radius: 6px;
            padding: 6px 12px;
            font-weight: 600;
            font-size: 13px;
            cursor: pointer;
            transition: background 0.2s;
        }
        .btn-delete:hover {
            background: #b71c1c;
        }
        @media (max-width: 1200px) {
            .main-content {
                flex-direction: column;
                gap: 24px;
            }
            .container, .right-column, .right-container {
                max-width: 100%;
                min-width: 0;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <a href="childrenletter.php" class="btn-back">Back</a>
    </nav>
    <div class="main-content">
        <div class="container">
            <h2>Messages for <?php echo htmlspecialchars($email); ?></h2>
            <?php if (empty($messages)): ?>
                <p>No messages found.</p>
            <?php else: ?>
                <?php foreach ($messages as $msg): ?>
                    <div class="message-box">
                        <span><?php echo nl2br(htmlspecialchars($msg['message'])); ?></span>
                        <form method="post" class="delete-form" onsubmit="return confirm('Delete this message?');">
                            <input type="hidden" name="delete_id" value="<?php echo $msg['id']; ?>">
                            <button type="submit" class="btn-delete">Delete</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="right-column">
            <div class="right-container">
                <!-- This box is empty for now. You can add content here later. -->
            </div>
            <div class="right-container">
                <!-- This is the identical box underneath. You can add content here later. -->
            </div>
        </div>
    </div>
</body>
</html>