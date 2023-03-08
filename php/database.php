<?php
$conn = new mysqli('localhost', 'root', '');
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
$s0 = "SHOW DATABASES LIKE 'adminpanel'";
$r = $conn->query($s0);
if ($r->num_rows == 0) {
    $s1 = "CREATE DATABASE adminpanel";
    $conn->query($s1);
    $s2 = "USE adminpanel";
    $conn->query($s2);
    $s3 = "CREATE TABLE carInfo (ID int AUTO_INCREMENT PRIMARY KEY, carTitle VARCHAR(255), image1 VARCHAR(255), image2 VARCHAR(255), image3 VARCHAR(255), people VARCHAR(255), fuilType VARCHAR(255), trs VARCHAR(255), speed VARCHAR(255), rentPrice VARCHAR(255), salesPrice VARCHAR(255), year VARCHAR(255))";
    $conn->query($s3);
} else {
    $s2 = "USE adminpanel";
    $conn->query($s2);
}
?>