<?php
session_start();
// Connect database
include('./config/db.php');

// Login script
if (isset($_POST['password_rest_btn'])) {

    $agentID    = $conn->real_escape_string($_POST['agentID']);

    $query = "SELECT * FROM agents WHERE agentID='$agentID'";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
        $fullName = $row['fullName'];
        $email    = $row['email'];
        $agentID  = $row['agentID'];
    }if (mysqli_num_rows($result) == 1) {
        $_SESSION['agentID'] = $agentID;
        $_SESSION['email']  = $email;
        $_SESSION['fullName'] = $fullName;
        $_SESSION['password'] = $password;
        $_SESSION['success_message_title'] = "Password Retrieved";
        $_SESSION['success_message'] = "Please check $email to access password.";
        //Send Password Retrieval Mail
        include ('password_retrieval_email.php');
    }else {
        $_SESSION['error_message_title'] = "Incorrect Agent ID";
        $_SESSION['error_message'] = "Please enter correct Agent ID eg:(IVA1234)";
    }
}
?>
<html lang="en">

<meta http-equiv="content-type" content="text/html;charset=utf-8"/>
<head>
    <title>Password Retrieval :: iVerify Onboard&trade;</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta property="og:url" content="https://www.iverify.ng"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="iVerify&trade; :: Agents Onboard."/>
    <!-- Favicon -->
    <link rel="shortcut icon" href="https://i.imgur.com/muLDDf6.png"/>
    <!-- stylesheet -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="assets/fonts1/icomoon/style.css">
    <link rel="stylesheet" href="assets/css1/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css1/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css1/style.css">
    <style>
        .footer {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            color: white;
            text-align: center;
        }
    </style>
</head>
<body>

<div id="wrapper">
    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="assets/images/imgpas.svg" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents" style="padding-top: 50px;">
                    <div class="row justify-content-center">
                        <div class="col-md-8 text-center">
                            <div class="mb-4">
                                <h3><strong>Password Retrieval</strong></h3>
                                <p class="mb-4">Use your Agent ID to reset your password.</p>
                            </div>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" autocomplete="off">
                                <div class="form-group first mb-3">
                                    <label for="username">Agent ID</label>
                                    <input type="text" name="agentID" onkeyup="this.value = this.value.toUpperCase();" required class="form-control" id="agentID">
                                </div>
                                <input type="submit" name="password_rest_btn" value="Retrieve Password" class="btn btn-block btn-primary">

                                <div class="align-items-center text-center mt-2">
                                    <span class="ml-auto"><a href="login" class="forgot-pass" style="text-decoration: none">Sign in</a></span>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
<!-- Footer -->
<div class="footer">
    <a href="https://www.hiil.org/" target="_blank">
        <img class="footerlogo" src="./assets/images/footer-logo.png" style="width: 130px;">
    </a>
</div>
</div>

<!-- Footer -->
<script src="assets/js1/jquery-3.3.1.min.js"></script>
<script src="assets/js1/popper.min.js"></script>
<script src="assets/js1/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
if (isset($_SESSION['error_message']))
{
    ?>
    <script>
        swal({
            title: "<?php echo $_SESSION['error_message_title']; ?>",
            text: "<?php echo $_SESSION['error_message']; ?>",
            icon: "error",
            buttons: false,
            timer: 4000
        });
    </script>
    <?php
    unset($_SESSION['error_message']);
}
?>

<?php
if (isset($_SESSION['success_message']))
{
    ?>
    <script>
        swal({
            title: "<?php echo $_SESSION['success_message_title']; ?>",
            text: "<?php echo $_SESSION['success_message']; ?>",
            icon: "success",
            buttons: false,
            timer: 4000
        }).then(function() {
            window.location = "login";
        });
    </script>
    <?php
    unset($_SESSION['success_message']);
}
?>
<script src="assets/js1/main.js"></script>
</body>
</html>
