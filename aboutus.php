<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>About Us - Santa Letter Maker</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        body {
            margin: 0;
            padding: 0;
            min-height: 100vh;
            font-family: 'Arial', sans-serif;
            background: #1F2232;
            color: #fff;
            display: flex;
            flex-direction: column;
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
        .nav-links {
            list-style: none;
            display: flex;
            gap: 14px;
            margin: 0;
            padding: 0;
        }
        .nav-links a {
            color: rgba(255,255,255,0.95);
            text-decoration: none;
            padding: 8px 10px;
            border-radius: 6px;
        }
        .nav-links a:hover {
            background: rgba(255,255,255,0.04);
        }
        .about-container {
            flex: 1 1 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .about-box {
            background: #fff;
            color: #1F2232;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.12);
            padding: 48px 36px;
            max-width: 600px;
            margin: 80px 16px 0 16px;
            text-align: center;
        }
        .about-box h1 {
            color: #d32f2f;
            font-family: 'Georgia', serif;
            margin-bottom: 18px;
        }
        .about-box p {
            color: #222;
            font-size: 1.15rem;
            line-height: 1.7;
            margin-bottom: 0;
        }
        @media (max-width: 600px) {
            .about-box {
                padding: 32px 12px;
                margin-top: 70px;
            }
            .navbar {
                padding: 0 10px;
            }
        }
    </style>
</head>
<body>
    <nav class="navbar">
        <div class="logo">Santa Letter Maker</div>
        <ul class="nav-links">
            <li><a href="index.php">Home</a></li>
            <li><a href="login.php">Login</a></li>
        </ul>
    </nav>
    <div class="about-container">
        <div class="about-box">
            <h1>About Santa Letter Maker</h1>
            <p>
                Welcome to Santa Letter Maker!<br><br>
                Our magical platform is designed to help children everywhere send their heartfelt wishes directly to Santa Claus. Kids can write and send their letters in a fun, safe, and festive environment.<br><br>
                But that's not all! Adults (parents or guardians) can securely view the letters sent by their children, making it easy to help Santa prepare the perfect surprises.<br><br>
                We believe in keeping the holiday spirit alive, fostering family connections, and making Christmas a little more magical for everyone.<br><br>
                Thank you for being part of our Santa Letter Maker family!
            </p>
        </div>
    </div>
</body>
</html>