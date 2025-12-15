 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/7.0.1/css/all.min.css">
    <style>
        <style>
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
    font-family: Arial, sans-serif;
}

body {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #6C8EAD;
}

.container {
    width: 420px;
    max-width: 92%;
    background: #ffffff;
    padding: 50px 40px;
    border-radius: 25px;
    box-shadow: 0 25px 50px rgba(0, 0, 0, 0.25);
    text-align: center;
}

.form-title {
    font-size: 36px;
    margin-bottom: 35px;
    color: #222;
}

.input-group {
    display: flex;
    align-items: center;
    width: 100%;
    max-width: 360px;
    margin: 0 auto 25px auto;
    padding: 16px 18px;
    border: 1.5px solid #cfcfcf;
    border-radius: 15px;
    background: #fff;
}

.input-group i {
    font-size: 18px;
    color: #6b6b6b;
    margin-right: 14px;
}

.input-group input {
    flex: 1;
    border: none;
    outline: none;
    background: transparent;
    font-size: 16px;
    color: #333;
    text-align: left;
}

.input-group input::placeholder {
    color: #888;
}

.recover {
    max-width: 360px;
    margin: 0 auto 30px auto;
    text-align: right;
}

.recover a {
    font-size: 15px;
    color: #5f6bff;
    text-decoration: none;
}

.recover a:hover {
    text-decoration: underline;
}

.btn {
    width: 100%;
    max-width: 360px;
    margin: 0 auto;
    padding: 16px;
    background: #1F2232;
    color: #fff;
    border: none;
    border-radius: 15px;
    font-size: 18px;
    cursor: pointer;
    transition: background 0.3s ease;
}

.btn:hover {
    background: rgb(71, 75, 100);
}

p {
    margin-top: 30px;
    font-size: 16px;
    color: #444;
}

button {
    margin-top: 10px;
    background: none;
    border: none;
    font-size: 16px;
    color: #5f6bff;
    cursor: pointer;
}

button:hover {
    text-decoration: underline;
}

@media (max-width: 480px) {
    .container {
        padding: 40px 25px;
    }

    .form-title {
        font-size: 30px;
    }

    .input-group,
    .btn,
    .recover {
        max-width: 100%;
    }
}



</style>

</head>
<body>

   <!-- SIGN UP FORM -->
   <div class="container" id="signUp" style="display: none;">
        <h1 class="form-title">Register</h1>
        <form method="post" action="register.php">
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="Email" required>
                <label for="email">Email</label>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>
            <input type="submit" class="btn" value="Sign Up" name="SignUp">
        </form>
        <p>Already have an account?</p>
        <button id="signInButton">Sign In</button>
   </div>

   <!-- SIGN IN FORM -->
   <div class="container" id="signIn">
        <h1 class="form-title">Sign In</h1>
        <form method="post" action="register.php">
            <div class="input-group">
                <i class="fas fa-envelope"></i>
                <input type="email" name="email" id="email" placeholder="Email" required>
                <label for="email">Email</label>
            </div>
            <div class="input-group">
                <i class="fas fa-lock"></i>
                <input type="password" name="password" id="password" placeholder="Password" required>
                <label for="password">Password</label>
            </div>

            <p class="recover">
                <a href="#">Recover Password</a>
            </p>

            <input type="submit" class="btn" value="Sign In" name="SignIn">
        </form>
        <p>Don't have an account?</p>
        <button id="signUpButton">Sign Up</button>
   </div>

   <script src="switch.js"></script>
</body>
</html>
