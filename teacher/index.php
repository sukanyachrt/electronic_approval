<?php

include('./../admin/header.php');

?>
<link rel="stylesheet" href="./../asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="./../asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="./../asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<style>
    .selected-card {
        background-color: #C3EEFA;

    }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">


        <?php
        include("./../admin/navbar.php")

        ?>

        <?php include('./../admin/sidebar_teacher.php') ?>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h5 class="m-0">เอกสารการยื่นของนักศึกษา</h5>
                        </div><!-- /.col -->

                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <section class="content">
                <div class="container-fluid">
                    <div class="row justify-content-center">

                        <a class="col-12 col-sm-6 col-md-3" style="cursor: pointer;" href="historydoc.php">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-solid fa-check"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">ประวัติการอนุมัติที่ผ่านมา</span>
                                    <span class="info-box-number" id="apr_historyApr">0</span>
                                </div>


                            </div>
                        </a>
                        <div class="col-12 col-sm-6 col-md-3" style="cursor: pointer;">
                            <div class="info-box mb-3 selected-card">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-solid fa-check"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">รอการอนุมัติ</span>
                                    <span class="info-box-number" id="apr_waitApr">0</span>
                                </div>


                            </div>
                        </div>




                    </div>
                    <div class="row">
                        <div class="col-12 mt-3">
                            <div class="card card-warning">
                                <div class="card-header">
                                    <h3 class="card-title text-bold text-white">
                                        รอการอนุมัติ
                                    </h3>
                                </div>
                                <div class="card-body">
                                    <table id="tb_approve_teacher" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>ไฟล์คำขอ</th>
                                                <th>เรื่อง</th>
                                                <th>ผู้ส่งคำขอ</th>
                                                <th>วันที่ยื่นคำขอ</th>
                                                <th>สถานะการอนุมัติ</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

        </div>
        <?php include("./../admin/footer.php") ?>

    </div>

    <?php include("./../admin/scripts.php") ?>
    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="invoice p-5 mb-3">
                    <form action="#" method="post" id="form_doc">
                        <div class="row content-right">
                            <div class="col-12">
                                <p align='right'>บ.01</p>
                            </div>
                        </div>
                        <div class="row -">
                            <div class="col-2 ">
                                <img src="./../asset/dist/img/rmutto-01.png" width="140px">
                            </div>
                            <div class="col-8"><br><br>

                                <h4 style="text-align:center;"><b>บัณฑิตศึกษา </b> </h4>
                                <h4 style="text-align:center;"> <b> มหาวิทยาลัยเทคโนโลยีราชมงคลตะวันออก </b></h4>
                                <h4 style="text-align:center;"> <b> คำร้องทั่วไป</b> </h4>
                            </div>
                            <div class="col-2">

                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-1">
                                <b><span for="inputSubject" class="col-sm-1 ">เรื่อง </span></b>
                            </div>
                            <div class="col-sm-11" style="border-bottom: 1px dashed; ">
                                <span name="general_form_title" id="divTitle">

                                </span>
                            </div>
                            <div class="col-1">
                                <b><span for="learn" class="col-sm-1">เรียน</span></b>
                            </div>
                            <div class="col-sm-11" style="border-bottom:  1px dashed black;">
                                <span for="learn" class="col-form-label">คณบดีสำนักวิชาวิศวกรรมศาสตร์และนวัตกรรม</span>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-1">
                                <span for="student_name" class="col-sm-1 ">ชื่อ</span>
                            </div>
                            <div class="col-sm-5" style="border-bottom: 1px dashed black;">
                                <span name="student_name" id="divFirstname">

                                </span>
                            </div>
                            <div class="col-1">
                                <span for="student_lastname" class="col-sm-1 col-form-label">นามสกุล</span>
                            </div>
                            <div class="col-sm-5" style="border-bottom: 1px dashed black;">
                                <span name="student_lastname" id="divLastname">

                                </span>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-2 ">
                                &nbsp;<span>นักศึกษาปริญญา</span>
                            </div>

                            <div class="col-2 ">
                                <input type="checkbox" class="radio" id="edulevel" onclick="Checkedulevel(this)" name="edulevel" value="ปริญญาเอก">
                                <span for="input-level-phd">&nbsp;เอก</span>
                            </div>

                            <div class="col-2 ">
                                <input type="checkbox" class="radio sector_doc" onclick="Checksector_doc(this)" id="sector_doc" name="sector_doc" value="แบบ 1.1">
                                <span for="input-level-phd1">&nbsp;แบบ 1.1 </span>
                            </div>

                            <div class="col-2 ">
                                <input type="checkbox" class="radio sector_doc" onclick="Checksector_doc(this)" id="sector_doc" name="sector_doc" value="แบบ 1.2">
                                <span for="input-level-phd2">&nbsp;แบบ 1.2</span>
                            </div>

                            <div class="col-2 ">
                                <input type="checkbox" class="radio sector_doc" onclick="Checksector_doc(this)" id="sector_doc" name="sector_doc" value="แบบ 2.1">
                                <span for="input-level-phd3">&nbsp;แบบ 2.1</span>
                            </div>

                            <div class="col-2 ">
                                <input type="checkbox" class="radio sector_doc" onclick="Checksector_doc(this)" id="sector_doc" name="sector_doc" value="แบบ 2.2">
                                <span for="input-level-phd4">&nbsp;แบบ 2.2</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-2 "></div>
                            <div class="col-2">
                                <input type="checkbox" class="radio" id="edulevel" onclick="Checkedulevel(this)" name="edulevel" value="ปริญญาโท">
                                <span for="input-level-ms">&nbsp;โท</span>
                            </div>
                            <div class="col-2 ">
                                <input type="checkbox" class="radio sector_master" onclick="Checksector_master(this)" id="sector_master" name="sector_master" value="แผน ก แบบ ก 1">
                                <span for="input-level-ms1">&nbsp;แผน ก แบบ ก 1</span>
                            </div>
                            <div class="col-2">
                                <input type="checkbox" class="radio sector_master" id="sector_master " onclick="Checksector_master(this)" name="sector_master" value="แบบ ก แบบ ก 2">
                                <span for="input-level-ms2">&nbsp;แผน ก แบบ ก 2</span>
                            </div>

                            <div class="col-2 ">
                                <input type="checkbox" class="radio sector_master" id="sector_master" onclick="Checksector_master(this)" name="sector_master" value="แผน ข">
                                <span for="input-level-ms3">&nbsp;แผน ข</span>
                            </div>

                            <div class="col-2 "></div>
                        </div>
                        <div class="row">
                            <div class="col-2"></div>
                            <div class="col-2 "></div>
                            <div class="col-2 ">
                                <input type="checkbox" id="semester" name="semester" onclick="Checksemester(this)" value="ภาคปกติ">
                                <span for="input-semeter-normal">&nbsp;ภาคปกติ</span>
                            </div>
                            <div class="col-3">
                                <input type="checkbox" id="semester" name="semester" onclick="Checksemester(this)" value="ภาคนอกเวลาราชการ">
                                <span for="input-semeter-os">&nbsp;ภาคนอกเวลาราชการ</span>
                            </div>
                            <div class="col-2 "> </div>
                            <div class="col-1 "></div>
                        </div>
                        <div class="form-group row">
                            <span for="id" class="col-sm-auto ">รหัสประจำตัว</span>
                            <div class="col-sm-2" style="border-bottom: 1px dashed black ;">
                                <span name="student_cod" id="divStudentcode">

                                </span>
                            </div>
                            <span for="major" class="col-sm-auto ">&nbsp;สาขาวิชา</span>
                            <div class="col-sm-4" style="border-bottom: 1px dashed black;">
                                <span name="major" id="divMajor">

                                </span>
                            </div>
                            <span for="major_id" class="col-sm-auto " style="text-align:right;">&emsp;&nbsp;&nbsp;&nbsp;(รหัสสาขา)</span>
                            <div class="col-sm-2" style="border-bottom: 1px dashed black;">
                                <span name="major_id" id="divNoMajor">

                                </span>
                            </div>
                            <span for="semeter" class="col-sm-auto">เข้าศึกษาตั้งแต่ภาคการศึกษา</span>
                            <div class="col-sm-1" style="border-bottom: 1px dashed black;">
                                <span name="general_form_semester" id="divYear_semester">

                                </span>
                            </div>
                            <span for="year" class="col-sm-auto" style="text-align:right;">&emsp;&emsp;ปีการศึกษา</span>
                            <div class="col-sm-1" style="border-bottom: 1px dashed black;">
                                <span name="general_form_year" id="divYear_study">&nbsp;&nbsp;

                                </span>
                            </div>
                            <span for="tell" class="col-sm-auto ">&emsp;&emsp;&emsp;&nbsp;เบอร์โทรศัพท์ที่สามารถติดต่อได้</span>
                            <div class="col-sm-2" style="border-bottom: 1px dashed black;">
                                <span name="tell" id="divPhone">

                                </span>
                            </div>
                            <span for="email" class="col-sm-1 ">Email</span>
                            <div class="col-sm-11" style="border-bottom: 1px dashed black;">
                                <span name="email" id="divEmail">

                                </span>
                            </div>
                            <span for="Message" class="col-sm-2 ">มีความประสงค์</span>
                            <div class="col-sm-10" style="border-bottom: 1px dashed black;">
                                <span name="general_form_opinion" id="divPurpose">

                                </span>
                            </div>
                            <div class="col-sm-12" style="border-bottom: 1px dashed black;"><br>
                                <span name="message" id="message"></span>
                            </div>
                            <div class="col-sm-12" style="border-bottom: 1px dashed black;"><br>
                                <span name="message" id="message"></span>
                            </div>
                            <div class="col-sm-12" style="border-bottom: 1px dashed black;"><br>
                                <span name="message" id="message"></span>
                            </div>
                            <span for="Message" class="col-sm-4 ">&emsp;&emsp;&emsp;จึงเรียนมาเพื่อโปรดพิจารณา</span>
                            <div class="col-sm-8">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5 col-md-6"></div>
                            <div class="col-7 col-md-6 text-center">
                                ลายมือชื่อนักศึกษา<span style="border-bottom: 1px dashed black;">
                                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;

                                    <img id="imageSign_student" src="" width="150px" height="50px" />
                                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7"></div>
                            <div class="col-1 text-right">
                                (
                            </div>
                            <div class="col-3 m-0 text-center" style="border-bottom: 1px dashed;width:100%;">

                                <span name="general_form_title" id="spanName_student">
                                </span>
                            </div>
                            <div class="col-1 p-0">
                                )
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-7"></div>
                            <div class="col-1"></div>
                            <div class="col-3 m-0 text-center" style="border-bottom: 1px dashed;width:100%;">
                                <span id="divDate_student">
                                    --- แสดงวันทีปัจจุบัน ----
                                </span>
                            </div>
                            <div class="col-1"></div>
                        </div>
                        <div class="row">
                            <div class="col-7">
                                ความเห็นอาจารย์ที่ปรึกษา
                            </div>
                            <div class="col-5">
                                ความเห็น ประธานคณะกรรมการบริหารหลักสูตร
                            </div>
                        </div>
                        <style>
                            .text_::after {
                                content: "\A-----------------------------------------------------------------\A-----------------------------------------------------------------\A-----------------------------------------------------------------";

                                white-space: pre;
                                position: relative;
                                top: -10px;
                                /* ปรับตำแหน่งเส้นประเพื่อให้อยู่เหนือข้อความ */
                                left: 0;
                                width: 100%;
                            }
                        </style>
                        <div class="row">
                            <div class="col-7">
                                <div class="col-5 comment_teacher_no">
                                    <div class="text_">
                                        <span id="divComment_teacher"> </span>
                                    </div>
                                </div>

                                <div class="col-7 comment_teacher">
                                    <textarea style="width: 100%;" name="approve_comment_teacher" id="approve_comment_teacher" class="textarea form-control" required></textarea>
                                </div>
                                <div class="col-2">
                                </div>
                            </div>

                            <div class="col-5">
                                <div class="col-12 comment_direct_no">
                                    <div class="text_">
                                        <span id="divComment_direct"> </span>
                                    </div>
                                </div>
                                <div class="col-12 comment_direct">
                                    <textarea style="width: 100%;" name="approve_comment_direct" id="approve_comment_direct" class="textarea form-control" required></textarea>


                                </div>


                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7">
                                <div class="row">
                                    <div class="col-7">
                                        ลงนาม<span style="text-align: left; border-bottom: 1px dashed black; width:100%">
                                            &emsp;&emsp;&emsp;&emsp;
                                            <img id="imageTeacher" src="" width="150px" height="50px" />
                                            &emsp;&emsp;&emsp;&emsp;
                                        </span>
                                    </div>
                                    <div class="col-5 text-left">

                                    </div>
                                </div>

                            </div>
                            <div class="col-5">
                                <div class="row">
                                    <div class="col-12 text-left imageDirect_no" style="text-align: left; border-bottom: 1px dashed black; width:100%">
                                        ลงนาม
                                    </div>
                                    <div class="col-12 text-left imageDirect">
                                        ลงนาม<span style="text-align: left; border-bottom: 1px dashed black;">
                                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;
                                            <img id="imageDirect" src="" width="150px" height="50px" />
                                            &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5 text-left">
                                <span>
                                    (--------------------<span id="spanName_teacher"></span>-------------------)

                                </span>
                            </div>
                            <div class="col-2">
                            </div>
                            <div class="col-5 text-left imageDirect_no">
                                &emsp;&emsp;&emsp;&emsp;(------------------------------------------------)
                            </div>
                            <div class="col-5 text-center imageDirect">
                                (-------------<span id="spanName_direct"></span>-------------)
                            </div>

                        </div>

                        <div class="row">
                            <div class="col-5">
                                <span style="text-align: left;">&emsp;&emsp;--------<span id="spanDate_teacher"></span>----------</span>
                            </div>
                            <div class="col-2">
                            </div>

                            <div class="col-5 text-center imageDirect_no">
                                <div class="row">
                                    <div class="col-md-2"></div>
                                    <div class="col-md-8 text-center" style="text-align: center;">
                                        ------------/-------------------/-----------------
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>


                            </div>
                            <div class="col-5 text-center imageDirect">
                                <div class="row">
                                    <div class="col-md-3"></div>
                                    <div class="col-md-6 text-center" style="text-align: center; border-bottom: 1px dashed black;">
                                        <span id="spanDate_direct"></span>
                                    </div>
                                    <div class="col-md-3"></div>
                                </div>

                            </div>

                        </div>
                        <div class="row">
                            <div class="col-5">
                                ความเห็นคณบดี
                            </div>
                            <div class="col-2">
                            </div>
                            <div class="col-5">

                            </div>
                        </div>
                        <div class="row">
                            <div class="col-5 comment_master_no">
                                <div class="text_">
                                    <span id="divComment_master"> </span>
                                </div>
                            </div>
                            <div class="col-5 comment_master">
                                <textarea rows="2" style="width: 80%;" name="approve_comment_master" id="approve_comment_master" class="textarea form-control" required></textarea>
                            </div>
                        </div>

                        <div class="row imageMaster_no">
                            <div class="col-7">
                                <span style="text-align:left;">ลงนาม</span>
                            </div>
                            <div class="col-5">
                            </div>
                        </div>
                        <div class="row imageMaster_no">
                            <div class="col-7">
                                <span style="text-align:left;">-----------------------------------------------------------</span>
                            </div>
                            <div class="col-5">
                            </div>
                        </div>
                        <div class="row imageMaster">
                            <div class="col-7">
                                ลงนาม<span style="text-align: left; border-bottom: 1px dashed black;">
                                    &emsp;&emsp;&emsp;&emsp;
                                    <img id="imageMaster" src="" width="150px" height="50px" />
                                    &emsp;&emsp;&emsp;&emsp;</span>
                            </div>
                            <div class="col-5">
                            </div>
                        </div>
                        <div class="row imageMaster">
                            <div class="col-5">
                                <span id="spanName_master"></span>
                            </div>
                            <div class="col-7">
                            </div>
                        </div>
                        <div class="row imageMaster_no">
                            <div class="col-5 text-left">
                                &emsp;<span id="spanName_master_no">(------------------------------------------------------)</span>
                            </div>
                            <div class="col-7">
                            </div>
                        </div>
                        <div class="row imageMaster">
                            <div class="col-3 text-center" style="text-align: left; border-bottom: 1px dashed black;">
                                &emsp;<span id="spanDate_master"></span>
                            </div>
                            <div class="col-9">

                            </div>
                        </div>
                        <div class="row imageMaster_no">
                            <div class="col-5 text-left">
                                &emsp; ----------------/---------------/-------------
                            </div>
                            <div class="col-7">

                            </div>
                        </div>



                        <div class="col-12 mt-5">
                            <div class="col-12" style="border-bottom: 1px solid black;">
                            </div>
                            <b>สำหรับเจ้าหน้าที่</b>
                            <div class="col-sm-12" style="border-bottom: 1px dashed black;"><br>
                                <span name="message1" id="message1"></span>
                            </div>
                            <div class="col-sm-12" style="border-bottom: 1px dashed black;"><br>
                                <span name="message1" id="message1"></span>
                            </div>
                            <br><br><br><br><br><br>


                            <div class="form-group row ">
                                <div class="col-12">
                                    <p style="text-align:right;">วันปรับปรุงแก้ไข 8 มีนาคม 2565</p>
                                </div>
                            </div>

                        </div>
                        <div class="row justify-content-end " style="padding: 10px;">
                            <div class="col-12">
                                <input type="hidden" id="btnId_doc" name="btnId_doc" value="">

                                <input type="hidden" id="btnRole_approve" name="role_approve" value="">
                                <button type="button" id="btnApprove_yes" value="" onclick="fnApprove('ไม่อนุมัติ')" class="btn btn-danger float-right" style="margin-right: 5px;">
                                    <i class="fas fa-window-close"></i> ไม่อนุมัติเอกสาร
                                </button>
                                <button type="button" value="" onclick="fnApprove('อนุมัติ')" class="btn btn-success float-right" style="margin-right: 5px;">
                                    <i class="fas fa-check"></i>อนุมัติเอกสาร
                                </button>
                            </div>

                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</body>
<script src="./../asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="./../admin/changepage.js"></script>
<script src="./../asset/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="./../asset/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="./../asset/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="./../asset/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="./../asset/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="./../asset/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="./../asset/plugins/jszip/jszip.min.js"></script>
<script src="./../asset/plugins/pdfmake/pdfmake.min.js"></script>
<script src="./../asset/plugins/pdfmake/vfs_fonts.js"></script>
<script src="./../asset/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="./../asset/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="./../asset/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<script>
    $(function() {
        loadData();
        CountStatus()
    });

    function CountStatus() {
        $.ajax({
            url: "./../api/documents/status_doc.php?v=countStatusApr",
            type: "GET",
            success: function(Res) {
                console.log(Res);
                $.each(Res, function(index, item) {
                    if (item.status_approve == "รอการอนุมัติ") {
                        $('#apr_waitApr').text(item.numrow + " รายการ")

                    } else {
                        $('#apr_historyApr').text(item.numrow + " รายการ")
                    }
                });
            }
        });
    }

    function loadData() {
        $.ajax({
            url: "./../api/documents/approve_doc.php?v=checkapprove",
            type: "GET",
            dataType: "json",
            success: function(Res) {
                console.log(Res);
                $('#tb_approve_teacher tbody').html('');
                $.each(Res, function(index, item) {
                    $("#tb_approve_teacher").append('<tr>' +
                        '<td style="vertical-align: middle;"><button  onclick="modalDocShow(' + item.id + ',' + item.document_form + ')" type="button" class="badge badge badge-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Preview</button></td>' +
                        '<td style="vertical-align: middle;">' + item.form_title + '</td>' +
                        '<td style="vertical-align: middle;">' + item.fullname + '</td>' +
                        '<td style="vertical-align: middle;">' + item.date_insert + '</td>' +
                        '<td style="vertical-align: middle;"><span class="badge badge-warning">' + item.status_approve + '</span></td>' +
                        '</tr>');
                });
            },
            error: function(xhr, status, error) {
                console.log("Error: " + error);
            }
        });
    }




    function fnApprove(status) {
        var textareaValues = $(".textarea.form-control").map(function() {
            if ($(this).val() != "") {
                console.log($(this).val())
                return $(this).val();
            }

        }).get();

        if (status == "ไม่อนุมัติ" && textareaValues.length == 0) {

            alert("โปรดแสดงความเห็นถึงเหตุผลที่ไม่ทำการอนุมัติ")


        } else {
            var role_approve = $('#btnRole_approve').val();
            var id = $('#btnApprove_yes').val();
            var idDoc = $('#btnId_doc').val()

            let data = {
                "status": status,
                "id": id,
                "idDoc": idDoc,
                "comment": textareaValues[0] || "",
                "role_approve": role_approve
            }
            console.log(data)
            $.ajax({
                url: "./../api/documents/approve_doc.php?v=approvebyid",
                type: "POST",
                data: data,
                success: function(Res) {
                    CountStatus();
                    if (Res.status == "ok") {

                        loadData();
                        $('.modal.fade.bd-example-modal-xl').modal('hide');
                    } else {
                        alert(Res.msg);
                    }
                }
            });
        }
    }

    function modalDocShow(idApr, idDoc) {
        $('#btnApprove_yes').val(idApr);
        $('#btnId_doc').val(idDoc)
        $.ajax({
            url: `./../api/documents/approve_doc.php?v=dataDoc&idDoc=${idDoc}`, // Replace with the URL of your data source
            type: "GET",
            dataType: "json",
            success: function(Res) {
                // console.log(Res)
                //#region  Res[0] ข้อมูล doc
                var datadoc = Res[0];
                $('#divTitle').text(datadoc.form_title)
                $('#divFirstname').text(`${datadoc.student_name}`);
                $('#divLastname').text(`${datadoc.student_lastname}`);

                $('#edulevel[value="' + datadoc.edulevel + '"]').prop('checked', true);
                $('#sector_doc[value="' + datadoc.type_sector + '"]').prop('checked', true);
                $('#sector_master[value="' + datadoc.type_sector + '"]').prop('checked', true);
                $('#semester[value="' + datadoc.semester + '"]').prop('checked', true);

                $('#divStudentcode').text(datadoc.doc_studentcode);
                $('#divMajor').text(datadoc.name_major);
                $('#divNoMajor').text(datadoc.major_name);
                $('#divYear_semester').text(datadoc.year_semester);
                $('#divYear_study').text(datadoc.year_study);
                $('#divPhone').text(datadoc.telephone);
                $('#divEmail').text(datadoc.email);
                $('#divPurpose').text(datadoc.purpose);
                $("#imageSign_student").attr("src", "data:image/jpeg;base64," + datadoc.image_sign);

                $('#spanName_student').text(`${datadoc.student_name} ${datadoc.student_lastname}`);
                $('#divDate_student').text(datadoc.date_insert);

                //#region  Res[1] ข้อมูล ผู้อนุมัติต่างๆ

                var dataApr = Res[1];

                //#region ประธาน
                $('.imageDirect_no').show();
                $('.imageDirect').hide();

                //#region  คณะบดี
                $('.imageMaster').hide();
                $('.imageMaster_no').show();

                //#region  comment_approve
                $('.comment_teacher_no').show();
                $('.comment_direct_no').show();
                $('.comment_master_no').show();

                $('.comment_teacher').hide();
                $('.comment_direct').hide();
                $('.comment_master').hide();




                $.each(dataApr, function(index, item) {
                    if (item.role_approve == "อาจารย์") {
                        $('.comment_teacher_no').show();
                        $("#imageTeacher").attr("src", "data:image/jpeg;base64," + item.image_sign);
                        $('#spanName_teacher').text(`${item.user_name}`);
                        if (item.date_approve == null) {
                            $('#spanDate_teacher').text(`-`);
                        } else {
                            $('#spanDate_teacher').text(`${item.date_approve}`);
                        }

                        $('#divComment_teacher').text(`${item.comment_approve}`)
                    }

                    if (item.role_approve == "ประธานหลักสูตร") {

                        $('.comment_direct_no').show();
                        //   $('#approve_comment_direct').text(item.comment_approve)

                        $('.imageDirect_no').hide();
                        $('.imageDirect').show();

                        $("#imageDirect").attr("src", "data:image/jpeg;base64," + item.image_sign);
                        $('#spanName_direct').text(`${item.user_name}`);
                        if (item.date_approve == null) {
                            $('#spanDate_direct').text(`-`);
                        } else {
                            $('#spanDate_direct').text(`${item.date_approve}`);
                        }
                        $('#divComment_direct').text(`${item.comment_approve}`)
                    }

                    if (item.role_approve == "คณบดี") {

                        $('.comment_master_no').show();
                        // $('#approve_comment_master').text(item.comment_approve)


                        $('.imageMaster').show();
                        $('.imageMaster_no').hide();
                        $("#imageMaster").attr("src", "data:image/jpeg;base64," + item.image_sign);

                        $('#spanName_master').text(`(----------------------${item.user_name}----------------------)`);
                        $('#spanDate_master').text(`----------${item.date_approve}-----------`);

                        if (item.date_approve == null) {
                            $('#spanDate_master').text(`-`);
                        } else {
                            $('#spanDate_master').text(`${item.date_approve}`);
                        }
                    }


                    if (index === (dataApr.length) - 1) {
                        $('#btnRole_approve').val(item.role_approve)
                        if (item.role_approve === "อาจารย์") {
                            $('.comment_teacher_no').hide();
                            $('.comment_teacher').show();
                        } else if (item.role_approve === "ประธานหลักสูตร") {
                            $('.comment_direct_no').hide();
                            $('.comment_direct').show();
                        } else if (item.role_approve === "คณบดี") {
                            $('.comment_master_no').hide();
                            $('.comment_master').show();
                        }

                    }


                });
            }
        });

    }
</script>

</html>