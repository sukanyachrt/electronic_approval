<?php

include('./../manage/header.php');

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
        include("./../manage/navbar.php")

        ?>

        <?php include('./../manage/sidebar.php') ?>

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

                        <a class="col-12 col-sm-6 col-md-3 " style="cursor: pointer;">
                            <div class="info-box mb-3 selected-card">
                                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-solid fa-check"></i></span>

                                <div class="info-box-content ">
                                    <span class="info-box-text">ประวัติการอนุมัติที่ผ่านมา</span>
                                    <span class="info-box-number" id="apr_historyApr">0</span>
                                </div>


                            </div>
                        </a>
                        <a class="col-12 col-sm-6 col-md-3" style="cursor: pointer;" href="./../<?php echo $_SESSION['_role'] ?>">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-solid fa-check"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">รอการอนุมัติ</span>
                                    <span class="info-box-number" id="apr_waitApr">0</span>
                                </div>


                            </div>
                        </a>




                    </div>
                    <div class="row">
                        <div class="col-12 mt-3">
                            <!-- DIRECT CHAT PRIMARY -->
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title"><b>ประวัติการอนุมัติที่ผ่านมา</b></h3>
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 300px;">
                                            <input type="text" id="searchInput" class="form-control float-right" placeholder="ค้นหาข้อมูล">


                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>

                                        </div>
                                    </div>
                                </div>
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table m-0" id="tbHistory_doc">
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
                </div>
            </section>

        </div>
        <?php include("./../manage/footer.php") ?>

    </div>

    <?php include("./../manage/scripts.php") ?>
    <div class="modal fade bd-example-modal-xl" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="invoice p-3 my-2">
                    <div style=" margin-left:50px; margin-right:55px;">
                        <div class="row content-right">
                            <div class="col-12" align="right"><br>บ.01</div>
                        </div>
                        <div class="row -">
                            <div class="col-2">
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
                        <div class="row">
                            <div class="col-1">
                                <b><span for="inputSubject" class="col-sm-1 ">เรื่อง </span></b>
                            </div>
                            <div class="col-sm-11" style="border-bottom: 1px dashed; ">
                                <span name="divTitle" id="divTitle">

                                </span>
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-1">
                                <b><span for="learn" class="col-sm-1">เรียน</span></b>
                            </div>
                            <div class="col-sm-11" style="border-bottom:  1px dashed black;">
                                <span for="learn" class="col-form-label">คณบดีสำนักวิชาวิศวกรรมศาสตร์และนวัตกรรม</span>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-1">
                                <span for="student_name" class="col-sm-1 ">ชื่อ</span>
                            </div>
                            <div class="col-sm-5" style="border-bottom: 1px dashed black;">
                                <span name="divFirstname" id="divFirstname"></span>
                            </div>
                            <div class="col-1">
                                <span for="student_lastname" class="col-sm-1 col-form-label">นามสกุล</span>
                            </div>
                            <div class="col-sm-5" style="border-bottom: 1px dashed black;">
                                <span name="divLastname" id="divLastname"></span>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-2 ">
                                <span for="student_name" class="col-sm-2">นักศึกษาปริญญา</span>
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

                        <div class="row mt-2">
                            <span for="id" class="col-sm-auto">รหัสประจำตัว</span>
                            <div class="col-sm-2" style="border-bottom: 1px dashed black;">
                                <span name="divStudentcode" id="divStudentcode"></span>
                            </div>
                            <span for="major" class="col-sm-auto ">&nbsp;สาขาวิชา</span>
                            <div class="col-sm-4" style="border-bottom: 1px dashed black;">
                                <span name="divMajor" id="divMajor"></span>
                            </div>
                            <span for="major_id" class="col-sm-auto " style="text-align:right;">(รหัสสาขา)</span>
                            <div class="col-sm-2" style="border-bottom: 1px dashed black;">
                                <span name="divNoMajor" id="divNoMajor"></span>
                            </div>
                            <span for="semeter" class="col-sm-auto">เข้าศึกษาตั้งแต่ภาคการศึกษา</span>
                            <div class="col-sm-1" style="border-bottom: 1px dashed black;">
                                <span name="divYear_semester" id="divYear_semester"></span>
                            </div>
                            <span for="year" class="col-sm-auto" style="text-align:right;">&emsp;&emsp;ปีการศึกษา</span>
                            <div class="col-sm-1" style="border-bottom: 1px dashed black;">
                                <span name="divYear_study" id="divYear_study">&nbsp;&nbsp;</span>
                            </div>
                            <span for="tell" class="col-sm-auto ">&emsp;&nbsp;เบอร์โทรศัพท์ที่สามารถติดต่อได้</span>
                            <div class="col-sm-2" style="border-bottom: 1px dashed black;">
                                <span name="divPhone" id="divPhone"></span>
                            </div>
                            <span for="email" class="col-sm-1 ">Email</span>
                            <div class="col-sm-11" style="border-bottom: 1px dashed black;">
                                <span name="divEmail" id="divEmail"></span>
                            </div>
                            <span for="Message" class="col-sm-2 ">มีความประสงค์</span>
                            <div class="col-sm-10" style="border-bottom: 1px dashed black;">
                                <span name="divPurpose" id="divPurpose"></span>
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

                        <div class="form-group row" style="align-items: flex-end;">
                            <div class="col-5">
                            </div>
                            <div class="col-2 text-right" style="align-items:center;">
                                ลายมือชื่อนักศึกษา
                            </div>
                            <div class="col-5 text-center" style="display: flex;">
                                <span style="border-bottom: 1px dashed black; width: 100%;">
                                    <img id="imageSign_student" src="./../api/images/nosign.png" style="margin-bottom: -10px;" width="150px" height="60px" />
                                </span>
                            </div>
                        </div>
                        <div class="row" style="align-items: flex-end;">
                            <div class="col-5">
                            </div>
                            <div class="col-3 text-right" style="align-items:center;">
                                (
                            </div>
                            <div class="col-3 text-center" style="border-bottom: 1px dashed black; width: 100%;">
                                <span id="spanName_student"></span>
                            </div>
                            <div class="col-1 text-left" style="align-items:center;">
                                )
                            </div>
                        </div>
                        <div class="row" style="align-items: flex-end;">
                            <div class="col-5">
                            </div>
                            <div class="col-3 text-right" style="align-items:center;">

                            </div>
                            <div class="col-3 text-center" style="border-bottom: 1px dashed black; width: 100%;">
                                <span id="divDate_student"></span>
                            </div>
                            <div class="col-1 text-left" style="align-items:center;">

                            </div>
                        </div>
                        <div class="row mt-2" style="align-items: flex-end;">
                            <div class="col-7">
                                ความเห็นอาจารย์ที่ปรึกษา
                            </div>
                            <div class="col-5">
                                ความเห็น ประธานคณะกรรมการบริหารหลักสูตร
                            </div>

                        </div>
                        <div class="row mt-2" style="align-items: flex-end;">
                            <div class="col-6" style="border-bottom: 1px dashed black; width: 100%;">
                                <span id="divComment_teacher"></span>
                            </div>
                            <div class="col-1">

                            </div>
                            <div class="col-5" style="border-bottom: 1px dashed black; width: 100%;">
                                <span id="divComment_master"></span>
                            </div>

                        </div>
                        <div class="row" style="align-items: flex-end;">
                            <div class="col-6" style="border-bottom: 1px dashed black; width: 100%;">
                                <br />
                            </div>
                            <div class="col-1">

                            </div>
                            <div class="col-5" style="border-bottom: 1px dashed black; width: 100%;">

                            </div>

                        </div>
                        <div class="row" style="align-items: flex-end;">
                            <div class="col-6" style="border-bottom: 1px dashed black; width: 100%;">
                                <br />
                            </div>
                            <div class="col-1">

                            </div>
                            <div class="col-5" style="border-bottom: 1px dashed black; width: 100%;">

                            </div>

                        </div>

                        <div class="row" style="align-items: flex-end;">
                            <div class="col-1 text-left p-0 m-0" style="align-items:center;">
                                ลงนาม
                            </div>
                            <div class="col-5 text-center" style="display: flex;">
                                <span style="border-bottom: 1px dashed black; width: 100%;">
                                    <img id="imageTeacher" src="./../api/images/nosign.png" style="margin-bottom: -10px;" width="150px" height="60px" />
                                </span>
                            </div>
                            <div class="col-1">

                            </div>
                            <div class="col-1 text-left p-0 m-0" style="align-items:center;">
                                ลงนาม
                            </div>
                            <div class="col-4 text-center" style="display: flex;">
                                <span style="border-bottom: 1px dashed black; width: 100%;">
                                    <img id="imageMaster" src="./../api/images/nosign.png" style="margin-bottom: -10px;" width="150px" height="60px" />
                                </span>
                            </div>

                        </div>
                        <div class="row" style="align-items: flex-end;">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-2 text-right" style="align-items:center;">
                                        (
                                    </div>
                                    <div class="col-9 text-center" style="border-bottom: 1px dashed black; width: 100%;">
                                        <span id="spanName_teacher">-</span>
                                    </div>
                                    <div class="col-1 text-left" style="align-items:center;">
                                        )
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">

                            </div>
                            <div class="col-5">
                                <div class="row">
                                    <div class="col-2 text-right" style="align-items:center;">
                                        (
                                    </div>
                                    <div class="col-9 text-center" style="border-bottom: 1px dashed black; width: 100%;">
                                        <span id="spanName_master">-</span>
                                    </div>
                                    <div class="col-1 text-left" style="align-items:center;">
                                        )
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-2 text-right" style="align-items:center;">

                                    </div>
                                    <div class="col-9 text-center" style="border-bottom: 1px dashed black; width: 100%;">
                                        <span id="spanDate_teacher">
                                            -
                                        </span>
                                    </div>
                                    <div class="col-1 text-left" style="align-items:center;">

                                    </div>
                                </div>
                            </div>
                            <div class="col-1">

                            </div>
                            <div class="col-5">
                                <div class="row">
                                    <div class="col-2 text-right" style="align-items:center;">

                                    </div>
                                    <div class="col-9 text-center" style="border-bottom: 1px dashed black; width: 100%;">
                                        <span id="spanDate_master">
                                            -
                                        </span>
                                    </div>
                                    <div class="col-1 text-left" style="align-items:center;">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row mt-3" style="align-items: flex-end;">
                            <div class="col-7">
                                <b>ความเห็นคณบดี</b>
                            </div>
                            <div class="col-5">

                            </div>
                        </div>
                        <div class="row" style="align-items: flex-end;">
                            <div class="col-6" style="border-bottom: 1px dashed black; width: 100%;">
                                <span id="divComment_deen">-</span>
                            </div>
                            <div class="col-1">

                            </div>


                        </div>
                        <div class="row" style="align-items: flex-end;">
                            <div class="col-6" style="border-bottom: 1px dashed black; width: 100%;">
                                <br />
                            </div>
                            <div class="col-1">
                            </div>
                        </div>
                        <div class="row" style="align-items: flex-end;">
                            <div class="col-1 text-left p-0 m-0" style="align-items:center;">
                                ลงนาม
                            </div>
                            <div class="col-5 text-center" style="display: flex;">
                                <span style="border-bottom: 1px dashed black; width: 100%;">
                                    <img id="imageDeen" src="./../api/images/nosign.png" style="margin-bottom: -10px;" width="150px" height="60px" />
                                </span>
                            </div>
                            <div class="col-1">

                            </div>

                        </div>
                        <div class="row" style="align-items: flex-end;">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-2 text-right" style="align-items:center;">
                                        (
                                    </div>
                                    <div class="col-9 text-center" style="border-bottom: 1px dashed black; width: 100%;">
                                        <span id="spanName_deen"> - </span>
                                    </div>
                                    <div class="col-1 text-left" style="align-items:center;">
                                        )
                                    </div>
                                </div>
                            </div>
                            <div class="col-1">

                            </div>

                        </div>
                        <div class="row" style="align-items: flex-end;">
                            <div class="col-6">
                                <div class="row">
                                    <div class="col-2 text-right" style="align-items:center;">
                                        <br />
                                    </div>
                                    <div class="col-9 text-center" style="border-bottom: 1px dashed black; width: 100%;">
                                        <span id="spanDate_deen"> - </span>
                                    </div>
                                    <div class="col-1 text-left" style="align-items:center;">

                                    </div>
                                </div>
                            </div>
                            <div class="col-1">

                            </div>

                        </div>
                        <br />
                        <div class="row">
                            <div class="col-12" style="border-bottom: 1px solid black;"></div>
                        </div>
                        <div class="row" style="align-items: flex-end;">
                            <div class="col-12">
                                <b>สำหรับเจ้าหน้าที่</b>
                            </div>

                        </div>
                        <div class="row" style="align-items: flex-end;">
                            <div class="col-12" style="border-bottom: 1px dashed black; width: 100%;">
                                <br />
                            </div>
                        </div>
                        <div class="row" style="align-items: flex-end;">
                            <div class="col-12" style="border-bottom: 1px dashed black; width: 100%;">
                                <br />
                            </div>
                        </div>
                        <br><br><br><br>
                        <div class="form-group row ">
                            <div class="col-12">
                                <p style="text-align:right;">วันปรับปรุงแก้ไข 8 มีนาคม 2565</p>
                            </div>
                        </div>
                    </div>
                    


                </div>
            </div>
        </div>
    </div>
</body>
<script src="./../manage/changepage.js"></script>
<script src="./../asset/dist/js/moment.js"></script>
<script src="./../asset/dist/js/function.js"></script>
<script>
    $(function() {
        ShowDataDoc();
        CountStatus();
    });

    function CountStatus() {
        $.ajax({
            url: "./../api/doc/approve.php?v=countStatusApr",
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


    function ShowDataDoc() {
        $.ajax({
            url: "./../api/doc/history_approve.php?v=docApr",
            type: "POST",
            success: function(Res) {
                console.log(Res)
                $('#tbHistory_doc tbody').html('');
                $.each(Res, function(index, item) {
                    var date_insert = convertDate(item.DATETIME);
                    $("#tbHistory_doc").append(`<tr>
                        <td style="vertical-align: middle;">
                            <button onclick="modalDocShow_(${item.idApr}, ${item.form_id}, ${item.genaral_form_id})" 
                                type="button" class="badge badge badge-primary" 
                                data-toggle="modal" data-target=".bd-example-modal-xl">
                                Preview
                            </button>
                        </td>
                        <td style="vertical-align: middle;">${item.general_form_title}</td>
                        <td style="vertical-align: middle;">${item.fullname}</td>
                        <td style="vertical-align: middle;">${date_insert[0]}</td>
                        <td>
                            ${item.approve_status_name === "รอการอนุมัติ" 
                            ? '<span class="badge bg-warning">'+item.approve_status_name+'</span>'
                            : item.approve_status_name === "อนุมัติ" 
                            ? '<span class="badge bg-success">'+item.approve_status_name+'</span>'
                            : '<span class="badge bg-danger">'+item.approve_status_name+'</span>'}
                        </td>
                    </tr>`);
                });
            }
        });


        // $.ajax({
        //     url: "./../api/documents/status_doc.php?v=checkstatusApr",
        //     type: "POST",
        //     success: function(Res) {
        //         console.log(Res);
        //         $('#tbHistory_doc tbody').html('');
        //         var tbHistory_doc = '';
        //         $.each(Res[0], function(index, item) {
        //             data_approve = '';
        //             $.each(item.data_approve, function(i, data_) {
        //                 if (data_.status_approve == undefined) {
        //                     data_approve += '<td>-</td>';
        //                 } else {
        //                     var spanStatus = '';
        //                     if (data_.status_approve == "อนุมัติ") {
        //                         spanStatus = '<small class="badge badge-success">' + data_.status_approve + '</small>'
        //                     } else if (data_.status_approve == "รอการอนุมัติ") {
        //                         spanStatus = '<small class="badge badge-info">' + data_.status_approve + '</small>'
        //                     } else {
        //                         spanStatus = '<small class="badge badge-danger">' + data_.status_approve + '</small>'
        //                     }


        //                     data_approve += '<td>' + spanStatus + '</td>';

        //                 }

        //             })


        //             var date_insert = convertDate(item.date_insert);
        //             tbHistory_doc += '<tr>' +
        //                 '<td><button  onclick="modalDocShow(' + item.id + ')" type="button" class="badge badge badge-primary" >Preview</button></td>' +
        //                 '<td>' + item.form_title + '</td>' +
        //                 '<td>' + item.fullname + '</td>' +
        //                 '<td>' + date_insert[0] + '</td>' +
        //                 data_approve +
        //                 '</tr>';
        //         });
        //         $('#tbHistory_doc tbody').html(tbHistory_doc);
        //     }
        // });
    }

    function modalDocShow_(idApr, form_id, genaral_form_id) {
       


        $('#btnApprove_yes').val(idApr);
        $('#btnId_doc').val(form_id);
        $('#genaral_form_id').val(genaral_form_id);
        $.ajax({
            url: `./../api/doc/previewform.php?v=dataDoc&idDoc=${form_id}`, // Replace with the URL of your data source
            type: "GET",
            dataType: "json",
            success: function(Res) {
                $("#imageTeacher").attr("src", "./../api/images/nosign.png");
                $("#imageMaster").attr("src", "./../api/images/nosign.png");
                $("#imageDeen").attr("src", "./../api/images/nosign.png");
                //ข้อมูลเอกสาร
                var datadoc = Res[0];
                $('#divTitle').text(datadoc.general_form_title)
                $('#divFirstname').text(`${datadoc.prefix_name}${datadoc.student_name}`);
                $('#divLastname').text(`${datadoc.student_lastname}`);

                $('#edulevel[value="' + datadoc.general_form_education + '"]').prop('checked', true);
                $('#sector_doc[value="' + datadoc.general_form_sector + '"]').prop('checked', true);
                $('#sector_master[value="' + datadoc.general_form_sector + '"]').prop('checked', true);
                $('#semester[value="' + datadoc.general_form_type_semester + '"]').prop('checked', true);

                $('#divStudentcode').text(datadoc.student_code);
                $('#divMajor').text(datadoc.major_name);
                $('#divNoMajor').text(datadoc.general_form_major_code);
                $('#divYear_semester').text(datadoc.general_form_semester);
                $('#divYear_study').text(datadoc.general_form_year);
                $('#divPhone').text(datadoc.general_form_tel);
                $('#divEmail').text(datadoc.student_email);
                $('#divPurpose').text(datadoc.general_form_opinion);
                $("#imageSign_student").attr("src", "data:image/jpeg;base64," + datadoc.image_sign);

                $('#spanName_student').text(`${datadoc.student_name} ${datadoc.student_lastname}`);
                $('#divDate_student').text(convertToThaiBuddhistDate(datadoc.DATETIME));




                //ข้อมูลการอนุมัติของอาจารย์
                var dataApr_advisor = Res[1];
                $('#divComment_teacher').text(dataApr_advisor.advisor_comment)
                $('#spanName_teacher').text(`${dataApr_advisor.user_name}`);
                if (dataApr_advisor.DATETIME) {

                    $('#spanDate_teacher').text(convertToThaiBuddhistDate(dataApr_advisor.DATETIME));
                    $("#imageTeacher").attr("src", "data:image/jpeg;base64," + dataApr_advisor.image_sign);
                } else {
                    
                    $('#spanDate_teacher').text("-");
                }




                //ข้อมูลการอนุมัติของประธาน
                var dataApr_master = Res[2];
                if (dataApr_master.DATETIME == null || dataApr_master.DATETIME == undefined) {
                    $('#spanDate_master').text("-");
                    $('#divComment_master').text("-");
                    $('#spanName_master').text("-");
                } else {
                    $('#divComment_master').text(dataApr_master.advisor_comment)
                    $('#spanName_master').text(`${dataApr_master.user_name}`);
                    $('#spanDate_master').text(convertToThaiBuddhistDate(dataApr_master.DATETIME));
                    $("#imageMaster").attr("src", "data:image/jpeg;base64," + dataApr_master.image_sign);
                }



                //ข้อมูลการอนุมัติของคณบดี
                var dataApr_deen = Res[3];
                if (dataApr_deen.DATETIME == null || dataApr_deen.DATETIME == undefined) {
                    $('#spanDate_deen').text("-");
                    $('#divComment_deen').text("-");
                    $('#spanName_deen').text("-");
                } else {
                    $('#divComment_deen').text(dataApr_deen.advisor_comment)
                    $('#spanName_deen').text(`${dataApr_deen.user_name}`);
                    $('#spanDate_deen').text(convertToThaiBuddhistDate(dataApr_deen.DATETIME));
                    $("#imageDeen").attr("src", "data:image/jpeg;base64," + dataApr_deen.image_sign);
                }




            }
        });
    }
    $('#searchInput').on('keyup', function() {
        const searchText = $(this).val().toLowerCase();
        $('#tbHistory_doc tbody tr').each(function() {
            const rowText = $(this).text().toLowerCase();
            if (rowText.includes(searchText)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });

    function modalDocShow(idDoc) {
        console.log(idDoc)
        var url = 'previewform.php?id=' + idDoc;
        window.location = url;

    }

    function convertDate(dateApr) {
        var parts = dateApr.split(" ");

        var datePart = parts[0];
        var parts2 = datePart.split("-");

        var formattedDate = parts2[2] + "/" + parts2[1] + "/" + parts2[0];

        return [formattedDate, parts[1]];

    }
</script>

</html>