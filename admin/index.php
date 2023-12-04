<?php

include('./../manage/header.php');
if($_SESSION['_role']!='admin'){
    header("Location: ./../error/");
}
?>

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
                            <h1 class="m-0">เอกสารการยื่นของนักศึกษา</h1>
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
                                    <span class="info-box-text">เสร็จสิ้น</span>
                                    <span class="info-box-number" id="apr_apr">0</span>
                                </div>

                                <div class="checkbox-wrapper-39">
                                    <label>
                                        <input type="checkbox" class="checkbox1" checked value="เสร็จสิ้น" />
                                        <span class="checkbox"></span>
                                    </label>
                                </div>
                            </div>
                        </div>






                        <div class="col-12 col-sm-6 col-md-3 checkbox1" style="cursor: pointer;">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-regular fa-circle"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">กำลังดำเนินการ</span>
                                    <span class="info-box-number" id="apr_wait">0</span>
                                </div>

                                <div class="checkbox-wrapper-39">
                                    <label>
                                        <input type="checkbox" class="checkbox1" value="กำลังดำเนินการ" />
                                        <span class="checkbox"></span>
                                    </label>
                                </div>
                            </div>

                        </div>

                        <div class="col-12 col-sm-6 col-md-3" style="cursor: pointer;">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-window-close"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">แก้ไข</span>
                                    <span class="info-box-number" id="apr_noapr">0</span>
                                </div>

                                <div class="checkbox-wrapper-39">
                                    <label>
                                        <input type="checkbox" class="checkbox1" value="แก้ไข" />
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
                                        <table class="table m-0" id="tbStatus_doc">
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

</body>
<script src="./../manage/changepage.js?v=1"></script>
<script>
    $(function() {
        countStatusAdmin();
        const checkbox = $('.checkbox1[value="เสร็จสิ้น"]');
        checkbox.prop('checked', true);

        if (checkbox.is(':checked')) {
            checkbox.closest('.info-box').addClass('selected-card');
        } else {
            checkbox.closest('.info-box').removeClass('selected-card');
        }
        var dataFind = ["เสร็จสิ้น"];
        ShowDataDoc(dataFind);

    });

    function countStatusAdmin(){
        $.ajax({
            url: "./../api/doc/status_doc.php?v=countStatusAdmin",
            type: "GET",
            success: function(Res) {
                console.log("ddd");
                console.log(Res);
                $.each(Res, function(index, item) {
                    if (item.status_doc == "เสร็จสิ้น") {
                        $('#apr_apr').text(item.numrow + " รายการ")

                    } else if (item.status_doc == "กำลังดำเนินการ") {
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
            url: "./../api/doc/status_doc.php?v=checkstatusAdmin",
            type: "POST",
            cache: false,
            data: {
                dataFind: dataFind
            },
            success: function(Res) {
                console.log(Res);
                
                $('#tbStatus_doc tbody').html('')
                $.each(Res, function(index, item) {
                    var date_insert = convertDate(item.datetime);
                    $('#tbStatus_doc tbody').append(`
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
                        <td class="text-center" style="vertical-align: middle;" ><button  onclick="modalDocShow(${item.form_id})" type="button" class="badge badge badge-primary" >Preview</button></td>
                    </tr>
                    `);

                });

                // $.each(Res[0], function(index, item) {
                //     data_approve = '';
                //     $.each(item.data_approve, function(i, data_) {
                //         if (data_.status_approve == undefined) {
                //             data_approve += '<td>-</td>';
                //         } else {
                //             var spanStatus = '';
                //             if (data_.status_approve == "อนุมัติ") {
                //                 spanStatus = '<small class="badge badge-success">' + data_.status_approve + '</small>'
                //             } else if (data_.status_approve == "รอการอนุมัติ") {
                //                 spanStatus = '<small class="badge badge-info">' + data_.status_approve + '</small>'
                //             } else {
                //                 spanStatus = '<small class="badge badge-danger">' + data_.status_approve + '</small>'
                //             }


                //             data_approve += '<td>' + spanStatus + '</td>';

                //         }

                //     })


                //     var date_insert = convertDate(item.date_insert);
                //     tbStatus_doc += '<tr>' +
                //         '<td><button  onclick="modalDocShow(' + item.id + ')" type="button" class="badge badge badge-primary" >Preview</button></td>' +
                //         '<td>' + item.form_title + '</td>' +
                //         '<td>' + item.fullname + '</td>' +
                //         '<td>' + date_insert[0] + '</td>' +
                //         data_approve +
                //         '</tr>';
                // });
                // $('#tbStatus_doc tbody').html(tbStatus_doc);
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
        $('#tbStatus_doc tbody tr').each(function() {
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