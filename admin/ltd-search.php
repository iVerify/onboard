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
    <div class="modal fade" id="newLtdSearch" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body" style="background-color: #f7fafc;">
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <h6 class="heading-small text-muted mb-4">LTD Search information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Search Conducted by </label>
                                            <input type="text" name="conductedby" class="form-control" value="<? echo $_SESSION['firstName']; ?> <? echo $_SESSION['lastName']; ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Search Date </label>
                                            <input class="form-control" type="date" required placeholder="2018-11-23" name="searchdate">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Search Venue</label>
                                            <input type="text" class="form-control" name="searchvenue" placeholder="Lekki">
                                        </div>
                                    </div>
                                    <div class="col-lg-6" style="display: none">
                                        <div class="form-group">
                                            <label class="form-control-label">Username </label>
                                            <input type="text" name="username" class="form-control" value="<? echo $_SESSION['username']; ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Client</label>
                                            <input type="text" name="clientname" id="search" autocomplete="off" class="form-control" placeholder="Search Client">
                                            <div id="here"></div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Company Name</label>
                                            <input type="text" name="companyname" class="form-control" placeholder="Polaris Bank">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Former Name (If Any)</label>
                                            <input type="text" name="formername" class="form-control" placeholder="Skye Bank">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Registration Number</label>
                                            <input type="text" name="regnumber" class="form-control" placeholder="BN003632">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Registration Date</label>
                                            <input class="form-control" type="date" required placeholder="2018-11-23" name="regdate">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Company Type</label>
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
                                            <label class="form-control-label">Registered Address</label>
                                            <input type="text" name="regaddress" class="form-control" placeholder="Oniru Victoria Island, Lagos.">
                                        </div>
                                    </div>
                                </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Company Main Object</label>
                                        <textarea rows="4" name="mainobjects" class="form-control" placeholder="What is the company main objective and purpose."></textarea>
                                    </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Borrowing Power (If Any)</label>
                                            <input type="text" name="borrowpower" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Share Capital at Incorporation (If Any)</label>
                                            <input type="text" name="sharecapitalinc" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Current Share Capital (If Any)</label>
                                            <input type="text" name="sharecapital" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Class of Shares (If Any)</label>
                                            <input type="text" name="shareclass" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Paid up Capital Under Each Class (If Any)</label>
                                            <input type="text" name="paidupcapital" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Issued but Unpaid Shares (If Any)</label>
                                            <input type="text" name="issuedbutunpaid" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Share Taken Up Payable in Cash (If Any)</label>
                                            <input type="text" name="sharetakenup" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Annual Returns Status (If Any)</label>
                                            <input type="text" name="annualreturns" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Registered Charges (If Any)</label>
                                            <input type="text" name="registeredcharges" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label">Company Secretary</label>
                                            <input type="text" name="companysecretary" class="form-control" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Directors/Proprietors/Trustees</label>
                                    <textarea rows="4" name="directorsNproprietors" class="form-control" placeholder="List out company directors, proprietors or trustees."></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Shareholders/Shareholding Structure</label>
                                    <textarea rows="4" name="shareholders" class="form-control" placeholder="List out shareholders and structure."></textarea>
                                </div>
                                <div class="form-group">
                                    <label class="form-control-label">Agent Remark</label>
                                    <textarea rows="4" name="agentremark" class="form-control" placeholder="Give full report about the verification and observations."></textarea>
                                </div>
                            </div>
                            <div class="text-center text-white">
                                <div class="">
                                    <button name="ltd_search_btn" class="btn btn-icon btn-default" type="submit">
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
                        <h1 class="header-title1 text-white text-center pt-3">Limited Liability Search</h1>
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
                <div class="card-body">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <div class="col px-0 pb-3 d-flex justify-content-between">
                            <button class="btn btn-default" data-toggle="modal" data-target="#newLtdSearch">Add New LTD Search</button>
                        </div>
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table id="datatables-basic" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Contact Name</th>
                                    <th>Phone No.</th>
                                    <th>Company Name</th>
                                    <th>Status</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                                <tbody>
                                <?php
                                $select_query = "SELECT * FROM ltdsearch WHERE username = '$username' ORDER BY date ASC";
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
                                            ."<a href=\"ltdsearchedit?id=$id\" class=\"btn btn-sm btn-icon btn-info\">
                                                <span class=\"btn-inner--icon\"><i class=\"ni ni-ruler-pencil\"></i></span>
                                                <span class=\"btn-inner--text\">Edit</span>
                                            </a>
                                            <a href=\"ltdsearchdetails?id=$id\" class=\"btn btn-sm btn-icon btn-default\" type=\"button\">
                                                <span class=\"btn-inner--icon\"><i class=\"ni ni-zoom-split-in\"></i></span>
                                                <span class=\"btn-inner--text\">View</span>
                                            </a>
                                            <a href=\"#?id=$id\" class=\"btn btn-sm btn-icon btn-danger\" type=\"button\">
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
                            <tfoot>
                                <tr>
                                    <th>Report ID</th>
                                    <th>Conducted by</th>
                                    <th>Company Name</th>
                                    <th>Company Type</th>
                                    <th>Status</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>


<?php include "./components/footer.php"; ?>