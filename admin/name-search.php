<?php
$page = 'company';
include "./components/header.php";
include "./components/sidenav.php";
require_once "../config/auth_controller.php";
?>
    <!-- Main content -->
    <div class="main-content" id="panel">

<? include "./components/topnav.php"; ?>

    <!-- Add New Business Name Search -->
    <div class="modal fade" id="newNameSearch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body" style="background-color: #f7fafc;">
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <h6 class="heading-small text-muted mb-4">Name Search information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">Search Conducted by </label>
                                            <input type="text" name="conductedby" class="form-control" value="<? echo $_SESSION['firstName']; ?> <? echo $_SESSION['lastName']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">Search Date </label>
                                            <input class="form-control" type="date" required placeholder="2018-11-23" name="searchdate">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">Search Venue</label>
                                            <input type="text" class="form-control" name="searchvenue" placeholder="Lekki">
                                        </div>
                                    </div>
                                    <div class="col-lg-6" style="display: none">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">Username </label>
                                            <input type="text" name="username" class="form-control" value="<? echo $_SESSION['username']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-last-name">Client</label>
                                            <input type="text" name="clientname" id="search" autocomplete="off" class="form-control" placeholder="Search Client">
                                            <div id="here"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-last-name">Company Name</label>
                                            <input type="text" name="companyname" class="form-control" placeholder="Polaris Bank">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-last-name">Former Name (If Any)</label>
                                            <input type="text" name="formername" class="form-control" placeholder="Skye Bank">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-last-name">Registration Number</label>
                                            <input type="text" name="regnumber" class="form-control" placeholder="BN003632">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Registration Date</label>
                                            <input class="form-control" type="date" required placeholder="2018-11-23" name="regdate">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Company Type</label>
                                            <select class="form-select form-control" name="companytype" aria-label="Default select example">
                                                <option selected>Select Company Type</option>
                                                <option value="Business Name">Business Name</option>
                                                <option value="Company">Company</option>
                                                <option value="Incorporated Trustees">Incorporated Trustees</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-last-name">Registered Address</label>
                                            <input type="text" name="regaddress" class="form-control" placeholder="Oniru Victoria Island, Lagos.">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Company Main Object</label>
                                    <textarea rows="4" name="mainobjects" class="form-control" placeholder="What is the company main objective and purpose."></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Directors/Proprietors/Trustees</label>
                                    <textarea rows="4" name="directorsNproprietors" class="form-control" placeholder="List out company directors, proprietors or trustees."></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Agent Remark</label>
                                    <textarea rows="4" name="agentremark" class="form-control" placeholder="Give full report about the verification and observations."></textarea>
                                </div>
                            </div>
                            <div class="text-center text-white">
                                <div class="">
                                    <button name="bizname_search_btn" class="btn btn-icon btn-default" type="submit">
                                        <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                                        <span class="btn-inner--text">Submit Name Search</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add New Business Name Search -->


    <!-- Header -->
    <div class="header bg-default pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-12">
                        <h1 class="header-title1 text-white text-center pt-3">Business Name Search</h1>
                        <p class="text-center text-white">Integrity is the seed for achievement <span style='font-size:15px;'>&#128519;</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <div class="col px-0 pb-3 d-flex justify-content-between">
                        <input class="form-control w-25 mr-3 mb-0 filter" type="text" id="reportInput" onkeyup="reportFunction()" placeholder="Filter by Company Name">
                        <button class="btn btn-default" data-toggle="modal" data-target="#newNameSearch">Add New Name Search</button>
                    </div>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <div>
                        <table class="table align-items-center" id="reportData">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="sn">Report ID</th>
                                <th scope="col" class="sort" data-sort="sn">Conducted by</th>
                                <th scope="col" class="sort" data-sort="budget">Company Name</th>
                                <th scope="col" class="sort" data-sort="budget">Company Type</th>
                                <th scope="col" class="sort" data-sort="status">Status</th>
                                <!--<th scope="col" class="sort" data-sort="completion">Category</th>-->
                                <th scope="col" class="sort text-right" data-sort="actions">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            <?php
                            $select_query = "SELECT * FROM namesearch ORDER BY date ASC";
                            $result = mysqli_query($conn, $select_query);
                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    $id = $row['id'];
                                    $reportid = $row['reportid'];
                                    $conductedby = $row['conductedby'];
                                    $companyname  = $row['companyname'];
                                    $clientname = $row['clientname'];
                                    $companytype = $row['companytype'];
                                    $status         = $row['status'];
                                    switch ($status) {
                                        case "Pending";
                                            $class  = 'bg-warning';
                                            break;
                                        case "Approved";
                                            $class  = 'bg-success';
                                            break;
                                        default:
                                            $class  = '';
                                    }

                                    echo "<tr>";
                                    echo "<td class=\"budget\">" . $reportid . "</td>";
                                    echo "<td class=\"budget\">" . $conductedby. "</td>";
                                    echo "<td class=\"budget\">" . $companyname . "</td>";
                                    echo "<td class=\"budget\">" . $companytype . "</td>";
                                    echo "<td>" ."<span class=\"badge badge-dot mr-4\"> <i class=\"$class\"></i> <span class=\"status\" >$status</span> </span>". "</td>";

                                    echo "<td class='text-right'>"
                                        ."<a href=\"namesearchedit?id=$id\" class=\"btn btn-sm btn-icon btn-info\">
                                            <span class=\"btn-inner--icon\"><i class=\"ni ni-ruler-pencil\"></i></span>
                                            <span class=\"btn-inner--text\">Edit</span>
                                        </a>
                                        <a href=\"namesearchdetails?id=$id\" class=\"btn btn-sm btn-icon btn-default\" type=\"button\">
                                            <span class=\"btn-inner--icon\"><i class=\"ni ni-zoom-split-in\"></i></span>
                                            <span class=\"btn-inner--text\">View</span>
                                        </a>
                                        <a href=\"#?id=$id\" class=\"btn btn-icon btn-sm btn-danger\" type=\"button\">
                                            <span class=\"btn-inner--icon\"><i class=\"ni ni-archive-2\"></i></span>
                                            <span class=\"btn-inner--text\">Delete</span>
                                        </a>".
                                        "</td >";
                                    "</tr>";
                                }
                            }else {
                                echo "<td><p>No Reports Yet!</p></td>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Card footer -->
                <div class="card-footer py-4">
                <!--
                    <nav aria-label="...">
                        <ul class="pagination justify-content-end mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1">
                                    <i class="fas fa-angle-left"></i>
                                    <span class="sr-only">Previous</span>
                                </a>
                            </li>
                            <li class="page-item active">
                                <a class="page-link" href="#">1</a>
                            </li>
                            <li class="page-item">
                                <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                            </li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="fas fa-angle-right"></i>
                                    <span class="sr-only">Next</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                -->
                </div>
            </div>
        </div>
    </div>


<?php include "./components/footer.php"; ?>