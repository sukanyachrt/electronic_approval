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
    $status_doc = $_POST['dataFind'];
    foreach ($status_doc as $item) {
        $connect->sql = "SELECT t2.form_status_name,        t1.general_form_title,
        form.DATETIME,CONCAT( t4.prefix_name, '', t3.student_name, ' ', t3.student_lastname ) AS fullname,
        t1.genaral_form_id,	t1.form_id  ,form.DATETIME ,advisor_approve_id as idApr
        FROM
	form
	INNER JOIN general_form as t1 ON form.form_id = t1.form_id
	INNER JOIN form_status as t2 ON form.form_status_id = t2.form_status_id
	INNER JOIN student as t3 ON form.student_code = t3.student_code
	INNER JOIN prefix as t4 ON t3.PREFIX = t4.prefix_id
	INNER JOIN advisor_approve ON t1.genaral_form_id = advisor_approve.genaral_form_id
	INNER JOIN approve_status ON advisor_approve.advisor_status_id = approve_status.approve_status_id
        WHERE approve_status_name='" . $item . "' AND advisor_user_id='" . $_SESSION['_id'] . "'  ORDER BY  t1.form_id DESC";
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
            WHERE genaral_form_id='" . $rsconnect['genaral_form_id'] . "' and advisor_user_id='" . $_SESSION['_id'] . "'";
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
                'form_id' => $rsconnect['form_id'], 'genaral_form_id' => $rsconnect['genaral_form_id'], 'idApr' => $rsconnect['idApr'], 'form_status_name' => $rsconnect['form_status_name'], 'fullname' => $rsconnect['fullname'],
                'general_form_title' => $rsconnect['general_form_title'], 'datetime' => $rsconnect['DATETIME'],
                'advisor_approve' => $advisor_approve, 'master_approve' => $master_approve, 'deen_approve' => $deen_approve
            ]);
        }
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
    $status_doc = $_POST['dataFind'];
    foreach ($status_doc as $item) {
        $connect->sql = "SELECT
        t2.form_status_name,
        t1.general_form_title,
        form.DATETIME,
        CONCAT( t4.prefix_name, '', t3.student_name, ' ', t3.student_lastname ) AS fullname,
        t1.genaral_form_id,
        t1.form_id,
        form.DATETIME,
        master_approve_id AS idApr 
    FROM
        form
        INNER JOIN general_form AS t1 ON form.form_id = t1.form_id
        INNER JOIN form_status AS t2 ON form.form_status_id = t2.form_status_id
        INNER JOIN student AS t3 ON form.student_code = t3.student_code
        INNER JOIN prefix AS t4 ON t3.PREFIX = t4.prefix_id
        INNER JOIN master_approve ON t1.genaral_form_id = master_approve.genaral_form_id
        INNER JOIN approve_status ON master_approve.aprove_status_id = approve_status.approve_status_id
        WHERE approve_status_name='" . $item . "' AND master_user_id='" . $_SESSION['_id'] . "'  ORDER BY  t1.form_id DESC";
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
            WHERE genaral_form_id='" . $rsconnect['genaral_form_id'] . "' ";
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
                'form_id' => $rsconnect['form_id'], 'genaral_form_id' => $rsconnect['genaral_form_id'], 'idApr' => $rsconnect['idApr'],
                 'form_status_name' => $rsconnect['form_status_name'], 'fullname' => $rsconnect['fullname'],
                'general_form_title' => $rsconnect['general_form_title'], 'datetime' => $rsconnect['DATETIME'],
                'advisor_approve' => $advisor_approve, 'master_approve' => $master_approve, 'deen_approve' => $deen_approve
            ]);
        }
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
                   `deen_user_id`='" . $user_code . "',
                    `deen_comment`='',
                    `aprove_status_id`='" . $approve_status_id . "',
                    `datetime`=NULL
                    WHERE genaral_form_id='" . $dataApr['genaral_form_id'] . "'";
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
    
    $status_doc = $_POST['dataFind'];
    foreach ($status_doc as $item) {
        $connect->sql = "SELECT
        t2.form_status_name,
        t1.general_form_title,
        form.DATETIME,
        CONCAT( t4.prefix_name, '', t3.student_name, ' ', t3.student_lastname ) AS fullname,
        t1.genaral_form_id,
        t1.form_id,
        form.DATETIME,
        deen_approve_id AS idApr 
    FROM
        form
        INNER JOIN general_form AS t1 ON form.form_id = t1.form_id
        INNER JOIN form_status AS t2 ON form.form_status_id = t2.form_status_id
        INNER JOIN student AS t3 ON form.student_code = t3.student_code
        INNER JOIN prefix AS t4 ON t3.PREFIX = t4.prefix_id
        INNER JOIN deen_approve ON t1.genaral_form_id = deen_approve.genaral_form_id
        INNER JOIN approve_status ON deen_approve.aprove_status_id = approve_status.approve_status_id
        WHERE approve_status_name='" . $item . "' AND deen_user_id='" . $_SESSION['_id'] . "'  ORDER BY  t1.form_id DESC";
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
            WHERE genaral_form_id='" . $rsconnect['genaral_form_id'] . "' ";
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
                'form_id' => $rsconnect['form_id'], 'genaral_form_id' => $rsconnect['genaral_form_id'], 'idApr' => $rsconnect['idApr'],
                 'form_status_name' => $rsconnect['form_status_name'], 'fullname' => $rsconnect['fullname'],
                'general_form_title' => $rsconnect['general_form_title'], 'datetime' => $rsconnect['DATETIME'],
                'advisor_approve' => $advisor_approve, 'master_approve' => $master_approve, 'deen_approve' => $deen_approve
            ]);
        }
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

function filterAndSumStatus($array)
{

    $result = array_reduce($array, function ($carry, $item) {
        $status = $item['status_approve'];
        $carry[$status]['numrow'] += intval($item['numrow']);
        $carry[$status]['status_approve'] = $status;
        return $carry;
    }, [
        'อนุมัติ' => ['numrow' => 0, 'status_approve' => 'อนุมัติ'],
        'ไม่อนุมัติ' => ['numrow' => 0, 'status_approve' => 'ไม่อนุมัติ'],
        'รอการอนุมัติ' => ['numrow' => 0, 'status_approve' => 'รอการอนุมัติ']
    ]);

    // Convert associative array to indexed array
    return array_values($result);

    // $result = array_reduce($statusApr, function ($carry, $item) {
    //     if ($item['status_approve'] == 'อนุมัติ' || $item['status_approve'] == 'ไม่อนุมัติ') {
    //         // รวมค่า numrow ของสถานะ 'อนุมัติ' หรือ 'ไม่อนุมัติ'
    //         $carry[0]['numrow'] += intval($item['numrow']);
    //     }

    //     if ($item['status_approve'] == 'รอการอนุมัติ') {
    //         // รวมค่า 'numrow' ของสถานะ 'รอการอนุมัติ'
    //         $carry[1]['numrow'] += intval($item['numrow']);
    //         $carry[1]['status_approve'] = 'รอการอนุมัติ';
    //     }

    //     return $carry;
    // }, [['numrow' => 0, 'status_approve' => 'ประวัติการอนุมัติ'], ['numrow' => 0, 'status_approve' => 'รอการอนุมัติ']]);

    // return $result;

}
