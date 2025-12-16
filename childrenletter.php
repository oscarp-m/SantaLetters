<?php
session_start();
include("connect.php");

$messageSent = false;
$error = "";
$adultError = "";

if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit;
}

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

// Handle adult access (optional, not hooked to button below)
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['adult_password'])) {
    $inputPassword = $_POST['adult_password'];
    $query = $conn->query("SELECT password FROM userinfo WHERE email='$email'");
    if ($row = $query->fetch_assoc()) {
        if ($row['password'] === $inputPassword) {
            header("Location: adultletter.php");
            exit;
        } else {
            $adultError = "Incorrect password.";
        }
    } else {
        $adultError = "User not found.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Santa Letter Maker</title>
    <style>
        body {
            margin: 0;
            padding: 0;
            font-family: 'Arial', sans-serif;
            background: url('assets/wood.jpg') no-repeat center center fixed;
            background-size: cover;
        }
        .container {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin-top: 70px;
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
            justify-content: space-between;
            padding: 0 18px;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
            z-index: 1000;
            color: #fff;
        }
        .navbar .logo {
            font-weight: 700;
            letter-spacing: 0.5px;
        }
        .nav-right { display: flex; gap: 8px; align-items: center; }
        .btn {
            padding: 8px 12px;
            border-radius: 6px;
            border: none;
            cursor: pointer;
            font-weight: 600;
            font-size: 14px;
        }
        .btn-parent {
            background: #F45B69 !important;
            color: #fff !important;
            border: none;
            border-radius: 6px;
            padding: 8px 12px;
            font-weight: 600;
            font-size: 14px;
            cursor: pointer;
            transition: background 0.3s;
        }
        .btn-send {
            background: #F45B69;
            color: #fff;
            border: none;
            box-shadow: 0 2px 6px rgba(0,0,0,0.15);
        }
        .actions { margin-top: 12px; display: flex; justify-content: center; }
        .actions {
            position: absolute;
            bottom: calc(12px + 1cm);
            left: 50%;
            transform: translateX(-50%);
            margin: 0;
            z-index: 999;
        }
        .letter {
            width: 600px;
            height: 800px;
            position: relative;
            box-sizing: border-box;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
            overflow: hidden;
        }
        .letter-inner {
            position: relative;
            margin: 0.5cm;
            background: white;
            box-sizing: border-box;
            height: calc(100% - 1cm);
            padding: 26px;
            overflow: hidden;
        }
        .letter-inner::before {
            content: "";
            position: absolute;
            inset: 12px;
            border: 6px solid #b71c1c;
            box-sizing: border-box;
            pointer-events: none;
            z-index: 1;
        }
        .letter-inner { position: relative; }
        .letter h1 {
            text-align: center;
            color: #d32f2f;
            font-family: 'Georgia', serif;
        }
        .letter textarea {
            width: 100%;
            margin-top: 16px;
            height: calc(100% - 16px - 72px - 1cm);
            border: none;
            resize: none;
            font-size: 16px;
            line-height: 1.5;
            outline: none;
            overflow: auto;
            scrollbar-width: none;
            -ms-overflow-style: none;
        }
        .letter textarea::-webkit-scrollbar {
            display: none;
        }
        .letter textarea::placeholder {
            font-style: italic;
            color: #aaa;
        }
        @media (max-width: 480px) {
            .letter { width: calc(100% - 24px); }
            .navbar { padding: 0 10px; }
        }
        .success-message {
            color: green;
            text-align: center;
            margin-bottom: 10px;
        }
        .error-message {
            color: red;
            text-align: center;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">
            <a href="index.php" style="color:#fff; text-decoration:none;">Santa Letter Maker</a>
        </div>
        <div class="nav-right">
            <form method="post" style="display:inline;">
                <input type="password" name="adult_password" placeholder="Parent password" style="padding:6px; border-radius:4px; border:1px solid #ccc;">
                <button type="submit" class="btn btn-parent">Parent Login</button>
            </form>
        </div>
    </nav>
    <div class="container">
        <div class="letter">
            <div class="letter-inner">
                <h1>Dear Santa,</h1>
                <?php if ($messageSent): ?>
                    <div class="success-message">Your letter has been sent to Santa!</div>
                <?php endif; ?>
                <?php if (!empty($error)): ?>
                    <div class="error-message"><?php echo $error; ?></div>
                <?php endif; ?>
                <?php if (!empty($adultError)): ?>
                    <div class="error-message"><?php echo $adultError; ?></div>
                <?php endif; ?>
                <form method="post">
                    <textarea name="message" placeholder="Write your wishes here..." required></textarea>
                    <div class="actions">
                        <button type="submit" class="btn btn-send">Send Letter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
