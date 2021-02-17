<?php
include "./components/header.php";
include "./components/navbar.php";

// Connect database
include('./config/db.php');

$id = $_GET['id'];
$query = "SELECT * FROM employee WHERE id='$id'";
$results = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($results)) {
    $id             = $row['id'];
    $agentid        = $row['agentid'];
    $firstname      = $row['firstname'];
    $lastname       = $row['lastname'];
    $clientname     = $row['clientname'];
    $reportid       = $row['reportid'];
    $rpvisitdate    = $row['rpvisitdate'];
    $rpfirstname    = $row['rpfirstname'];
    $rplastname     = $row['rplastname'];
    $rpaddress      = $row['rpaddress'];
    $rpaddressdesc  = $row['rpaddressdesc'];
    $mwfirstname    = $row['mwfirstname'];
    $mwlastname     = $row['mwlastname'];
    $mwoccupation   = $row['mwoccupation'];
    $rpagentremark  = $row['rpagentremark'];
    $rpupload       = $row['rpupload'];
    $rpupload1      = $row['rpupload1'];
    $rplatitude     = $row['rplatitude'];
    $rplongitude    = $row['rplongitude'];
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
                        <? echo $rpfirstname; ?>'s Details
                    </h1>
                    <p>Integrity is the seed for achievement <span style='font-size:15px;'>&#128519;</span></p>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12 order-xl-1">
                        <div class="card">
                            <div class="card-body">
                                <div class="text-center pb-3">
                                    <img src="assets/images/logo.png" style="width: 150px;">
                                </div>
                                <div class="row">
                                    <div class="col-lg-4 pb-2">
                                        <label class="form-control-label" for="input-username">Agent ID: <? echo $agentid ?></label>
                                    </div>
                                    <div class="col-lg-4 pb-2">
                                        <label class="form-control-label" for="input-username">Agent Full Name: <? echo $firstname ?> <? echo $lastName ?></label>
                                    </div>
                                    <div class="col-lg-4 pb-2">
                                        <label class="form-control-label" for="input-username">Status: <span class="badge badge-dot mr-4"> <i class="<? echo $class ?>"></i> <span class="status" ><? echo $status ?></span></span></label>
                                    </div>
                                    <div class="col-lg-4 pb-2">
                                        <label class="form-control-label" for="input-username">Agent ID: <? echo $agentid ?></label>
                                    </div>
                                </div>
                                <!-- <form onClick="return false;">
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
                                                <input type="text" name="rpFirstName" required class="form-control" value="<? echo $rpFirstName; ?>" disabled>
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
                                        <div class="col-lg-6 text-center form-group">
                                            <a href="<? echo $rpupload ?>" download>
                                                <img class="card-img-top" src="<? echo $rpUpload ?>" style="width:300px;height:300px;">
                                            </a>
                                        </div>
                                        <div class="col-lg-6 text-center form-group">
                                                <img class="card-img-top" src="<? echo $rpUpload1 ?>" style="width:300px;height:300px;">
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
                                            <button class="btn btn-icon btn-default" id="personal">
                                                <span class="btn-inner--icon"><i class="ni ni-ruler-pencil"></i></span>
                                                <span class="btn-inner--text">Edit</span>
                                            </button>
                                            <button class="btn btn-icon btn-danger" id="delete">
                                                <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
                                                <span class="btn-inner--text">Delete</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>-->
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php include "./components/footer.php"; ?>