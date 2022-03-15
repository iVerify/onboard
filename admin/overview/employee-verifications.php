<?php
$page = 'verifications';
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
                        Employee Verifications
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
                                                <th>Employee Name</th>
                                                <th>Status</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                            <tbody>
                                            <?php
                                            $select_query = "SELECT * FROM employee WHERE status='Pending' ORDER BY date ASC";;
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
                                                echo "<td class=\"budget\">" . $reportid . "</td>";
                                                echo "<td class=\"budget\">" . $rpfirstname . " " . $rplastname . "</td>";
                                                echo "<td>" ."<span class=\"badge badge-dot mr-4\"> <i class=\"$class\"></i> <span class=\"status\" >$status</span> </span>". "</td>";

                                                echo "<td class='text-right'>"
                                                    ."<a href=\"employeeedit?id=$id\" class=\"btn btn-icon btn-sm btn-info\">
                                                            <span class=\"btn-inner--icon\"><i class=\"ni ni-ruler-pencil\"></i></span>
                                                            <span class=\"btn-inner--text\">Edit</span>
                                                        </a>
                                                    <a href=\"employeedetails?id=$id\" class=\"btn btn-icon btn-sm btn-default\" type=\"button\">
                                                        <span class=\"btn-inner--icon\"><i class=\"ni ni-zoom-split-in\"></i></span>
                                                        <span class=\"btn-inner--text\">View</span>
                                                    </a>
                                                    <a href=\"#?id=$id\" class=\"btn btn-icon btn-sm btn-danger\">
                                                            <span class=\"btn-inner--icon\"><i class=\"ni ni-archive-2\"></i></span>
                                                            <span class=\"btn-inner--text\">Delete</span>
                                                        </a>".
                                                "</td >";
                                                "</tr>";
                                            }
                                            }else {
                                                        echo "<td><p>No Pending Report Yet!</p></td>";
                                                    }
                                            ?>
                                            </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Name of Agent</th>
                                                <th>Report No.</th>
                                                <th>Employee Name</th>
                                                <th>Status</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
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
                </div>
            </div>
        </div>
    </div>



<?php include "./components/footer.php"; ?>