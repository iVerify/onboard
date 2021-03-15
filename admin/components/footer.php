<!-- Footer -->
<footer class="footer pt-0">
    <div class="row align-items-center justify-content-center text-center">
        <div class="col-lg-12">
            <div class="copyright text-muted">
                <!-- © <script>document.write(new Date().getFullYear());</script> iVerify&trade; All Rights Reserved.-->
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="../assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="../assets/vendor/chart.js/dist/Chart.min.js"></script>
<script src="../assets/vendor/chart.js/dist/Chart.extension.js"></script>
<script src="../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../assets/vendor/js-cookie/js.cookie.js"></script>
<script src="../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<script src="../assets/js/main.js?v=1.2.0"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDODKndJ8udk9xrwV_9KZwzziQOgsAR3Ew&callback=myMap"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.5.3/jspdf.min.js"></script>
<script type="text/javascript" src="https://html2canvas.hertzen.com/dist/html2canvas.js"></script>
<script src="../assets/js/map.js"></script>
<script src="../assets/js/jspdf.min.js"></script>
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

<?php
if (isset($_SESSION['pwa_message']))
{
    ?>
    <script>
        swal({
            title: "<?php echo $_SESSION['pwa_message_title']; ?>",
            text: "<?php echo $_SESSION['pwa_message']; ?>",
            icon: "success",
            button: false,
            timer: 2000,
        }).then(function() {
            window.location = "./pwa-verifications";
        });
    </script>
    <?php
    unset($_SESSION['pwa_message']);
}
?>

<?php
if (isset($_SESSION['employee_message']))
{
    ?>
    <script>
        swal({
            title: "<?php echo $_SESSION['employee_message_title']; ?>",
            text: "<?php echo $_SESSION['employee_message']; ?>",
            icon: "success",
            button: false,
            timer: 2000,
        }).then(function() {
            window.location = "./employee-verifications";
        });
    </script>
    <?php
    unset($_SESSION['employee_message']);
}
?>

<?php
if (isset($_SESSION['tenant_message']))
{
    ?>
    <script>
        swal({
            title: "<?php echo $_SESSION['tenant_message_title']; ?>",
            text: "<?php echo $_SESSION['tenant_message']; ?>",
            icon: "success",
            button: false,
            timer: 2000,
        }).then(function() {
            window.location = "./tenant-verifications";
        });
    </script>
    <?php
    unset($_SESSION['tenant_message']);
}
?>

<?php
if (isset($_SESSION['name_search_message']))
{
    ?>
    <script>
        swal({
            title: "<?php echo $_SESSION['name_search_message_title']; ?>",
            text: "<?php echo $_SESSION['rname_search_message']; ?>",
            icon: "success",
            button: false,
            timer: 2000,
        }).then(function() {
            window.location = "./name-search";
        });
    </script>
    <?php
    unset($_SESSION['name_search_message']);
}
?>

<?php
if (isset($_SESSION['admin_message']))
{
    ?>
    <script>
        swal({
            title: "<?php echo $_SESSION['admin_message_title']; ?>",
            text: "<?php echo $_SESSION['admin_message']; ?>",
            icon: "success",
            button: false,
            timer: 2000,
        }).then(function() {
            window.location = "./admins";
        });
    </script>
    <?php
    unset($_SESSION['admin_message']);
}
?>

<?php
if (isset($_SESSION['agent_message']))
{
    ?>
    <script>
        swal({
            title: "<?php echo $_SESSION['agent_message_title']; ?>",
            text: "<?php echo $_SESSION['agent_message']; ?>",
            icon: "success",
            button: false,
            timer: 2000,
        }).then(function() {
            window.location = "./agents";
        });
    </script>
    <?php
    unset($_SESSION['agent_message']);
}
?>

<?php
if (isset($_SESSION['client_message']))
{
    ?>
    <script>
        swal({
            title: "<?php echo $_SESSION['client_message_title']; ?>",
            text: "<?php echo $_SESSION['client_message']; ?>",
            icon: "success",
            button: false,
            timer: 2000,
        }).then(function() {
            window.location = "./clients";
        });
    </script>
    <?php
    unset($_SESSION['client_message']);
}
?>

</body>

</html>