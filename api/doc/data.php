<?php
error_reporting(0);
header('Content-Type: application/json');
include('./../Connect_Data.php');
date_default_timezone_set("Asia/Bangkok");
$connect = new Connect_Data();
$connect->connectData();
session_start();

$connect2 = new Connect_Data();
$connect2->connectData();
$data = isset($_GET['v']) ? $_GET['v'] : '';
$jsonFile = "./../data_approve.json";
$jsonData = file_get_contents($jsonFile);
$result = array();
if ($data == "teacherAll") {
    #ข้อมูลอาจารย์ที่ปรึกษา
    $connect->sql = "SELECT user_name,user_code,user_id FROM 	`user`  as t1	INNER JOIN 	position as t2 	ON 	`t1`.POSITION = t2.position_id WHERE position_role='adviser'";
    $connect->queryData();
    while ($rsconnect = $connect->fetch_AssocData()) {
        array_push($result, $rsconnect);
    }
    echo json_encode($result);
} else if ($data == "saveForm_1") {
    $data = $_POST;
    #บันทึกเอกสาร
    #insert form
    $connect->sql = "SELECT MAX(form_id) as maxid FROM 	`form`";
    $connect->queryData();
    $rsconnect = $connect->fetch_AssocData();
    $form_id = $rsconnect['maxid'] + 1;

    $connect->sql = "SELECT * FROM 	`form_status` WHERE form_status_name='กำลังดำเนินการ'";
    $connect->queryData();
    $rsconnect = $connect->fetch_AssocData();
    $form_status_id = $rsconnect['form_status_id'];
    if ($form_status_id > 0) {
        $connect->sql = "INSERT INTO `form`(`form_id`, `student_code`, `form_status_id`, `datetime`)
        VALUES ('" . $form_id . "','" . $_SESSION['_code'] . "','" . $form_status_id . "','" . date('Y-m-d H:i:s') . "')";
        $connect->queryData();
        $affect = $connect->affected_rows();
        if ($affect > 0) {
            #insert general_form
            $general_form_year = ($data['general_form_year'] - 543);
            $newgeneral_form_year = $general_form_year . "-" . date('m-d');
            $general_form_sector = '';
            if ($data['edulevel'] == "ปริญญาเอก") {
                $general_form_sector = $data['sector_doc'];
            } else {
                $general_form_sector = $data['sector_master'];
            }
            $connect->sql = "INSERT INTO `general_form`
           (form_id,`general_form_title`,
             `general_form_semester`,
             `general_form_year`, `general_form_opinion`,
             general_form_sector,general_form_education,
             general_form_type_semester,general_form_major_code,general_form_tel)
               VALUES ('" . $form_id . "','" . $data['general_form_title'] . "',
               '" . $data['general_form_semester'] . "','" . $newgeneral_form_year . "',
               '" . $data['general_form_opinion'] . "','" . $general_form_sector . "',
               '" . $data['edulevel'] . "','".$data['semester']."','".$data['major_id']."','".$data['tel']."')";
            $connect->queryData();
            $affect = $connect->affected_rows();
            $id = $connect->id_insertrows(); // นำ id ไปใช้ต่อ
            if ($affect > 0) {
                #insert advisor_approve (อาจารย์)
                $connect->sql = "SELECT * FROM 	`approve_status` WHERE approve_status_name='รอการอนุมัติ'";
                $connect->queryData();
                $rsconnect = $connect->fetch_AssocData();
                $approve_status_id = $rsconnect['approve_status_id'];
                #insert advisor_approve (อาจารย์)
                if ($approve_status_id > 0) {
                    $connect->sql = "INSERT INTO `advisor_approve` 
                   ( `advisor_comment`, `advisor_status_id`, `genaral_form_id`,advisor_user_id)
                    VALUES ('','" . $approve_status_id . "','" . $id . "','".$data['selectTeacher']."')";
                    $connect->queryData();
                    $affect_ad = $connect->affected_rows();
                    $id = $connect->id_insertrows();
                    if ($affect_ad > 0) {
                        array_push($result, ['status' => 'ok', 'msg' => 'บันทึกข้อมูลแล้วค่ะ !']);
                    }
                } else {
                    array_push($result, ['status' => 'no', 'msg' => 'ไม่เจอข้อมูลสถานะเอกสารค่ะ']);
                }
            } else {
                array_push($result, ['status' => 'no', 'msg' => 'ไม่สามารถบันทึกข้อมุลเอกสารได้ค่ะ']);
            }
        } else {
            array_push($result, ['status' => 'no', 'msg' => 'ไม่สามารถบันทึกข้อมุลเอกสารลงใน form ได้ค่ะ']);
        }
    }
    else{
        array_push($result, ['status' => 'no', 'msg' => 'ไม่สามารถบันทึกข้อมุลได้ค่ะ เนื่องจากไม่เจอสถานะ form_status ค่ะ']);
        
    }





    echo json_encode($result[0]);
}
