<?php
$page = 'company';
include "./components/header.php";
include "./components/sidenav.php";
require_once "../config/auth_controller.php";

$id = $_GET['id'];
$query = "SELECT * FROM namesearch WHERE id='$id'";
$results = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($results)) {
    $id = $row['id'];
    $reportid = $row['reportid'];
    $username = $row['username'];
    $conductedby = $row['conductedby'];
    $clientname = $row['clientname'];
    $searchdate = $row['searchdate'];
    $searchvenue = $row['searchvenue'];
    $companyname = $row['companyname'];
    $formername = $row['formername'];
    $regnumber = $row['regnumber'];
    $regdate = $row['regdate'];
    $companytype = $row['companytype'];
    $regaddress = $row['regaddress'];
    $mainobjects = $row['mainobjects'];
    $directorsNproprietors = $row['directorsNproprietors'];
    $agentremark = $row['agentremark'];
    $status = $row['status'];
    switch ($status) {
        case "Pending";
            $class  = 'badge-warning';
            break;
        case "Approved";
            $class  = 'badge-success';
            break;
        default:
            $class  = '';

    }

?>
    <!-- Main content -->
    <div class="main-content" id="panel">

<? include "./components/topnav.php"; ?>


    <!-- Header -->
    <div class="header bg-default pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-12">
                        <h1 class="header-title1 text-white text-center pt-3"><? echo $companyname?>'s Details</h1>
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
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                        <label class="form-control-label mb-4 heading-small"><strong>Verification Status:</strong> <span class="badge <? echo $class ?>"><? echo $status ?></span></label>
                        <div class="pl-lg-4">
                            <div class="row">
                                <div class="col-lg-6" style="display: none">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">id</label>
                                        <input type="text" name="id" class="form-control" value="<?php echo $id ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-position">Update Verification Status</label>
                                        <select class="form-select form-control" name="status" aria-label="Default select example">
                                            <option selected value="<? echo $status ?>">Select Status</option>
                                            <option value="Approved">Approved</option>
                                            <option value="Pending">Pending</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6" style="display: none">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">Search Conducted by </label>
                                        <input type="text" name="conductedby" class="form-control" value="<? echo $firstName; ?> <? echo $lastName; ?>" readonly>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">Search Date </label>
                                        <input class="form-control" type="date" required value="<? echo $searchdate ?>" name="searchdate">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">Search Venue</label>
                                        <input type="text" class="form-control" name="searchvenue" value="<? echo $searchvenue ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6" style="display: none">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-first-name">Username </label>
                                        <input type="text" name="username" class="form-control" value="<? echo $username ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-last-name">Client</label>
                                        <input type="text" name="clientname" id="search" autocomplete="off" class="form-control" value="<? echo $clientname ?>">
                                        <div id="here"></div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-last-name">Company Name</label>
                                        <input type="text" name="companyname" class="form-control" value="<? echo $companyname ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-last-name">Former Name (If Any)</label>
                                        <input type="text" name="formername" class="form-control" value="<? echo $formername ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-last-name">Registration Number</label>
                                        <input type="text" name="regnumber" class="form-control" value="<? echo $regnumber ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Registration Date</label>
                                        <input class="form-control" type="date" required value="<? echo $regdate ?>" name="regdate">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-email">Company Type</label>
                                        <select class="form-select form-control" name="companytype" aria-label="Default select example">
                                            <option selected><? echo $companytype ?> </option>
                                            <option value="Business Name">Business Name</option>
                                            <option value="Company">Company</option>
                                            <option value="Incorporated Trustees">Incorporated Trustees</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label class="form-control-label" for="input-last-name">Registered Address</label>
                                        <input type="text" name="regaddress" class="form-control" value="<? echo $regaddress ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Company Main Object</label>
                                <textarea rows="4" name="mainobjects" class="form-control"><? echo $mainobjects ?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Directors/Proprietors/Trustees</label>
                                <textarea rows="4" name="directorsNproprietors" class="form-control"><? echo $directorsNproprietors ?></textarea>
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Agent Remark</label>
                                <textarea rows="4" name="agentremark" class="form-control"><? echo $agentremark ?></textarea>
                            </div>
                        </div>
                        <div class="text-center text-white">
                            <div class="">
                                <button name="bizname_update_btn" class="btn btn-icon btn-default" type="submit">
                                    <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                                    <span class="btn-inner--text">Update Name Search</span>
                                </button>
                            </div>
                        </div>
                    </form>
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
<?php } ?>

<?php include "./components/footer.php"; ?>