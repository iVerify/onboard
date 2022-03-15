<?php
$page = 'applicants';
include "./components/header.php";
include "./components/sidenav.php";
require_once "../config/auth_controller.php";
?>
    <!-- Main content -->
    <div class="main-content" id="panel">

<? include "./components/topnav.php"; ?>


    <!-- Header -->
    <div class="header bg-default pb-6">
        <div class="container-fluid">
            <div class="header-body">
                <div class="row align-items-center py-4">
                    <div class="col-12">
                        <h1 class="header-title1 text-white text-center pt-3">Agents Apllication</h1>
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
                <div class="card-body">
                    <!-- Card header -->
                    <div class="card-header border-0">
                        <!-- <div class="col px-0 pb-3 d-flex justify-content-between">
                            <button class="btn btn-default" data-toggle="modal" data-target="#newClientModal">Add New Client</button>
                        </div> -->
                    </div>
                    <!-- Light table -->
                    <div class="table-responsive">
                        <table id="datatables-basic" class="table table-striped" style="width:100%">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Full Name</th>
                                    <th>Phone No.</th>
                                    <th>Email</th>
                                    <th class="text-right">Action</th>
                                </tr>
                            </thead>
                                <tbody>
                                <?php
                                $select_query = "SELECT * FROM registration";
                                $result = mysqli_query($conn, $select_query);
                                if (mysqli_num_rows($result) > 0) {
                                    // output data of each row
                                    while($row = mysqli_fetch_assoc($result)) {
                                        $id = $row['id'];
                                        $firstName = $row['firstName'];
                                        $lastName = $row['lastName'];
                                        $email = $row['email'];
                                        $address = $row['address'];
                                        $tel = $row['tel'];

                                        echo "<tr>";
                                        echo "<td class=\"budget\">" . $id . "</td>";
                                        echo "<td class=\"budget\">" . $firstName . " " . $lastName . "</td>";
                                        echo "<td class=\"budget\">" . $tel . "</td>";
                                        echo "<td class=\"budget\">" . $email . "</td>";

                                        echo "<td class='text-right'>"
                                            ."<a href=\"application?id=$id\" class=\"btn btn-sm btn-icon btn-default\" type=\"button\">
                                                <span class=\"btn-inner--icon\"><i class=\"ni ni-zoom-split-in\"></i></span>
                                                <span class=\"btn-inner--text\">View Application</span>
                                            </a>".
                                            "</td >";
                                        "</tr>";
                                    }
                                }else {
                                    echo "<td><p>No Applicant Yet!</p></td>";
                                }
                                ?>
                                </tbody>
                            <tfoot>
                                <tr>
                                    <th>S/N</th>
                                    <th>Full Name</th>
                                    <th>Phone No.</th>
                                    <th>Email</th>
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