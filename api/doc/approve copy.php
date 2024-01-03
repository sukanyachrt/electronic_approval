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
$result1 = array();
if ($data == "checkapproveAdvisor") { #advisor
    $connect->sql = "SELECT
	t1.general_form_title,
	t3.approve_status_name,
	CONCAT(prefix.prefix_name,'',student.student_name,' ',student.student_lastname) as fullname,
	form.DATETIME as datetime,t2.advisor_approve_id as idApr,t1.genaral_form_id,t1.form_id 
    FROM 	general_form AS t1
	INNER JOIN advisor_approve AS t2 ON t1.genaral_form_id = t2.genaral_form_id
	INNER JOIN approve_status AS t3 ON t2.advisor_status_id = t3.approve_status_id
	INNER JOIN form ON t1.form_id = form.form_id
	INNER JOIN student ON form.student_code = student.student_code
	INNER JOIN prefix ON student.PREFIX = prefix.prefix_id
    WHERE advisor_user_id='" . $_SESSION['_id'] . "' AND approve_status_name='รอการอนุมัติ'";
    $connect->queryData();
    while ($rsconnect = $connect->fetch_AssocData()) {
        array_push($result, $rsconnect);





    }
    echo json_encode($result);
} else if ($data == "updateAprAdvisor") { #advisor
    $dataApr = $_POST;
    if ($_SESSION['_role'] == "adviser") {


        if ($dataApr['status'] == "อนุมัติ") {

            #หาผู้อนุมัติคนต่อไป
            $connect->sql = "SELECT * FROM 	`approve_status` WHERE approve_status_name='รอการอนุมัติ'";
            $connect->queryData();
            $rsconnect = $connect->fetch_AssocData();
            $approve_status_id = $rsconnect['approve_status_id'];

            $connect->sql = "SELECT user_id 
					FROM `user`
					INNER JOIN position ON `user`.POSITION = position.position_id
					where position_role='master'";
            $connect->queryData();
            $rsconnect = $connect->fetch_AssocData();
            $user_code = $rsconnect['user_id'];
            if ($user_code > 0) {

                $connect->sql = "SELECT * 
                        FROM `master_approve`
                        WHERE genaral_form_id='" . $dataApr['genaral_form_id'] . "'";
                $connect->queryData();
                $rsconnect = $connect->fetch_AssocData();
                if ($rsconnect['genaral_form_id'] == $dataApr['genaral_form_id']) {
                    #upadate
                    $connect->sql = "UPDATE `master_approve` SET
                             `master_user_id`='" . $user_code . "',
                             `master_comment`='',
                             `aprove_status_id`='" . $approve_status_id . "',
                             `datetime`=NULL
                              WHERE genaral_form_id= '" . $dataApr['genaral_form_id'] . "'";
                    $connect->queryData();
                } else {

                    $connect->sql = "INSERT INTO `master_approve`(
                                `master_user_id`, `master_comment`, 
                                `aprove_status_id`,
                                `genaral_form_id`) VALUES
                                ('" . $user_code . "',
                                '','" . $approve_status_id . "','" . $dataApr['genaral_form_id'] . "')";
                    $connect->queryData();
                }
            }
        } else {
            #เปลี่ยนสถานะเอกสาร
            $connect->sql = "SELECT * FROM 	`form_status` WHERE form_status_name='แก้ไข'";
            $connect->queryData();
            $rsconnect = $connect->fetch_AssocData();
            $form_status_id = $rsconnect['form_status_id'];

            $connect->sql = "UPDATE `form` SET `form_status_id`='" . $form_status_id . "' WHERE form_id='" . $dataApr['form_id'] . "'";
            $connect->queryData();
        }
        $connect->sql = "SELECT * FROM 	`approve_status` WHERE approve_status_name='" . $dataApr['status'] . "'";
        $connect->queryData();
        $rsconnect = $connect->fetch_AssocData();
        $approve_status_id = $rsconnect['approve_status_id'];

        $connect->sql = "UPDATE `advisor_approve` SET 
        `advisor_comment`='" . $dataApr['comment'] . "',`advisor_status_id`='" . $approve_status_id . "',
        `datetime`='" . date('Y-m-d H:i:s') . "'
         WHERE advisor_approve_id='" . $dataApr['idApr'] . "' ";
        $connect->queryData();
    } else {
        $result = [
            'status' => "no",
            'msg' => "คุณไม่ใช่อาจารย์ค่ะ"
        ];
    }

    echo json_encode($dataApr);
} else if ($data == "checkapproveMaster") { #master
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
    WHERE master_user_id='" . $_SESSION['_id'] . "' AND approve_status_name='รอการอนุมัติ'";
    $connect->queryData();
    while ($rsconnect = $connect->fetch_AssocData()) {
        array_push($result, $rsconnect);
    }
    echo json_encode($result);
} else if ($data == "updateAprMaster") { #master
    $dataApr = $_POST;
    if ($_SESSION['_role'] == "master") {


        if ($dataApr['status'] == "อนุมัติ") {

            #หาผู้อนุมัติคนต่อไป
            $connect->sql = "SELECT * FROM 	`approve_status` WHERE approve_status_name='รอการอนุมัติ'";
            $connect->queryData();
            $rsconnect = $connect->fetch_AssocData();
            $approve_status_id = $rsconnect['approve_status_id'];

            $connect->sql = "SELECT user_id 
					FROM `user`
					INNER JOIN position ON `user`.POSITION = position.position_id
					where position_role='deen'";
            $connect->queryData();
            $rsconnect = $connect->fetch_AssocData();
            $user_code = $rsconnect['user_id'];
            if ($user_code > 0) {

                $connect->sql = "SELECT genaral_form_id 
                FROM `deen_approve`
                where genaral_form_id='" . $dataApr['genaral_form_id'] . "'";
                $connect->queryData();
                $rsconnect = $connect->fetch_AssocData();
                $rsconnect = $connect->fetch_AssocData();
                if ($rsconnect['genaral_form_id'] == $dataApr['genaral_form_id']) {
                    #update
                    $connect->sql = "UPDATE `deen_approve` SET 
                   `deen_user_id`='".$user_code."',
                    `deen_comment`='',
                    `aprove_status_id`='".$approve_status_id."',
                    `datetime`=NULL
                    WHERE genaral_form_id='".$dataApr['genaral_form_id']."'";
                    $connect->queryData();
                    

                } else {
                    $connect->sql = "INSERT INTO `deen_approve`
                            (`deen_user_id`,
                             `deen_comment`, `aprove_status_id`,
                              `genaral_form_id`) VALUES 
                              ('" . $user_code . "',
                              '','" . $approve_status_id . "',
                              '" . $dataApr['genaral_form_id'] . "')";
                    $connect->queryData();
                }
            }
        } else {
            #เปลี่ยนสถานะเอกสาร
            $connect->sql = "SELECT * FROM 	`form_status` WHERE form_status_name='แก้ไข'";
            $connect->queryData();
            $rsconnect = $connect->fetch_AssocData();
            $form_status_id = $rsconnect['form_status_id'];

            $connect->sql = "UPDATE `form` SET `form_status_id`='" . $form_status_id . "' WHERE form_id='" . $dataApr['form_id'] . "'";
            $connect->queryData();
        }

        $connect->sql = "SELECT * FROM 	`approve_status` WHERE approve_status_name='" . $dataApr['status'] . "'";
        $connect->queryData();
        $rsconnect = $connect->fetch_AssocData();
        $approve_status_id = $rsconnect['approve_status_id'];

        $connect->sql = "UPDATE `master_approve` SET 
        `master_comment`='" . $dataApr['comment'] . "',
        `aprove_status_id`='" . $approve_status_id . "',
        `datetime`='" . date('Y-m-d H:i:s') . "'
        WHERE master_approve_id ='" . $dataApr['idApr'] . "' ";
        $connect->queryData();
    } else {
        $result = [
            'status' => "no",
            'msg' => "คุณไม่ใช่ประธานหลักสูตรค่ะ"
        ];
    }

    echo json_encode($dataApr);
} else if ($data == "checkapproveDeen") { #deen
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
    WHERE deen_user_id='" . $_SESSION['_id'] . "' AND approve_status_name='รอการอนุมัติ'";
    $connect->queryData();
    while ($rsconnect = $connect->fetch_AssocData()) {
        array_push($result, $rsconnect);
    }
    echo json_encode($result);
} else if ($data == "updateAprDeen") { #deen
    $dataApr = $_POST;
    if ($_SESSION['_role'] == "deen") {


        if ($dataApr['status'] == "อนุมัติ") {
            #เปลี่ยนสถานะเอกสาร
            $connect->sql = "SELECT * FROM 	`form_status` WHERE form_status_name='เสร็จสิ้น'";
            $connect->queryData();
            $rsconnect = $connect->fetch_AssocData();
            $form_status_id = $rsconnect['form_status_id'];

            $connect->sql = "UPDATE `form` SET `form_status_id`='" . $form_status_id . "' WHERE form_id='" . $dataApr['form_id'] . "'";
            $connect->queryData();
        } else {
            #เปลี่ยนสถานะเอกสาร
            $connect->sql = "SELECT * FROM 	`form_status` WHERE form_status_name='แก้ไข'";
            $connect->queryData();
            $rsconnect = $connect->fetch_AssocData();
            $form_status_id = $rsconnect['form_status_id'];

            $connect->sql = "UPDATE `form` SET `form_status_id`='" . $form_status_id . "' WHERE form_id='" . $dataApr['form_id'] . "'";
            $connect->queryData();
        }

        $connect->sql = "SELECT * FROM 	`approve_status` WHERE approve_status_name='" . $dataApr['status'] . "'";
        $connect->queryData();
        $rsconnect = $connect->fetch_AssocData();
        $approve_status_id = $rsconnect['approve_status_id'];

        $connect->sql = "UPDATE `deen_approve` SET 
        `deen_comment`='" . $dataApr['comment'] . "',
        `aprove_status_id`='" . $approve_status_id . "',
        `datetime`='" . date('Y-m-d H:i:s') . "'
        WHERE deen_approve_id ='" . $dataApr['idApr'] . "' ";
        $connect->queryData();
    } else {
        $result = [
            'status' => "no",
            'msg' => "คุณไม่ใช่คณบดีค่ะ"
        ];
    }

    echo json_encode($dataApr);
} else if ($data == "countStatusApr") {

    $status_doc = ["อนุมัติ", "ไม่อนุมัติ", "รอการอนุมัติ"];
    #advisor
    foreach ($status_doc as $item) {
        $connect->sql = "SELECT COUNT(*) as numrow
        FROM 	general_form AS t1
        INNER JOIN advisor_approve AS t2 ON t1.genaral_form_id = t2.genaral_form_id
        INNER JOIN approve_status AS t3 ON t2.advisor_status_id = t3.approve_status_id
        INNER JOIN form ON t1.form_id = form.form_id
        INNER JOIN student ON form.student_code = student.student_code
        INNER JOIN prefix ON student.PREFIX = prefix.prefix_id
        WHERE advisor_user_id='" . $_SESSION['_id'] . "' AND approve_status_name='" . $item . "'";
        $connect->queryData();
        while ($rsconnect = $connect->fetch_AssocData()) {
            array_push($result, ['numrow' => $rsconnect['numrow'], 'status_approve' => $item]);
        }
    }

    #master
    foreach ($status_doc as $item) {
        $connect->sql = "SELECT COUNT(*) as numrow
        FROM 	general_form AS t1
        INNER JOIN approve_status AS t3
        INNER JOIN form ON t1.form_id = form.form_id
        INNER JOIN student ON form.student_code = student.student_code
        INNER JOIN prefix ON student.PREFIX = prefix.prefix_id
        INNER JOIN master_approve AS t2 ON t3.approve_status_id = t2.aprove_status_id 
        AND t1.genaral_form_id = t2.genaral_form_id
        WHERE master_user_id='" . $_SESSION['_id'] . "' AND approve_status_name='" . $item . "'";
        $connect->queryData();
        while ($rsconnect = $connect->fetch_AssocData()) {
            array_push($result, ['numrow' => $rsconnect['numrow'], 'status_approve' => $item]);
        }
    }

    #deen
    foreach ($status_doc as $item) {
        $connect->sql = "SELECT   COUNT(*) as numrow
        FROM 	general_form AS t1
        INNER JOIN approve_status AS t3
        INNER JOIN form ON t1.form_id = form.form_id
        INNER JOIN student ON form.student_code = student.student_code
        INNER JOIN prefix ON student.PREFIX = prefix.prefix_id
        INNER JOIN deen_approve AS t2 ON t3.approve_status_id = t2.aprove_status_id 
        AND t1.genaral_form_id = t2.genaral_form_id
        WHERE deen_user_id='" . $_SESSION['_id'] . "' AND approve_status_name='" . $item . "'";
        $connect->queryData();
        while ($rsconnect = $connect->fetch_AssocData()) {
            array_push($result, ['numrow' => $rsconnect['numrow'], 'status_approve' => $item]);
        }
    }

    $result_ =  filterAndSumStatus($result);
    echo json_encode($result_);
}

function filterAndSumStatus($statusApr)
{
    $result = array_reduce($statusApr, function ($carry, $item) {
        if ($item['status_approve'] == 'อนุมัติ' || $item['status_approve'] == 'ไม่อนุมัติ') {
            // รวมค่า numrow ของสถานะ 'อนุมัติ' หรือ 'ไม่อนุมัติ'
            $carry[0]['numrow'] += intval($item['numrow']);
        }

        if ($item['status_approve'] == 'รอการอนุมัติ') {
            // รวมค่า 'numrow' ของสถานะ 'รอการอนุมัติ'
            $carry[1]['numrow'] += intval($item['numrow']);
            $carry[1]['status_approve'] = 'รอการอนุมัติ';
        }

        return $carry;
    }, [['numrow' => 0, 'status_approve' => 'ประวัติการอนุมัติ'], ['numrow' => 0, 'status_approve' => 'รอการอนุมัติ']]);

    return $result;
}
