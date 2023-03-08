<?php
$conn = new mysqli('localhost', 'root', '');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$s0 = "SHOW DATABASES LIKE 'users'";
$r = $conn->query($s0);
if ($r->num_rows == 0) {
    $s1 = "CREATE DATABASE users";
    $conn->query($s1);
    $s2 = "USE users";
    $conn->query($s2);
    $s3 = "CREATE TABLE users (fname VARCHAR(255), lname VARCHAR(255), email VARCHAR(255), password VARCHAR(255))";
    $conn->query($s3);
} else {
    $s2 = "USE users";
    $conn->query($s2);
}

// for sign up
if (isset($_POST['create'])) {
    $fname = $_POST['fname'] ?? null;
    $lname = $_POST['lname'] ?? null;
    $email = $_POST['email'] ?? null;
    $password = $_POST['password'] ?? null;
    $password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "INSERT INTO users VALUES ('$fname', '$lname', '$email', '$password')";
    $result = $conn->query($sql);
    $conn->close();

    header('Location: ../adminpanel.php#done-creating-acc');
    exit();
}


// for login
if (isset($_POST['login'])) {

    $email = $_POST['email'];
    $password = $_POST['password'];
    $sql = "SELECT * FROM users WHERE email = '$email'";
    $result = $conn->query($sql);
    if ($result->num_rows > 0) {
        // User found, check the password
        $user = $result->fetch_assoc();
        if (password_verify($password, $user['password'])) {
            // Password is correct, start a new session and save the user data
            session_start();
            $_SESSION['user'] = $user['fname'];
            header("Location: ../adminPanel.php");
            exit();
        } else {
            // Password is incorrect
            header("Location: ../index.php#incorrect-pass");
            exit();
        }
    } else {
        // User not found
        header("Location: ../index.php#incorrect-acc");
    }
}
?>