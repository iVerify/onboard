<?php
include "./components/header.php";
include "./components/navbar.php";

// Connect database
include('./config/db.php');

$id = $_GET['id'];
$query = "SELECT * FROM tenant WHERE id='$id'";
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
    <div class="header">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center text-center py-4">
                <div class="pl-3">
                    <a href="tenant-reports" class="btn btn-icon btn-default" type="button">
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
                                    <img src="assets/images/logo.png" style="width: 150px;"><br>
                                    <label class="form-control-label"><strong>Verification Status:</strong> <span class="badge <? echo $class ?>"><? echo $status ?></span></label>
                                </div>
                                <div class="table-responsive">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th style="background-color: #ececef; "><strong>Agent ID:</strong></th>
                                            <td><? echo $agentid ?></td>
                                        </tr>
                                        <tr>
                                            <th style="background-color: #ececef; "><strong>Agent Full Name:</strong></th>
                                            <td><? echo $firstname ?>  <? echo $lastname ?></td>
                                        </tr>
                                        <tr>
                                            <th    scope="rowgroup" style="background-color: #ececef; "><strong>Client:</strong></th>
                                            <td> </td>
                                        </tr>
                                        <tr>
                                            <th style="background-color: #ececef; "><strong>Visitation Date:</strong></th>
                                            <td><? echo $rpvisitdate ?></td>
                                        </tr>
                                        <tr>
                                            <th style="background-color: #ececef; "><strong>Tenant First Name:</strong></th>
                                            <td><? echo $rpfirstname ?></td>
                                        </tr>
                                        <tr>
                                            <th style="background-color: #ececef; "><strong>Tenant Last Name:</strong></th>
                                            <td><? echo $rplastname ?></td>
                                        </tr>
                                        <tr>
                                            <th style="background-color: #ececef; "><strong>Address:</strong></th>
                                            <td><? echo $rpaddress ?></td>
                                        </tr>
                                        <tr>
                                            <th style="background-color: #ececef; "><strong>Address Landmark & Description:</strong></th>
                                            <td><? echo $rpaddressdesc ?></td>
                                        </tr>
                                        <tr>
                                            <th style="background-color: #ececef; "><strong>Met with First Name:</strong></th>
                                            <td><? echo $mwfirstname ?></td>
                                        </tr>
                                        <tr>
                                            <th style="background-color: #ececef; "><strong>Met with Last Name:</strong></th>
                                            <td><? echo $mwlastname ?></td>
                                        </tr>
                                        <tr>
                                            <th style="background-color: #ececef; "><strong>Met with Occupation:</strong></th>
                                            <td><? echo $mwoccupation ?></td>
                                        </tr>
                                        <tr>
                                            <th style="background-color: #ececef; "><strong>Tenant Work Address:</strong></th>
                                            <td><? echo $twaddress ?></td>
                                        </tr>
                                        <tr>
                                            <th style="background-color: #ececef; "><strong>Tenant Work Address Landmark & Description:</strong></th>
                                            <td><? echo $twaddressdesc ?></td>
                                        </tr>
                                        <tr>
                                            <th style="background-color: #ececef; "><strong>Work Address Met with First Name:</strong></th>
                                            <td><? echo $twfirstname ?></td>
                                        </tr>
                                        <tr>
                                            <th style="background-color: #ececef; "><strong>Work Address Met with Last Name:</strong></th>
                                            <td><? echo $twlastname ?></td>
                                        </tr>
                                        <tr>
                                            <th style="background-color: #ececef; "><strong>Work Address Met with Occupation/Office:</strong></th>
                                            <td><? echo $mwwoccupation ?></td>
                                        </tr>
                                        <tr>
                                            <th style="background-color: #ececef; "><strong>Picture:</strong></th>
                                            <td>
                                                <img id="myImg" class="card-img" src="<? echo $rpupload ?>" style="width:300px;height:300px;">
                                                <img class="card-img" src="<? echo $rpupload1 ?>" style="width:300px;height:300px;">
                                            </td>
                                        </tr>
                                        <tr>
                                            <th style="background-color: #ececef; "><strong>Location on Map:</strong></th>
                                            <td>
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
                                            </td>
                                        </tr>
                                    </table>
                                    <h3 class="text-center pt-3"><strong>Agent Remark:</strong></h3>
                                    <p class="text-center"><? echo $rpagentremark ?></p>
                                    <hr class="my-4">
                                    <p class="text-center pt-1">I <strong><? echo $firstname ?> <? echo $lastname ?></strong> hereby confirm that the information above are correct and accurate.</p>
                                    <div class="text-center pb-3">
                                        <button class="btn btn-icon btn-default" id="delete">
                                            <span class="btn-inner--icon"><i class="ni ni-ruler-pencil"></i></span>
                                            <span class="btn-inner--text">Edit</span>
                                        </button>
                                        <button type="button" class="btn btn-info" onclick="printDiv('printMe')">
                                            <span class="btn-inner--icon"><i class="ni ni-single-copy-04"></i></span>
                                            <span class="btn-inner--text">Print</span>
                                        </button>
                                        <button type="button" class="btn btn-danger" id="personal">
                                            <span class="btn-inner--icon"><i class="ni ni-archive-2"></i></span>
                                            <span class="btn-inner--text">Delete</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php include "./components/footer.php"; ?>