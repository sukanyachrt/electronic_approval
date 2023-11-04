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
                var tb_history = '';
                $.each(Res[0], function(index, item) {

                    tb_history += '<th class="text-center" rowspan="' + item.rows + '" colspan="' + item.cols + '">' + item.title + '</th>';

                });
                
                var t_status = '';
                $.each(Res[1], function(index, item) {
                    console.log(item.title)
                    t_status += '<th class="text-center">' + item.title + '</th>';

                });
                $('#tb_history thead').html('<tr>' + tb_history + '</tr>' + t_status + '</tr>');
            }
        });
        $.ajax({
            url: "./../api/documents/data.php?v=history_doc", // Replace with the URL of your data source
            type: "GET",
            dataType: "json",
            success: function(Res) {
                console.log(Res)
                $('#tb_history tbody').html('');
                $.each(Res, function(index, item) {
                    var data_approve = '';
                    $.each(item.data_approve, function(i, data_) {
                        if (data_.status_approve == undefined) {
                            data_approve += '<td class="text-center">-</td>';
                        } else {
                            var spanStatus = '';
                            if (data_.status_approve == "อนุมัติ") {
                                spanStatus = '<small class="badge badge-success">' + data_.status_approve + '</small>'
                            } else if (data_.status_approve == "รอการอนุมัติ") {
                                spanStatus = '<small class="badge badge-info">' + data_.status_approve + '</small>'
                            } else {
                                spanStatus = '<small class="badge badge-danger">' + data_.status_approve + '</small>'
                            }
                            var datetimeString = '-';
                            if (data_.date_approve != null) {
                                datetimeString = convertDate(data_.date_approve);

                            }



                            data_approve += '<td >' + 'สถานะ : ' + spanStatus + '<br/> วันที่อนุมัติ : ' + (datetimeString[0]) + '<br/> เวลาที่อนุมัติ : ' + (datetimeString[1]) + '</td>';

                        }

                    })


                    $("#tb_history tbody").append('<tr>' +
                        '<td style="vertical-align: middle;" ><button  onclick="modalDocShow(' + item.id + ')" type="button" class="badge badge badge-primary" >Preview</button></td>' +

                        '<td style="vertical-align: middle;">' + item.form_title + '</td>' +
                        '<td style="vertical-align: middle;">' + item.date_insert + '</td>' +
                        data_approve +
                        '</tr>');
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


    function convertDate(dateApr) {
        var parts = dateApr.split(" ");

        var datePart = parts[0];
        console.log(parts[1])
        var parts2 = datePart.split("-");

        var formattedDate = parts2[2] + "/" + parts2[1] + "/" + parts2[0];

        return [formattedDate, parts[1]];

    }
</script>

</html>