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
            url: "./../api/documents/data.php?v=header_data", // Replace with the URL of your data source
            type: "GET",
            dataType: "json",
            success: function(Res) {
                $('#tb_history thead').html();
                var tb_history='';
                $.each(Res[0], function(index, item) {
                   
                     tb_history+='<th class="text-center" rowspan="' + item.rows + '" colspan="' + item.cols + '">' + item.title + '</th>';




                    //     $.each(item.status, function(i, data_) {
                    //         if(i==0){
                    //             $("#tb_history thead").append('</tr><tr>');
                    //         }

                    //     $("#tb_history thead").append('<th>' + data_.title  + '</th>');

                    // });

                    // $("#tb_history thead").append(
                    //     '<th rowspan="2">' + item.title + '</th>');
                });
                //$('#tb_history thead').html('<tr>'+tb_history+'</tr>');

                var t_status='';
                $.each(Res[1], function(index, item) {
                  console.log(item.title)
                  t_status+='<th class="text-center">' + item.title + '</th>';
                   
                });
                $('#tb_history thead').html('<tr>'+tb_history+'</tr>'+t_status+'</tr>');
            }
        });
        $.ajax({
            url: "./../api/documents/data.php?v=history_doc", // Replace with the URL of your data source
            type: "GET",
            dataType: "json",
            success: function(Res) {
                // console.log(Res)
                $('#tb_history tbody').html('');
                $.each(Res, function(index, item) {
                    //   console.log(item.data_approve.length)
                    var data_approve = '';
                    $.each(item.data_approve, function(i, data_) {
                        if (data_.status_approve == undefined) {
                            data_approve += '<td class="text-center">-</td>';
                        } else {
                            data_approve += '<td>' + 'สถานะ : ' + data_.status_approve + '<br/> วันที่อนุมัติ : ' + data_.date_approve + '</td>';

                        }

                    })


                    $("#tb_history tbody").append('<tr>' +
                        '<td style="vertical-align: middle;">' + item.form_title + '</td>' +
                        '<td style="vertical-align: middle;" >Preview</td>' +
                        '<td style="vertical-align: middle;">' + item.date_insert + '</td>' +
                        data_approve +
                        '</tr>');
                });
            },
            error: function(xhr, status, error) {
                console.log("Error: " + error);
            }
        });


        // $("#tb_history").DataTable({
        //     "responsive": true,
        //     "lengthChange": false,
        //     "autoWidth": false,
        //     "buttons": []
        // }).buttons().container().appendTo('#tb_history_wrapper .col-md-6:eq(0)');

    });
</script>

</html>