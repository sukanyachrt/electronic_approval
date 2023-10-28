<?php
error_reporting(0);
header('Content-Type: application/json');
include('./../Connect_Data.php');
$connect = new Connect_Data();
$connect->connectData();
session_start();

$data = isset($_GET['v']) ? $_GET['v'] : '';
$result = array();
if ($data == "checkapprove") {
    $connect->sql = "SELECT approve_.id,
	document_form,
	id_student,
	form_title,
	doc_.student_code,
	major_name,
	year_semester,
	year_study,
	telephone,
	CONCAT(student_name,' ',student_lastname) as fullname,status_approve,doc_.date_insert
	  FROM
	document_form AS doc_
	INNER JOIN document_form_approve AS approve_ ON doc_.id = approve_.document_form
	INNER JOIN student ON doc_.id_student = student.student_id
    WHERE id_approve='".$_SESSION['_id']."' AND status_approve='รอการอนุมัติ'";
    $connect->queryData();
    while ($rsconnect = $connect->fetch_AssocData()) {
       array_push($result,$rsconnect);
    }
    echo json_encode($result);
}
