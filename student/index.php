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

        <?php include('./../admin/sidebar.php') ?>

        <div class="content-wrapper">

            <section class="content ">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">

                        <div class="col-12 mt-3">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title text-bold">ประวัติการยื่นเอกสาร</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <table id="tb_history" class="table table-bordered table-hover">
                                        <thead>
                                            <tr>
                                                <th>เรื่อง</th>
                                                <th>ไฟล์คำขอ</th>
                                                <th>วันที่ยื่นคำขอ</th>
                                                <th>สถานะการอนุมัติ</th>
                                                <th>Progress</th>

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

                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <?php include("./../admin/footer.php") ?>

    </div>

    <?php include("./../admin/scripts.php") ?>

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
            url: "./../api/documents/data.php?v=history_doc", // Replace with the URL of your data source
            type: "GET",
            dataType: "json",
            success: function(Res) {
                $('#tb_history tbody').html('');
                $.each(Res, function(index, item) {
                    console.log(item.data_approve.length)
                    var data_approve = '';
                    $.each(item.data_approve, function(i, data_) {
                        if (i != 0) {
                            // data_approve += '</tr>';
                        }
                        data_approve += '<td>' + data_.role_approve + '=>' + data_.status_approve + '<br/> วันที่อนุมัติ : ' + data_.date_approve + '</td>' +
                            '<td></td>' +
                            '</tr>';
                    })


                    $("#tb_history").append('<tr>' +
                        '<td style="vertical-align: middle;" rowspan=' + item.data_approve.length + '>' + item.form_title + '</td>' +
                        '<td style="vertical-align: middle;" rowspan=' + item.data_approve.length + '>Preview</td>' +
                        '<td style="vertical-align: middle;" rowspan=' + item.data_approve.length + '>' + item.date_insert + '</td>' +
                        data_approve);
                });
            },
            error: function(xhr, status, error) {
                console.log("Error: " + error);
            }
        });
        $("#tb_history").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": []
        }).buttons().container().appendTo('#tb_history_wrapper .col-md-6:eq(0)');

    });
</script>

</html>