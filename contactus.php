<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Contact Us - Santa Letter Maker</title>
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
        .contact-container {
            flex: 1 1 0;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
        }
        .contact-box {
            background: #fff;
            color: #1F2232;
            border-radius: 16px;
            box-shadow: 0 8px 24px rgba(0,0,0,0.12);
            padding: 48px 36px;
            max-width: 600px;
            margin: 80px 16px 0 16px;
            text-align: center;
        }
        .contact-box h1 {
            color: #d32f2f;
            font-family: 'Georgia', serif;
            margin-bottom: 18px;
        }
        .contact-box p {
            color: #222;
            font-size: 1.15rem;
            line-height: 1.7;
            margin-bottom: 0;
        }
        .contact-info {
            margin-top: 28px;
            text-align: left;
            color: #1F2232;
            font-size: 1.08rem;
        }
        .contact-info strong {
            color: #d32f2f;
        }
        @media (max-width: 600px) {
            .contact-box {
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
    <div class="contact-container">
        <div class="contact-box">
            <h1>Contact Us</h1>
            <p>
                Have questions or need help? Reach out to us using the information below!
            </p>
            <div class="contact-info">
                <p><strong>Phone:</strong> 00000000</p>
                <p><strong>Email:</strong> fakemail@gmail.com</p>
                <p><strong>Location:</strong> 123 Fake Street</p>
            </div>
        </div>
    </div>
</body>
</html>