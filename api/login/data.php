<?php
header('Content-Type: application/json');
include('./../Connect_Data.php');
$connect = new Connect_Data();
$connect->connectData();
$data = isset($_GET['v']) ? $_GET['v'] : '';
$result = array();
if ($data == "checklogin") {

    $username = $_POST["username"];
    $password = $_POST["password"];

    $connect->sql = "SELECT student_id as _id,student_name as _name,student_lastname as _lastname,student_code as _code,student_password FROM  student WHERE student_code ='" . $username . "'";
    $connect->queryData();
    $row = $connect->num_rows();
    if ($row > 0) {
        $rsconnect = $connect->fetch_AssocData();
        if ($rsconnect['student_password'] == $password) {
            //อย่าลืมเช็คสิทธิ์
            $result = [
                'status' => "ok",
                'role' => 'student',
                'data' => $rsconnect
            ];
        } else {
            $result = [
                'status' => "no",
                'msg' => "รหัสผู้ใช้งานss หรือ  รหัสผ่านไม่ถูกต้อง",
                "SELECT student_id as _id,student_name as _name,student_lastname as _lastname,student_code as _code,student_password FROM  student WHERE student_code ='" . $username . "'"
            ];
        }
    }
    else {
        #check ว่าเป็นบุคลใดที่ทำการ login
        $connect->sql = "SELECT user_id as _id, user_code as _code, 	user_password, 	user_name as _name,position_role FROM `user` as f1 	INNER JOIN 	position as f2 	ON f1.POSITION = f2.position_id WHERE user_code ='" . $username . "'";
        $connect->queryData();
        $row = $connect->num_rows();
        if ($row > 0) {
            $rsconnect = $connect->fetch_AssocData();
            if ($rsconnect['user_password'] == $password) {
                //อย่าลืมเช็คสิทธิ์
                $result = [
                    'status' => "ok",
                    'role' => $rsconnect['position_role'],
                    'data' => $rsconnect
                ];
            } else {
                $result = [
                    'status' => "no",
                    'msg' => "รหัสผู้ใช้งาน หรือ  รหัสผ่านไม่ถูกต้อง"
                ];
            }
        }

        
    }
    
    
    // else {
    //     $result = [
    //         'status' => "no",
    //         'msg' => "รหัสผู้ใช้งาน หรือ  รหัสผ่านไม่ถูกต้อง"
    //     ];
    // }
    $connect->closeConnect();
    echo json_encode($result);
}
?>