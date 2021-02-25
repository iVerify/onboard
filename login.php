<?php
session_start();
// Connect database
include('./config/db.php');

// Login script
if (isset($_POST['login_btn'])) {

    $agentid = $conn->real_escape_string($_POST['agentid']);
    $password = $conn->real_escape_string($_POST['password']);
    $firstname = $conn->real_escape_string($_POST['firstname']);
    $lastname = $conn->real_escape_string($_POST['lastname']);
    $email = $conn->real_escape_string($_POST['email']);
    $status = $conn->real_escape_string($_POST['status']);
    $picture = $conn->real_escape_string($_POST['picture']);

        $password = sha1($password);
        $query = "SELECT * FROM agents WHERE agentid='$agentid' AND password='$password'";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) {
            $firstname = $row['firstname'];
            $lastname = $row['lastname'];
            $email = $row['email'];
            $agentid = $row['agentid'];
            $id = $row['id'];
            $status = $row['status'];
            $picture = $row['picture'];
        }if (mysqli_num_rows($result) == 1) {
            $_SESSION['agentid'] = $agentid;
            $_SESSION['firstname'] = $firstname;
            $_SESSION['lastname'] = $lastname;
            $_SESSION['email'] = $email;
            $_SESSION['picture'] = $picture;
            $_SESSION['id'] = $id;
            if ($status == 'Inactive'){
                $_SESSION['message_title'] = "Account Inactive";
                $_SESSION['message'] = "Please contact admin!";
            }if ($status == 'Active') {
                header('location: dashboard');
            }
    }else {
            $_SESSION['message_title'] = "Incorrect Details";
            $_SESSION['message'] = "Please login with correct credentials!";
    }
}
?>
<html lang="en">

    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <head>
        <title>Login :: iVerify Onboard&trade;</title>
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
                    <img src="assets/images/standing-12@2x.svg" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8 text-center mb-6">
                            <img src="./assets/images/logo.png" width="150px" class="pt-3">
                            <div class="mb-2 pt-3">
                                <h3><strong>Sign in</strong></h3>
                                <p class="mb-4">Sign in using your correct credentials.</p>
                            </div>
                            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" autocomplete="off">
                                <div class="form-group first mb-3">
                                    <label for="username">Agent ID</label>
                                    <input type="text" name="agentid" onkeyup="this.value = this.value.toUpperCase();" required class="form-control" id="agentid">
                                </div>
                                <div class="form-group last mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" required class="form-control" id="password">
                                </div>

                                <input type="submit" name="login_btn" value="Log In" class="btn btn-block btn-primary">

                                <div class="align-items-center text-center mt-2">
                                    <span class="ml-auto"><a href="password-retrieval.php" class="forgot-pass" style="text-decoration: none">Forgot Password</a></span>
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

<script src="assets/js1/jquery-3.3.1.min.js"></script>
<script src="assets/js1/popper.min.js"></script>
<script src="assets/js1/bootstrap.min.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<?php
if (isset($_SESSION['message']))
{
?>
<script>
    swal({
        title: "<?php echo $_SESSION['message_title']; ?>",
        text: "<?php echo $_SESSION['message']; ?>",
        icon: "error",
        buttons: false,
        timer: 4000
    });
</script>
<?php
unset($_SESSION['message']);
}
?>
<script src="assets/js1/main.js"></script>
</body>
</html>


