<?php
include "./components/header.php";
include "./components/navbar.php";

// Connect database
include('./config/db.php');

if(isset($_POST['tenant_btn'])) {

    $agentid        = $conn->real_escape_string($_POST['agentid']);
    $firstname      = $conn->real_escape_string($_POST['firstname']);
    $lastname       = $conn->real_escape_string($_POST['lastname']);
    $clientname     = $conn->real_escape_string($_POST['clientname']);
    $reportid       = 'TNV'.rand(10000000000, 9999);
    $rpvisitdate    = $conn->real_escape_string($_POST['rpvisitdate']);
    $rpfirstname    = $conn->real_escape_string($_POST['rpfirstname']);
    $rplastname     = $conn->real_escape_string($_POST['rplastname']);
    $rpaddress      = $conn->real_escape_string($_POST['rpaddress']);
    $rpaddressdesc  = $conn->real_escape_string($_POST['rpaddressdesc']);
    $mwfirstname    = $conn->real_escape_string($_POST['mwfirstname']);
    $mwlastname     = $conn->real_escape_string($_POST['mwlastname']);
    $mwoccupation   = $conn->real_escape_string($_POST['mwoccupation']);
    $twaddress      = $conn->real_escape_string($_POST['twaddress']);
    $twaddressdesc  = $conn->real_escape_string($_POST['twaddressdesc']);
    $twfirstname    = $conn->real_escape_string($_POST['twfirstname']);
    $twlastname     = $conn->real_escape_string($_POST['twlastname']);
    $mwwoccupation  = $conn->real_escape_string($_POST['mwwoccupation']);
    $rpagentremark  = $conn->real_escape_string($_POST['rpagentremark']);
    $rpupload_path  = $conn->real_escape_string('upload/'.$_FILES['rpupload']['name']);
    $rpupload1_path = $conn->real_escape_string('upload/'.$_FILES['rpupload1']['name']);
    $rplatitude     = $conn->real_escape_string($_POST['rplatitude']);
    $rplongitude    = $conn->real_escape_string($_POST['rplongitude']);

    if (file_exists($rpupload_path))
    {
        $rpupload_path = $conn->real_escape_string('upload/'.uniqid().rand().$_FILES['rpupload']['name']);
    }

    if (file_exists($rpupload1_path))
    {
        $rpupload1_path = $conn->real_escape_string('upload/'.uniqid().rand().$_FILES['rpupload1']['name']);
    }

    $checker = 0;

    //make sure file type is image
    if (preg_match("!image!", $_FILES['rpupload']['type'])) {
        $checker ++;
    }
    if (preg_match("!image!", $_FILES['rpupload1']['type'])) {
        $checker ++;
    }
    if ($checker < 2){
        exit;
    }


    $query = "INSERT INTO tenant (agentid, reportid, firstname, lastname, clientname, rpvisitdate, rpfirstname, rplastname, rpaddress, rpaddressdesc, mwfirstname, mwlastname, mwoccupation, twaddress, twaddressdesc, twfirstname, twlastname, mwwoccupation, rpagentremark, rpupload, rpupload1, rplatitude, rplongitude)"
        . "VALUES ('$agentid', '$reportid', '$firstname', '$lastname', '$clientname', '$rpvisitdate', '$rpfirstname', '$rplastname', '$rpaddress', '$rpaddressdesc', '$mwfirstname', '$mwlastname', '$mwoccupation', '$twaddress', '$twaddressdesc', '$twfirstname', '$twlastname', '$mwwoccupation', '$rpagentremark', '$rpupload_path', '$rpupload1_path', '$rplatitude', '$rplongitude')";

    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {

        //copy image to upload folder
        copy($_FILES['rpupload']['tmp_name'], $rpupload_path);
        copy($_FILES['rpupload1']['tmp_name'], $rpupload1_path);

        $_SESSION['report_title'] = "Report Added";
        $_SESSION['report_message'] = "Tenant Verification has been added 👍";
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
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                                    <h6 class="heading-small text-muted mb-4">Tenant information</h6>
                                    <div class="row">
                                        <div class="col-lg-6" style="display: none">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-username">Agent ID</label>
                                                <input type="text" name="agentid" class="form-control" value="<?php echo $_SESSION['agentid']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6" style="display: none">
                                            <div class="form-group">
                                                <label for="example-date-input" class="form-control-label">Agent first Name</label>
                                                <input class="form-control" type="text" name="firstname" value="<?php echo $_SESSION['firstname']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6" style="display: none">
                                            <div class="form-group">
                                                <label for="example-date-input" class="form-control-label"Client Name</label>
                                                <input class="form-control" type="text" name="clientname" value="<?php echo $_SESSION['clientname']; ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6" style="display: none">
                                            <div class="form-group">
                                                <label for="example-date-input" class="form-control-label">Agent Last Name</label>
                                                <input class="form-control" type="text" name="lastname" value="<?php echo $_SESSION['lastname']; ?>" readonly>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-first-name">First Name</label>
                                                <input type="text" name="rpfirstname" required class="form-control" placeholder="Tenant First Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-last-name">Last Name</label>
                                                <input type="text" name="rplastname" required class="form-control" placeholder="Tenant Last Name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="example-date-input" class="form-control-label">Date of Visitation</label>
                                                <input class="form-control" type="date" required placeholder="2018-11-23" name="rpvisitdate">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-address">Tenant's Residential Address</label>
                                                <input name="rpaddress" class="form-control" required placeholder="7/9 Adebisi Oyenola street Idado Estate Etiosa, IGBOEFON, Lagos." type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Address Landmark & Description</label>
                                                <input type="text" name="rpaddressdesc" required class="form-control" placeholder="Chevron Lekki">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Met with First Name</label>
                                                <input type="text" name="mwfirstname" class="form-control" placeholder="Adaora">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Met with Last Name</label>
                                                <input type="text" name="mwlastname" class="form-control" placeholder="Chucks">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-city">Met with Occupation/Office</label>
                                                <input type="text" name="mwoccupation" class="form-control" placeholder="Engineer">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-city">Tenant's Work Address</label>
                                                <input type="text" name="twaddress" class="form-control" placeholder="Victoria island">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Work Address Landmark & Description</label>
                                                <input type="text" name="twaddressdesc" required class="form-control" placeholder="Chevron Lekki">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Work Address Met with First Name</label>
                                                <input type="text" name="twfirstname" class="form-control" placeholder="Kelvin">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Work Address Met with Last Name</label>
                                                <input type="text" name="twlastname" class="form-control" placeholder="Chucks">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-city">Work Address Met with Occupation/Office</label>
                                                <input type="text" name="mwwoccupation" class="form-control" placeholder="Engineer">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-address">Upload Onsite Picture</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" required name="rpupload" lang="en">
                                                    <label class="custom-file-label" for="customFileLang">Select file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-address">Upload Onsite Picture</label>
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" required name="rpupload1" lang="en">
                                                    <label class="custom-file-label" for="customFileLang">Select file</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6" style="display: none">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Latitude</label>
                                                <input type="text" name="rplatitude" class="form-control" id="rpLatitude">
                                            </div>
                                        </div>
                                        <div class="col-lg-6" style="display: none">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Longitude</label>
                                                <input type="text" name="rplongitude" class="form-control" id="rpLongitude">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-country" id="emLocation" name="emLocation"></label><br>
                                            <a class="btn btn-icon btn-default text-white" onclick="getLocation()">
                                                <span class="btn-inner--icon"><i class="ni ni-square-pin"></i></span>
                                                <span class="btn-inner--text">Get Location</span>
                                            </a>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Agent Remark</label>
                                        <textarea rows="4" name="rpagentremark" class="form-control" placeholder="Give full report about the verification and observations."></textarea>
                                    </div>
                                    <div class="text-center">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="tnCheck" name="tnCheck" required>
                                                <label class="custom-control-label" for="tnCheck">I hereby confirm that the information above are correct and accurate.
                                                </label>
                                            </div>
                                        </div>
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