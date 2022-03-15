<?php
$page = 'dashboard';
include "./components/header.php";
include "./components/sidenav.php";
?>
    <!-- Main content -->
    <div class="main-content" id="panel">

<? include "./components/topnav.php"; ?>

    <!-- Header -->
    <div class="header bg-default pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                </div>
                <!-- Card stats -->
                <div class="row">
                    <div class="col-xl-6 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Verifications</h5>
                                        <?php
                                        $employeeResult = mysqli_query($conn, "SELECT id FROM employee");
                                        $countEmployee = mysqli_num_rows($employeeResult);

                                        $tenantResult = mysqli_query($conn, "SELECT id FROM tenant");
                                        $countTenant = mysqli_num_rows($tenantResult);

                                        $guarantorResult = mysqli_query($conn, "SELECT id FROM guarantor");
                                        $countGuarantor = mysqli_num_rows($guarantorResult);

                                        $previousworkResult = mysqli_query($conn, "SELECT id FROM previouswork");
                                        $countPreviouswork = mysqli_num_rows($previousworkResult);

                                        $totalIds = $countEmployee + $countTenant + $countGuarantor + $countPreviouswork;

                                        echo "<span class=\"h2 font-weight-bold mb-0\">".$totalIds."</span>";
                                        ?>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-red text-white rounded-circle shadow">
                                            <i class="ni ni-archive-2"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-nowrap">Total Verifications</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Messages</h5>
                                        <?php
                                        $countMessages = mysqli_query($conn, "SELECT id FROM messages");
                                        echo "<span class=\"h2 font-weight-bold mb-0\">".mysqli_num_rows($countMessages)."</span>";
                                        ?>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-orange text-white rounded-circle shadow">
                                            <i class="ni ni-chart-pie-35"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-nowrap">Total Messages Received</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Agents</h5>
                                        <?php
                                        $countAgents = mysqli_query($conn, "SELECT id FROM agents");
                                        echo "<span class=\"h2 font-weight-bold mb-0\">".mysqli_num_rows($countAgents)."</span>";
                                        ?>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-green text-white rounded-circle shadow">
                                            <i class="ni ni-single-02"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-nowrap">Total Agents Onboard</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="card card-stats">
                            <!-- Card body -->
                            <div class="card-body">
                                <div class="row">
                                    <div class="col">
                                        <h5 class="card-title text-uppercase text-muted mb-0">Admin</h5>
                                        <?php
                                        $countAdmin = mysqli_query($conn, "SELECT id FROM admin");
                                        echo "<span class=\"h2 font-weight-bold mb-0\">".mysqli_num_rows($countAdmin)."</span>";
                                        ?>
                                    </div>
                                    <div class="col-auto">
                                        <div class="icon icon-shape bg-gradient-info text-white rounded-circle shadow">
                                            <i class="ni ni-key-25"></i>
                                        </div>
                                    </div>
                                </div>
                                <p class="mt-3 mb-0 text-sm">
                                    <span class="text-nowrap">Total Admin Onboard</span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php include "./components/footer.php"; ?>