<?php
$carTitle = $_POST['carTitle'] ?? null;
$image1 = $_FILES['image1'] ?? null;
$image2 = $_FILES['image2'] ?? null;
$image3 = $_FILES['image3'] ?? null;
$people = $_POST['people'] ?? null;
$fuilType = $_POST['fuilType'] ?? null;
$trs = $_POST['trs'] ?? null;
$speed = $_POST['speed'] ?? null;
$rentPrice = $_POST['rentPrice'] ?? null;
$salesPrice = $_POST['salesPrice'] ?? null;
$year = $_POST['year'] ?? null;
$upload = $_POST['uplaod'] ?? null;
if (isset($upload)) {
    require 'database.php';
    if ($image1 != null) {
        $imagePath1 = "images/" . $image1['name'];
        $imagePath2 = "images/" . $image2['name'];
        $imagePath3 = "images/" . $image3['name'];
        $sql = "INSERT INTO carInfo (carTitle, image1, image2, image3, people, fuilType, trs, speed, rentPrice, salesPrice, year) VALUES ('$carTitle','$imagePath1','$imagePath2','$imagePath3','$people','$fuilType','$trs','$speed','$rentPrice','$salesPrice','$year')";
        $conn->query($sql);
        if ($conn->query($sql)) {
            move_uploaded_file($image1['tmp_name'], $imagePath1);
            move_uploaded_file($image2['tmp_name'], $imagePath2);
            move_uploaded_file($image3['tmp_name'], $imagePath3);
        }
    }
    header("Location: ../adminpanel.php#done-adding");
    $conn->close();
}
?>