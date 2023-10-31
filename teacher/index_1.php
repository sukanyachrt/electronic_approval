<?php

include('./../admin/header.php');

?>
<link rel="stylesheet" href="./../asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="./../asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="./../asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">


        <?php
        include("./../admin/navbar.php")

        ?>

        <?php include('./../admin/sidebar_teacher.php') ?>

        <div class="content-wrapper">

            <section class="content ">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">

                        <div class="col-12 mt-3">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title text-bold">รอการอนุมัติ</h3>
                                </div>
                                <!-- /.card-header -->
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
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->

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
                <div class="invoice p-3 mb-3">
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
                        <div style="border:1px solid black;padding:10px;margin:5px;">
                            <div class="form-group row">
                                <div class="col-1">
                                    <span for="general_form_title" class="col-sm-1 col-form-label"><b>เรื่อง</b></span>
                                </div>
                                <div class="col-sm-11">

                                    <span for="learn" class="col-form-label" id="divTitle">
                                        -- แสดงหัวเรื่อง --
                                    </span>

                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-1">
                                    <b><span for="learn" class="col-sm-1 col-form-label">เรียน</span></b>
                                </div>
                                <div class="col-sm-11">
                                    <span for="learn" class="col-form-label">คณบดีสำนักวิชาวิศวกรรมศาสตร์และนวัตกรรม</span>
                                </div>
                            </div>
                        </div>

                        <div style="border:1px solid black;padding:10px;margin:5px;">
                            <div class="form-group row">
                                <div class="col-1">
                                    <span for="name" class="col-sm-1 col-form-label">ชื่อ </span>
                                </div>
                                <div class="col-sm-5" id="divFirstname">
                                    -- แสดงชื่อ --
                                </div>
                                <div class="col-1">
                                    <span for="lname" class="col-sm-1 col-form-label">
                                        นามสกุล
                                        </sapn>
                                </div>
                                <div class="col-sm-5" id="divLastname">
                                    -- แสดงนามสกุล --
                                </div>
                            </div>
                            <!-- /.col -->

                            <!-- info row -->
                            <div class="row">
                                <div class="col-2 ">
                                    <span>นักศึกษาปริญญา</span>
                                </div>

                                <div class="col-2 ">
                                    <input type="checkbox" class="radio" id="edulevel" onclick="Checkedulevel(this)" name="edulevel" value="ปริญญาเอก">
                                    <span for="PhD">ปริญญาเอก</span>
                                </div>

                                <div class="col-2 ">
                                    <input type="checkbox" class="radio sector_doc" onclick="Checksector_doc(this)" id="sector_doc" name="sector_doc" value="แบบ 1.1">
                                    <span for="Phd_form">แบบ 1.1 </span>
                                </div>

                                <div class="col-2 ">
                                    <input type="checkbox" class="radio sector_doc" onclick="Checksector_doc(this)" id="sector_doc" name="sector_doc" value="แบบ 1.2">
                                    <span for="Phd_form">แบบ 1.2</span>
                                </div>

                                <div class="col-2 ">
                                    <input type="checkbox" class="radio sector_doc" onclick="Checksector_doc(this)" id="sector_doc" name="sector_doc" value="แบบ 2.1">
                                    <span for="Phd_form">แบบ 2.1</span>
                                </div>

                                <div class="col-2 ">
                                    <input type="checkbox" class="radio sector_doc" onclick="Checksector_doc(this)" id="sector_doc" name="sector_doc" value="แบบ 2.2">
                                    <span for="Phd_form">แบบ 2.2</span>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-2 "></div>

                                <div class="col-2">
                                    <input type="checkbox" class="radio" id="edulevel" onclick="Checkedulevel(this)" name="edulevel" value="ปริญญาโท">
                                    <span for="ms">ปริญญาโท</span>
                                </div>

                                <div class="col-2 ">
                                    <input type="checkbox" class="radio sector_master" onclick="Checksector_master(this)" id="sector_master" name="sector_master" value="แผน ก แบบ ก 1">
                                    <span for="form_ms">แผน ก แบบ ก 1</span>
                                </div>

                                <div class="col-2">
                                    <input type="checkbox" class="radio sector_master" id="sector_master " onclick="Checksector_master(this)" name="sector_master" value="แบบ ก แบบ ก 2">
                                    <span for="form_ms">แบบ ก แบบ ก 2</span>
                                </div>

                                <div class="col-2 ">
                                    <input type="checkbox" class="radio sector_master" id="sector_master" onclick="Checksector_master(this)" name="sector_master" value="แผน ข">
                                    <span for="form_ms">แผน ข</span>
                                </div>

                                <div class="col-2 "></div>
                            </div>


                            <div class="row">
                                <div class="col-2"> </div>
                                <div class="col-2 "> </div>
                                <div class="col-2 ">
                                    <input type="checkbox" id="semester" name="semester" onclick="Checksemester(this)" value="ภาคปกติ">
                                    <span for="normal">ภาคปกติ</span>
                                </div>

                                <div class="col-4">
                                    <input type="checkbox" id="semester" name="semester" onclick="Checksemester(this)" value="ภาคนอกเวลาราชการ">
                                    <span for="os">ภาคนอกเวลาราชการ</span>
                                </div>

                                <div class="col-1 "> </div>
                                <div class="col-1 "></div>
                            </div>

                            <div class="form-group row">
                                <span for="id" class="col-sm-2 col-form-label">รหัสประจำตัว</span>
                                <div class="col-sm-3 col-form-label" id="divStudentcode">
                                    --- แสดงรหัสประจำตัว ---
                                </div>
                                <span for="major" class="col-sm-1 col-form-label">สาขาวิชา</span>
                                <div class="col-sm-3 col-form-label" id="divMajor">
                                    --- แสดงสาขาวิชา ---
                                </div>
                                <span for="major_id" class="col-sm-1 col-form-label">(รหัสสาขา)</span>
                                <div class="col-sm-2 col-form-label" id="divNoMajor">
                                    --- แสดงรหัสสาขา ---
                                </div>
                            </div>



                            <div class="form-group row">
                                <span for="semeter" class="col-sm-3 col-form-label">เข้าศึกษาตั้งแต่ภาคการศึกษา</span>
                                <div class="col-sm-1 col-form-label" id="divYear_semester">
                                    --- 2554 ---
                                </div>
                                <span for="year" class="col-sm-2 col-form-label">ปีการศึกษา</span>
                                <div class="col-sm-1 col-form-label" id="divYear_study">
                                    --- 2555 ---
                                </div>
                                <span for="tell" class="col-sm-3 col-form-label">เบอร์โทรศัพท์ที่สามารถติดต่อได้</span>
                                <div class="col-sm-2 col-form-label" id="divPhone">
                                    --- 0987 ---
                                </div>
                            </div>
                        </div>
                        <div style="border:1px solid black; padding:10px;margin:5px;">
                            <div class="form-group row">
                                <span for="email" class="col-sm-2 col-form-label">Email</span>
                                <div class="col-sm-10" id="divEmail">
                                    --- แสดง email ---
                                </div>
                            </div>


                            <div class="form-group row">
                                <span for="Message" class="col-sm-2 col-form-label">มีความประสงค์</span>
                                <div class="col-sm-10" id="divPurpose">
                                    --- แสดง มีความประสงค์ ---

                                </div>
                            </div>
                        </div>


                        <p>จึงเรียนมาเพื่อโปรดพิจารณา </p></span>
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
                            <div class="col-5">
                                &emsp;&emsp;&emsp;&emsp;&emsp;<span style="text-align:right;">
                                    (<span style="border-bottom: 1px dashed black;">
                                        &emsp;&emsp;&emsp;&emsp;
                                        <span id="spanName_student">
                                            -- แสดงชื่อนักศึกษา --
                                        </span>



                                        &emsp;&emsp;&emsp;&emsp;
                                    </span>)
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7"></div>
                            <div class="col-5 text-center">
                                <span id="divDate_student" style="display: inline-block; width: 50%; border-bottom: 1px dashed black;">
                                    --- แสดงวันทีปัจจุบัน ----
                                </span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6 comment_teacher_no">
                                <p style="text-align: left;"><b>ความเห็นอาจารย์ที่ปรึกษา</b></p>
                            </div>
                            <div class="col-6 text-left comment_direct">
                                <b><span style="text-align: left;">ความเห็น ประธานคณะกรรมการบริหารสูตร</span></b>
                            </div>
                        </div>
                        <style>
                            .text_::after {
                                content: "-----------------------------------------------------------------\A-----------------------------------------------------------------\A-----------------------------------------------------------------";
                                white-space: pre;
                                position: absolute;
                                top: 10px;
                                /* ปรับตำแหน่งเส้นประเพื่อให้อยู่ใต้ข้อความ */
                                left: 0;
                                width: 100%;
                                padding: 0;
                                margin: 0;
                            }
                        </style>
                        <div class="row">
                            <div class="col-6 comment_teacher_no">
                                 <div class="text_">
                                    <span id="divComment_teacher"> </span>
                                </div>
                            </div>

                            <div class="col-6 comment_teacher">
                                <b><span style="text-align: left;">ความเห็นอาจารย์ที่ปรึกษา</span></b>
                                <textarea rows="2" style="width: 80%;" name="approve_comment_teacher" id="approve_comment_teacher" class="textarea form-control" required></textarea>
                            </div>
                            <div class="col-6 text-left comment_direct">
                                
                                <textarea rows="2" style="width: 80%;" name="approve_comment_direct" id="approve_comment_direct" class="textarea form-control" required></textarea>
                            </div>
                             <div class="col-6 text-left comment_direct_no">
                                <b><span style="text-align: left;">ความเห็น ประธานคณะกรรมการบริหารสูตร</span></b>
                                <div>&emsp;&emsp;-------------------------------------------------------</div>
                                <div>&emsp;&emsp;-------------------------------------------------------</div>
                                <div>&emsp;&emsp;-------------------------------------------------------</div>

                            </div> 
                        </div>
                        <div class="row">
                            <div class="col-6 text-left">
                                ลงนาม<span style="text-align: left; border-bottom: 1px dashed black;">
                                    &emsp;&emsp;&emsp;&emsp;
                                    <img id="imageTeacher" src="" width="150px" height="50px" />
                                    &emsp;&emsp;&emsp;&emsp;</span>
                            </div>
                            <div class="col-6 text-left imageDirect_no" style="padding-top: 20px;">
                                ลงนาม-------------------------------------------------------
                            </div>
                            <div class="col-6 text-left imageDirect">
                                &emsp;&emsp;&emsp; ลงนาม<span style="text-align: left; border-bottom: 1px dashed black;">
                                    &emsp;&emsp;&emsp;&emsp;
                                    <img id="imageDirect" src="" width="150px" height="50px" />
                                    &emsp;&emsp;&emsp;&emsp;</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-7 col-6 text-left">
                                <span>
                                    (--------------------<span id="spanName_teacher"></span>-------------------)

                                </span>
                            </div>
                            <div class="col-5 text-left imageDirect_no">
                                &emsp;&emsp;&emsp;&emsp;(------------------------------------------------)
                            </div>
                            <div class="col-5 text-left imageDirect">
                                (-------------<span id="spanName_direct"></span>-------------)
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-7">
                                <span style="text-align: left;">&emsp;&emsp;--------<span id="spanDate_teacher"></span>----------</span>
                            </div>
                            <!-- <div class="col-5">
                                <span>&emsp;&emsp;--------<span id="spanDate_direct"></span>----------</span>
                            </div> -->
                            <div class="col-5 text-left imageDirect_no">
                                &emsp;&emsp;&emsp;&emsp;------------/-------------------/-----------------
                            </div>
                            <div class="col-5 text-left imageDirect">
                                <span>&emsp;&emsp;--------<span id="spanDate_direct"></span>----------</span>
                            </div>


                        </div>
                        <div class="row">
                            <div class="col-7">
                                <span style="text-align: left;">ความเห็นคณบดี</span>
                            </div>
                            <div class="col-5">
                            </div>
                        </div>
                       

                        <div class="row comment_master">
                            <div class="col-7">
                                <textarea rows="2" style="width: 80%;" name="approve_comment_master" id="approve_comment_master" class="textarea form-control" required></textarea>
                            </div>

                            <div class="col-5">
                            </div>
                        </div>
                        <div class="row comment_master_no">

                            <div class="col-7">
                                <span style="text-align:left;">-----------------------------------------------------------</span>
                            </div>
                            <div class="col-5">
                            </div>
                        </div>
                        <div class="row comment_master_no">

                            <div class="col-7">
                                <span style="text-align:left;">-----------------------------------------------------------</span>
                            </div>
                            <div class="col-5">
                            </div>
                        </div>
                        <div class="row comment_master_no">

                            <div class="col-7">
                                <span style="text-align:left;">-----------------------------------------------------------</span>
                            </div>
                            <div class="col-5">
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
                        <div class="form-group row ">

                            <div class="col-8 imageMaster">
                                ลงนาม<span style="text-align: left; border-bottom: 1px dashed black;">
                                    &emsp;&emsp;&emsp;&emsp;
                                    <img id="imageMaster" src="" width="150px" height="50px" />
                                    &emsp;&emsp;&emsp;&emsp;</span>
                            </div>
                            <div class="col-8 imageMaster_no">
                                <span>
                                    &emsp;<span id="spanName_master_no">(------------------------------------------------------)</span>

                                </span>
                            </div>
                            <div class="col-8 imageMaster">
                                <span>
                                    &emsp;
                                    <span id="spanName_master"></span>

                                </span>
                            </div>
                            <div class="col-8 imageMaster_no">
                                <span style="text-align: left;">&emsp;&emsp;<span id="spanDate_master_no">----------------/---------------/-------------</span>
                                    &emsp;&emsp;
                            </div>
                            <div class="col-8 imageMaster">
                                <span style="text-align: left;">&emsp;&emsp;
                                    <span id="spanDate_master"></span>
                                    &emsp;&emsp;
                            </div>
                        </div>
                        <div class="col-12">
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
                        <input type="hidden" id="btnId_doc" name="btnId_doc" value="">

                        <input type="hidden" id="btnRole_approve" name="role_approve" value="">
                        <button type="button" id="btnApprove_yes" value="" onclick="fnApprove('ไม่อนุมัติ')" class="btn btn-danger float-right" style="margin-right: 5px;">
                            <i class="fas fa-window-close"></i> ไม่อนุมัติเอกสาร
                        </button>
                        <button type="button" value="" onclick="fnApprove('อนุมัติ')" class="btn btn-success float-right" style="margin-right: 5px;">
                            <i class="fas fa-check"></i>อนุมัติเอกสาร
                        </button>

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
    loadData();

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
            $.ajax({
                url: "./../api/documents/approve_doc.php?v=approvebyid",
                type: "POST",
                data: data,
                success: function(Res) {
                    console.log(Res)
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
                      //  $('#approve_comment_teacher').text(item.comment_approve)
                        $("#imageTeacher").attr("src", "data:image/jpeg;base64," + item.image_sign);
                        $('#spanName_teacher').text(`${item.user_name}`);
                        $('#spanDate_teacher').text(`${item.date_approve}`);
                        $('#divComment_teacher').text(`${item.comment_approve}`)
                    }

                    if (item.role_approve == "ประธานหลักสูตร") {

                        $('.comment_direct_no').show();
                     //   $('#approve_comment_direct').text(item.comment_approve)

                        $('.imageDirect_no').hide();
                        $('.imageDirect').show();

                        $("#imageDirect").attr("src", "data:image/jpeg;base64," + item.image_sign);
                        $('#spanName_direct').text(`${item.user_name}`);
                        $('#spanDate_direct').text(`${item.date_approve}`);
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

                    }


                    if (index === (dataApr.length) - 1) {
                        $('#btnRole_approve').val(item.role_approve)
                        if (item.role_approve === "อาจารย์") {
                            $('.comment_teacher_no').hide();
                            $('.comment_teacher').show();
                        } else if (item.role_approve === "ประธานหลักสูตร") {
                            $('.comment_direct_no').hide();
                            $('.comment_direct').show();
                        }

                        else if (item.role_approve === "คณบดี") {
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