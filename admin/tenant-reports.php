<?php
$page = 'send-report';
include "./components/header.php";
include "./components/sidenav.php";
?>
    <!-- Main content -->
    <div class="main-content" id="panel">

<? include "./components/topnav.php"; ?>

    <div class="header">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center text-center py-4">
                <div class="pl-3">
                    <button onclick="goBack()" class="btn btn-icon btn-default" type="button">
                        <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                        <span class="btn-inner--text">Go Back</span>
                    </button>
                </div>
                <div class="col-lg-12">
                    <h1 class="header-title1 pt-3">
                        Tenant Approved Verifications
                    </h1>
                    <p>Integrity is the seed for achievement <span style='font-size:15px;'>&#128519;</span></p>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header border-0">
                                    <div class="col px-0 pb-3 d-flex justify-content-between">
                                        <h3 class="mb-0">Uploaded Reports</h3>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <table id="datatables-basic" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Name of Agent</th>
                                                <th>Report No.</th>
                                                <th>Tenant Name</th>
                                                <th>Status</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                            <tbody>
                                            <?php
                                            $select_query = "SELECT * FROM tenant WHERE status='Approved' ORDER BY date ASC";;
                                            $result = mysqli_query($conn, $select_query);
                                            if (mysqli_num_rows($result) > 0) {
                                                // output data of each row
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    $id             = $row['id'];
                                                    $reportid       = $row['reportid'];
                                                    $agentid        = $row['agentid'];
                                                    $rpfirstname    = $row['rpfirstname'];
                                                    $rplastname     = $row['rplastname'];
                                                    $firstname = $row['firstname'];
                                                    $lastname = $row['lastname'];
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
                                                    echo "<td class=\"budget\">" .$firstname." ".$lastname. "</td>";
                                                    echo "<td class=\"budget\">" .$reportid. "</td>";
                                                    echo "<td class=\"budget\">" .$rpfirstname. " " . $rplastname . "</td>";
                                                    echo "<td>" ."<span class=\"badge badge-dot mr-4\"> <i class=\"$class\"></i> <span class=\"status\" >$status</span> </span>". "</td>";

                                                    echo "<td class='text-right'>"
                                                        ."<button data-toggle=\"modal\" data-target=\"#sendModal\" class=\"btn btn-sm btn-icon btn-info\">
                                                            <span class=\"btn-inner--icon\"><i class=\"ni ni-send\"></i></span>
                                                            <span class=\"btn-inner--text\">Send</span>
                                                        </button>
                                                        <a href=\"tenantdetails?id=$id\" class=\"btn btn-icon btn-sm btn-default\" type=\"button\">
                                                            <span class=\"btn-inner--icon\"><i class=\"ni ni-zoom-split-in\"></i></span>
                                                            <span class=\"btn-inner--text\">View</span>
                                                        </a>
                                                        <a href=\"tenantedit?id=$id\" class=\"btn btn-icon btn-sm btn-danger\">
                                                            <span class=\"btn-inner--icon\"><i class=\"ni ni-ruler-pencil\"></i></span>
                                                            <span class=\"btn-inner--text\">Edit</span>
                                                        </a>".
                                                        "</td >";
                                                    "</tr>";
                                                }
                                            }else {
                                                echo "<td><p>No Approved Report Yet!</p></td>";
                                            }
                                            ?>
                                            </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Name of Agent</th>
                                                <th>Report No.</th>
                                                <th>Tenant Name</th>
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
            </div>
        </div>
    </div>


    <!-- Send Modal -->
    <div class="modal fade" id="sendModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="card mb--1">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <a href="employee-reports">
                                                <img src="../assets/img/icons/send.svg" class="rounded-circle" style="left: 50%; width: 80px; transition: all .15s ease; border: 3px solid #fff; border-radius: .375rem;">
                                                <h3>Send</h3>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="card mb--1">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <a href="tenant-reports">
                                                <img src="../assets/img/icons/downloadpdf.svg" class="rounded-circle" style="left: 50%; width: 80px; transition: all .15s ease; border: 3px solid #fff; border-radius: .375rem;">
                                                <h3>Download</h3>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Send Modal -->


<?php include "./components/footer.php"; ?>