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
if ($data == "docApr") {
    #advisor
    $connect->sql = "SELECT
	t1.general_form_title,
	t3.approve_status_name,
	CONCAT(prefix.prefix_name,'',student.student_name,' ',student.student_lastname) as fullname,
	form.DATETIME,t2.advisor_approve_id as idApr,t1.genaral_form_id,t1.form_id 
    FROM 	general_form AS t1
	INNER JOIN advisor_approve AS t2 ON t1.genaral_form_id = t2.genaral_form_id
	INNER JOIN approve_status AS t3 ON t2.advisor_status_id = t3.approve_status_id
	INNER JOIN form ON t1.form_id = form.form_id
	INNER JOIN student ON form.student_code = student.student_code
	INNER JOIN prefix ON student.PREFIX = prefix.prefix_id
    WHERE advisor_user_id='" . $_SESSION['_id'] . "' AND approve_status_name!='รอการอนุมัติ'";
    $connect->queryData();
    while ($rsconnect = $connect->fetch_AssocData()) {
        array_push($result, $rsconnect);
    }

    #master
    $connect->sql = "SELECT
	t1.general_form_title,
	t3.approve_status_name,
	CONCAT( prefix.prefix_name, '', student.student_name, ' ', student.student_lastname ) AS fullname,
	form.DATETIME,	t2.master_approve_id AS idApr,	t1.genaral_form_id,	t1.form_id 
    FROM 	general_form AS t1
	INNER JOIN approve_status AS t3
	INNER JOIN form ON t1.form_id = form.form_id
	INNER JOIN student ON form.student_code = student.student_code
	INNER JOIN prefix ON student.PREFIX = prefix.prefix_id
	INNER JOIN master_approve AS t2 ON t3.approve_status_id = t2.aprove_status_id 
	AND t1.genaral_form_id = t2.genaral_form_id
    WHERE master_user_id='" . $_SESSION['_id'] . "' AND approve_status_name!='รอการอนุมัติ'";
    $connect->queryData();
    while ($rsconnect = $connect->fetch_AssocData()) {
        array_push($result, $rsconnect);
    }

    #deen
    $connect->sql = "SELECT
	t1.general_form_title,
	t3.approve_status_name,
	CONCAT( prefix.prefix_name, '', student.student_name, ' ', student.student_lastname ) AS fullname,
	form.DATETIME,	t2.deen_approve_id AS idApr,	t1.genaral_form_id,	t1.form_id 
    FROM 	general_form AS t1
	INNER JOIN approve_status AS t3
	INNER JOIN form ON t1.form_id = form.form_id
	INNER JOIN student ON form.student_code = student.student_code
	INNER JOIN prefix ON student.PREFIX = prefix.prefix_id
	INNER JOIN deen_approve AS t2 ON t3.approve_status_id = t2.aprove_status_id 
	AND t1.genaral_form_id = t2.genaral_form_id
    WHERE deen_user_id='" . $_SESSION['_id'] . "' AND approve_status_name!='รอการอนุมัติ'";
    $connect->queryData();
    while ($rsconnect = $connect->fetch_AssocData()) {
        array_push($result, $rsconnect);
    }

    echo json_encode($result);
}
?>