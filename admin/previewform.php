<?php

include('./../manage/header.php');

?>
<link rel="stylesheet" href="./../asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="./../asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="./../asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
<style>
    .newFont {
        font-size: 17px;
    }
</style>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?php
        include("./../manage/navbar.php")

        ?>

        <?php include('./../manage/sidebar.php') ?>

        <div class="content-wrapper newFont">

            <section class="content ">
                <div class="container-fluid">

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
                                    <input type="checkbox"  class="radio" id="edulevel" onclick="Checkedulevel(this)" name="edulevel" value="ปริญญาเอก">
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
                            <!-- <div class="form-group row" style="align-items: flex-end;">
                                <div class="col-5">
                                </div>
                                <div class="col-2 text-right" style="align-items:center;">
                                    ลายมือชื่อนักศึกษา
                                </div>
                                <div class="col-5 text-center" style="display: flex;">
                                    <span style="border-bottom: 1px dashed black; width: 100%;">
                                        <img id="imageSign_student" style="margin-bottom: -10px;" width="150px" height="60px" />
                                    </span>
                                </div>
                            </div> -->
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
                        <div class="row no-print justify-content-end" style="padding: 10px;">
                            <div class="col-12">
                                <button type="button" id="goBackButton" value="" class="btn btn-default float-right" style="margin-right: 5px;">
                                    <i class="fas fa-solid fa-arrow-left"></i> ย้อนกลับ
                                </button>
                                <a onclick="window.print()" id="print" class="btn btn-primary float-right" style="margin-right: 5px;">
                                    <i class="fas fa-print"></i> Print
                                </a>
                                <input type="hidden" id="btnId_doc" name="btnId_doc" value="<?php echo $_GET['id'] ?>">
                            </div>
                        </div>


                    </div>
            </section>
            <!-- /.content -->
        </div>
        <?php include("./../manage/footer.php") ?>

    </div>

    <?php include("./../manage/scripts.php") ?>

</body>
<script src="./../asset/dist/js/moment.js"></script>
<script src="./../asset/dist/js/function.js"></script>
<script>
    $(function() {
        var idDoc = $('#btnId_doc').val();
        $.ajax({
            url: `./../api/doc/previewform.php?v=dataDoc&idDoc=${idDoc}`, // Replace with the URL of your data source
            type: "GET",
            dataType: "json",
            success: function(Res) {
                console.log(Res)
                //ข้อมูลเอกสาร
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

                // $('#imageTeacher').hide()
                // $('#imageDirect').hide()
                // $('#imageMaster').hide();
                // console.log(dataApr.length)
                // if(dataApr.length<3){
                //     $('#print').hide()
                // }
                // $.each(dataApr, function(index, item) {

                //     if (item.role_approve == "อาจารย์") {
                //         $('#imageTeacher').show();
                //         $("#imageTeacher").attr("src", "data:image/jpeg;base64," + item.image_sign);
                //         $('#spanName_teacher').text(`${item.user_name}`);
                //         if (item.date_approve == null) {
                //             $('#spanDate_teacher').text(`-`);
                //         } else {

                //             $('#spanDate_teacher').text(convertToThaiBuddhistDate(item.date_approve));
                //         }

                //         $('#divComment_teacher').text(`${item.comment_approve}`)

                //     }
                //     if (item.role_approve == "ประธานหลักสูตร") {
                //         $('#imageDirect').show()
                //         $("#imageDirect").attr("src", "data:image/jpeg;base64," + item.image_sign);
                //         $('#spanName_direct').text(`${item.user_name}`);
                //         if (item.date_approve == null) {
                //             $('#spanDate_direct').text(`-`);
                //         } else {
                //             $('#spanDate_direct').text(convertToThaiBuddhistDate(item.date_approve));
                //         }
                //         $('#divComment_direct').text(`${item.comment_approve}`)

                //     }
                //     if (item.role_approve == "คณบดี") {
                //         $('#imageMaster').show()
                //         $('#spanName_master').text(`${item.user_name}`);

                //         if (item.date_approve == null) {
                //             $('#spanDate_master').text(`-`);
                //         } else {
                //             $('#spanDate_master').text(convertToThaiBuddhistDate(item.date_approve));
                //         }
                //         $('#divComment_master').text(`${item.comment_approve}`)
                //     }
                // })



            }
        });
    });
    $('#goBackButton').click(function() {
        window.history.back();
    });
</script>

</html>