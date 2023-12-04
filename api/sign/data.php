<?php
error_reporting(0);
header('Content-Type: application/json');
include('./../Connect_Data.php');
$connect = new Connect_Data();
$connect->connectData();
session_start();

$data = isset($_GET['v']) ? $_GET['v'] : '';
$result = array();
if ($data == "users") {

    $student_code = $_SESSION["_code"];
    $connect->sql = "SELECT major_name,	student_email,t1.student_code,student_email,	CONCAT( t3.prefix_name, '', t1.student_name) as fname ,t1.student_lastname as lname 
    FROM 	student AS t1
	INNER JOIN major AS t2 ON t1.MAJOR = t2.major_id
	INNER JOIN prefix AS t3 ON t1.PREFIX = t3.prefix_id
    WHERE student_code='" . $student_code . "'";
    $connect->queryData();
    $rsconnect = $connect->fetch_AssocData();


    $imagePath = "./../images/" . $_SESSION['_code'] . '.png';

    $imageData = file_get_contents($imagePath);

    if ($imageData === false) {
        $result = [
            'status' => "no",
            'msg' => "ยังไม่มีรูปลายเซนต์โปรดเพิ่มลายเซนต์ก่อนค่ะ"
        ];
    } else {
        // แปลงข้อมูลภาพเป็นรหัส Base64
        $base64ImageData = base64_encode($imageData);
        $result = [
            'status' => "ok",
            'image_sign' => $base64ImageData,
            'data' => $rsconnect
        ];
    }


    $connect->closeConnect();
    echo json_encode($result);
} else if ($data == "uploadSignature") {
    $base64DataURI = $_POST['signature'];
    $destinationFilePath = "./../images/" . $_SESSION['_code'] . '.png';
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
else if($data=="checksignApr"){
    $student_code = $_SESSION["_code"];
   


    $imagePath = "./../images/" . $_SESSION['_code'] . '.png';

    $imageData = file_get_contents($imagePath);

    if ($imageData === false) {
        $result = [
            'status' => "no",
            'msg' => "ยังไม่มีรูปลายเซนต์โปรดเพิ่มลายเซนต์ก่อนค่ะ"
        ];
    } else {
        // แปลงข้อมูลภาพเป็นรหัส Base64
        $base64ImageData = base64_encode($imageData);
        $result = [
            'status' => "ok",
            'image_sign' => $base64ImageData,
            
        ];
    }


    
    echo json_encode($result);
}
