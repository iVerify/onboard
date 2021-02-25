<?php
include "./components/header.php";
include "./components/navbar.php";

$agentid    = $_SESSION['agentid'];
$id         = $_SESSION["id"];

// Connect database
include('./config/db.php');

if(isset($_POST['password_btn'])) {

    $newPassword    = $conn->real_escape_string($_POST['newPassword']);
    $password       = $conn->real_escape_string($_POST['password']);

    $password = sha1($_POST['password']);
    $agentid = $_SESSION['agentid'];
    $newPassword = sha1($_POST['newPassword']);
    $sql=mysqli_query($conn,"SELECT * FROM agents where password='$password' && agentid='$agentid'");
    $num=mysqli_fetch_array($sql);$agentid   = $_SESSION['agentid'];
    $id = $_SESSION["id"];

// Connect database
    include('./config/db.php');

    if(isset($_POST['password_btn'])) {

        $newPassword    = $conn->real_escape_string($_POST['newPassword']);
        $password       = $conn->real_escape_string($_POST['password']);

        $password = sha1($_POST['password']);
        $agentid = $_SESSION['agentid'];
        $newPassword = sha1($_POST['newPassword']);
        $sql=mysqli_query($conn,"SELECT * FROM agents where password='$password' && agentid='$agentid'");
        $num=mysqli_fetch_array($sql);
        if($num>0)
        {
            $conn=mysqli_query($conn,"UPDATE agents SET password='$newPassword' where agentid='$agentid'");
            $_SESSION['password_change_message_title'] = "Password Changed";
            $_SESSION['password_change_message'] = "Please login with the new password 👍";
        }
        else
        {
            $_SESSION['error_password_change_message_title'] = "Wrong Password";
            $_SESSION['error_password_change_message'] = "Current password mismatch";
        }
    }
    if($num>0)
    {
        $conn=mysqli_query($conn,"UPDATE agents SET password='$newPassword' where agentid='$agentid'");
        $_SESSION['password_change_message_title'] = "Password Changed";
        $_SESSION['password_change_message'] = "Please login with the new password 👍";
    }
    else
    {
        $_SESSION['error_password_change_message_title'] = "Wrong Password";
        $_SESSION['error_password_change_message'] = "Current password mismatch";
    }
}
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
                        <?php echo $_SESSION['firstname']; ?>'s Profile
                    </h1>
                    <p>Protect yourself & stay safe <span style='font-size:15px;'>&#128567;</span></p>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-xl-4 order-xl-2">
                        <div class="card card-profile">
                            <img src="https://i.imgur.com/KDDYQN5.jpg" alt="Image placeholder" class="card-img-top">
                            <div class="row justify-content-center">
                                <div class="col-lg-3 order-lg-2">
                                    <div class="card-profile-image">
                                        <a href="#">
                                            <img src="./<? echo $_SESSION['picture'] ?>" class="rounded-circle">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row pt-4">
                                    <div class="col">
                                        <div class="card-profile-stats d-flex justify-content-center">
                                            <div>
                                                <span class="heading">0</span>
                                                <span class="description">Verifications</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="text-center">
                                    <h5 class="h3">
                                        <?php echo $_SESSION['firstname']; ?> <?php echo $_SESSION['lastname']; ?>
                                    </h5>
                                    <div class="h5 mt--2">
                                        <i class="ni education_hat mr-2"></i>Agent ID: <span class="font-weight-light"><?php echo $_SESSION['agentid']; ?></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-8 order-xl-1">
                        <div class="card">
                            <div class="card-body">
                                <form>
                                    <h6 class="heading-small text-muted mb-4">Personal information</h6>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-username">Agent ID</label>
                                                    <input type="text" id="input-username" class="form-control" placeholder="Username" value="<?php echo $_SESSION['agentid']; ?>" disabled>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-email">Email address</label>
                                                    <input type="email" id="input-email" class="form-control" placeholder="<?php echo $_SESSION['email']; ?>">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-first-name">First name</label>
                                                    <input type="text" id="input-first-name" class="form-control" placeholder="<?php echo $_SESSION['firstname']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-last-name">Last name</label>
                                                    <input type="text" id="input-last-name" class="form-control" placeholder="<?php echo $_SESSION['lastname']; ?>">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 text-center">
                                                <button class="btn btn-icon btn-default" type="button" id="personal">
                                                    <span class="btn-inner--icon"><i class="ni ni-single-02"></i></span>
                                                    <span class="btn-inner--text">Update Info</span>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                    <hr class="my-4">
                                <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
                                    <h6 class="heading-small text-muted mb-4">Password</h6>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-old-password">Current Password</label>
                                                    <input type="password" class="form-control" placeholder="Current Password" name="password" id="myPassword">
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-new-password">New Password</label>
                                                    <input type="password" class="form-control" placeholder="New Password" name="newPassword" id="myPassword1">
                                                </div>
                                            </div>
                                            <div class="col-lg-12 text-center">
                                                <div class="form-group" style="display: inline-flex">
                                                    <label style="padding-right: 10px">Show Password</label>
                                                    <label class="custom-toggle">
                                                        <input type="checkbox" onclick="myFunction()">
                                                        <span class="custom-toggle-slider rounded-circle" data-label-off="Off" data-label-on="On" style="padding-left: 10px;"></span>
                                                    </label>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 text-center">
                                                <button name="password_btn" class="btn btn-icon btn-default" type="submit">
                                                    <span class="btn-inner--icon"><i class="ni ni-key-25"></i></span>
                                                    <span class="btn-inner--text">Update Password</span>
                                                </button>
                                            </div>
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

<?php include "./components/footer.php"; ?>