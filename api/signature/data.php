<?php
header('Content-Type: application/json');
include('./../Connect_Data.php');
$connect = new Connect_Data();
$connect->connectData();
@session_start();
$data = isset($_GET['v']) ? $_GET['v'] : '';
$result = array();
if ($data == "uploadSignature") {
    $base64DataURI = $_POST['signature'];
    $destinationFilePath = "./../images/".$_SESSION['student_code'].'.png';
    $base64String = substr($base64DataURI, strpos($base64DataURI, ',') + 1);
    $decodedData = base64_decode($base64String);
    
    if ($decodedData === false) {
        $result = [
            "status" => "no",
            "msg" => "Failed to decode Base64 string"
        ];
        
    }
    if (file_put_contents($destinationFilePath, $decodedData) !== false) {
        $result = [
            "status" => "ok",
            "msg" => "อัปโหลดลายเซนต์เรียบร้อยแล้วค่ะ"
        ];
    } else {
        $result = [
            "status" => "no",
            "msg" => "ไม่สามารถอัพโหลดรูปได้"
        ];
        
    }
    echo json_encode($result);
}
?>