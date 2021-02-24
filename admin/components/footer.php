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
<script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/js-cookie/js.cookie.js"></script>
<script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<script src="../assets/js/main.js?v=1.2.0"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="../assets/js/map.js"></script>
<script src="../assets/js/app.js"></script>

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
        });
    </script>
    <?php
    unset($_SESSION['success_message']);
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
if (isset($_SESSION['guarantor_message']))
{
    ?>
    <script>
        swal({
            title: "<?php echo $_SESSION['guarantor_message_title']; ?>",
            text: "<?php echo $_SESSION['guarantor_message']; ?>",
            icon: "success",
            button: false,
            timer: 2000,
        }).then(function() {
            window.location = "./guarantor-verifications";
        });
    </script>
    <?php
    unset($_SESSION['guarantor_message']);
}
?>

</body>

</html>