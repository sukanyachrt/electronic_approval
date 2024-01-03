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

    .checkbox-wrapper-39 *,
    .checkbox-wrapper-39 *::before,
    .checkbox-wrapper-39 *::after {
        box-sizing: border-box;
    }

    .checkbox-wrapper-39 label {
        display: block;
        width: 35px;
        height: 35px;
        cursor: pointer;
    }

    .checkbox-wrapper-39 input {
        visibility: hidden;
        display: none;
    }

    .checkbox-wrapper-39 input:checked~.checkbox {
        transform: rotate(45deg);
        width: 14px;
        margin-left: 12px;
        border-color: #78A3D4;
        border-top-color: transparent;
        border-left-color: transparent;
        border-radius: 0;
    }

    .checkbox-wrapper-39 .checkbox {
        display: block;
        width: inherit;
        height: inherit;
        border: 3px solid #eee;
        border-radius: 6px;
        transition: all 0.375s;
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
                    <!-- Small boxes (Stat box) -->
                    <div class="row justify-content-center">


                        <div class="col-12 col-sm-6 col-md-3" style="cursor: pointer;">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-solid fa-check"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">อนุมัติ</span>
                                    <span class="info-box-number" id="apr_apr">0</span>
                                </div>

                                <div class="checkbox-wrapper-39">
                                    <label>
                                        <input type="checkbox" class="checkbox1" value="อนุมัติ" />
                                        <span class="checkbox"></span>
                                    </label>
                                </div>
                            </div>
                        </div>






                        <div class="col-12 col-sm-6 col-md-3 checkbox1" style="cursor: pointer;">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-regular fa-circle"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">รอการอนุมัติ</span>
                                    <span class="info-box-number" id="apr_wait">0</span>
                                </div>

                                <div class="checkbox-wrapper-39">
                                    <label>
                                        <input type="checkbox" class="checkbox1" value="รอการอนุมัติ" />
                                        <span class="checkbox"></span>
                                    </label>
                                </div>
                            </div>

                        </div>

                        <div class="col-12 col-sm-6 col-md-3" style="cursor: pointer;">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-window-close"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">ไม่อนุมัติ</span>
                                    <span class="info-box-number" id="apr_noapr">0</span>
                                </div>

                                <div class="checkbox-wrapper-39">
                                    <label>
                                        <input type="checkbox" class="checkbox1" value="ไม่อนุมัติ" />
                                        <span class="checkbox"></span>
                                    </label>
                                </div>

                            </div>

                        </div>

                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-transparent">
                                    <h3 class="card-title">ข้อมูลเอกสาร</h3>
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
                                        <table class="table m-0" id="tb_approve_master">
                                            <thead>
                                                <tr>
                                                    <th style="vertical-align: middle;" class="text-left">ลำดับ</th>
                                                    <th style="vertical-align: middle;" class="text-left">รหัสฟอร์ม</th>
                                                    <th style="vertical-align: middle;" class="text-left">เรื่อง</th>
                                                    <th style="vertical-align: middle;" class="text-left">ผู้ส่งคำขอ</th>
                                                    <th style="vertical-align: middle;" class="text-center">วันที่ยื่นคำขอ</th>
                                                    <th style="border-left: 2px solid #eeeeee;">อาจารย์</th>
                                                    <th>ประธาน</th>
                                                    <th>คณะบดี</th>
                                                    <th style="vertical-align: middle; border-left: 2px solid #eeeeee;" class="text-center">สถานะ</th>
                                                    <th style="vertical-align: middle;" class="text-center">Preview</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                            </tbody>
                                        </table>
                                    </div>
                                    <!-- /.table-responsive -->
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
                                ความเห็นประธานคณะกรรมการบริหารหลักสูตร
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
                    <div class="row justify-content-end " style="padding: 10px;">
                        <div class="col-12">
                            <input type="hidden" id="btnId_doc" name="btnId_doc" value="">
                            <input type="hidden" id="genaral_form_id" name="genaral_form_id" value="">

                            <input type="hidden" id="btnRole_approve" name="role_approve" value="">
                            <button type="button" id="btnApprove_yes" value="" onclick="fnApprove('ไม่อนุมัติ')" class="btn btn-danger float-right" style="margin-right: 5px;">
                                <i class="fas fa-window-close"></i> ไม่อนุมัติเอกสาร
                            </button>
                            <button type="button" value="" id="btnApprove_no" onclick="fnApprove('อนุมัติ')" class="btn btn-success float-right" style="margin-right: 5px;">
                                <i class="fas fa-check"></i>อนุมัติเอกสาร
                            </button>
                        </div>

                    </div>


                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="modal-notApprove">
        <div class="modal-dialog">
            <div class="modal-content">
                <form id="confirmApprove">
                    <div class="modal-header bg-primary">
                        <h4 class="modal-title">ยืนยันการอนุมัติเอกสาร</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="exampleInputEmail1">ความเห็นประธานคณะกรรมการบริหารหลักสูตร :</label>
                            <input type="text" autocomplete="yes" class="form-control" id="txtcomment" name="txtcomment" placeholder="ความเห็นประธานคณะกรรมการบริหารหลักสูตร">
                        </div>
                    </div>
                    <div class="modal-footer justify-content-center">
                        <input type="hidden" id="btnStatus" name="btnStatus" value="">
                        <button type="submit" class="btn btn-primary">ยืนยัน</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>

                    </div>
                </form>
            </div>
        </div>
    </div>
    <input type="hidden" id="btnSign" name="btnSign" value="">
    <!-- confrom ผลการแจ้งเตือน -->
    <div class="modal fade" id="modal-Alertdata">
        <div class="modal-dialog modal-sm">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title">แจ้งเตือน</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <p id="resultAlert"></p>
                </div>
                <div class="modal-footer justify-content-center">
                    <button type="button" id="btnConfirmAlert" class="btn btn-primary" data-dismiss="modal">ตกลง</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>

                </div>
            </div>
        </div>
    </div>
</body>
<script src="./../asset/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="./../manage/changepage.js"></script>
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
<script src="./../asset/dist/js/moment.js"></script>
<script src="./../asset/dist/js/function.js"></script>
<script src="./../asset/plugins/jquery-validation/jquery.validate.min.js"></script>

<script src="./../manage/changepage.js?v=1"></script>
<script>
    $(function() {
        CountStatus();
        const checkbox = $('.checkbox1[value="รอการอนุมัติ"]');
        checkbox.prop('checked', true);

        if (checkbox.is(':checked')) {
            checkbox.closest('.info-box').addClass('selected-card');
        } else {
            checkbox.closest('.info-box').removeClass('selected-card');
        }



        const checkbox_1 = $('.checkbox1[value="อนุมัติ"]');
        if (checkbox_1.is(':checked')) {
            var dataFind = ["อนุมัติ"];
            checkbox_1.closest('.info-box').addClass('selected-card');
        } else {
            checkbox_1.closest('.info-box').removeClass('selected-card');
        }

        const checkbox_2 = $('.checkbox1[value="ไม่อนุมัติ"]');
        if (checkbox_2.is(':checked')) {
            var dataFind = ["ไม่อนุมัติ"];
            checkbox_2.closest('.info-box').addClass('selected-card');
        } else {
            checkbox_2.closest('.info-box').removeClass('selected-card');
        }

        const checkedCheckboxes = $('.checkbox1:checked'); // เลือก checkboxes ที่ถูกติ๊กเช็ค
        const uncheckedCheckboxes = $('.checkbox1:not(:checked)'); // เลือก checkboxes ที่ไม่ถูกติ๊กเช็ค
        const checkedValues = checkedCheckboxes.map(function() {
            return this.value;
        }).get();

        ShowDataDoc(checkedValues);


    });

    function CountStatus() {
        $.ajax({
            url: "./../api/doc/approve.php?v=countStatusApr",
            type: "GET",
            success: function(Res) {
                // console.log(Res)
                $.each(Res, function(index, item) {
                    if (item.status_approve == "อนุมัติ") {
                        $('#apr_apr').text(item.numrow + " รายการ")

                    } else if (item.status_approve == "รอการอนุมัติ") {
                        $('#apr_wait').text(item.numrow + " รายการ")
                    } else {
                        $('#apr_noapr').text(item.numrow + " รายการ")
                    }
                });
            }
        });
    }

    function ShowDataDoc(dataFind) {
        $.ajax({
            url: "./../api/doc/approve.php?v=checkapproveMaster",
            type: "POST",
            cache: false,
            data: {
                dataFind: dataFind
            },
            success: function(Res) {
                console.log(Res)
                $('#tb_approve_master tbody').html('')
                $.each(Res, function(index, item) {
                    var date_insert = convertDate(item.datetime);
                    $('#tb_approve_master tbody').append(`
                    <tr>
                        <td class="text-center">${index+1}</td>
                        <td class="text-center">${item.form_id}</td>
                        <td class="text-left">${item.general_form_title}</td>
                        <td class="text-left">${item.fullname}</td>
                        <td class="text-center">${date_insert[0]}</td>
                        <td class="text-center">
                        ${item.advisor_approve === "รอการอนุมัติ" 
                            ? '<span class="badge bg-warning">'+item.advisor_approve+'</span>' 
                            : item.advisor_approve === "อนุมัติ" 
                            ? '<span class="badge bg-success">'+item.advisor_approve+'</span>'
                            : '<span class="badge bg-danger">'+item.advisor_approve+'</span>'}
                        </td>
                        <td class="text-center">
                            ${item.master_approve === "รอการอนุมัติ" 
                            ? '<span class="badge bg-warning">'+item.master_approve+'</span>' 
                            : item.master_approve === "อนุมัติ" 
                            ? '<span class="badge bg-success">'+item.master_approve+'</span>'
                            : '<span class="badge bg-danger">'+item.master_approve+'</span>'}
                        </td>
                        <td class="text-center">
                            ${item.deen_approve === "รอการอนุมัติ" 
                            ? '<span class="badge bg-warning">'+item.deen_approve+'</span>' 
                            : item.deen_approve === "อนุมัติ" 
                            ? '<span class="badge bg-success">'+item.deen_approve+'</span>'
                            : '<span class="badge bg-danger">'+item.deen_approve+'</span>'}
                        </td>
                        <td class="text-center">
                           
                            ${item.form_status_name === "กำลังดำเนินการ" 
                            ? '<span class="badge bg-info">'+item.form_status_name+'</span>' 
                            : item.form_status_name === "แก้ไข" 
                            ? '<span class="badge bg-warning">'+item.form_status_name+'</span>'
                            : '<span class="badge bg-success">'+item.form_status_name+'</span>'}
                        </td>
                        <td style="vertical-align: middle;"><button  onclick="modalDocAprAdvisor(${item.idApr}, ${item.form_id} , ${item.genaral_form_id} )" type="button" class="badge badge badge-primary">Preview</button></td>
                     </tr>
                    `);

                });

            },
            error : function(e){
                console.log(e)
            }
        });
    }

    function convertDate(date) {
        var parts = date.split(" ");

        var datePart = parts[0];
        var parts2 = datePart.split("-");

        var formattedDate = parts2[2] + "/" + parts2[1] + "/" + parts2[0];

        return [formattedDate, parts[1]];

    }
    $('#searchInput').on('keyup', function() {
        const searchText = $(this).val().toLowerCase();
        $('#tb_approve_master tbody tr').each(function() {
            const rowText = $(this).text().toLowerCase();
            if (rowText.includes(searchText)) {
                $(this).show();
            } else {
                $(this).hide();
            }
        });
    });

    function modalDocAprAdvisor(idApr, form_id, genaral_form_id) {

        //check ลายเซนต์
        if ($('#btnSign').val() == "") {
            $.ajax({
                url: `./../api/sign/data.php?v=checksignApr`, // Replace with the URL of your data source
                type: "GET",
                dataType: "json",
                success: function(Res) {
                    console.log(Res)
                    if (Res.status == "ok") {
                        $('#btnSign').val("yes")
                        ShowModal(idApr, form_id, genaral_form_id)
                    } else {

                        $("#btnConfirmAlert").val('./../signature/')
                        $('#resultAlert').text(`${Res.msg}`)
                        $('#modal-Alertdata').modal('show');
                        // window.location.replace('./../signature/');
                    }
                }
            });

        } else {
            ShowModal(idApr, form_id, genaral_form_id)

        }





    }

    function ShowModal(idApr, form_id, genaral_form_id) {
        console.log("idApr : " + idApr + " form_id : " + form_id + " genaral_form_id : " + genaral_form_id);

        $('#btnApprove_yes').val(idApr);
        $('#btnId_doc').val(form_id);
        $('#genaral_form_id').val(genaral_form_id);
        $('.modal.fade.bd-example-modal-xl').modal('show');
        $.ajax({
            url: `./../api/doc/previewform.php?v=dataDoc&idDoc=${form_id}`, // Replace with the URL of your data source
            type: "GET",
            dataType: "json",
            success: function(Res) {
                console.log(Res)
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

                if(dataApr_master.approve_status_name=="รอการอนุมัติ" || dataApr_master.approve_status_name== null){
                    $('#btnApprove_yes').show();
                    $('#btnApprove_no').show();
                }
                else{
                    $('#btnApprove_yes').hide();
                    $('#btnApprove_no').hide();
                    
                }


                if (dataApr_master.DATETIME == null || dataApr_master.DATETIME == undefined) {
                    $('#spanDate_master').text("-");
                    $('#divComment_master').text("-");
                    $('#spanName_master').text("-");
                } else {
                    $('#divComment_master').text(dataApr_master.master_comment)
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
                    $('#divComment_deen').text(dataApr_deen.deen_comment)
                    $('#spanName_deen').text(`${dataApr_deen.user_name}`);
                    $('#spanDate_deen').text(convertToThaiBuddhistDate(dataApr_deen.DATETIME));
                    $("#imageDeen").attr("src", "data:image/jpeg;base64," + dataApr_deen.image_sign);
                }

            }
        });
    }
    // function modalDocShow(idDoc) {
    //     console.log(idDoc)
    //     var url = 'previewform.php?id=' + idDoc;
    //     window.location = url;

    // }

    function convertDate(dateApr) {
        var parts = dateApr.split(" ");

        var datePart = parts[0];
        var parts2 = datePart.split("-");

        var formattedDate = parts2[2] + "/" + parts2[1] + "/" + parts2[0];

        return [formattedDate, parts[1]];

    }

    var commentRules = {
        required: true
    };

    var commentMessages = {
        required: ""
    };

    function fnApprove(status) {
        commentRules.required = true;
        commentMessages.required = "";
        $('#btnStatus').val(status);
        $('#modal-notApprove').modal('show');

    }
    $('#confirmApprove').validate({
        rules: {
            txtcomment: commentRules
        },
        messages: {
            txtcomment: commentMessages
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
            error.addClass('invalid-feedback');
            element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
            $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
            $(element).removeClass('is-invalid');
        },
        submitHandler: function(form) {
            var idApr = $('#btnApprove_yes').val();
            var form_id = $('#btnId_doc').val();
            var genaral_form_id = $('#genaral_form_id').val();

            let data = {
                "status": $('#btnStatus').val(),
                "idApr": idApr,
                "form_id": form_id,
                "genaral_form_id": genaral_form_id,
                "comment": $('#txtcomment').val()
            };

            // Only enforce validation for txtcomment if btnStatus is "ไม่อนุมัติ"
            if ($('#btnStatus').val() === 'ไม่อนุมัติ') {
                commentRules.required = true;
                commentMessages.required = "โปรดกรอกเหตุผลในการไม่อนุมัติเอกสาร";
            } else {
                commentRules.required = false;
                commentMessages.required = "";
            }

            // Update validation rules and messages
            $('#confirmApprove').validate().settings.rules.txtcomment = commentRules;
            $('#confirmApprove').validate().settings.messages.txtcomment = commentMessages;

            // Validate the form with updated rules and messages
            if ($('#confirmApprove').valid()) {
                console.log("yesy")
                $.ajax({
                    type: 'POST',
                    url: `./../api/doc/approve.php?v=updateAprMaster`,
                    data: data,
                    success: function(response) {
                        //console.log(response)
                        $('#modal-notApprove').modal('hide');
                        $('.modal.fade.bd-example-modal-xl').modal('hide');
                        CountStatus();
                        
                        ShowDataDoc("รอการอนุมัติ");
                        form.reset();
                    },
                    error: function(error) {
                        console.log(error)
                    }
                });
            }
        }
    });


    $('.info-box').on('click', function() {
        const checkbox = $(this).find('.checkbox1');
        checkbox.prop('checked', !checkbox.prop('checked'));

        if (checkbox.is(':checked')) {
            $(this).addClass('selected-card');
        } else {
            $(this).removeClass('selected-card');
        }
        const checkedCheckboxes = $('.checkbox1:checked'); // เลือก checkboxes ที่ถูกติ๊กเช็ค
        const uncheckedCheckboxes = $('.checkbox1:not(:checked)'); // เลือก checkboxes ที่ไม่ถูกติ๊กเช็ค
        const checkedValues = checkedCheckboxes.map(function() {
            return this.value;
        }).get();

        ShowDataDoc(checkedValues);
    });
</script>

</html>