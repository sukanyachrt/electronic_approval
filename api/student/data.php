<?php
error_reporting(0);
header('Content-Type: application/json');
include('./../Connect_Data.php');
$connect = new Connect_Data('sei_db');
$connect->connectData();
session_start();

$data = isset($_GET['v']) ? $_GET['v'] : '';
$result = array();
if ($data == "users") {

    $student_code = $_SESSION["student_code"];
    $connect->sql = "SELECT major_name,student_email FROM 	student as t1 	INNER JOIN	major as t2 ON 	t1.MAJOR = t2.major_id WHERE student_code='" . $student_code . "'";
    $connect->queryData();
    $rsconnect = $connect->fetch_AssocData();


    $imagePath = "./../images/" . $_SESSION['student_code'] . '.png';

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
} else if ($data == "teacherAll") {
    $connect->sql = "SELECT user_name,user_code,user_id FROM 	`user`  as t1	INNER JOIN 	position as t2 	ON 	`t1`.POSITION = t2.position_id WHERE position_role='teacher'";
    $connect->queryData();
    while ($rsconnect = $connect->fetch_AssocData()) {
       array_push($result,$rsconnect);
    }
    echo json_encode($result);
}

?>
