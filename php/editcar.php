<?php
require 'database.php';

$carTitle = $_POST['carTitle'] ?? null;
$people = $_POST['people'] ?? null;
$image1 = $_FILES['image1'] ?? null;
$image2 = $_FILES['image2'] ?? null;
$image3 = $_FILES['image3'] ?? null;
$fuilType = $_POST['fuilType'] ?? null;
$trs = $_POST['trs'] ?? null;
$speed = $_POST['speed'] ?? null;
$rentPrice = $_POST['rentPrice'] ?? null;
$salesPrice = $_POST['salesPrice'] ?? null;
$year = $_POST['year'] ?? null;
$ID = $_POST['ID'];
$upload = $_POST['uplaod'] ?? null;

if (isset($upload)) {
    $imagePath1 = "images/" . $image1['name'];
    $imagePath2 = "images/" . $image2['name'];
    $imagePath3 = "images/" . $image3['name'];
    $sql = "UPDATE carInfo set carTitle = '$carTitle', people = '$people', fuilType = '$fuilType', trs = '$trs', speed = '$speed', rentPrice = '$rentPrice', salesPrice = '$salesPrice', year = '$year', image3 = '$imagePath3', image2 = '$imagePath2', image1 = '$imagePath1' where ID = '$ID';";
    $result = $conn->query($sql);
    if ($result) {
        header('Location: ../adminpanel.php#updated');
    }
}