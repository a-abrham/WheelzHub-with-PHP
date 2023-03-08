<?php
// for user db
$conn = new mysqli('localhost', 'root', '');

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$s0 = "SHOW DATABASES LIKE 'submittedForms'";
$r = $conn->query($s0);
if ($r->num_rows == 0) {
    $s1 = "CREATE DATABASE submittedForms";
    $conn->query($s1);
    $s2 = "USE submittedForms";
    $conn->query($s2);
    $s3 = "CREATE TABLE submittedForms (ID INT AUTO_INCREMENT PRIMARY KEY, cname VARCHAR(255), email VARCHAR(255), pnum VARCHAR(255), address VARCHAR(255), city VARCHAR(255), state VARCHAR(255), mssg VARCHAR(255))";
    $conn->query($s3);
} else {
    $s2 = "USE submittedForms";
    $conn->query($s2);
}
if (isset($_POST['finance'])) {
    $cname = $_POST['cname'];
    $email = $_POST['email'];
    $pnum = $_POST['pnum'];
    $address = $_POST['address'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $mssg = $_POST['message'];


    $sql = "INSERT INTO submittedForms (cname, email, pnum, address, city, state, mssg) VALUES ('$cname', '$email', '$pnum', '$address', '$city', '$state', '$mssg')";
    $conn->query($sql);
    header('Location: ../index.php#done-submitting');
}