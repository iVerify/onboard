<?php
include "./components/header.php";
include "./components/navbar.php";
?>
    <!-- Header -->
    <div class="header">
      <div class="container-fluid">
        <div class="header-body">
          <div class="row align-items-center text-center py-4">
            <div class="col-lg-12">
                <h1 class="header-title1">
                    <div id="greet" style="display: inline-flex"></div>
                    <?php echo $_SESSION['firstname']; ?>
                </h1>
                <p>Cheers to a productive <script>document.write(new Date().getFullYear());</script> ✨</p>
            </div>
          </div>

            <div class="container">
                <div class="row">
                  <div class="col">
                      <div class="card">
                          <div class="card-body">
                              <div class="text-center">
                                  <a href="report-category">
                                      <img src="assets/img/icons/report.svg" class="rounded-circle" style="left: 50%; width: 80px; transition: all .15s ease; border: 3px solid #fff; border-radius: .375rem;">
                                      <h3 class="pt-3">Upload Report</h3>
                                  </a>
                              </div>
                          </div>
                      </div>
                  </div>

                  <div class="col">
                      <div class="card">
                          <div class="card-body">
                              <div class="text-center">
                                  <a href="view-report-category">
                                      <img src="assets/img/icons/folder.svg" class="rounded-circle" style="left: 50%; width: 80px; transition: all .15s ease; border: 3px solid #fff; border-radius: .375rem;">
                                      <h3 class="pt-3">View Reports</h3>
                                  </a>
                              </div>
                          </div>
                      </div>
                  </div>

                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <a href="profile">
                                        <img src="assets/img/icons/profile.svg" class="rounded-circle" style="left: 50%; width: 80px; transition: all .15s ease; border: 3px solid #fff; border-radius: .375rem;">
                                        <h3 class="pt-3">Profile</h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center">
                                    <a href="logout">
                                        <img src="assets/img/icons/power.svg" class="rounded-circle" style="left: 50%; width: 80px; transition: all .15s ease; border: 3px solid #fff; border-radius: .375rem; background-color: ">
                                        <h3 class="pt-3">Log Out</h3>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div>
                                        <table class="table align-items-center">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="sort" data-sort="sn">S/N</th>
                                                <th scope="col" class="sort" data-sort="budget">Verifying Name</th>
                                                <th scope="col" class="sort" data-sort="status">Status</th>
                                                <th scope="col" class="sort" data-sort="completion">Verifying Company</th>
                                                <th scope="col" class="sort" data-sort="actions">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody class="list">
                                                <!--<tr>
                                                    <td class="budget">
                                                        1.
                                                    </td>
                                                    <td class="budget">
                                                        Emeka Adekunle
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-dot mr-4">
                                                          <i class="bg-warning"></i>
                                                          <span class="status">Pending</span>
                                                        </span>
                                                    </td>

                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <span class="completion mr-2">Innoson Motors limited</span>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <div class="dropdown">
                                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                <a class="dropdown-item" href="#">View</a>
                                                                <a class="dropdown-item" href="#">Modify</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="budget">
                                                        2.
                                                    </td>
                                                    <td class="budget">
                                                        Hadiza Aminu
                                                    </td>
                                                    <td>
                                                        <span class="badge badge-dot mr-4">
                                                          <i class="bg-success"></i>
                                                          <span class="status">Approved</span>
                                                        </span>
                                                    </td>

                                                    <td>
                                                        <div class="d-flex align-items-center">
                                                            <span class="completion mr-2">Next Oil Limited</span>
                                                        </div>
                                                    </td>
                                                    <td class="text-right">
                                                        <div class="dropdown">
                                                            <a class="btn btn-sm btn-icon-only text-light" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-ellipsis-v"></i>
                                                            </a>
                                                            <div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
                                                                <a class="dropdown-item" href="#">View</a>
                                                                <a class="dropdown-item" href="#">Modify</a>
                                                            </div>
                                                        </div>
                                                    </td>
                                                </tr>-->
                                            </tbody>
                                        </table>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include "./components/footer.php"; ?>