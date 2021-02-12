<!-- Footer -->
<footer class="footer pt-0">
    <div class="row align-items-center justify-content-center text-center">
        <div class="col-lg-12">
            <div class="copyright text-muted">
                © <script>document.write(new Date().getFullYear());</script> iVerify&trade; All Rights Reserved.
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<?php include "components/modal.php"; ?>

<script src="assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="assets/vendor/js-cookie/js.cookie.js"></script>
<script src="assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<script src="assets/vendor/chart.js/dist/Chart.min.js"></script>
<script src="assets/vendor/chart.js/dist/Chart.extension.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="assets/js/main.js?v=1.2.0"></script>
<script src="assets/js/map.js"></script>
<script>
    var time = new Date().getHours();
    if (time < 12) {
        greeting = "Good Morning";
    } else if (time < 16) {
        greeting = "Good Afternoon";
    } else {
        greeting = "Good Evening";
    }
    document.getElementById("greet").innerHTML = greeting;
</script>

<script>
    document.getElementById('personal').onclick = function(){
        swal({
                title: "Access Denied",
                text: "You can only make changes via admin",
                icon: "info",
                button: "Contact Admin",
                dangerMode: true,
                timer: 5000,
            })
            .then((willDelete) => {
                if (willDelete) {
                    swal("You're being redirected to contact support", {
                        icon: "success",
                        button: false,
                        timer: 3000,
                    }).then(function() {
                        window.location = "support";
                    });

                }
            });
    };
</script>

<script>
    document.getElementById('delete').onclick = function(){
        swal({
            title: "Access Denied",
            text: "You can only make changes via admin",
            icon: "info",
            button: "Contact Admin",
            dangerMode: true,
            timer: 5000,
        })
            .then((willDelete) => {
                if (willDelete) {
                    swal("You're being redirected to contact support", {
                        icon: "success",
                        button: false,
                        timer: 3000,
                    }).then(function() {
                        window.location = "support";
                    });

                }
            });
    };
</script>
<?php
if (isset($_SESSION['support_message']))
{
?>
    <script>
        swal({
        title: "<?php echo $_SESSION['support_message_title']; ?>",
        text: "<?php echo $_SESSION['support_message']; ?>",
        icon: "success",
        button: false,
        timer: 5000,
        });
    </script>
<?php
unset($_SESSION['support_message']);
}
?>

<?php
if (isset($_SESSION['password_change_message']))
{
    ?>
    <script>
        swal({
            title: "<?php echo $_SESSION['password_change_message_title']; ?>",
            text: "<?php echo $_SESSION['password_change_message']; ?>",
            icon: "success",
            button: false,
            timer: 5000,
        }).then(function() {
            window.location = "logout";
        });
    </script>
    <?php
    unset($_SESSION['password_change_message']);
}
?>

<?php
if (isset($_SESSION['error_password_change_message']))
{
    ?>
    <script>
        swal({
            title: "<?php echo $_SESSION['error_password_change_message_title']; ?>",
            text: "<?php echo $_SESSION['error_password_change_message']; ?>",
            icon: "error",
            buttons: false,
            timer: 4000
        });
    </script>
    <?php
    unset($_SESSION['error_password_change_message']);
}
?>

<?php
if (isset($_SESSION['report_message']))
{
    ?>
    <script>
        swal({
            title: "<?php echo $_SESSION['report_title']; ?>",
            text: "<?php echo $_SESSION['report_message']; ?>",
            icon: "success",
            buttons: false,
            timer: 4000
        });
    </script>
    <?php
    unset($_SESSION['report_message']);
}
?>

<?php
if (isset($_SESSION['error_report_message']))
{
    ?>
    <script>
        swal({
            title: "<?php echo $_SESSION['error_report_title']; ?>",
            text: "<?php echo $_SESSION['error_report_message']; ?>",
            icon: "error",
            buttons: false,
            timer: 4000
        });
    </script>
    <?php
    unset($_SESSION['error_report_message']);
}
?>

<script>
    function myFunction() {
        var pwd = document.getElementById("myPassword");
        var newPwd = document.getElementById("myPassword1");
        if (pwd.type === "password",
            newPwd.type === "password") {
            pwd.type = "text";
            newPwd.type = "text";
        } else {
            pwd.type = "password";
            newPwd.type = "password";
        }
    }
</script>
</body>

</html>