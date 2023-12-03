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

if ($data == "dataDoc") {
    $idDoc = $_GET['idDoc'];
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
    $imagePath = "./../images/" . $rsconnect['student_code'] . '.png';
    $imageData = file_get_contents($imagePath);
    $base64ImageData = base64_encode($imageData);
    $rsconnect["image_sign"] = $base64ImageData;
    $rsconnect['general_form_year'] = date('Y', strtotime($rsconnect['general_form_year'])) + 543;
    $result = $rsconnect;
    $genaral_form_id = $rsconnect['genaral_form_id'];
    //array_push($result,$rsconnect);

    #ข้อมูลการอนุมัติของอาจารย์
    $result_advisor = array();
    $connect->sql = "SELECT
	advisor_approve_id,
	t1.advisor_comment,
	t2.approve_status_name,
	t1.DATETIME,
	t1.advisor_user_id,
	`user`.user_code,`user`.user_name  
    FROM 	advisor_approve AS t1
	INNER JOIN approve_status AS t2 ON t1.advisor_status_id = t2.approve_status_id
	INNER JOIN `user` ON t1.advisor_user_id = `user`.user_id
    WHERE genaral_form_id='" . $genaral_form_id . "'";
    $connect->queryData();
    $rsconnect = $connect->fetch_AssocData();
    if ($rsconnect['approve_status_name'] != "รอการอนุมัติ") {
        $imagePath = "./../images/" . $rsconnect['user_code'] . '.png';
        $imageData = file_get_contents($imagePath);
        $base64ImageData = base64_encode($imageData);

        $rsconnect["image_sign"] = $base64ImageData;
    } else {
    }
    $result_advisor = $rsconnect;


    #ข้อมูลการอนุมัติของประธาน
    $result_master = array();
    $connect->sql = "SELECT
	`user`.user_code,
	`user`.user_name,
	t1.DATETIME,
	t1.master_comment ,approve_status_name
    FROM 	approve_status AS t2
	INNER JOIN `user`
	INNER JOIN master_approve AS t1 ON t2.approve_status_id = t1.aprove_status_id 
	AND `user`.user_id = t1.master_user_id
    WHERE genaral_form_id='" . $genaral_form_id . "'";
    $connect->queryData();
    $row = $connect->num_rows();
    if ($row > 0) {
        $rsconnect = $connect->fetch_AssocData();
        if ($rsconnect['approve_status_name'] != "รอการอนุมัติ") {
            $imagePath = "./../images/" . $rsconnect['user_code'] . '.png';
            $imageData = file_get_contents($imagePath);
            $base64ImageData = base64_encode($imageData);
            $rsconnect["image_sign"] = $base64ImageData;
            $result_master = $rsconnect;
        }
    }

    #ข้อมูลการอนุมัติของคณบดี
    $result_deen = array();
    $connect->sql = "SELECT
	`user`.user_code,
	`user`.user_name,
	approve_status_name,
	deen_approve.deen_comment,
	deen_approve.DATETIME 
    FROM
	approve_status AS t2
	INNER JOIN `user`
	INNER JOIN deen_approve ON t2.approve_status_id = deen_approve.aprove_status_id 
	AND `user`.user_id = deen_approve.deen_user_id
    WHERE genaral_form_id='" . $genaral_form_id . "'";
    $connect->queryData();
    $row = $connect->num_rows();
    if ($row > 0) {
        $rsconnect = $connect->fetch_AssocData();
        if ($rsconnect['approve_status_name'] != "รอการอนุมัติ") {
            $imagePath = "./../images/" . $rsconnect['user_code'] . '.png';
            $imageData = file_get_contents($imagePath);
            $base64ImageData = base64_encode($imageData);
            $rsconnect["image_sign"] = $base64ImageData;
            $result_deen = $rsconnect;
        }
    }




    echo json_encode([$result, $result_advisor, $result_master,$result_deen]);
}
