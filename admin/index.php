<?php

include('./header.php');

?>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

       
        <?php
            include ("./navbar.php")

        ?>
       
        <?php include('./sidebar.php') ?>

        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Dashboard</h1>
                        </div><!-- /.col -->
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Dashboard v1</li>
                            </ol>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div><!-- /.container-fluid -->
            </div>
            <section class="content">
                <div class="container-fluid">
                    <!-- Small boxes (Stat box) -->
                    <div class="row">
                        
                        dahsboard
                       
                    </div>
                    
                </div><!-- /.container-fluid -->
            </section>
            <!-- /.content -->
        </div>
        <?php include("./footer.php") ?>

    </div>

    <?php include("./scripts.php") ?>
   
</body>
<script src="./../admin/changepage.js?v=1"></script>
</html>