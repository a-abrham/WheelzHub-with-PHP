<?php
require 'database.php';

$ID = $_POST['ID'];

$sql = "DELETE FROM  carInfo WHERE ID = '$ID'";
$result = $conn->query($sql);
if ($result) {
    echo "deleted";
}
?>