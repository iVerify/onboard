<?php
$page = 'verifications';
include "./components/header.php";
include "./components/sidenav.php";
?>
<!-- Main content -->
<div class="main-content" id="panel">

    <? include "./components/topnav.php"; ?>

    <div class="header">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center text-center py-4">
                    <div class="col-lg-12">
                        <h1 class="header-title1 pt-3">
                            Verification Categories
                        </h1>
                        <p>Integrity is the seed for achievement <span style='font-size:15px;'>&#128519;</span></p>
                    </div>
                </div>

                <div class="container">
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <a href="employee-verifications">
                                            <img src="../assets/img/icons/employee.svg" class="rounded-circle" style="left: 50%; width: 80px; transition: all .15s ease; border: 3px solid #fff; border-radius: .375rem;">
                                            <h3 class="pt-3">Employee</h3>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-6">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <a href="tenant-verifications">
                                            <img src="../assets/img/icons/tenants.svg" class="rounded-circle" style="left: 50%; width: 80px; transition: all .15s ease; border: 3px solid #fff; border-radius: .375rem;">
                                            <h3 class="pt-3">Tenant</h3>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <a href="guarantor-verifications">
                                            <img src="../assets/img/icons/guarantor.svg" class="rounded-circle" style="left: 50%; width: 80px; transition: all .15s ease; border: 3px solid #fff; border-radius: .375rem;">
                                            <h3 class="pt-3">Guarantor</h3>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col">
                            <div class="card">
                                <div class="card-body">
                                    <div class="text-center">
                                        <a href="pwa-verifications">
                                            <img src="../assets/img/icons/work.svg" class="rounded-circle" style="left: 50%; width: 80px; transition: all .15s ease; border: 3px solid #fff; border-radius: .375rem;">
                                            <h3 class="pt-3">PWA</h3>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>



<?php include "./components/footer.php"; ?>