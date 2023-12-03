<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="#" class="brand-link text-center">
        <span class="brand-text font-weight-light">ระบบยื่นเอกสารออนไลน์</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="./../asset/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">
                    <?php echo $_SESSION["_name"] . ' ' . $_SESSION["_lastname"]; ?>
                </a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item menu">
                    <a href="./../signature/" class="nav-link">
                        <i class='fas fa-file-signature'></i>
                        <p> ตั้งค่าลายเซ็น </p>
                    </a>
                </li>
                <?php
                if ($_SESSION['_role'] == "student") {
                ?>
                    <li class="nav-item menu-dropdown">
                        <a href="index.php" class="nav-link ">
                            <i class='far fa-file-alt'></i>
                            <p>เอกสารเกี่ยวกับบัณฑิตศึกษา
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="./../student/doc.php" class="nav-link ">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>ใบคำร้องทั่วไป บ.01</p>
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="nav-item menu">
                        <a href="./../student/" class="nav-link">
                            <i class='fas fa-history'></i>
                            <p> ประวัติการยื่นเอกสาร</p>
                        </a>
                    </li>
                <?php
                } else {
                ?>
                    <li class="nav-item menu">
                        <a href="./../<?php echo $_SESSION['_role'] ?>/" class="nav-link">
                            <i class='fas fa-file-signature'></i>
                            <p> เอกสารการอนุมัติ </p>
                        </a>
                    </li>
                <?php
                }
                ?>



            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>