<?php
include "./components/header.php";
include "./components/navbar.php";

// Connect database
include('./config/db.php');

if(isset($_POST['employee_btn'])) {

    $agentID        = $conn->real_escape_string($_POST['agentID']);
    $firstName      = $conn->real_escape_string($_POST['firstName']);
    $lastName       = $conn->real_escape_string($_POST['lastName']);
    $reportID       = 'EMV'.rand(10000000000, 9999);
    $rpVisitDate    = $conn->real_escape_string($_POST['rpVisitDate']);
    $rpFirstName    = $conn->real_escape_string($_POST['rpFirstName']);
    $rpLastName     = $conn->real_escape_string($_POST['rpLastName']);
    $rpOccupation   = $conn->real_escape_string($_POST['rpOccupation']);
    $rpAddress      = $conn->real_escape_string($_POST['rpAddress']);
    $rpAddressDesc  = $conn->real_escape_string($_POST['rpAddressDesc']);
    $rpAgentRemark  = $conn->real_escape_string($_POST['rpAgentRemark']);
    $rpUpload_path  = $conn->real_escape_string('upload/'.$_FILES['rpUpload']['name']);
    $rpUpload1_path = $conn->real_escape_string('upload/'.$_FILES['rpUpload1']['name']);

    if (file_exists($rpUpload_path))
    {
        $rpUpload_path = $conn->real_escape_string('upload/'.uniqid().rand().$_FILES['rpUpload']['name']);
    }

    if (file_exists($rpUpload1_path))
    {
        $rpUpload1_path = $conn->real_escape_string('upload/'.uniqid().rand().$_FILES['rpUpload1']['name']);
    }

    $checker = 0;

    //make sure file type is image
    if (preg_match("!image!", $_FILES['rpUpload']['type'])) {
        $checker ++;
    }
    if (preg_match("!image!", $_FILES['rpUpload1']['type'])) {
        $checker ++;
    }
    if ($checker < 2){
        exit;
    }


    $query = "INSERT INTO employee (agentID, reportID, firstName, lastName, rpVisitDate, rpFirstName, rpLastName, rpOccupation, rpAddress, rpAddressDesc, rpAgentRemark, rpUpload, rpUpload1)"
        . "VALUES ('$agentID', '$reportID', '$firstName', '$lastName', '$rpVisitDate', '$rpFirstName', '$rpLastName', '$rpOccupation', '$rpAddress', '$rpAddressDesc', '$rpAgentRemark', '$rpUpload_path', '$rpUpload1_path')";

    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {

        //copy image to upload folder
        copy($_FILES['rpUpload']['tmp_name'], $rpUpload_path);
        copy($_FILES['rpUpload1']['tmp_name'], $rpUpload1_path);

        $_SESSION['report_title'] = "Report Added";
        $_SESSION['report_message'] = "Employee Verification has been added 👍";
    }
    else {
        $error=$conn->error;
        $_SESSION['error_report_title'] = "Error Occurred";
        $_SESSION['error_report_message'] = $error;
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
                        Employee Verification
                    </h1>
                    <p>Integrity is the seed for achievement <span style='font-size:15px;'>&#128519;</span></p>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 order-xl-1">
                        <div class="card">
                            <div class="card-body">
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                                    <h6 class="heading-small text-muted mb-4">Employee information</h6>
                                    <div class="row">
                                        <div class="col-lg-6" style="display: none">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Agent ID</label>
                                                <input type="text" name="agentID" class="form-control" value="<?php echo $_SESSION['agentID']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6" style="display: none">
                                            <div class="form-group">
                                                <label for="example-date-input" class="form-control-label">Agent first Name</label>
                                                <input class="form-control" type="text" name="firstName" value="<?php echo $_SESSION['firstName']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6" style="display: none">
                                            <div class="form-group">
                                                <label for="example-date-input" class="form-control-label">Agent Last Name</label>
                                                <input class="form-control" type="text" name="lastName" value="<?php echo $_SESSION['lastName']; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-first-name">First Name</label>
                                                <input type="text" name="rpFirstName" required class="form-control" placeholder="Desmond">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-last-name">Last Name</label>
                                                <input type="text" name="rpLastName" required class="form-control" placeholder="Fegor">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-city">Occupation/Office</label>
                                                <input type="text" name="rpOccupation" class="form-control" placeholder="Engineer">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-address">Address Visited</label>
                                                <input name="rpAddress" class="form-control" required placeholder="7/9 Adebisi Oyenola street Idado Estate Etiosa, IGBOEFON, Lagos." type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="example-date-input" class="form-control-label">Date of Visitation</label>
                                                <input class="form-control" type="date" required placeholder="2018-11-23" name="emVisitDate">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Address Landmark & Description</label>
                                                <input type="text" name="rpAddressDesc" required class="form-control" placeholder="Chevron Lekki">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-address">Upload Onsite Picture</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" required name="rpUpload" lang="en">
                                                    <label class="custom-file-label" for="customFileLang">Select file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-address">Upload Onsite Picture (optional)</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" name="rpUpload1" lang="en">
                                                    <label class="custom-file-label" for="customFileLang">Select file</label>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <div class="form-group">
                                            <div id="mapholder"></div>
                                            <label class="form-control-label" for="input-country" id="rpLocation"></label><br>
                                            <a class="btn btn-icon btn-default text-white" onclick="getLocation()">
                                                <span class="btn-inner--icon"><i class="ni ni-square-pin"></i></span>
                                                <span class="btn-inner--text">Get Location</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Agent Remark</label>
                                        <textarea rows="4" name="rpAgentRemark" class="form-control" placeholder="Give full report about the verification and observations."></textarea>
                                    </div>
                                    <div class="text-center">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="emCheck" name="emCheck" required>
                                                <label class="custom-control-label" for="emCheck">I hereby confirm that the information above are correct and accurate.
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center text-white">
                                        <div class="form-group">
                                            <button name="employee_btn" class="btn btn-icon btn-default" type="submit">
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