<?php
$page = 'users';
include "./components/header.php";
include "./components/sidenav.php";
require_once "../config/auth_controller.php";
?>
    <!-- Main content -->
    <div class="main-content" id="panel">

<? include "./components/topnav.php"; ?>

    <!-- Add New Admin -->
    <div class="modal fade" id="newAdminModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-body" style="background-color: #f7fafc;">
                    <div class="card-body">
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                            <h6 class="heading-small text-muted mb-4">User information</h6>
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
                                            <label class="form-control-label" for="input-email">Email Address</label>
                                            <input type="email" name="email" class="form-control" placeholder="example@example.com">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-email">Username</label>
                                            <input type="text" name="username" class="form-control" placeholder="fegor">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-position">Position</label>
                                            <select class="form-select form-control" name="position" aria-label="Default select example">
                                                <option selected>Select Position</option>
                                                <option value="Admin">Admin</option>
                                                <option value="Super Admin">Super Admin</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label class="form-control-label" for="input-username">Password</label>
                                            <input type="password" name="password" class="form-control" placeholder="********">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center text-white">
                                <div class="">
                                    <button name="add_admin_btn" class="btn btn-icon btn-default" type="submit">
                                        <span class="btn-inner--icon"><i class="ni ni-fat-add"></i></span>
                                        <span class="btn-inner--text">Add Admin</span>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Add New Admin -->


    <!-- Header -->
    <div class="header bg-default pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-12">
                        <h1 class="header-title1 text-white text-center pt-3">Admins Onboard</h1>
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
                        <button class="btn btn-default" data-toggle="modal" data-target="#newAdminModal">Add New Admin</button>
                    </div>
                </div>
                <!-- Light table -->
                <div class="table-responsive">
                    <div class="card-body">
                        <table id="datatables-basic" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Full Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Position</th>
                                    <th>Status</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                                <tbody>
                                <?php
                                $select_query = "SELECT * FROM admin ORDER BY date ASC";
                                $result = mysqli_query($conn, $select_query);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while($row = mysqli_fetch_assoc($result)) {
                                        $id             = $row['id'];
                                        $username       = $row['username'];
                                        $firstName      = $row['firstName'];
                                        $lastName       = $row['lastName'];
                                        $position       = $row['position'];
                                        $email          = $row['email'];
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
                                        echo "<td class=\"budget\">" . $username . "</td>";
                                        echo "<td class=\"budget\">" . $email . "</td>";
                                        echo "<td class=\"budget\">" . $position . "</td>";
                                        echo "<td>" ."<span class=\"badge badge-dot mr-4\"> <i class=\"$class\"></i> <span class=\"status\" >$status</span> </span>". "</td>";

                                        echo "<td class='text-right'>"
                                            ."<a href=\"adminedit?id=$id\" class=\"btn btn-sm btn-icon btn-info\">
                                                <span class=\"btn-inner--icon\"><i class=\"ni ni-ruler-pencil\"></i></span>
                                                <span class=\"btn-inner--text\">Edit</span>
                                            </a>
                                            <a href=\"adminedit?id=$id\" class=\"btn btn-sm btn-icon btn-danger\">
                                                <span class=\"btn-inner--icon\"><i class=\"ni ni-archive-2\"></i></span>
                                                <span class=\"btn-inner--text\">Delete</span>
                                            </a>".
                                            "</td >";
                                        "</tr>";
                                    }
                                }else {
                                    echo "<td><p>No Agents Yet!</p></td>";
                                }
                                ?>
                                </tbody>
                            <tfoot>
                                <tr>
                                    <th>S/N</th>
                                    <th>Full Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Position</th>
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


<?php include "./components/footer.php"; ?>