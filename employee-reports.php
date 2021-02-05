<?php
include "./components/header.php";
include "./components/navbar.php";

// Connect database
include('./config/db.php');

?>
    <div class="header">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center text-center py-4">
                <div class="pl-3">
                    <a href="dashboard" class="btn btn-icon btn-default" type="button">
                        <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                        <span class="btn-inner--text">Go Back</span>
                    </a>
                </div>
                <div class="col-lg-12">
                    <h1 class="header-title1 pt-3">
                        Employee's Verifications Report
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
                                        <input class="form-control w-25 mr-3 mb-0" type="text" id="myInput" onkeyup="myFunction()" placeholder="Filter by Report No.">
                                    </div>
                                </div>
                                <div class="table-responsive">
                                    <div>
                                        <table class="table align-items-center">
                                            <thead class="thead-light">
                                            <tr>
                                                <th scope="col" class="sort" data-sort="sn">Report No.</th>
                                                <th scope="col" class="sort" data-sort="budget">Verifying Name</th>
                                                <th scope="col" class="sort" data-sort="status">Status</th>
                                                <!--<th scope="col" class="sort" data-sort="completion">Category</th>-->
                                                <th scope="col" class="sort text-right" data-sort="actions">Actions</th>
                                            </tr>
                                            </thead>
                                            <tbody class="list">
                                            <?php
                                            $select_query = "SELECT * FROM employee order by date ASC";
                                            $result = mysqli_query($conn, $select_query);
                                            if (mysqli_num_rows($result) > 0) {
                                            // output data of each row
                                            while($row = mysqli_fetch_assoc($result)) {
                                                $reportID       = $row['reportID'];
                                                $rpFirstname    = $row['rpFirstname'];
                                                $rpLastname     = $row['erLastname'];
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
                                                echo "<td class=\"budget\">" . $reportID . "</td>";
                                                echo "<td class=\"budget\">" . $rpFirstname . " " . $rpLastname . "</td>";
                                                echo "<td>" ."<span class=\"badge badge-dot mr-4\"> <i class=\"$class\"></i> <span class=\"status\" >$status</span> </span>". "</td>";

                                                echo "<td class='text-right'>"
                                                    ."<button class=\"btn btn-icon btn-default\" type=\"button\">
                                                        <span class=\"btn-inner--icon\"><i class=\"ni ni-zoom-split-in\"></i></span>
                                                        <span class=\"btn-inner--text\">View</span>
                                                    </button>".
                                                "</td >";
                                                "</tr>";
                                            }
                                            }else {
                                                        echo "<td><p>No Report Yet!</p></td>";
                                                    }
                                            ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="card-footer py-4">
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
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php include "./components/footer.php"; ?>