<?php

include('./../manage/header.php');
if ($_SESSION['_role'] != 'student') {
    header("Location: ./../error/");
}
?>
<link rel="stylesheet" href="./../asset/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
<link rel="stylesheet" href="./../asset/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
<link rel="stylesheet" href="./../asset/plugins/datatables-buttons/css/buttons.bootstrap4.min.css">

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">


        <?php
        include("./../manage/navbar.php")

        ?>

        <?php include('./../manage/sidebar.php') ?>

        <div class="content-wrapper">

            <section class="content ">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">

                        <div class="col-12 mt-3">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title text-bold">ประวัติการยื่นเอกสาร</h3>
                                    <div class="card-tools">
                                        <div class="input-group input-group-sm" style="width: 300px;">
                                            <input type="text" id="searchInput" class="form-control float-right" placeholder="ค้นหาข้อมูล">


                                            <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                                <i class="fas fa-minus"></i>
                                            </button>

                                        </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body">
                                    <div class="table-responsive">
                                        <table id="tb_historydoc" class="table table-bordered table-hover">
                                            <thead>
                                                <tr>
                                                    <th class="text-center">ลำดับ</th>
                                                    <th class="text-center">รหัสฟอร์ม</th>
                                                    <th class="text-center">เรื่อง</th>
                                                    <th class="text-center">วันที่ยื่นคำขอ</th>
                                                    <th>อาจารย์</th>
                                                    <th>ประธาน</th>
                                                    <th>คณบดี</th>
                                                    <th class="text-center">สถานะ</th>
                                                    <th class="text-center">preview</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            </tbody>
                                        </table>
                                    </div>
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
        <?php include("./../manage/footer.php") ?>

    </div>

    <?php include("./../manage/scripts.php") ?>

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
<script>
    $(function() {
        $('#searchInput').on('keyup', function() {
            const searchText = $(this).val().toLowerCase();
            $('#tb_historydoc tbody tr').each(function() {
                const rowText = $(this).text().toLowerCase();
                if (rowText.includes(searchText)) {
                    $(this).show();
                } else {
                    $(this).hide();
                }
            });
        });

        function convertDate(date) {
            var parts = date.split(" ");

            var datePart = parts[0];
            var parts2 = datePart.split("-");

            var formattedDate = parts2[2] + "/" + parts2[1] + "/" + parts2[0];

            return [formattedDate, parts[1]];

        }


        $.ajax({
            url: "./../api/doc/history.php?v=history_doc", // Replace with the URL of your data source
            type: "GET",
            dataType: "json",
            success: function(Res) {
                console.log(Res)
                $('#tb_historydoc tbody').html('')
                $.each(Res, function(index, item) {
                    var date_insert = convertDate(item.datetime);
                    $('#tb_historydoc tbody').append(`
                    <tr>
                        <td class="text-center">${index+1}</td>
                        <td class="text-center">${item.form_id}</td>
                        <td class="text-left">${item.general_form_title}</td>
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

            },
            error: function(xhr, status, error) {
                console.log("Error: " + error);
            }
        });



    });

    function modalDocShow(idDoc) {
        console.log(idDoc)
        var url = 'previewform.php?id=' + idDoc;
        window.location = url;

    }


</script>

</html>