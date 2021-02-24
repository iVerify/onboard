<?php
$page = 'verifications';
include "./components/header.php";
include "./components/sidenav.php";
require_once "../config/auth_controller.php";

$id = $_GET['id'];
$query = "SELECT * FROM guarantor WHERE id='$id'";
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
    $twaddress      = $row['twaddress'];
    $twaddressdesc  = $row['twaddressdesc'];
    $twfirstname    = $row['twfirstname'];
    $twlastname     = $row['twlastname'];
    $mwwoccupation  = $row['mwwoccupation'];
    $rpagentremark  = $row['rpagentremark'];
    $rpupload       = $row['rpupload'];
    $rpupload1      = $row['rpupload1'];
    $rplatitude     = $row['rplatitude'];
    $rplongitude    = $row['rplongitude'];
    $status         = $row['status'];
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

    <div class="header">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center text-center py-4">
                <div class="pl-3">
                    <a href="guarantor-verifications" class="btn btn-icon btn-default" type="button">
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
                    <div class="col-xl-12" id='printMe'>
                        <div class="card row">
                            <div class="card-body">
                                <div class="text-center pb-3">
                                    <img src="../assets/images/logo.png" style="width: 150px;"><br>
                                    <label class="form-control-label"><strong>Verification Status:</strong> <span class="badge <? echo $class ?>"><? echo $status ?></span></label>
                                </div>
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">
                                    <h6 class="heading-small text-muted mb-4">Guarantor information</h6>
                                    <div class="row">
                                        <div class="col-lg-6" style="display:">
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
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-first-name">Client Name</label>
                                                <input type="text" name="clientname" class="form-control" value="<?php echo $clientname ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-first-name">First Name</label>
                                                <input type="text" name="rpfirstname" required class="form-control" value="<? echo $rpfirstname ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-last-name">Last Name</label>
                                                <input type="text" name="rplastname" required class="form-control" value="<? echo $rplastname ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label for="example-date-input" class="form-control-label">Date of Visitation</label>
                                                <input class="form-control" type="date" required value="<? echo $rpvisitdate ?>" name="rpvisitdate">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-address">Guarantor's Residential Address</label>
                                                <input name="rpaddress" class="form-control" required value="<? echo $rpaddress ?>" type="text">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Address Landmark & Description</label>
                                                <input type="text" name="rpaddressdesc" required class="form-control" value="<? echo $rpaddressdesc ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Met with First Name</label>
                                                <input type="text" name="mwfirstname" class="form-control" value="<? echo $mwfirstname ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Met with Last Name</label>
                                                <input type="text" name="mwlastname" class="form-control" value="<? echo $mwlastname ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-city">Met with Occupation/Office</label>
                                                <input type="text" name="mwoccupation" class="form-control" value="<? echo $mwoccupation ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-city">Guarantor's Work Address</label>
                                                <input type="text" name="twaddress" class="form-control" value="<? echo $twaddress ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Work Address Landmark & Description</label>
                                                <input type="text" name="twaddressdesc" required class="form-control" value="<? echo $twaddressdesc ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Work Address Met with First Name</label>
                                                <input type="text" name="twfirstname" class="form-control" value="<? echo $twfirstname ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Work Address Met with Last Name</label>
                                                <input type="text" name="twlastname" class="form-control" value="<? echo $twlastname ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-city">Work Address Met with Occupation/Office</label>
                                                <input type="text" name="mwwoccupation" class="form-control" value="<? echo $mwwoccupation ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <div class="form-group text-center">
                                                <img id="myImg" class="card-img" src="../<? echo $rpupload ?>" style="width:300px;height:300px;">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group text-center">
                                                <img class="card-img" src="../<? echo $rpupload1 ?>" style="width:300px;height:300px;">
                                            </div>
                                        </div>
                                        <div class="">
                                            <div id="googleMap" style="width:100%;height:400px;"></div>

                                            <script>
                                                function myMap() {
                                                    var mapProp= {
                                                        center:new google.maps.LatLng(<? echo $rplatitude ?>,<? echo $rplongitude ?>),
                                                        zoom:20,
                                                    };
                                                    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
                                                }
                                                var marker = new google.maps.Marker({position: myCenter});

                                                marker.setMap(map);
                                            </script>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Update Latitude</label>
                                                <input type="text" name="rplatitude" class="form-control" value="<? echo $rplatitude ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Update Longitude</label>
                                                <input type="text" name="rplongitude" class="form-control" value="<? echo $rplongitude ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="form-control-label">Agent Remark</label>
                                        <textarea rows="8" name="rpagentremark" class="form-control"><? echo $rpagentremark ?></textarea>
                                    </div>
                                    <div class="text-center text-white">
                                        <div class="form-group">
                                            <button name="guarantor_update_btn" class="btn btn-icon btn-default" type="submit">
                                                <span class="btn-inner--icon"><i class="ni ni-cloud-upload-96"></i></span>
                                                <span class="btn-inner--text">Update Report</span>
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