<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="\">
                <img src="../assets/images/logo.png" class="navbar-brand-img" alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php if($page=='dashboard'){echo 'active';}?>" href="dashboard">
                            <i class="ni ni-align-left-2 text-default"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($page=='verifications'){echo 'active';}?>" href="verifications">
                            <i class="ni ni-archive-2  text-default"></i> Verifications
                        </a>
                    </li>
                    <li class="nav-item dropdown user ">
                        <a class="nav-link dropdown-toggle <?php if($page=='company'){echo 'active';}?>" href="" role="button" data-toggle="dropdown">
                            <i class="ni ni-building  text-default"></i> Company Search
                        </a>
                        <div class="dropdown-menu" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="name-search">Business Name Search</a>
                            <a class="dropdown-item" href="ltd-search">LTD Search</a>
                        </div>
                    </li>
                    <li class="nav-item dropdown user ">
                        <a class="nav-link dropdown-toggle <?php if($page=='users'){echo 'active';}?>" href="" role="button" data-toggle="dropdown">
                            <i class="ni ni-single-02 text-default"></i> Users
                        </a>
                        <div class="dropdown-menu" aria-labelledby="userDropdown">
                            <a class="dropdown-item" href="agents">Agents</a>
                            <a class="dropdown-item" href="admins">Admins</a>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($page=='clients'){echo 'active';}?>" href="clients">
                            <i class="ni ni-briefcase-24 text-default"></i>
                            <span class="nav-link-text">Clients</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($page=='messages'){echo 'active';}?>" href="messages">
                            <i class="ni ni-chat-round text-default"></i>
                            <span class="nav-link-text">Messages</span>
                        </a>
                    </li>
                    <!--
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="ni ni-notification-70 text-default"></i>
                            <span class="nav-link-text">News</span>
                        </a>
                    </li>
                    -->
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="ni ni-books text-default"></i>
                            <span class="nav-link-text">Schedule Verification</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php if($page=='send-report'){echo 'active';}?>" href="send-report">
                            <i class="ni ni-send text-default"></i>
                            <span class="nav-link-text">Send Report</span>
                        </a>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="my-3">
                <!-- Heading -->
                <h6 class="navbar-heading p-0 text-muted">
                    <span class="docs-normal">Support</span>
                </h6>
                <!-- Navigation -->
                <ul class="navbar-nav mb-md-3">
                    <li class="nav-item">
                        <a class="nav-link <?php if($page=='profile'){echo 'active';}?>" href="profile">
                            <i class="ni ni-circle-08 text-default"></i>
                            <span class="nav-link-text">Profile</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="mailto:thankgod.okoro@iverify.ng">
                            <i class="ni ni-support-16 text-default"></i>
                            <span class="nav-link-text">Get Support</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="404">
                            <i class="ni ni-bullet-list-67 text-default"></i>
                            <span class="nav-link-text">Logs</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link active active-pro" href="logout">
                            <i class="ni ni-button-power text-dark"></i>
                            <span class="nav-link-text">Logout</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>