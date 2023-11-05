<?php
header('Content-Type: application/json');
include('./../Connect_Data.php');
error_reporting(0);
session_start();
date_default_timezone_set('Asia/Bangkok');
$connect = new Connect_Data();
$connect->connectData();

$connect2 = new Connect_Data();
$connect2->connectData();
$data = isset($_GET['v']) ? $_GET['v'] : '';
$jsonFile = "./../data_approve.json";
$jsonData = file_get_contents($jsonFile);
$result = array();
if ($data == "saveForm_1") {

    $data = $_POST;
    $connect->sql = "INSERT INTO document_form (id_student ,form_title, student_code, major_name, year_semester, year_study, telephone, email, purpose, type_sector, edulevel, semester,date_insert,status_doc) VALUES (
        '" . $_SESSION['_id'] . "',
        '" . $data['general_form_title'] . "',
        '" . $data['student_code'] . "',
        '" . $data['major_id'] . "',
        '" . $data['general_form_semester'] . "',
        '" . $data['general_form_year'] . "',
        '" . $data['tel'] . "',
        '" . $data['email'] . "',
        '" . $data['general_form_opinion'] . "',
        '" . $data['sector_doc'] . "',
        '" . $data['edulevel'] . "',
        '" . $data['semester'] . "',
        '" . date('Y-m-d H:i:s') . "',
        'รอการอนุมัติ'
        
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
            'อาจารย์',
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
    echo json_encode($result);
} else if ($data == 'history_doc') {
    #ประวัติการขอเอกสาร
    $connect->sql = "SELECT * FROM 	document_form  WHERE id_student='" . $_SESSION['_id'] . "' ORDER BY id DESC";
    $connect->queryData();
    $data_doc = array();
    $data_apr = array();
    $data_ = json_decode($jsonData, true);
    while ($rsconnect = $connect->fetch_AssocData()) {
        array_push($data_doc, $rsconnect);
        foreach ($data_ as $item) {
            $connect2->sql = "SELECT * FROM 	document_form_approve  WHERE document_form='" . $rsconnect['id'] . "' AND role_approve='" . $item['role_approve'] . "'";
            $connect2->queryData();
            if ($row = $connect2->num_rows() > 0) {
                $rsconnect2 = $connect2->fetch_AssocData();
                array_push($data_apr, $rsconnect2);
            }
            else{
               // echo "no";
                array_push($data_apr, ["document_form"=>$rsconnect['id'],"data_approve"=>[]]);
            }
        }
    }
    $dataFind = findDoc_approve($data_doc, $data_apr);
    echo json_encode($dataFind);
} else if ($data == "header_data") {

    $data_ = json_decode($jsonData, true);
    $header_data = [
        ["title" => 'ไฟล์คำขอ',"rows"=>2,"cols"=>1],
        ["title" => 'เรื่อง',"rows"=>2,"cols"=>1],
        ["title" => 'วันที่ยื่นคำขอ',"rows"=>2,"cols"=>1],
        ["title" => 'สถานะ',"rows"=>1, "cols"=>3],
      
    ];
    if ($data_ !== null) {
        foreach ($data_ as $item) {
            array_push($result, ['title' =>$item['role_approve']]);
        }
      //  array_push($header_data,['status'=>$result]);
    }
    echo json_encode([$header_data,$result]);
}
function findDoc_approve($doc_, $doc_approve)
{

    foreach ($doc_ as &$item1) {
        $idToFind = $item1['id'];
        foreach ($doc_approve as $item2) {
            if ($item2['document_form'] == $idToFind) {
                $item1['data_approve'][] = $item2;
            }
        }
    }
    return $doc_;
}
?>
