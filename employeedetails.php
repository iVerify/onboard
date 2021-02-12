<?php
include "./components/header.php";
include "./components/navbar.php";

// Connect database
include('./config/db.php');

$id = $_GET['id'];
$query = "SELECT * FROM employee WHERE id='$id'";
$results = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($results)) {
    $id = $row['id'];
    $agentID = $row['agentID'];
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
    $clientName = $row['clientName'];
    $reportID = $row['reportID'];
    $rpVisitDate = $row['rpVisitDate'];
    $rpFirstName = $row['rpFirstName'];
    $rpLastName = $row['rpLastName'];
    $rpAddress = $row['rpAddress'];
    $rpAddressDesc = $row['rpAddressDesc'];
    $mwFirstName = $row['mwFirstName'];
    $mwLastName = $row['mwLastName'];
    $mwOccupation = $row['mwOccupation'];
    $rpAgentRemark = $row['rpAgentRemark'];
    $rpUpload = $row['rpUpload'];
    $rpUpload1 = $row['rpUpload1'];
    $rpLatitude = $row['rpLatitude'];
    $rpLongitude = $row['rpLongitude'];

    ?>
    <div class="header">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center text-center py-4">
                <div class="pl-3">
                    <a href="employee-reports" class="btn btn-icon btn-default" type="button">
                        <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                        <span class="btn-inner--text">Go Back</span>
                    </a>
                </div>
                <div class="col-lg-12">
                    <h1 class="header-title1 pt-3">
                        <? echo $rpFirstName; ?>'s Details
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
                                                <label for="example-date-input" class="form-control-label">Client Name</label>
                                                <input class="form-control" type="text" name="clientName" value="<?php echo $_SESSION['clientName']; ?>" readonly>
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
                                                <input type="text" name="rpFirstName" required class="form-control" value="<?php echo $rpFirstName; ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-last-name">Last Name</label>
                                                <input type="text" name="rpLastName" required class="form-control" value="<? echo $rpLastName ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="example-date-input" class="form-control-label">Date of Visitation</label>
                                                <input class="form-control" type="text" required value="<? echo $rpVisitDate ?>" name="rpVisitDate" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-address">Address Visited</label>
                                                <input name="rpAddress" class="form-control" required value="<? echo $rpAddress ?>" type="text" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Address Landmark & Description</label>
                                                <input type="text" name="rpAddressDesc" required class="form-control" value="<? echo $rpAddressDesc ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Met with First Name</label>
                                                <input type="text" name="mwFirstName" class="form-control" value="<? echo $mwFirstName ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Met with Last Name</label>
                                                <input type="text" name="mwLastName" class="form-control" value="<? echo $mwLastName ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-city">Met with Occupation/Office</label>
                                                <input type="text" name="mwOccupation" class="form-control" value="<? echo $mwOccupation ?>" disabled>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card" style="width:300px;height:300px;">
                                                <img class="card-img-top" src="<? echo $rpUpload ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="card" style="width:300px;height:300px;">
                                                <img class="card-img-top" src="<? echo $rpUpload1 ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6" style="display: none">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Latitude</label>
                                                <input type="text" name="rpLatitude" class="form-control" id="rpLatitude">
                                            </div>
                                        </div>
                                        <div class="col-lg-6" style="display: none">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Longitude</label>
                                                <input type="text" name="rpLongitude" class="form-control" id="rpLongitude">
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
                                        <p><? echo $rpAgentRemark ?></p>
                                    </div>
                                    <div class="text-center">
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <p>I <strong><? echo $firstName ?></strong> hereby confirm that the information above are correct and accurate.</p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center text-white">
                                        <div class="form-group">
                                            <button name="employee_btn" class="btn btn-icon btn-default" id="personal">
                                                <span class="btn-inner--icon"><i class="ni ni-ruler-pencil"></i></span>
                                                <span class="btn-inner--text">Edit</span>
                                            </button>
                                            <button name="employee_btn" class="btn btn-icon btn-danger" id="delete">
                                                <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
                                                <span class="btn-inner--text">Delete</span>
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
<?php } ?>
<?php include "./components/footer.php"; ?>