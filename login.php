<?php
$_SESSION['message'] = '<div class="alert alert-danger" role="alert">Login details incorrect!</div>';

// Connect database
//$conn = new mysqli('localhost', 'root', '', 'onboard');
// Turn on error reporting
error_reporting(E_ALL ^ E_NOTICE);
// Check database connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to database:" . mysqli_connect_error();
    exit();
}

// Login script
if (isset($_POST['login_btn'])) {

    $agentID    = $conn->real_escape_string($_POST['agentID']);
    $password   = $conn->real_escape_string($_POST['password']);

        $password = sha1($password);
        $query = "SELECT * FROM agents WHERE agentID='$agentID' AND password='$password'";
        $result = mysqli_query($conn, $query);
        while ($row = mysqli_fetch_array($result)) {
            $fullName = $row['fullName'];
            $email    = $row['email'];
            $agentID  = $row['agentID'];
        }if (mysqli_num_rows($result) == 1) {
            $_SESSION['agentID'] = $agentID;
            $_SESSION['fullName'] = $fullName;
            header('location: dashboard');
    }else {
            echo $_SESSION['message'];
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
        <link rel="stylesheet" href="assets/fonts/icomoon/style.css">
        <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
        <link rel="stylesheet" href="assets/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
    </head>
<body>

    <div class="content">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <img src="assets/images/standing-12@2x.svg" alt="Image" class="img-fluid">
                </div>
                <div class="col-md-6 contents">
                    <div class="row justify-content-center">
                        <div class="col-md-8 text-center">
                            <div class="mb-4">
                                <h3><strong>Sign in</strong></h3>
                                <p class="mb-4">Sign in using your correct credentials.</p>
                                <?php $_SESSION['message'] ?>
                            </div>
                            <form action="<? echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" autocomplete="off">
                                <div class="form-group first mb-3">
                                    <label for="username">Agent ID</label>
                                    <input type="text" name="agentID" required class="form-control" id="agentID">
                                </div>
                                <div class="form-group last mb-3">
                                    <label for="password">Password</label>
                                    <input type="password" name="password" required class="form-control" id="password">
                                </div>

                                <input type="submit" name="login_btn" value="Log In" class="btn btn-block btn-primary">

                                <div class="align-items-center text-center mt-2">
                                    <span class="ml-auto"><a href="password-reset" class="forgot-pass">Forgot Password</a></span>
                                </div>

                            </form>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

    <!-- Footer -->
    <script src="assets/js/jquery-3.3.1.min.js"></script>
    <script src="assets/js/popper.min.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="assets/js/main.js"></script>
</body>
</html>


