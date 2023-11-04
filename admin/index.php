<?php

include('./header.php');

?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">


        <?php
        include("./navbar.php")

        ?>

        <?php include('./sidebar_admin.php') ?>

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



                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-success elevation-1"><i class="fas fa-shopping-cart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">ผ่านการอนุมัติ</span>
                                    <span class="info-box-number">760</span>
                                </div>
                                
                            </div>
                            
                        </div>


                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-shopping-cart"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">รอการอนุมัติ</span>
                                    <span class="info-box-number">760</span>
                                </div>
                                
                            </div>
                          
                        </div>
                        
                        <div class="col-12 col-sm-6 col-md-3">
                            <div class="info-box mb-3">
                                <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-users"></i></span>

                                <div class="info-box-content">
                                    <span class="info-box-text">ไม่ผ่านการอนุมัติ</span>
                                    <span class="info-box-number">2,000</span>
                                </div>
                                <!-- /.info-box-content -->
                            </div>
                            <!-- /.info-box -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-transparent">
                                    <h3 class="card-title">ผ่านการอนุมัติ</h3>

                                    <div class="card-tools">
                                        <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                            <i class="fas fa-minus"></i>
                                        </button>
                                        <button type="button" class="btn btn-tool" data-card-widget="remove">
                                            <i class="fas fa-times"></i>
                                        </button>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body p-0">
                                    <div class="table-responsive">
                                        <table class="table m-0" id="tbStatus_doc">
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
                                    <!-- /.table-responsive -->
                                </div>

                            </div>
                        </div>
                    </div>
                </div>

            </section>

        </div>

        <?php include("./footer.php") ?>

    </div>

    <?php include("./scripts.php") ?>

</body>
<script src="./../admin/changepage.js?v=1"></script>
<script>
    $(function() {
        ShowDataDoc();
    });

    function ShowDataDoc() {
        var dataFind = ["อนุมัติ", "รอการอนุมัติ", "ไม่อนุมัติ"];

        $.ajax({
            url: "./../api/documents/status_doc.php?v=checkstatus",
            type: "POST",
            cache: false,
            data: {
                dataFind: dataFind
            },
            success: function(Res) {
                console.log(Res);
                $('#tbStatus_doc tbody').html('');
                var tbStatus_doc = '';
                $.each(Res[0], function(index, item) {
                    data_approve='';
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
                    tbStatus_doc += '<tr>' +
                        '<td><button  onclick="modalDocShow(' + item.id + ')" type="button" class="badge badge badge-primary" >Preview</button></td>' +
                        '<td>' + item.form_title + '</td>' +
                        '<td>' + item.fullname + '</td>' +
                        '<td>' + date_insert[0] + '</td>' +
                        data_approve+
                        '</tr>';
                });
                $('#tbStatus_doc tbody').html(tbStatus_doc);
            }
        });
    }

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