<?php

include('./../manage/header.php');
if ($_SESSION['_role'] != 'student') {
    header("Location: ./../error/");
}

?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">


        <?php
        include("./../manage/navbar.php")

        ?>

        <?php include('./../manage/sidebar.php') ?>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                            </div>

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
                                                <input type="text" autocomplete="yes" class="form-control" name="general_form_title" id="general_form_title" required>
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

                                            </div>
                                            <div class="col-1">
                                                <span for="lname" class="col-sm-1 col-form-label">
                                                    นามสกุล
                                                    </sapn>
                                            </div>
                                            <div class="col-sm-5" id="divLastname">

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
                                            <div class="col-sm-3" id="divStudent_code">
                                                <input type="text" name="student_code" id="student_code" class="form-control" required>
                                            </div>
                                            <span for="major" class="col-sm-1 col-form-label">สาขาวิชา</span>
                                            <div class="col-sm-3 col-form-label" id="divMajor">
                                                --- แสดงสาขาวิชา ---
                                            </div>
                                            <span for="major_id" class="col-sm-1 col-form-label">(รหัสสาขา)</span>
                                            <div class="col-sm-2">
                                                <input type="text" name="major_id" id="major_id" autocomplete="yes" class="form-control" required>
                                            </div>
                                        </div>



                                        <div class="form-group row">
                                            <span for="semeter" class="col-sm-3 col-form-label">เข้าศึกษาตั้งแต่ภาคการศึกษา</span>
                                            <div class="col-sm-1">
                                                <select class="form-control" id="general_form_semester" name="general_form_semester">
                                                    <option selected disabled>เลือกภาคการศึกษา</option>
                                                    <option value="1">1</option>
                                                    <option value="2">2</option>
                                                    <option value="3">3</option>
                                                </select>
                                            </div>
                                            <span for="year" class="col-sm-1 col-form-label">ปีการศึกษา</span>
                                            <div class="col-sm-2">
                                                <select class="form-control" id="general_form_year" name="general_form_year">
                                                    <option selected disabled>เลือกปีการศึกษา</option>
                                                    <option value="<?php echo (date('Y') + 544) ?>"><?php echo (date('Y') + 544) ?></option>
                                                    <?php
                                                    $currentYear = date('Y') + 543;
                                                    $startYear = $currentYear;
                                                    $endYear = $currentYear - 3;
                                                    ?>
                                                    <?php for ($i = $startYear; $i >= $endYear; $i--) { ?>
                                                        <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                                    <?php } ?>
                                                </select>
                                            </div>
                                            <span for="tell" class="col-sm-3 col-form-label">เบอร์โทรศัพท์ที่สามารถติดต่อได้</span>
                                            <div class="col-sm-2">
                                                <input type="text" autocomplete="yes" name="tel" id="tel" class="form-control">
                                            </div>
                                        </div>
                                    </div>
                                    <div style="border:1px solid black; padding:10px;margin:5px;">
                                        <div class="form-group row">
                                            <span for="email" class="col-sm-2 col-form-label">Email</span>
                                            <div class="col-sm-10" id="divEmail">

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
                                    <button type="button" id="btnSaveform" class="btn btn-primary float-right" style="margin-right: 5px;">
                                        <i class="fas fa-download"></i>บันทึก
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?php include("./../manage/footer.php") ?>
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
    </div>
    <?php include("./../manage/scripts.php") ?>

</body>
<script src="./../manage/changepage.js"></script>
<script src="./../asset/dist/js/custom.js"></script>
<script>
    $(document).ready(function() {

        // ชื่ออาจารย์ที่ปรึกษา
        // ข้อมูลนักศึกษา


        $.ajax({
            url: "./../api/sign/data.php?v=users", // Replace with the URL of your data source
            type: "GET",
            dataType: "json",
            success: function(Res) {
                console.log(Res)
                if (Res.status == 'ok') {

                    $('#divStudent_code').text(Res.data.student_code);
                    $('#divFirstname').text(Res.data.fname);
                    $('#divLastname').text(Res.data.lname)
                    $('#divDatecurrent').text(dateCurrent());
                    $('#divEmail').text(Res.data.student_email || '-');
                    $('#divMajor').text(Res.data.major_name);
                    $("#imageSign").attr("src", "data:image/jpeg;base64," + Res.image_sign);
                    dataTeacher()
                } else {
                    
                    $("#btnConfirmAlert").val('./../signature/')
                    $('#resultAlert').text(`${Res.msg}`)
                    $('#modal-Alertdata').modal('show');
                    
                }

            },
            error: function(xhr, status, error) {
                console.log("Error: " + error);
            }
        });
        $("#btnConfirmAlert").click(function() {
            var page_ = $("#btnConfirmAlert").val();
            window.location.replace(page_);
        })


        $("#btnSaveform").click(function() {
            //check dataที่ กรอก


            var errors = ValidateInputData();
            if (errors.length > 0) {
                $("#btnConfirmAlert").val('#')
                $('#resultAlert').text(`${errors.join("\n")}`)
                $('#modal-Alertdata').modal('show');

               // alert(errors.join("\n"));
            } else {
                var form = $('#form_doc')[0];
                var formdataA = new FormData(form);
                console.log(formdataA)
                $.ajax({
                    async: true,
                    url: "./../api/doc/data.php?v=saveForm_1",
                    type: "POST",
                    cache: false,
                    data: formdataA,
                    processData: false, // tell jQuery not to process the data
                    contentType: false,
                    success: function(Res) {
                        console.log(Res)
                        if (Res.status == 'ok') {
                            $('#btnConfirmAlert').val('./../student/')
                            $('#resultAlert').text(`${Res.msg}`)
                            $('#modal-Alertdata').modal('show');

                            // window.location.replace('./../student/');
                        } else {
                            
                            $('#btnConfirmAlert').val('#')
                            $('#resultAlert').text(`${Res.msg}`)
                            $('#modal-Alertdata').modal('show');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("Error:", error);
                    }
                });
            }

        });
    });

    function dataTeacher() {
        $.ajax({
            url: "./../api/doc/data.php?v=teacherAll", // Replace with the URL of your data source
            type: "GET",
            dataType: "json",
            success: function(Res) {
                // console.log(Res)
                $("#selectTeacher").html($("<option>").text("--เลือกอาจารย์ที่ปรึกษา--").val(0));

                $.each(Res, function(index, item) {
                    $("#selectTeacher").append($("<option>").text(item.user_name).val(item.user_id));
                });
            }
        });
    }


    function Checkedulevel(checkbox) {
        var checkboxes = document.getElementsByName('edulevel')
        checkboxes.forEach((item) => {

            if (item !== checkbox) item.checked = false
        })
        if (checkbox.checked) {
            selectedValue = checkbox.value;
            if (selectedValue == 'ปริญญาเอก') {
                $(".sector_master").not(this).prop("checked", false);
                $(".sector_master").css("background-color", "#f0f0f0");
                $(".sector_master").prop("disabled", true);

                $(".sector_doc").css("background-color", "#000");
                $(".sector_doc").prop("disabled", false);
            } else {
                $(".sector_doc").not(this).prop("checked", false);
                $(".sector_doc").css("background-color", "#f0f0f0");
                $(".sector_doc").prop("disabled", true);

                $(".sector_master").css("background-color", "#000");
                $(".sector_master").prop("disabled", false);
            }
        }
    }

    function Checksector_doc(checkbox) {
        var checkboxes = document.getElementsByName('sector_doc')
        checkboxes.forEach((item) => {
            if (item !== checkbox) item.checked = false
        })
    }

    function Checksector_master(checkbox) {
        var checkboxes = document.getElementsByName('sector_master')
        checkboxes.forEach((item) => {
            if (item !== checkbox) item.checked = false
        })
    }

    function Checksemester(checkbox) {
        var checkboxes = document.getElementsByName('semester')
        checkboxes.forEach((item) => {
            if (item !== checkbox) item.checked = false
        })
    }





    function ValidateInputData() {
        var errors = [];

        var general_form_title = $("#general_form_title").val();
        var general_form_semester = $("#general_form_semester").val();
        var general_form_year = $("#general_form_year").val();
        var tel = $("#tel").val();
        var general_form_opinion = $("#general_form_opinion").val();

        var selectTeacher = $("#selectTeacher").val();

        var edulevel = $('input[name="edulevel"]:checked').map(function() {
            return $(this).val();
        }).get();




        var sector_doc = $('input[name="sector_doc"]:checked').map(function() {
            return $(this).val();
        }).get();

        var sector_master = $('input[name="sector_master"]:checked').map(function() {
            return $(this).val();
        }).get();

        var semester = $('input[name="semester"]:checked').map(function() {
            return $(this).val();
        }).get();




        if (general_form_title === "") {
            errors.push("* โปรดกรอกเรื่อง");
            $("#general_form_title").focus();
        }

        if (edulevel.length === 0) {
            errors.push("* โปรดเลือกประเภทปริญญา");
            $("#edulevel").focus();
        }

        if (sector_doc.length === 0 && sector_master.length === 0) {
            errors.push("* โปรดเลือกแบบเอกสาร เช่น แบบ 1.1 , แผน ก แบบ ก 1");
            $("#sector_doc").focus();
        }

        if (semester.length === 0) {
            errors.push("* โปรดเลือกภาคที่เรียน");
            $("#semester").focus();
        }


        console.log("general_form_semester : " + $("#general_form_semester").val())

        if (general_form_semester === "" || general_form_semester === null) {
            errors.push("* โปรดกรอกปีที่เข้าศึกษาตั้งแต่ภาคการศึกษา");
            $("#general_form_semester").focus();
        }
        if (general_form_year === "" || general_form_year === null) {
            errors.push("* โปรดกรอกปีการศึกษา");
            $("#general_form_year").focus();
        }
        if (tel === "") {
            errors.push("* โปรดกรอกเบอร์โทรศัพท์ที่สามารถติดต่อได้");
            $("#tel").focus();
        }

        if (general_form_opinion === "") {
            errors.push("* โปรดกรอกความประสงค์");
            $("#selectTeacher").focus();
        }
        if (selectTeacher <= '0') {
            errors.push("* โปรดเลือกอาจารย์ที่ปรึกษา");
            $("#selectTeacher").focus();
        }
        return errors;
    }
</script>