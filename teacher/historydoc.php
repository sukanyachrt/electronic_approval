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

                        <a class="col-12 col-sm-6 col-md-3 " style="cursor: pointer;">
                            <div class="info-box mb-3 selected-card">
                                <span class="info-box-icon bg-primary elevation-1"><i class="fas fa-solid fa-check"></i></span>

                                <div class="info-box-content ">
                                    <span class="info-box-text">ประวัติการอนุมัติที่ผ่านมา</span>
                                    <span class="info-box-number" id="apr_historyApr">0</span>
                                </div>


                            </div>
                        </a>
                        <a class="col-12 col-sm-6 col-md-3" style="cursor: pointer;" href="./">
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
                                                    <th rowspan="2" style="vertical-align: middle;" class="text-center">Preview</th>
                                                    <th rowspan="2" style="vertical-align: middle;" class="text-left">เรื่อง</th>
                                                    <th rowspan="2" style="vertical-align: middle;" class="text-center">ผู้ส่งคำขอ</th>
                                                    <th rowspan="2" style="vertical-align: middle;" class="text-center">วันที่ยื่นคำขอ</th>
                                                    <th colspan="3" style="vertical-align: middle; border-left: 2px solid #eeeeee;" class="text-center">สถานะ</th>
                                                </tr>
                                                <tr>
                                                    <th style="border-left: 2px solid #eeeeee;">อาจารย์</th>
                                                    <th>ประธาน</th>
                                                    <th>คณะบดี</th>

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
        <?php include("./../admin/footer.php") ?>

    </div>

    <?php include("./../admin/scripts.php") ?>

</body>
<script src="./../admin/changepage.js"></script>
<script>
    $(function() {
        ShowDataDoc();
        CountStatus();
       


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


    function ShowDataDoc() {


        $.ajax({
            url: "./../api/documents/status_doc.php?v=checkstatusApr",
            type: "POST",
            success: function(Res) {
                console.log(Res);
                $('#tbHistory_doc tbody').html('');
                var tbHistory_doc = '';
                $.each(Res[0], function(index, item) {
                    data_approve = '';
                    $.each(item.data_approve, function(i, data_) {
                        if (data_.status_approve == undefined) {
                            data_approve += '<td>-</td>';
                        } else {
                            var spanStatus = '';
                            if (data_.status_approve == "อนุมัติ") {
                                spanStatus = '<small class="badge badge-success">' + data_.status_approve + '</small>'
                            } else if (data_.status_approve == "รอการอนุมัติ") {
                                spanStatus = '<small class="badge badge-info">' + data_.status_approve + '</small>'
                            } else {
                                spanStatus = '<small class="badge badge-danger">' + data_.status_approve + '</small>'
                            }


                            data_approve += '<td>' + spanStatus + '</td>';

                        }

                    })


                    var date_insert = convertDate(item.date_insert);
                    tbHistory_doc += '<tr>' +
                        '<td><button  onclick="modalDocShow(' + item.id + ')" type="button" class="badge badge badge-primary" >Preview</button></td>' +
                        '<td>' + item.form_title + '</td>' +
                        '<td>' + item.fullname + '</td>' +
                        '<td>' + date_insert[0] + '</td>' +
                        data_approve +
                        '</tr>';
                });
                $('#tbHistory_doc tbody').html(tbHistory_doc);
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