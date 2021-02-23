<?php
$page = 'clients';
include "./components/header.php";
include "./components/sidenav.php";
require_once "../config/auth_controller.php";
?>
    <!-- Main content -->
    <div class="main-content" id="panel">

<? include "./components/topnav.php"; ?>


    <!-- Add New Client -->
    <div class="modal fade" id="newClientModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body" style="background-color: #f7fafc;">
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <h6 class="heading-small text-muted mb-4">Client information</h6>
                            <div class="pl-lg-4">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-first-name">First Name</label>
                                            <input type="text" name="firstName" class="form-control" placeholder="Lucky">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-last-name">Last Name</label>
                                            <input type="text" name="lastName" class="form-control" placeholder="Jesse">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Company Name</label>
                                            <input type="text" name="companyName" class="form-control" placeholder="Guaranty Trust Bank">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-phone">Phone</label>
                                            <input type="tel" name="phone" class="form-control" placeholder="+2348030004000">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Email Address</label>
                                            <input type="email" name="email" class="form-control" placeholder="jesse@example.com">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-position">Status</label>
                                            <select class="form-select form-control" name="status" aria-label="Default select example">
                                                <option selected>Select Status</option>
                                                <option value="Active">Active</option>
                                                <option value="Inactive">Inactive</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center text-white">
                                <div class="">
                                    <button name="add_client_btn" class="btn btn-icon btn-default" type="submit">
                                        <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                                        <span class="btn-inner--text">Add Client</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add New Client -->


    <!-- Header -->
    <div class="header bg-default pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-12">
                        <h1 class="header-title1 text-white text-center pt-3">Clients Onboard</h1>
                        <p class="text-center text-white">Integrity is the seed for achievement <span style='font-size:15px;'>&#128519;</span></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Page content -->
    <div class="container-fluid mt--6">
    <div class="row">
        <div class="col">
            <div class="card">
                <!-- Card header -->
                <div class="card-header border-0">
                    <div class="col px-0 pb-3 d-flex justify-content-between">
                        <input class="form-control w-25 mr-3 mb-0 filter" type="text" id="reportInput" onkeyup="reportFunction()" placeholder="Filter clients by company name">
                        <button class="btn btn-default" data-toggle="modal" data-target="#newClientModal">Add New Client</button>
                    </div>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <div>
                        <table class="table align-items-center" id="reportData">
                            <thead class="thead-light">
                            <tr>
                                <th scope="col" class="sort" data-sort="sn">S/N</th>
                                <th scope="col" class="sort" data-sort="sn">Contact Name</th>
                                <th scope="col" class="sort" data-sort="budget">Company Name</th>
                                <th scope="col" class="sort" data-sort="status">Status</th>
                                <!--<th scope="col" class="sort" data-sort="completion">Category</th>-->
                                <th scope="col" class="sort text-right" data-sort="actions">Actions</th>
                            </tr>
                            </thead>
                            <tbody class="list">
                            <?php
                            $select_query = "SELECT * FROM client ORDER BY date ASC";
                            $result = mysqli_query($conn, $select_query);
                            if (mysqli_num_rows($result) > 0) {
                                // output data of each row
                                while($row = mysqli_fetch_assoc($result)) {
                                    $id             = $row['id'];
                                    $firstName      = $row['firstName'];
                                    $lastName       = $row['lastName'];
                                    $companyName    = $row['companyName'];
                                    $phone          = $row['phone'];
                                    $status         = $row['status'];
                                    switch ($status) {
                                        case "Inactive";
                                            $class  = 'bg-warning';
                                            break;
                                        case "Active";
                                            $class  = 'bg-success';
                                            break;
                                        default:
                                            $class  = '';
                                    }

                                    echo "<tr>";
                                    echo "<td class=\"budget\">" . $id . "</td>";
                                    echo "<td class=\"budget\">" . $firstName . " " . $lastName . "</td>";
                                    echo "<td class=\"budget\">" . $companyName . "</td>";
                                    echo "<td>" ."<span class=\"badge badge-dot mr-4\"> <i class=\"$class\"></i> <span class=\"status\" >$status</span> </span>". "</td>";

                                    echo "<td class='text-right'>"
                                        ."<a href=\"clientedit.php?id=$id\" class=\"btn btn-icon btn-info\">
                                            <span class=\"btn-inner--icon\"><i class=\"ni ni-ruler-pencil\"></i></span>
                                            <span class=\"btn-inner--text\">Edit</span>
                                        </a>
                                        <a href=\"cliientdetails.php?id=$id\" class=\"btn btn-icon btn-default\" type=\"button\">
                                                        <span class=\"btn-inner--icon\"><i class=\"ni ni-zoom-split-in\"></i></span>
                                                        <span class=\"btn-inner--text\">View</span>
                                                    </a>".
                                        "</td >";
                                    "</tr>";
                                }
                            }else {
                                echo "<td><p>No Clients Yet!</p></td>";
                            }
                            ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <!-- Card footer -->
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


<?php include "./components/footer.php"; ?>