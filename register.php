<?php
include __DIR__ . '/connect.php';

if (isset($_POST["SignUp"])) {

    $email     = $_POST["email"];
    $password  = $_POST["password"];

    // Check email
    $checkemail = "SELECT * FROM userinfo WHERE email='$email'";
    $result = $conn->query($checkemail);

    if ($result->num_rows > 0) {
        echo "Email address already exists";
        exit;
    }

    // Insert user
    $insertQuery = "INSERT INTO userinfo(email,password)
                    VALUES ('$email','$password')";

    if ($conn->query($insertQuery) === TRUE) {
        header("location: login.php");
        exit;
    } else {
        echo "Error: " . $conn->error;
    }
}

if (isset($_POST["SignIn"])) {

    $email    = $_POST["email"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM userinfo WHERE email='$email' AND password='$password'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        session_start();
        $row = $result->fetch_assoc();
        $_SESSION["email"] = $row["email"];
        header("Location: childrenletter.php");
        exit;
    } else {
        echo "Not found, incorrect email or password";
    }
}
?>
