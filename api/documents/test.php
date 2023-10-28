<?php
header('Content-Type: application/json');
$data1 = [
    [
        "id" => "1",
        "id_student" => "6",
        "form_title" => "ทดสอบการสร้างเรื่อง",
        "student_code" => "M6113391",
        "major_name" => "01",
        "year_semester" => "2554",
        "year_study" => "2554",
        "telephone" => "karn.yonddg@meliveco",
        "email" => "098",
        "purpose" => "ดฟดหดห",
        "type_sector" => "แบบ 1.1",
        "edulevel" => "ปริญญาเอก",
        "semester" => "ภาคปกติ",
        "date_insert" => "2023-10-28 13:35:54"
    ],
    [
        "id" => "3",
        "id_student" => "6",
        "form_title" => "test 2",
        "student_code" => "M6113391",
        "major_name" => "01",
        "year_semester" => "2554",
        "year_study" => "2554",
        "telephone" => "karn.yonddg@meliveco",
        "email" => "098",
        "purpose" => "ddddddddd",
        "type_sector" => "แบบ 1.1",
        "edulevel" => "ปริญญาเอก",
        "semester" => "ภาคปกติ",
        "date_insert" => "2023-10-28 14:25:10"
    ]
];

$data2 = [
    [
        "id" => "1",
        "document_form" => "1",
        "id_approve" => "1",
        "role_approve" => "teacher",
        "comment_approve" => "",
        "status_approve" => "รอการอนุมัติ"
    ],
    [
        "id" => "4",
        "document_form" => "3",
        "id_approve" => "2",
        "role_approve" => "teacher",
        "comment_approve" => "",
        "status_approve" => "รอการอนุมัติ"
    ],
    [
        "id" => "5",
        "document_form" => "3",
        "id_approve" => "1",
        "role_approve" => "ประธานหลักสูตร",
        "comment_approve" => "",
        "status_approve" => "รอการอนุมัติ"
    ]
];


// สร้างอินเด็กซ์จาก $data2 โดยใช้ 'id' เป็นคีย์
// $index2 = [];
// foreach ($data2 as $item) {
//     $index2[$item['document_form']] = $item;
// }

// รวมข้อมูลจาก $data2 เข้ากับ $data1 โดยใช้ 'id' เป็นตัวระบุ
foreach ($data1 as &$item1) {
    $idToFind = $item1['id'];
    foreach ($data2 as $item2) {
        if ($item2['document_form'] == $idToFind) {
            $item1['data_approve'][] = $item2;
        }
    }
}

// พิมพ์ผลลัพธ์ที่เจอ
print_r($data1);

// พิมพ์ผลลัพธ์ทั้งอาร์เรย์หลักที่มีข้อมูล 'data_approve'
//echo json_encode($data1);

// {
//     "id": "3",
//     "id_student": "6",
//     "form_title": "test 2",
//     "student_code": "M6113391",
//     "major_name": "01",
//     "year_semester": "2554",
//     "year_study": "2554",
//     "telephone": "karn.yonddg@meliveco",
//     "email": "098",
//     "purpose": "ddddddddd",
//     "type_sector": "แบบ 1.1",
//     "edulevel": "ปริญญาเอก",
//     "semester": "ภาคปกติ",
//     "date_insert": "2023-10-28 14:25:10",
//     "data_approve": [
//         {
//             "id" => "4",
//             "document_form" => "3",
//             "id_approve" => "2",
//             "role_approve" => "teacher",
//             "comment_approve" => "",
//             "status_approve" => "รอการอนุมัติ"
//         },
//         {
//             "id": "5",
//             "document_form": "3",
//             "id_approve": "1",
//             "role_approve": "ประธานหลักสูตร",
//             "comment_approve": "",
//             "status_approve": "รอการอนุมัติ"
//         }
//     ]
       
    
//}
?>
