<?php
header('Content-Type: application/json');
session_start(); // เริ่ม Session

if (isset($_POST['status']) && $_POST['status'] === 'ok') {
    $data = $_POST['data'];
    $_SESSION['student_id'] = $data['student_id'];
    $_SESSION['student_name'] =$data['student_name'];
    $_SESSION['student_lastname'] =$data['student_lastname'];
    $_SESSION['student_code'] =$data['student_code'];
    // สร้างค่าอื่น ๆ จากข้อมูลที่ถูกส่งมา
   
    echo json_encode(["data"=>"ok"]);
    
} else {
    echo json_encode(["data"=>"no"]);
}
?>
