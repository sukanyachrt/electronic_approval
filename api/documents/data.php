<?php
header('Content-Type: application/json');
include('./../Connect_Data.php');
error_reporting(0);
session_start();
date_default_timezone_set('Asia/Bangkok');
$connect = new Connect_Data();
$connect->connectData();
$data = isset($_GET['v']) ? $_GET['v'] : '';
$result = array();
if ($data == "saveForm_1") {

    $data = $_POST;
    $connect->sql = "INSERT INTO document_form (id_student ,form_title, student_code, major_name, year_semester, year_study, telephone, email, purpose, type_sector, edulevel, semester,date_insert) VALUES (
        '" . $_SESSION['student_id'] . "',
        '" . $data['general_form_title'] . "',
        '" . $data['student_code'] . "',
        '" . $data['major_id'] . "',
        '" . $data['general_form_semester'] . "',
        '" . $data['general_form_year'] . "',
        '" . $data['email'] . "',
        '" . $data['tel'] . "',
        '" . $data['general_form_opinion'] . "',
        '" . $data['sector_doc'] . "',
        '" . $data['edulevel'] . "',
        '" . $data['semester'] . "',
        '" . date('Y-m-d H:i:s') . "'
        
    )";

    $connect->queryData();
    $affect = $connect->affected_rows();
    $id = $connect->id_insertrows(); // นำ id ไปใช้ต่อ
    if ($affect > 0) {

        $connect->sql = "INSERT INTO document_form_approve 
        (document_form, 
        id_approve, 
        role_approve, 
        comment_approve, 
        status_approve
        ) VALUES (
            '" . $id . "',
            '" . $data['selectTeacher'] . "',
            'teacher',
            '',
            'รอการอนุมัติ'
            
         )";

        $connect->queryData();
        $result = [
            'status' => 'ok',
            'msg' => 'บันทึกข้อมูลแล้วค่ะ'
        ];
    } else {
        $result = [
            'status' => 'no',
            'msg' => 'ไม่สามารถบันทึกข้อมูลได้'
        ];
    }
    $connect->closeConnect();
    // echo json_encode();
    echo json_encode($result);
} else if ($data == 'history_doc') {
    $connect->sql = "SELECT * FROM 	document_form as t1 	INNER JOIN 	document_form_approve as t2 	ON 		t1.id = t2.document_form WHERE id_student='".$_SESSION['student_id']."'";
    $connect->queryData();
    while ($rsconnect = $connect->fetch_AssocData()) {
        array_push($result,$rsconnect);
    }

    echo json_encode($result);
}
