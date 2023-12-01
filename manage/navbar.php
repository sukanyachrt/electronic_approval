<nav class="main-header navbar navbar-expand navbar-white navbar-light ">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
       
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
        
        <li class="nav-item dropdown user-menu">
            <a class="nav-link dropdown-toggle nav-profile d-flex align-items-center pe-0" href="#" data-toggle="dropdown" aria-expanded="false">
                <img src="./../asset/dist/img/user2-160x160.jpg" class="user-image img-circle elevation-2" alt="User Image">
                <span class="d-none d-md-block dropdown-toggle ps-2"></span>
            </a>
            <ul id="userDropdown" class="dropdown-menu dropdown-menu-lg dropdown-menu-right ">
                <li class="user-header bg-white">
                    <img src="./../asset/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
                </li>
                <li class="user-body bg-white text-center">
                    <?php echo $_SESSION["_name"].' '.$_SESSION["_lastname"]; ?>
                </li>
                <li class="user-footer text-center">
                    <a href="./../logout.php" class="btn btn-primary btn-flat">ออกจากระบบ</a>
                </li>
            </ul>
        </li>
    </ul>
</nav>