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
                                                <th class="text-center">#</th>
                                                <th>เรื่อง</th>
                                                <th>ผู้ส่งคำขอ</th>
                                                <th>ไฟล์คำขอ</th>
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
                                    <input type="text" class="form-control" name="general_form_title" id="general_form_title" required>
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
                                    <?php echo $_SESSION['_name'] ?>
                                </div>
                                <div class="col-1">
                                    <span for="lname" id="divLastname" class="col-sm-1 col-form-label">
                                        นามสกุล
                                        </sapn>
                                </div>
                                <div class="col-sm-5">
                                    <?php echo $_SESSION['_lastname'] ?>
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
                                <div class="col-sm-3">
                                    <input type="text" name="student_code" id="student_code" class="form-control" required>
                                </div>
                                <span for="major" class="col-sm-1 col-form-label">สาขาวิชา</span>
                                <div class="col-sm-3 col-form-label" id="divMajor">
                                    --- แสดงสาขาวิชา ---
                                </div>
                                <span for="major_id" class="col-sm-1 col-form-label">(รหัสสาขา)</span>
                                <div class="col-sm-2">
                                    <input type="text" name="major_id" id="major_id" class="form-control" required>
                                </div>
                            </div>



                            <div class="form-group row">
                                <span for="semeter" class="col-sm-3 col-form-label">เข้าศึกษาตั้งแต่ภาคการศึกษา</span>
                                <div class="col-sm-1">
                                    <input type="text" name="general_form_semester" id="general_form_semester" class="form-control" required>
                                </div>
                                <span for="year" class="col-sm-2 col-form-label">ปีการศึกษา</span>
                                <div class="col-sm-1">
                                    <input type="text" name="general_form_year" id="general_form_year" class="form-control" required>
                                </div>
                                <span for="tell" class="col-sm-3 col-form-label">เบอร์โทรศัพท์ที่สามารถติดต่อได้</span>
                                <div class="col-sm-2">
                                    <input type="text" name="tel" id="tel" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div style="border:1px solid black; padding:10px;margin:5px;">
                            <div class="form-group row">
                                <span for="email" class="col-sm-2 col-form-label">Email</span>
                                <div class="col-sm-10" id="divEmail">
                                    <input type="text" name="email" id="email" class="form-control">
                                </div>
                            </div>


                            <div class="form-group row">
                                <span for="Message" class="col-sm-2 col-form-label">มีความประสงค์</span>
                                <div class="col-sm-10">
                                    <textarea input type="Message" name="general_form_opinion" id="general_form_opinion" class="form-control" required></textarea>
                                </div>
                            </div>
                        </div>


                        <p>จึงเรียนมาเพื่อโปรดพิจารณา </p></span>

                        <div class="form-group row ">
                            <div class="col-5"></div>
                            <div class="col-7">
                                &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;ลายมือชื่อนักศึกษา<span style="border-bottom: 1px dashed black;">
                                    &emsp;&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;

                                    <img id="imageSign" src="" width="150px" height="50px" \>
                                    &emsp;&emsp;&emsp;</span>
                            </div>
                            <div class="col-7"></div>
                            <div class="col-5">
                                &emsp;&emsp;&emsp;&emsp;&emsp;<span style="text-align:right;">(<span style="border-bottom: 1px dashed black;">&emsp;&emsp;&emsp;&emsp;

                                        <?php
                                        echo $_SESSION['_name'] . ' ' . $_SESSION['_lastname'];
                                        ?>


                                        &emsp;&emsp;&emsp;&emsp;</span>)</span>
                            </div>
                            <div class="col-7"></div>
                            <div class="col-5 text-center">
                                <span id="divDatecurrent" style="display: inline-block; width: 50%; border-bottom: 1px dashed black;">
                                    --- แสดงวันทีปัจจุบัน ----
                                </span>
                            </div>


                            <div class="col-7">
                                <span style="text-align:left;">ความเห็นอาจารย์ที่ปรึกษา</span>
                                <select id="selectTeacher" name="selectTeacher">

                                </select>


                            </div>
                            <div class="col-5">
                                <span style="text-align:right;">&emsp;&emsp;ความเห็น ประธานคณะกรรมการบริหารหลักสูตร</span>
                            </div>
                            <div class="col-7">
                                <span style="text-align:left;">-----------------------------------------------------------</span>
                            </div>
                            <div class="col-5">
                                <span style="text-align:right;">&emsp;&emsp;-------------------------------------------------------</span>
                            </div>
                            <div class="col-7">
                                <span style="text-align:left;">-----------------------------------------------------------</span>
                            </div>
                            <div class="col-5">
                                <span style="text-align:right;">&emsp;&emsp;-------------------------------------------------------</span>
                            </div>
                            <div class="col-7">
                                <span style="text-align:left;">-----------------------------------------------------------</span>
                            </div>
                            <div class="col-5">
                                <span style="text-align:right;">&emsp;&emsp;-------------------------------------------------------</span>
                            </div>
                            <div class="col-7">
                                <span style="text-align:left;">ลงนาม---------------------------------------------------</span>
                            </div>
                            <div class="col-5">
                                <span style="text-align:right;">&emsp;&emsp;ลงนาม-----------------------------------------------</span>
                            </div>
                            <div class="col-7">
                                <span style="text-align:left;">(----------------------------------------------------------)</span>
                            </div>
                            <div class="col-5">
                                <span style="text-align:right;">&emsp;&emsp;(------------------------------------------------------)</span>
                            </div>
                            <div class="col-7">
                                <span style="text-align:left;">&emsp;&emsp;---------------/---------------/---------------</span>
                            </div>
                            <div class="col-5">
                                <span style="text-align:right;">&emsp;&emsp;&emsp;&nbsp;&nbsp;---------------/---------------/---------------</span>
                            </div>

                        </div>

                        <div class="form-group row ">
                            <div class="col-6">
                                <b><span style="text-align:left;">ความเห็นคณบดี</span></b>
                            </div>
                            <div class="col-6"></div>
                            <div class="col-8">
                                <span style="text-align:left;">-----------------------------------------------------------</span>
                            </div>
                            <div class="col-8">
                                <span style="text-align:left;">-----------------------------------------------------------</span>
                            </div>
                            <div class="col-8">
                                <span style="text-align:left;">ลงนาม---------------------------------------------------</span>
                            </div>
                            <div class="col-8">
                                <span style="text-align:left;">(----------------------------------------------------------)</span>
                            </div>
                            <div class="col-8">
                                <span style="text-align:left;">&emsp;&emsp;---------------/---------------/---------------</span>
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
                        <button type="button" id="btnSaveform" class="btn btn-success float-right" style="margin-right: 5px;">
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
    $(function() {
        $.ajax({
            url: "./../api/documents/approve_doc.php?v=checkapprove", // Replace with the URL of your data source
            type: "GET",
            dataType: "json",
            success: function(Res) {
                console.log(Res);
                $('#tb_approve_teacher tbody').html('');
                $.each(Res, function(index, item) {



                    $("#tb_approve_teacher").append('<tr>' +
                        '<td classs="text-center"> <button type="button" class="btn btn-success btn-xs"><i class="fas fa-check"></i> อนุมัติ</button> <button type="button" class="btn btn-danger btn-xs"><i class="fas fa-window-close"></i> ไม่อนุมัติ</button></td>' +
                        '<td style="vertical-align: middle;">' + item.form_title + '</td>' +
                        '<td style="vertical-align: middle;">' + item.fullname + '</td>' +
                        '<td style="vertical-align: middle;"><button type="button" class="badge badge badge-primary" data-toggle="modal" data-target=".bd-example-modal-xl">Preview</button></td>' +
                        '<td style="vertical-align: middle;">' + item.date_insert + '</td>' +
                        '<td style="vertical-align: middle;"><span class="badge badge-warning">' + item.status_approve + '</span></td>' +
                        '</tr>');
                });
            },
            error: function(xhr, status, error) {
                console.log("Error: " + error);
            }
        });


    });
</script>

</html>