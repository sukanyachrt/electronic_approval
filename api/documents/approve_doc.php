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
    WHERE id_approve='" . $_SESSION['_id'] . "' AND status_approve='รอการอนุมัติ'";
	$connect->queryData();
	while ($rsconnect = $connect->fetch_AssocData()) {
		array_push($result, $rsconnect);
	}
	echo json_encode($result);
} else if ($data == 'dataDoc') {
	$idDoc = $_GET['idDoc'];

	$connect->sql = "SELECT 
	student.student_code,
	student.student_name,
	student.student_lastname,
	doc_.id,
	doc_.id_student,
	doc_.form_title,
	doc_.student_code AS doc_studentcode,
	doc_.major_name,
	doc_.year_semester,
	doc_.year_study,
	doc_.telephone,
	doc_.email,
	doc_.purpose,
	doc_.type_sector,
	doc_.edulevel,
	doc_.semester,
	doc_.date_insert,
	major.major_name
	FROM
	document_form AS doc_
	INNER JOIN student ON doc_.id_student = student.student_id
	INNER JOIN major ON student.MAJOR = major.major_id WHERE doc_.id='" . $idDoc . "'";
	$connect->queryData();
	$rsconnect = $connect->fetch_AssocData();
	$imagePath = "./../images/" . $rsconnect['student_code'] . '.png';
	$imageData = file_get_contents($imagePath);
	$base64ImageData = base64_encode($imageData);

	$rsconnect["image_sign"] = $base64ImageData;
	$result = $rsconnect;
	//array_push($result, $rsconnect);

	$resultApr = array();
	$connect->sql = "SELECT
	`user`.user_code,
	apr_.id,
	apr_.document_form,
	apr_.id_approve,
	apr_.role_approve,
	apr_.comment_approve,
	apr_.status_approve,
	apr_.date_approve,
	`user`.user_name 
FROM
	document_form_approve AS apr_
	INNER JOIN `user` ON apr_.id_approve = `user`.user_id
	WHERE document_form='" . $idDoc . "'";
	$connect->queryData();
	while ($rsconnect = $connect->fetch_AssocData()) {
		$imagePath = "./../images/" . $rsconnect['user_code'] . '.png';
		$imageData = file_get_contents($imagePath);
		$base64ImageData = base64_encode($imageData);

		$rsconnect["image_sign"] = $base64ImageData;
		array_push($resultApr, $rsconnect);
	}

	echo json_encode([$result, $resultApr]);
} else if ($data == "approvebyid") {

	echo json_encode($_GET);
}
