<?php
include "./components/header.php";
include "./components/navbar.php";

// Connect database
include('./config/db.php');

if (isset($_POST['tenant_btn'])) {

    $agentID        = $conn->real_escape_string($_POST['agentID']);
    $teVisitDate    = $conn->real_escape_string($_POST['teVisitDate']);
    $teFirstName    = $conn->real_escape_string($_POST['teFirstName']);
    $teLastName     = $conn->real_escape_string($_POST['teLastName']);
    $teOccupation   = $conn->real_escape_string($_POST['teOccupation']);
    $teAddress      = $conn->real_escape_string($_POST['teAddress']);
    $teAddressDesc  = $conn->real_escape_string($_POST['teAddressDesc']);
    $teAgentRemark  = $conn->real_escape_string($_POST['teAgentRemark']);

    $tenant_query = "INSERT INTO tenant (agentID, teVisitDate, teFirstName, teLastName, teOccupation, teAddress, teAddressDesc, teAgentRemark)"
                    . "VALUES ('$agentID', '$teVisitDate', '$teFirstName', '$teLastName', '$teOccupation', '$teAddress', '$teAddressDesc', '$teAgentRemark')";

    if ($conn->query($tenant_query) === TRUE) {
        $_SESSION['employee_report_title'] = "Report Added";
        $_SESSION['employee_report_message'] = "Employee Verification has been added 👍";
    }else {
        $error=$conn->error;
        $_SESSION['error_employee_report_title'] = "Error Occurred";
        $_SESSION['error_employee_report_message'] = "Please try again".$error;
    }
}
?>
    <div class="header">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center text-center py-4">
                <div class="pl-3">
                    <a href="report-category" class="btn btn-icon btn-default" type="button">
                        <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                        <span class="btn-inner--text">Go Back</span>
                    </a>
                </div>
                <div class="col-lg-12">
                    <h1 class="header-title1 pt-3">
                        Tenant Verification
                    </h1>
                    <p>Integrity is the seed for achievement <span style='font-size:15px;'>&#128519;</span></p>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-xl-12 order-xl-1">
                        <div class="card">
                            <div class="card-body">
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
                                    <h6 class="heading-small text-muted mb-4">Tenant information</h6>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Agent ID</label>
                                                <input type="text" name="agentID" id="agentID" class="form-control" value="<?php echo $_SESSION['agentID']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="example-date-input" class="form-control-label">Date of Visitation</label>
                                                <input class="form-control" type="date" placeholder="2018-11-23" name="teVisitDate" id="teVisitDate">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-first-name">First Name</label>
                                                <input type="text" name="teFirstName" id="teFirstName" class="form-control" placeholder="Desmond">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-last-name">Last Name</label>
                                                <input type="text" name="teLastName" id="teLastName" class="form-control" placeholder="Fegor">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-city">Occupation/Office</label>
                                                <input type="text" name="teOccupation" id="teOccupation" class="form-control" placeholder="Engineer">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-address">Address Visited</label>
                                                <input name="teAddress" id="teAddress" class="form-control" placeholder="7/9 Adebisi Oyenola street Idado Estate Etiosa, IGBOEFON, Lagos." type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-address">Upload Onsite Pictures</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="teUpload" id="teUpload" lang="en" multiple>
                                                    <label class="custom-file-label" for="customFileLang">Select file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Address Landmark & Description</label>
                                                <input type="text" name="teAddressDesc" id="teAddressDesc" class="form-control" placeholder="Chevron Lekki">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Agent Remark</label>
                                        <textarea rows="4" name="teAgentRemark" id="teAgentRemark" class="form-control" placeholder="Give full report about the verification and observations."></textarea>
                                    </div>
                                    <div class="text-center text-white">
                                        <div class="form-group">
                                            <button name="tenant_btn" class="btn btn-icon btn-default" type="submit">
                                                <span class="btn-inner--icon"><i class="ni ni-cloud-upload-96"></i></span>
                                                <span class="btn-inner--text">Upload Report</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<?php include "./components/footer.php"; ?>