<!-- Topnav -->
<nav class="navbar navbar-top navbar-expand navbar-dark bg-default border-bottom">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <!-- Navbar links -->
            <ul class="navbar-nav align-items-center  ml-md-auto ">
                <li class="nav-item d-xl-none">
                    <!-- Sidenav toggler -->
                    <div class="pr-3 sidenav-toggler sidenav-toggler-dark" data-action="sidenav-pin" data-target="#sidenav-main">
                        <div class="sidenav-toggler-inner">
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                            <i class="sidenav-toggler-line"></i>
                        </div>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="ni ni-bell-55"></i>
                    </a>
                    <div class="dropdown-menu dropdown-menu-xl  dropdown-menu-right  py-0 overflow-hidden">
                        <!-- Dropdown header -->
                        <div class="px-3 py-3">
                            <h6 class="text-sm text-muted m-0">You have <strong class="text-primary">13</strong> notifications.</h6>
                        </div>
                        <!-- List group -->
                        <div class="list-group list-group-flush">
                            <a href="#!" class="list-group-item list-group-item-action">
                                <div class="row align-items-center">
                                    <div class="col-auto">
                                        <!-- Avatar -->
                                        <img alt="Image placeholder" src="../assets/img/theme/team-1.jpg" class="avatar rounded-circle">
                                    </div>
                                    <div class="col ml--2">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div>
                                                <h4 class="mb-0 text-sm">John Snow</h4>
                                            </div>
                                            <div class="text-right text-muted">
                                                <small>2 hrs ago</small>
                                            </div>
                                        </div>
                                        <p class="text-sm mb-0">Let's meet at Starbucks at 11:30. Wdyt?</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <!-- View all -->
                        <a href="#!" class="dropdown-item text-center text-primary font-weight-bold py-3">View all</a>
                    </div>
                </li>
            </ul>
            <ul class="navbar-nav align-items-center  ml-auto ml-md-0 ">
                <li class="nav-item dropdown">
                    <a class="nav-link pr-0" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <div class="media align-items-center">
                  <span class="avatar avatar-sm rounded-circle">
                    <img alt="Image placeholder" src="https://i.imgur.com/WKOInUn.png">
                  </span>
                            <div class="media-body  ml-2  d-none d-lg-block">
                                <span class="mb-0 text-sm  font-weight-bold"><? echo $_SESSION['firstName']; ?></span>
                            </div>
                        </div>
                    </a>
                    <div class="dropdown-menu  dropdown-menu-right ">
                        <div class="dropdown-header noti-title">
                            <h6 class="text-overflow m-0">Welcome! <? echo $_SESSION['firstName']; ?></h6>
                        </div>
                        <a href="profile" class="dropdown-item">
                            <i class="ni ni-single-02"></i>
                            <span>My profile</span>
                        </a>
                        <a href="support" class="dropdown-item">
                            <i class="ni ni-support-16"></i>
                            <span>Support</span>
                        </a>
                        <div class="dropdown-divider"></div>
                        <a href="logout" class="dropdown-item">
                            <i class="ni ni-button-power"></i>
                            <span>Logout</span>
                        </a>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</nav>