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
<script src="../assets/js/app.js"></script>
<script>
    $(function() {
        // Datatables basic
        $('#datatables-basic').DataTable({
            responsive: true
        });
        // Datatables with Buttons
        var datatablesButtons = $('#datatables-buttons').DataTable({
            lengthChange: !1,
            buttons: ["copy", "print"],
            responsive: true
        });
        datatablesButtons.buttons().container().appendTo("#datatables-buttons_wrapper .col-md-6:eq(0)")
    });
</script>
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
        }).then(function() {
            window.location = "../agents";
        });
    </script>
    <?php
    unset($_SESSION['success_message']);
}
?>
</body>

</html>