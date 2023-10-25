<?php
header('Content-Type: application/json');
include('./../Connect_Data.php');
$connect = new Connect_Data('sei_db');
$connect->connectData();
$data = isset($_GET['v']) ? $_GET['v'] : '';
$result = array();
if ($data == "saveForm_1") {

    echo json_encode($_POST);
}


?>
