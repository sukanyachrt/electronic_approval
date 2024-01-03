<?php
header('Content-Type: application/json');
session_start(); // เริ่ม Session

if (isset($_POST['status']) && $_POST['status'] === 'ok') {
    $data = $_POST['data'];
    $_SESSION['_id'] = $data['_id'];
    $_SESSION['_name'] =$data['_name'];
    $_SESSION['_lastname'] = isset($data['_lastname']) ? $data['_lastname'] : '';
    $_SESSION['_code'] =$data['_code'];
    $_SESSION['_role'] =$_POST['role'];
    $_SESSION['_major'] = $data['_major'];
    
    // สร้างค่าอื่น ๆ จากข้อมูลที่ถูกส่งมา
   
    echo json_encode(["data"=>"ok",$_POST['role']]);
    
} else {
    echo json_encode(["data"=>"no"]);
}
