<?php
error_reporting(0);
header('Content-Type: application/json');
include('./../Connect_Data.php');
date_default_timezone_set("Asia/Bangkok");
$connect = new Connect_Data();
$connect->connectData();
$connect2 = new Connect_Data();
$connect2->connectData();

session_start();
$data = isset($_GET['v']) ? $_GET['v'] : '';

$result = array();

if ($data == "finddoc") {
    $idDoc = $_GET['id'];
    $connect->sql = "SELECT
	t1.DATETIME,
	t2.genaral_form_id,
	t2.form_id,
	t2.general_form_title,
	t2.general_form_semester,
	t2.general_form_year,
	t2.general_form_opinion,
	t2.general_form_education,
	t2.general_form_sector,
    t2.general_form_type_semester, 
	t2.general_form_major_code, 
	t2.general_form_tel,
	t4.prefix_name,
	t3.student_name,
	t3.student_lastname,
    t3.student_code,
    major.major_name,
    t3.student_email  
    FROM
	form AS t1
	INNER JOIN general_form AS t2 ON t1.form_id = t2.form_id
	INNER JOIN student AS t3 ON t1.student_code = t3.student_code
	INNER JOIN prefix AS t4 ON t3.PREFIX = t4.prefix_id
	INNER JOIN major ON t3.MAJOR = major.major_id
    WHERE t2.form_id='" . $idDoc . "'";
    $connect->queryData();
    $rsconnect = $connect->fetch_AssocData();
    $rsconnect['general_form_year'] = date('Y', strtotime($rsconnect['general_form_year'])) + 543;
    $result = $rsconnect;
    $genaral_form_id = $rsconnect['genaral_form_id'];

    #ข้อมูลการอนุมัติของอาจารย์
    $result_advisor = array();
    $connect->sql = "SELECT
	t1.advisor_user_id
    FROM 	advisor_approve AS t1
	INNER JOIN approve_status AS t2 ON t1.advisor_status_id = t2.approve_status_id
	INNER JOIN `user` ON t1.advisor_user_id = `user`.user_id
    WHERE genaral_form_id='" . $genaral_form_id . "'";
    $connect->queryData();
    $rsconnect = $connect->fetch_AssocData();
    $result['advisor_user_id'] = $rsconnect['advisor_user_id'];
    echo json_encode([$result]);
} else if ($data == "editForm_1") {
    $dataEdit = $_POST;
    #แก้ไขเอกสาร

    #check id form_status
    $connect->sql = "SELECT * FROM 	`form_status` WHERE form_status_name='กำลังดำเนินการ'";
    $connect->queryData();
    $rsconnect = $connect->fetch_AssocData();
    $form_status_id = $rsconnect['form_status_id'];
    if ($form_status_id > 0) {
        #update form
        $connect->sql = "UPDATE `form` SET 
        `form_status_id`='" . $form_status_id . "',
        `datetime`='" . date('Y-m-d H:i:s') . "' 
        WHERE form_id='" . $_GET['id'] . "'";
        $connect->queryData();
        $affect_f = $connect->affected_rows();
    
            $connect->sql = "SELECT * FROM 	`general_form` WHERE form_id='".$_GET['id']."'";
            $connect->queryData();
            $rsconnect = $connect->fetch_AssocData();
            $genaral_form_id = $rsconnect['genaral_form_id'];

            #update general_form
            $general_form_year = ($dataEdit['general_form_year'] - 543);
            $newgeneral_form_year = $general_form_year . "-" . date('m-d');
            $general_form_sector = '';
            if ($dataEdit['edulevel'] == "ปริญญาเอก") {
                $general_form_sector = $dataEdit['sector_doc'];
            } else {
                $general_form_sector = $dataEdit['sector_master'];
            }

            $connect->sql = "UPDATE `general_form` SET
             `general_form_title`='" . $dataEdit['general_form_title'] . "',
             `general_form_semester`='" . $dataEdit['general_form_semester'] . "',
             `general_form_year`='" . $newgeneral_form_year . "',
             `general_form_opinion`='" . $dataEdit['general_form_opinion'] . "',
             `general_form_education`='" . $dataEdit['edulevel'] . "',
             `general_form_sector`='" . $general_form_sector . "',
             `general_form_type_semester`='" . $dataEdit['semester'] . "',
             `general_form_major_code`='" . $dataEdit['major_id'] . "',
             `general_form_tel`='" . $dataEdit['tel'] . "'
              WHERE form_id='" . $_GET['id'] . "' AND genaral_form_id='".$genaral_form_id."'";
            $connect->queryData();
            $affect_g = $connect->affected_rows();
           
                #update advisor_approve
                $connect->sql = "SELECT * FROM 	`approve_status` WHERE approve_status_name='รอการอนุมัติ'";
                $connect->queryData();
                $rsconnect = $connect->fetch_AssocData();
                $approve_status_id = $rsconnect['approve_status_id'];
                if ($approve_status_id > 0) {
                    $connect->sql = "UPDATE `advisor_approve` SET 
                    `advisor_comment`='',
                    `advisor_status_id`='".$approve_status_id."',
                    `datetime`=NULL,
                    `advisor_user_id`='".$dataEdit['selectTeacher']."' 
                    WHERE genaral_form_id='".$genaral_form_id."'";
                    $connect->queryData();
                   array_push($result, ['status' => 'ok', 'msg' => 'บันทึกข้อมูลแล้วค่ะ !']);
                  
                }
                else{
                    array_push($result, ['status' => 'no', 'msg' => 'ไม่เจอข้อมูลสถานะของผู้อนุมัติค่ะ']);
                }

    }
    else{
        array_push($result, ['status' => 'no', 'msg' => 'ไม่เจอข้อมูลสถานะเอกสารค่ะ']);
    }
    echo json_encode($result[0]);
}
