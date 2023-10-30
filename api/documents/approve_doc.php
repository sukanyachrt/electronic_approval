<?php
error_reporting(0);
date_default_timezone_set('Asia/Bangkok');
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
	major.major_name as name_major
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

	$dataApr = $_POST;
	$jsonFile = "./../data_approve.json";
	$jsonData = file_get_contents($jsonFile);
	$data_ = json_decode($jsonData, true);
	if ($data_ !== null) {

		$RoleApprove = $dataApr['role_approve'];

		$key = array_search($RoleApprove, array_column($data_, 'role_approve'));
		if ($key !== false) {
			$resultIndex = $key + 1;
			$resultFind = $resultIndex < count($data_) ? $data_[$resultIndex] : null;
			if ($resultFind) {
				#update
				$connect->sql = "UPDATE document_form_approve SET comment_approve='" . $dataApr['comment'] . "' , status_approve='" . $dataApr['status'] . "', date_approve='" . date('Y-m-d H:i:s') . "' WHERE id='" . $dataApr['id'] . "'";
				$connect->queryData();

				$affect = $connect->affected_rows();
				if ($affect > 0 && $dataApr['status']=="อนุมัติ") {

					#find code ผู้อนุมัติลำดับถัดไป 
					$connect->sql = "SELECT
					user_id 
					FROM
					`user`
					INNER JOIN position ON `user`.POSITION = position.position_id
					where position_role='" . $resultFind['role_'] . "'";
					$connect->queryData();
					$rsconnect = $connect->fetch_AssocData();
					$user_code = $rsconnect['user_id'];

					#บันทึกข้อมูล
					$connect->sql = "INSERT INTO document_form_approve 
					(document_form, 
					id_approve, 
					role_approve, 
					comment_approve, 
					status_approve
					) VALUES (
						'" . $dataApr['idDoc'] . "',
						'" . $user_code . "',
						'" . $resultFind['role_approve'] . "',
						'',
						'รอการอนุมัติ'
						
					 )";
					$connect->queryData();
					$result = [
						'status' => 'ok',
						'msg' => 'อนุมัติเอกสารเรียบร้อยแล้ว'
					];
				}
				$result = [
					'status' => 'ok',
					'msg' => 'ทำการไม่อนุมัติเอกสารเรียบร้อยแล้ว'
				];

				
			} else {
				#update
				$connect->sql = "UPDATE document_form_approve SET comment_approve='" . $dataApr['comment'] . "' , status_approve='" . $dataApr['status'] . "', date_approve='" . date('Y-m-d H:i:s') . "' WHERE id='" . $dataApr['id'] . "'";
				$connect->queryData();
				$result = [
					'status' => 'ok',
					'msg' => 'อนุมัติเอกสารเรียบร้อยแล้ว'
				];
			}
		} else {
			#update
			$connect->sql = "UPDATE document_form_approve SET comment_approve='" . $dataApr['comment'] . "' , status_approve='" . $dataApr['status'] . "', date_approve='" . date('Y-m-d H:i:s') . "' WHERE id='" . $dataApr['id'] . "'";
			$connect->queryData();
			$result = [
				'status' => 'ok',
				'msg' => 'อนุมัติเอกสารเรียบร้อยแล้ว'
			];
		}
	} else {

		$result = [
			'status' => 'no',
			'msg' => 'ไม่สามารถอ่านหรือแปลงข้อมูล JSON ได้'
		];
	}
	echo json_encode($result);
}
