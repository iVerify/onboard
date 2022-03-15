<!-- Sidenav -->
<nav class="sidenav navbar navbar-vertical  fixed-left  navbar-expand-xs navbar-light bg-white" id="sidenav-main">
    <div class="scrollbar-inner">
        <!-- Brand -->
        <div class="sidenav-header  align-items-center">
            <a class="navbar-brand" href="\">
                <img src="../../assets/images/logo.png" class="navbar-brand-img" alt="...">
            </a>
        </div>
        <div class="navbar-inner">
            <!-- Collapse -->
            <div class="collapse navbar-collapse" id="sidenav-collapse-main">
                <!-- Nav items -->
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link <?php if($page=='dashboard'){echo 'active';}?>" href="\">
                            <i class="ni ni-align-left-2 text-default"></i>
                            <span class="nav-link-text">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item mt-3">
                        <a class="nav-link <?php if($page=='verifications'){echo 'active';}?>" href="verifications">
                            <i class="ni ni-archive-2  text-default"></i> Verifications
                        </a>
                    </li>
                    <li class="nav-item mt-3">
                        <a class="nav-link <?php if($page=='users'){echo 'active';}?>" href="agents">
                            <i class="ni ni-single-02 text-default"></i> Agents
                        </a>
                    </li>
                </ul>
                <!-- Divider -->
                <hr class="my-3 mt-3">
                <!-- Heading -->
                <h6 class="navbar-heading p-0 mt-3 text-muted">
                    <span class="docs-normal">Support</span>
                </h6>
                <!-- Navigation -->
                <ul class="navbar-nav mb-md-3 mt-3">
                    <li class="nav-item">
                        <a class="nav-link <?php if($page=='profile'){echo 'active';}?>" href="profile">
                            <i class="ni ni-circle-08 text-default"></i>
                            <span class="nav-link-text">Profile</span>
                        </a>
                    </li>
                    <li class="nav-item mt-3">
                        <a class="nav-link" href="mailto:thankgod.okoro@iverify.ng">
                            <i class="ni ni-support-16 text-default"></i>
                            <span class="nav-link-text">Get Support</span>
                        </a>
                    </li>
                    <li class="nav-item mt-3">
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