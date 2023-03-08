<?php
require 'finance.php';

$ID = $_POST['ID'];

$sql = "DELETE FROM  submittedforms WHERE ID = '$ID'";
$result = $conn->query($sql);
if ($result) {
}
?>