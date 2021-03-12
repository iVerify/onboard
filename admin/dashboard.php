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
            <div class="col-xl-3 col-md-6">
              <div class="card card-stats">
                <!-- Card body -->
                <div class="card-body">
                  <div class="row">
                    <div class="col">
                      <h5 class="card-title text-uppercase text-muted mb-0">Verifications</h5>
                        <?php
                        $countEmployee = mysqli_query($conn, "SELECT id FROM employee");
                        $countTenant = mysqli_query($conn, "SELECT id FROM tenant");
                        $countGuarantor = mysqli_query($conn, "SELECT id FROM guarantor");
                        $countPWA = mysqli_query($conn, "SELECT id FROM previouswork");
                        $totalIds = ($countEmployee + $countTenant + $countGuarantor + $countPWA);
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
            <div class="col-xl-3 col-md-6">
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
            <div class="col-xl-3 col-md-6">
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
            <div class="col-xl-3 col-md-6">
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
    <!-- Page content -->
    <div class="container-fluid mt--6">
        <div class="row">
            <div class="col-xl-8">
                <div class="card bg-default">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-light text-uppercase ls-1 mb-1">Overview</h6>
                                <h5 class="h3 text-white mb-0">Sales value</h5>
                            </div>
                            <div class="col">
                                <ul class="nav nav-pills justify-content-end">
                                    <li class="nav-item mr-2 mr-md-0" data-toggle="chart" data-target="#chart-sales-dark" data-update="{&quot;data&quot;:{&quot;datasets&quot;:[{&quot;data&quot;:[0, 20, 10, 30, 15, 40, 20, 60, 60]}]}}" data-prefix="$" data-suffix="k">
                                        <a href="#" class="nav-link py-2 px-3 active" data-toggle="tab" style="background-color: #259dab;">
                                            <span class="d-none d-md-block">Month</span>
                                            <span class="d-md-none">M</span>
                                        </a>
                                    </li>
                                    <li class="nav-item" data-toggle="chart" data-target="#chart-sales-dark" data-update="{&quot;data&quot;:{&quot;datasets&quot;:[{&quot;data&quot;:[0, 20, 5, 25, 10, 30, 15, 40, 40]}]}}" data-prefix="$" data-suffix="k">
                                        <a href="#" class="nav-link py-2 px-3" data-toggle="tab">
                                            <span class="d-none d-md-block">Week</span>
                                            <span class="d-md-none">W</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>

                            <canvas id="chart-sales-dark" class="chart-canvas chartjs-render-monitor" width="2182" height="700" style="display: block; height: 350px; width: 1091px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-4">
                <div class="card">
                    <div class="card-header bg-transparent">
                        <div class="row align-items-center">
                            <div class="col">
                                <h6 class="text-uppercase text-muted ls-1 mb-1">Performance</h6>
                                <h5 class="h3 mb-0">Total orders</h5>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">

                        <div class="chart"><div class="chartjs-size-monitor"><div class="chartjs-size-monitor-expand"><div class=""></div></div><div class="chartjs-size-monitor-shrink"><div class=""></div></div></div>
                            <canvas id="chart-bars" class="chart-canvas chartjs-render-monitor" width="2182" height="700" style="display: block; height: 350px; width: 1091px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
      <div class="row">
        <div class="col-xl-12">
          <div class="card">
            <div class="card-header border-0">
                <div class="col px-0 pb-3 d-flex justify-content-between">
                    <h3 class="mb-0">Reports</h3>
                    <input class="form-control w-25 mr-3 mb-0 filter" type="text" id="reportInput" onkeyup="reportFunction()" placeholder="Filter reports by name">
                </div>
            </div>
            <div class="table-responsive">
              <!-- Projects table -->
              <table class="table align-items-center table-flush" id="reportData">
                <thead class="thead-light">
                  <tr>
                    <th scope="col">S/N</th>
                    <th scope="col">Report No.</th>
                    <th scope="col">Name</th>
                    <th scope="col">Status</th>
                    <th scope="col" class="text-right">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <th scope="row">
                      /argon/
                    </th>
                    <td>
                      4,569
                    </td>
                    <td>
                      340
                    </td>
                    <td>
                      <i class="fas fa-arrow-up text-success mr-3"></i> 46,53%
                    </td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
<?php include "./components/footer.php"; ?>