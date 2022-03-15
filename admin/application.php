<?php
$page = 'applicants';
include "./components/header.php";
include "./components/sidenav.php";
require_once "../config/auth_controller.php";

$id = $_GET['id'];
$query = "SELECT * FROM registration WHERE id='$id'";
$results = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($results)) {
    $id = $row['id'];
    $firstName = $row['firstName'];
    $lastName = $row['lastName'];
    $email = $row['email'];
    $tel = $row['tel'];
    $address = $row['address'];
    $guarantorName = $row['guarantorName'];
    $guarantorAddress = $row['guarantorAddress'];
    $guarantorTel = $row['guarantorTel'];
    $passport = $row['passport'];
    $meansOfIdentification = $row['meansOfIdentification'];

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
                        <? echo $firstName; ?>'s Application Details
                    </h1>
                    <p>Integrity is the seed for achievement <span style='font-size:15px;'>&#128519;</span></p>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12" id='printMe'>
                        <div class="card row">
                            <div class="card-body">
                                <div class="text-center pb-4 mb-3">
                                    <img src="../assets/images/logo.png" style="width: 150px;"><br>
                                </div>
                                <form>

                                    <div class="row">
                                        <div class="col-lg-6" style="display: none">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-first-name">id</label>
                                                <input type="text" name="id" class="form-control" value="<?php echo $id ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-first-name">First Name</label>
                                                <input type="text" name="firstname" required class="form-control" readonly value="<? echo $firstName ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-last-name">Last Name</label>
                                                <input type="text" name="lastname" required class="form-control" readonly value="<? echo $lastName ?>">
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-address">Phone No.</label>
                                                <input name="agentid" class="form-control" required value="<? echo $tel ?>" type="text" readonly>
                                            </div>
                                        </div>
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Email Address</label>
                                                <input type="email" name="email" required class="form-control" readonly value="<? echo $email ?>">
                                            </div>
                                        </div>
                                        
                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Address</label>
                                                <input type="text" name="password" readonly class="form-control" value="<? echo $address ?>">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Guarantor's Name</label>
                                                <input type="text" name="phone" readonly class="form-control" value="<? echo $guarantorName ?>">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Guarantor's Address</label>
                                                <input type="text" name="phone" readonly class="form-control" value="<? echo $guarantorAddress ?>">
                                            </div>
                                        </div>

                                        <div class="col-lg-6">
                                            <div class="form-group">
                                                <label class="form-control-label" for="input-country">Guarantor's Phone No.</label>
                                                <input type="text" name="phone" readonly class="form-control" value="<? echo $guarantorTel ?>">
                                            </div>
                                        </div>

                                        <div class="row text-center mx-auto mt-5" style="width: 50%;">
                                            <div class="col-md-6 col-lg-6">
                                                <embed id="myImg" class="inner-img mb-3" src="<?php echo 'http://localhost/agentonboard/'.$passport; ?>" style="width:100%;height:300px;border-radius:10px"/>
                                                <a href="<?php echo 'http://localhost/agentonboard/'.$passport; ?>" target="_blank" class="btn btn-icon btn-primary"><i class="fas fa-download"></i> View means of ID</a>
                                            </div>
                                            <div class="col-md-6 col-lg-6">
                                                <embed id="myImg" class="inner-img mb-3" src="<?php echo 'http://localhost/agentonboard/'.$meansOfIdentification; ?>" style="width:100%;height:300px;border-radius:10px"/>
                                                <a href="<?php echo 'http://localhost/agentonboard/'.$meansOfIdentification; ?>" target="_blank" class="btn btn-icon btn-primary"><i class="fas fa-download"></i> View CV</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="text-center text-white mt-5">
                                        <div class="form-group">
                                            <button onclick="goBack()" class="btn btn-icon btn-danger" type="button">
                                                <span class="btn-inner--icon"><i class="ni ni-fat-remove"></i></span>
                                                <span class="btn-inner--text">Close Application</span>
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