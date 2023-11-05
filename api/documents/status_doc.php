<?php
error_reporting(0);
date_default_timezone_set('Asia/Bangkok');
header('Content-Type: application/json');
include('./../Connect_Data.php');
$connect = new Connect_Data();
$connect->connectData();
$connect2 = new Connect_Data();
$connect2->connectData();
session_start();
$jsonFile = "./../data_approve.json";
$jsonData = file_get_contents($jsonFile);
$data = isset($_GET['v']) ? $_GET['v'] : '';
$result = array();
if ($data == "checkstatusAdmin") {

    $status_doc = $_POST['dataFind'];
    // $status_doc = ["อนุมัติ", "รอการอนุมัติ"];
    $data_ = json_decode($jsonData, true);
    $data_doc = array();
    $data_apr = array();

    foreach ($status_doc as $item) {
        $connect->sql = "SELECT
        CONCAT( student_name, ' ', student_lastname ) as fullname,t1.id,
        form_title,
        date_insert 
        FROM
        document_form AS t1
        INNER JOIN student AS t2 ON t1.id_student = t2.student_id  WHERE status_doc='" . $item . "'";
        $connect->queryData();

        while ($rsconnect = $connect->fetch_AssocData()) {
            array_push($data_doc, $rsconnect);
            foreach ($data_ as $itemApr) {
                $connect2->sql = "SELECT * FROM 	document_form_approve  WHERE document_form='" . $rsconnect['id'] . "' AND role_approve='" . $itemApr['role_approve'] . "'";
                $connect2->queryData();
                if ($row = $connect2->num_rows() > 0) {

                    $rsconnect2 = $connect2->fetch_AssocData();
                    array_push($data_apr, $rsconnect2);
                } else {

                    array_push($data_apr, ["document_form" => $rsconnect['id'], "data_approve" => []]);
                }
            }
        }
    }
    $result = findDoc_approve($data_doc, $data_apr);

    echo json_encode([$result]);
} else if ($data == "countStatusAdmin") {
    $status_doc = ["อนุมัติ", "รอการอนุมัติ", "ไม่อนุมัติ"];
    foreach ($status_doc as $item) {

        $connect->sql = "SELECT COUNT(*) as numrow,status_doc
        FROM  document_form 
        WHERE status_doc='" . $item . "'";
        $connect->queryData();
        while ($rsconnect = $connect->fetch_AssocData()) {
            array_push($result, $rsconnect);
        }
    }

    echo json_encode($result);
} else if ($data == "checkstatusApr") { //อาจารย์ คณะบดี ประธาน


    $status_doc = ["อนุมัติ", "ไม่อนุมัติ"];
    $data_ = json_decode($jsonData, true);
    $data_doc = array();
    $data_apr = array();

    foreach ($status_doc as $item) {
        $connect->sql = "SELECT
        CONCAT( student_name, ' ', student_lastname ) AS fullname,
        t1.id,
        form_title,
        date_insert,status_approve
        FROM
        document_form AS t1
        INNER JOIN student AS t2 ON t1.id_student = t2.student_id
        INNER JOIN document_form_approve ON t1.id = document_form_approve.document_form
        WHERE status_approve='" . $item . "' AND id_approve='" . $_SESSION['_id'] . "'
        ORDER BY t1.id DESC";
        $connect->queryData();

        while ($rsconnect = $connect->fetch_AssocData()) {
            array_push($data_doc, $rsconnect);
            foreach ($data_ as $itemApr) {
                $connect2->sql = "SELECT * FROM 	document_form_approve  WHERE document_form='" . $rsconnect['id'] . "' AND role_approve='" . $itemApr['role_approve'] . "'";
                $connect2->queryData();
                if ($row = $connect2->num_rows() > 0) {

                    $rsconnect2 = $connect2->fetch_AssocData();
                    array_push($data_apr, $rsconnect2);
                } else {

                    array_push($data_apr, ["document_form" => $rsconnect['id'], "data_approve" => []]);
                }
            }
        }
    }
    $result = findDoc_approve($data_doc, $data_apr);

    echo json_encode([$result]);
} else if ($data == "countStatusApr") {
    $status_doc = ["อนุมัติ", "ไม่อนุมัติ", "รอการอนุมัติ"];
    $Numrow = array();
    foreach ($status_doc as $item) {

        $connect->sql = "SELECT COUNT(*) as numrow
        FROM
        document_form AS t1
        INNER JOIN student AS t2 ON t1.id_student = t2.student_id
        INNER JOIN document_form_approve AS t3 ON t1.id = t3.document_form
        WHERE status_approve ='" . $item . "' AND id_approve='" . $_SESSION['_id'] . "'";
        $connect->queryData();

        while ($rsconnect = $connect->fetch_AssocData()) {

            array_push($result, ['numrow' => $rsconnect['numrow'], 'status_approve' => $item]);
        }
    }
    $result_ =  filterAndSumStatus($result);
    echo json_encode($result_);
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
function filterAndSumStatus($statusApr)
{
    $result = array_reduce($statusApr, function ($carry, $item) {
        if ($item['status_approve'] == 'อนุมัติ' || $item['status_approve'] == 'ไม่อนุมัติ') {
            $carry[0]['numrow'] += intval($item['numrow']);
        }
        if ($item['status_approve'] == 'รอการอนุมัติ') {
            $carry[] = $item;
        }
        return $carry;
    }, [['numrow' => 0, 'status_approve' => 'ประวัติการอนุมัติ']]);

    return $result;
}
?>