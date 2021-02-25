<?php
$page = 'clients';
include "./components/header.php";
include "./components/sidenav.php";
require_once "../config/auth_controller.php";

$id = $_GET['id'];
$query = "SELECT * FROM client WHERE id='$id'";
$results = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($results)) {
    $id = $row['id'];
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
    $email = $row['email'];
    $companyName = $row['companyName'];
    $phone = $row['phone'];
    $status = $row['status'];
    switch ($status) {
        case "Inactive";
            $class  = 'badge-warning';
            break;
        case "Active";
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
                    <a href="clients" class="btn btn-icon btn-default" type="button">
                        <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                        <span class="btn-inner--text">Go Back</span>
                    </a>
                </div>
                <div class="col-lg-12">
                    <h1 class="header-title1 pt-3">
                        <? echo $firstName; ?>'s Company Details
                    </h1>
                    <p>Integrity is the seed for achievement <span style='font-size:15px;'>&#128519;</span></p>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12" id='printMe'>
                        <div class="card row">
                            <div class="card-body">
                                <div class="text-center pb-4">
                                    <img src="../assets/images/logo.png" style="width: 150px;"><br>
                                    <label class="form-control-label"><strong>Client Account Status:</strong> <span class="badge <? echo $class ?>"><? echo $status ?></span></label>
                                </div>
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST" enctype="multipart/form-data">

                                    <div class="row">
                                        <div class="col-lg-6" style="display: none">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-first-name">id</label>
                                                <input type="text" name="id" class="form-control" value="<?php echo $id ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-position">Update Account Status</label>
                                                <select class="form-select form-control" name="status" aria-label="Default select example">
                                                    <option selected value="<? echo $status ?>">Select Status</option>
                                                    <option value="Active">Active</option>
                                                    <option value="Inactive">Inactive</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-first-name">First Name</label>
                                                <input type="text" name="firstName" required class="form-control" value="<? echo $firstName ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-last-name">Last Name</label>
                                                <input type="text" name="lastName" required class="form-control" value="<? echo $lastName ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Email Address</label>
                                                <input type="email" name="email" required class="form-control" value="<? echo $email ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Phone</label>
                                                <input type="tel" name="phone" class="form-control" value="<? echo $phone ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Company Name</label>
                                                <input type="text" name="companyName" class="form-control" value="<? echo $companyName ?>">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center text-white">
                                        <div class="form-group">
                                            <button name="clientupdate_btn" class="btn btn-icon btn-default" type="submit">
                                                <span class="btn-inner--icon"><i class="ni ni-cloud-upload-96"></i></span>
                                                <span class="btn-inner--text">Update Client</span>
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