<?php
//error_reporting(0);
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

if ($data == "checkstatusAdmin") {
    $status_doc = $_POST['dataFind'];
    foreach ($status_doc as $item) {
        $connect->sql = "SELECT t2.form_status_name,        t1.general_form_title,
        form.DATETIME,CONCAT( t4.prefix_name, '', t3.student_name, ' ', t3.student_lastname ) AS fullname,
        t1.genaral_form_id,	t1.form_id  ,form.DATETIME 
        FROM form
        INNER JOIN general_form AS t1 ON form.form_id = t1.form_id
        INNER JOIN form_status AS t2 ON form.form_status_id = t2.form_status_id
        INNER JOIN student AS t3 ON form.student_code = t3.student_code
        INNER JOIN prefix AS t4 ON t3.PREFIX = t4.prefix_id
        WHERE form_status_name='" . $item . "'";
        $connect->queryData();
        while ($rsconnect = $connect->fetch_AssocData()) {


            $advisor_approve = '';
            $master_approve = '';
            $deen_approve = '';
            #ข้อมุลการอนุมัติของอาจารย์
            $connect2->sql = "SELECT t1.DATETIME, t1.genaral_form_id,t2.approve_status_name, 
            t1.advisor_approve_id,t1.advisor_comment
            FROM advisor_approve as t1 
            INNER JOIN approve_status as t2
            ON t1.advisor_status_id = t2.approve_status_id 
            WHERE genaral_form_id='" . $rsconnect['genaral_form_id'] . "'";
            $connect2->queryData();
            $rsconnect2 = $connect2->fetch_AssocData();
            $advisor_approve = $rsconnect2['approve_status_name'];
            if ($advisor_approve == "อนุมัติ") {
                #ข้อมูลการอนุมัติประธาน
                $connect2->sql = "SELECT DATETIME,master_comment,approve_status_name 
            FROM approve_status AS t2
            INNER JOIN master_approve AS t1 ON t2.approve_status_id = t1.aprove_status_id 
            WHERE genaral_form_id='" . $rsconnect['genaral_form_id'] . "'";
                $connect2->queryData();
                $rsconnect2 = $connect2->fetch_AssocData();
                $master_approve = $rsconnect2['approve_status_name'];
                if ($master_approve == "อนุมัติ") {
                    #ข้อมูลการอนุมัติของคณบดี
                    $connect2->sql = "SELECT DATETIME,deen_comment,approve_status_name 
                FROM approve_status AS t2
                INNER JOIN deen_approve AS t1 ON t2.approve_status_id = t1.aprove_status_id 
                WHERE genaral_form_id='" . $rsconnect['genaral_form_id'] . "'";
                    $connect2->queryData();
                    $rsconnect2 = $connect2->fetch_AssocData();
                    $deen_approve = $rsconnect2['approve_status_name'];
                }
            }


            array_push($result, [
                'form_id' => $rsconnect['form_id'], 'form_status_name' => $rsconnect['form_status_name'],'fullname'=>$rsconnect['fullname'],
                'general_form_title' => $rsconnect['general_form_title'], 'datetime' => $rsconnect['DATETIME'],
                'advisor_approve' => $advisor_approve, 'master_approve' => $master_approve, 'deen_approve' => $deen_approve
            ]);
        }
    }
    echo json_encode($result);
}
