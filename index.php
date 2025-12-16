<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SantaLetters</title>
</head>
<body>
    <!-- Navigation -->
    <nav class="navbar">
        <div class="container">
            <a class="brand" href="/">SantaLetters</a>
            <ul class="nav-links" aria-label="Primary">
                <li><a href="index.html">Home</a></li>
                <li><a class="login-link" href="login.php">Login</a></li>
            </ul>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero" role="banner" aria-labelledby="hero-heading">
        <div class="overlay" aria-hidden="true"></div>
        <div class="hero-content">
            <h1 id="hero-heading">Welcome to SantaLetters</h1>
            <p>Send a letter to Santa, and enjoy a magical holiday experience. Sign in to create and manage your letters.</p>
            <a class="btn-primary" href="login.php" role="button">Log in to SantaLetters</a>
        </div>
    </header>

    <!-- Footer inserted to replace placeholder body text -->
    <!-- Page content continues; footer is fixed to bottom of viewport -->

    <section class="content">
        <div class="container">
            <p>
                Welcome to SantaLetters — where holiday wishes meet the North Pole. Sign in to create and send letters to Santa. Have questions? Reach out using the contact link in the footer below.
            </p>
        </div>
    </section>

    <footer class="site-footer" role="contentinfo">
        <div class="container">
            <div class="footer-left">
                <p class="footer-brand">SantaLetters</p>
                <p class="footer-text">© 2025 SantaLetters</p>
            </div>
            <div class="footer-right">
                <ul class="footer-links" aria-label="Footer">
                    <li><a href="aboutus.php">About Us</a></li>
                    <li><a href="contactus.php">Contact Us</a></li>
                    <li><a href="login.php">Login</a></li>
                </ul>
            </div>
        </div>
    </footer>

    <style>
    /* Basic reset */
    * {
        box-sizing: border-box;
    }
    body {
        margin: 0;
        padding-bottom: 80px; /* reserve space for fixed footer */
        font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, sans-serif;
        color: #fff; /* Set text color to white */
        background: #1F2232; /* Set background to dark blue */
    }

    /* Navbar */
    .navbar {
        position: fixed;
        top: 0;
        left: 0;
        right: 0;
        z-index: 40;
        background: #1F2232; /* Solid background for navbar */
        border-bottom: 1px solid rgba(255, 255, 255, 0.03);
    }
    .navbar .container {
        max-width: 1200px;
        margin: 0 auto;
        padding: 12px 20px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .brand {
        font-weight: 700;
        color: #fff; /* White text for brand */
        text-decoration: none;
        font-size: 1.1rem;
    }
    .nav-links {
        list-style: none;
        margin: 0;
        padding: 0;
        display: flex;
        gap: 14px;
        align-items: center;
    }
    .nav-links a {
        color: rgba(255, 255, 255, 0.95); /* White text for links */
        text-decoration: none;
        padding: 8px 10px;
        border-radius: 6px;
    }
    .nav-links a:hover {
        background: rgba(255, 255, 255, 0.04);
    }

    /* Hero/banner */
    .hero {
        width: 100%;
        min-height: 72vh;
        display: flex;
        align-items: center;
        justify-content: center;
        position: relative;
        padding-top: 64px; /* Space for fixed navbar */
    }
    .hero-content {
        position: relative;
        z-index: 2;
        max-width: 960px;
        margin: 40px;
        padding: 40px;
        text-align: center;
        border-radius: 12px;
    }
    .hero h1 {
        font-size: clamp(1.6rem, 3.6vw, 2.8rem);
        margin: 0 0 12px;
    }
    .hero p {
        font-size: 1rem;
        line-height: 1.6;
        color: rgba(255, 255, 255, 0.95); /* White text for hero section */
        margin: 0 0 22px;
    }

    /* Content section */
    .content p {
        color: #fff; /* White text for content */
    }

    /* Center and constrain page content so it doesn't look like a word document */
    .content .container {
        max-width: 760px;
        margin: 24px auto;
        padding: 16px;
        text-align: center;
    }

    /* Global paragraph style */
    p {
        color: #fff; /* White text globally */
    }

    /* Button styles */
    .btn-primary,
    button,
    input[type="submit"],
    input[type="button"] {
        background-color: #F45B69 !important;
        color: #fff !important;
        border: none;
        border-radius: 6px;
        padding: 12px 20px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s;
    }

    .btn-primary:hover,
    button:hover,
    input[type="submit"]:hover,
    input[type="button"]:hover {
        background-color: #d62839 !important;
    }
    
    /* Footer styles */
    .site-footer {
        position: fixed;
        left: 0;
        right: 0;
        bottom: 0;
        background: linear-gradient(180deg, rgba(31,34,50,0.85), rgba(31,34,50,0.98));
        border-top: 1px solid rgba(255,255,255,0.04);
        padding: 12px 20px;
        color: rgba(255,255,255,0.95);
        z-index: 50;
    }
    .site-footer .container { max-width: 1200px; margin: 0 auto; display: flex; align-items: center; justify-content: space-between; gap: 12px; flex-wrap: wrap; }
    .footer-brand { font-weight: 700; margin: 0; }
    .footer-text { margin: 0; font-size: 0.9rem; opacity: 0.9; }
    .footer-links { list-style: none; margin: 0; padding: 0; display: flex; gap: 12px; align-items: center; }
    .footer-links a { color: rgba(255,255,255,0.9); text-decoration: none; padding: 6px 8px; border-radius: 6px; }
    .footer-links a:hover { background: rgba(255,255,255,0.02); text-decoration: none; }
    </style>

    <video class="video-background" autoplay muted loop playsinline width="100%" height="73%" style="position: fixed; top: 0; left: 0; z-index: -1; object-fit: cover;" loading="lazy">
        <source src="assets/snowfall.mp4" type="video/mp4">
        Your browser does not support the video tag.
    </video>
</body>
</html>