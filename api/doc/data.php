<?php
//error_reporting(0);
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

    $connect->sql = "INSERT INTO `form`(`form_id`, `student_code`, `form_status_id`, `datetime`)
     VALUES ('" . $form_id . "','" . $_SESSION['_code'] . "','" . $form_status_id . "','" . date('Y-m-d H:i:s') . "')";
    $connect->queryData();
    $affect = $connect->affected_rows();
    if ($affect > 0) {
        #insert general_form
        $general_form_year = ($data['general_form_year'] - 543);
        $newgeneral_form_year = $general_form_year . "-" . date('m-d');
        $connect->sql = "INSERT INTO `general_form`
        (form_id,`general_form_title`,
          `general_form_semester`,
          `general_form_year`, `general_form_opinion`)
            VALUES ('" . $form_id . "','" . $data['general_form_title'] . "',
            '" . $data['general_form_semester'] . "','" . $newgeneral_form_year . "','" . $data['general_form_opinion'] . "')";
        $connect->queryData();
        $affect = $connect->affected_rows();
        $id = $connect->id_insertrows(); // นำ id ไปใช้ต่อ
        if ($affect > 0) {
            # insert advisor_approve (อาจารย์)
            $connect->sql = "INSERT INTO `advisor_approve` 
            ( `advisor_comment`, `advisor_status_id`, `genaral_form_id`)
             VALUES ('','[value-4]','".$id."')";
            $connect->queryData();
        }
    }

    $sector_ = '';
    if ($data['edulevel'] == "ปริญญาเอก") {
        $sector_ = $data['sector_doc'];
    } else {
        $sector_ = $data['sector_master'];
    }


    echo json_encode($_POST);
}
