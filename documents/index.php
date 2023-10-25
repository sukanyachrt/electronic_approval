<?php

include('./../admin/header.php');

?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">


        <?php
        include("./../admin/navbar.php")

        ?>

        <?php include('./../admin/sidebar.php') ?>

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
                                                <?php echo $_SESSION['student_name'] ?>
                                            </div>
                                            <div class="col-1">
                                                <span for="lname" id="divLastname" class="col-sm-1 col-form-label">
                                                    นามสกุล
                                                    </sapn>
                                            </div>
                                            <div class="col-sm-5">
                                                <?php echo $_SESSION['student_lastname'] ?>
                                            </div>
                                        </div>
                                        <!-- /.col -->

                                        <!-- info row -->
                                        <div class="row">
                                            <div class="col-2 ">
                                                <span>นักศึกษาปริญญา</span>
                                            </div>

                                            <div class="col-2 ">
                                                <input type="checkbox" class="radio" id="Phd" name="Phd" value="Phd">
                                                <span for="PhD">เอก</span>
                                            </div>

                                            <div class="col-2 ">
                                                <input type="checkbox" class="radio" id="Phd_form" name="Phd_form" value="level">
                                                <span for="Phd_form">แบบ 1.1 </span>
                                            </div>

                                            <div class="col-2 ">
                                                <input type="checkbox" class="radio" id="Phd_form" name="Phd_form" value="level">
                                                <span for="Phd_form">แบบ 1.2</span>
                                            </div>

                                            <div class="col-2 ">
                                                <input type="checkbox" class="radio" id="Phd_form" name="Phd_form" value="level">
                                                <span for="Phd_form">แบบ 2.1</span>
                                            </div>

                                            <div class="col-2 ">
                                                <input type="checkbox" class="radio" id="Phd_form" name="Phd_form" value="level">
                                                <span for="Phd_form">แบบ 2.2</span>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-2 "></div>

                                            <div class="col-2">
                                                <input type="checkbox" class="radio" id="ms" name="ms" value="ms">
                                                <span for="ms">โท</span>
                                            </div>

                                            <div class="col-2 ">
                                                <input type="checkbox" class="radio" id="form_ms" name="form_ms" value="level">
                                                <span for="form_ms">แผน ก แบบ ก 1</span>
                                            </div>

                                            <div class="col-2">
                                                <input type="checkbox" class="radio" id="form_ms" name="form_ms" value="level">
                                                <span for="form_ms">แบบ ก แบบ ก 2</span>
                                            </div>

                                            <div class="col-2 ">
                                                <input type="checkbox" class="radio" id="form_ms" name="form_ms" value="">
                                                <span for="form_ms">แผน ข</span>
                                            </div>

                                            <div class="col-2 "></div>
                                        </div>


                                        <div class="row">
                                            <div class="col-2"> </div>
                                            <div class="col-2 "> </div>
                                            <div class="col-2 ">
                                                <input type="radio" id="normal" name="semeter" value="normal">
                                                <span for="normal">ภาคปกติ</span>
                                            </div>

                                            <div class="col-4">
                                                <input type="radio" id="os" name="semeter" value="os">
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
                                                --- แสดง Email ---
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
                                                    echo $_SESSION['student_name'] . ' ' . $_SESSION['student_lastname'];
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
                                            <select id="selectTeacher">

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
        <?php include("./../admin/footer.php") ?>
    </div>
    <?php include("./../admin/scripts.php") ?>

</body>
<script src="./../admin/changepage.js"></script>
<script src="./../asset/dist/js/custom.js"></script>
<script>
    $(document).ready(function() {

        // ชื่ออาจารย์ที่ปรึกษา
        // ข้อมูลนักศึกษา


        $.ajax({
            url: "./../api/student/data.php?v=users", // Replace with the URL of your data source
            type: "GET",
            dataType: "json",
            success: function(Res) {
                if (Res.status == 'ok') {
                    $('#divDatecurrent').text(dateCurrent());
                    $('#divEmail').text(Res.data.student_email);
                    $('#divMajor').text(Res.data.major_name);
                    $("#imageSign").attr("src", "data:image/jpeg;base64," + Res.image_sign);
                    dataTeacher()
                } else {
                    alert(Res.msg);
                    window.location.replace('./../signature/');
                }

            },
            error: function(xhr, status, error) {
                console.log("Error: " + error);
            }
        });



        $("#btnSaveform").click(function() {
            //check dataที่ กรอก

            alert("save")
            var form = $('#form_doc')[0];
            var formdataA = new FormData(form);

            $.ajax({
                async: true,
                url: "./../api/documents/data.php?v=saveForm_1",
                type: "POST",
                cache: false,
                data: formdataA,
                processData: false, // tell jQuery not to process the data
                contentType: false,
                success: function(Res) {
                    console.log(Res);
                },
                error: function(xhr, status, error) {
                    console.log("Error:", error);
                }
            });
        });
    });

    function dataTeacher() {
        $.ajax({
            url: "./../api/student/data.php?v=teacherAll", // Replace with the URL of your data source
            type: "GET",
            dataType: "json",
            success: function(Res) {
                $("#selectTeacher").html('');
                
                $.each(Res, function(index, item) {
                    $("#selectTeacher").append($("<option>").text(item.user_name).val(item.id));
                });
            }
        });
    }
    // function dateCurrent() {
    //     var currentDate = new Date();
    //     var monthNames = [
    //         "มกราคม", "กุมภาพันธ์", "มีนาคม",
    //         "เมษายน", "พฤษภาคม", "มิถุนายน",
    //         "กรกฎาคม", "สิงหาคม", "กันยายน",
    //         "ตุลาคม", "พฤศจิกายน", "ธันวาคม"
    //     ];
    //     var day = currentDate.getDate();
    //     var month = currentDate.getMonth();
    //     var year = currentDate.getFullYear();
    //     var formattedDate = day + " " + monthNames[month] + " " + (year + 543);
    //     $('#divDatecurrent').text(formattedDate)
    // }
</script>