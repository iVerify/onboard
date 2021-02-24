<?php
session_start();
// Connect database
include('../config/db.php');

// Login script
if (isset($_POST['admin_btn'])) {

    $username       = $conn->real_escape_string($_POST['username']);
    $password       = $conn->real_escape_string($_POST['password']);
    $firstName      = $conn->real_escape_string($_POST['firstName']);
    $lastName       = $conn->real_escape_string($_POST['lastName']);
    $email          = $conn->real_escape_string($_POST['email']);
    $position       = $conn->real_escape_string($_POST['position']);
    $status         = $conn->real_escape_string($_POST['status']);
    $phone          = $conn->real_escape_string($_POST['phone']);

    $password = sha1($password);
    $query = "SELECT * FROM admin WHERE username='$username' AND password='$password'";
    $result = mysqli_query($conn, $query);
    while ($row = mysqli_fetch_array($result)) {
        $firstName          = $row['firstName'];
        $lastName           = $row['lastName'];
        $email              = $row['email'];
        $username           = $row['username'];
        $id                 = $row['id'];
        $status             = $row['status'];
        $position           = $row['position'];
        $picture            = $row['picture'];
        $phone              = $row['phone'];
    }if (mysqli_num_rows($result) == 1) {
        $_SESSION['username']       = $username;
        $_SESSION['firstName']      = $firstName;
        $_SESSION['lastName']       = $lastName;
        $_SESSION['position']       = $position;
        $_SESSION['picture']        = $picture;
        $_SESSION['email']          = $email;
        $_SESSION['phone']          = $phone;
        $_SESSION['id']             = $id;
        if ($status == 'Inactive'){
            $_SESSION['message_title'] = "Account Inactive";
            $_SESSION['message'] = "Please contact admin!";
        }if ($status == 'Active') {
            if ($position == 'Admin') {
                header('location: dashboard');
            }if ($position == 'Super Admin') {
                header('location: dashboard');
            }
        }
    }else {
        $_SESSION['message_title'] = "Incorrect Details";
        $_SESSION['message'] = "Please login with correct credentials!";
    }
}
?>
<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta name="description" content="Start your development with a Dashboard for Bootstrap 4.">
  <meta name="author" content="ThankGod Okoro">
    <title>Login :: iVerify Onboard&trade;</title>
    <meta property="og:url" content="https://www.iverify.ng"/>
    <meta property="og:type" content="website"/>
    <meta property="og:title" content="iVerify&trade; :: Agents Onboard."/>
    <!-- Favicon -->
    <link rel="shortcut icon" href="https://i.imgur.com/muLDDf6.png"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700">
    <link rel="stylesheet" href="../assets/vendor/nucleo/css/nucleo.css" type="text/css">
    <link rel="stylesheet" href="../assets/vendor/@fortawesome/fontawesome-free/css/all.min.css" type="text/css">
    <link rel="stylesheet" href="../assets/css/style.css?v=1.2.0" type="text/css">
</head>

<body class="bg-default">

  <div class="main-content">
    <!-- Header -->
    <div class="header bg-gradient-primary py-7 py-lg-8 pt-lg-9">
        <div class="container">
            <div class="header-body text-center">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-8">
                        <img src="https://i.imgur.com/4lio8Ve.png" width="150px">
                    </div>
                </div>
            </div>
        </div>
      <div class="separator separator-bottom separator-skew zindex-100">
        <svg x="0" y="0" viewBox="0 0 2560 100" preserveAspectRatio="none" version="1.1" xmlns="http://www.w3.org/2000/svg">
          <polygon class="fill-default" points="2560 0 2560 100 0 100"></polygon>
        </svg>
      </div>
    </div>
    <!-- Page content -->
    <div class="container mt--7 pb-5 pt-3">
      <div class="row justify-content-center">
        <div class="col-lg-5 col-md-7">
          <div class="card bg-secondary border-0 mb-0">
            <div class="card-body px-lg-5 py-lg-5">
              <div class="text-center text-muted mb-4">
                  <h4>Admin Portal</h4>
                <small>Sign in to Freedom</small>
              </div>
              <form role="form" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" autocomplete="off">
                <div class="form-group mb-3">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-single-02"></i></span>
                    </div>
                    <input class="form-control" placeholder="Username" name="username" value="zita" type="text">
                  </div>
                </div>
                <div class="form-group">
                  <div class="input-group input-group-merge input-group-alternative">
                    <div class="input-group-prepend">
                      <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                    </div>
                    <input class="form-control" placeholder="Password" name="password" value="kaima2006" type="password">
                  </div>
                </div>
                <div class="custom-control custom-control-alternative custom-checkbox">
                  <input class="custom-control-input" id=" customCheckLogin" type="checkbox">
                  <label class="custom-control-label" for=" customCheckLogin">
                    <span class="text-muted">Remember me</span>
                  </label>
                </div>
                <div class="text-center">
                  <button type="submit" class="btn btn-primary my-4" name="admin_btn" >Sign in</button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Footer -->
  <footer class="py-5" id="footer-main">
    <div class="container">
      <div class="row align-items-center justify-content-xl-between">
        <div class="col-xl-12">
          <div class="copyright text-center text-xl-center text-muted">
              © <script>document.write(new Date().getFullYear());</script> iVerify&trade; All Rights Reserved.
          </div>
        </div>
      </div>
    </div>
  </footer>
  <script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
  <script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/js-cookie/js.cookie.js"></script>
  <script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
  <script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
  <script src="../assets/js/main.js?v=1.2.0"></script>
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
</body>

</html>