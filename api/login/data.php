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

    $connect->sql = "SELECT * FROM  student WHERE student_code ='" . $username . "'";
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
                'msg' => "รหัสผู้ใช้งาน หรือ  รหัสผ่านไม่ถูกต้อง"
            ];
        }
       
    }
    else{
        $result = [
            'status' => "no",
            'msg' => "รหัสผู้ใช้งาน หรือ  รหัสผ่านไม่ถูกต้อง"
        ];
    }
    $connect->closeConnect();
    echo json_encode($result);
}

?>
