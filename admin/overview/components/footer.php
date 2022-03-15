<!-- Send Modal -->
<div class="modal fade" id="sendModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                        <div class="row">
                            <div class="col-6">
                                <div class="card mb--1">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <a href="employee-reports">
                                                <img src="../../assets/img/icons/send.svg" class="rounded-circle" style="left: 50%; width: 80px; transition: all .15s ease; border: 3px solid #fff; border-radius: .375rem;">
                                                <h3>Send Mail</h3>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <div class="card mb--1">
                                    <div class="card-body">
                                        <div class="text-center">
                                            <a href="#" id="downloadReport">
                                                <img src="../../assets/img/icons/downloadpdf.svg" class="rounded-circle" style="left: 50%; width: 80px; transition: all .15s ease; border: 3px solid #fff; border-radius: .375rem;">
                                                <h3>Download</h3>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Send Modal -->

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
<script src="../../assets/vendor/jquery/dist/jquery.min.js"></script>
<script src="../../assets/vendor/chart.js/dist/Chart.min.js"></script>
<script src="../../assets/vendor/chart.js/dist/Chart.extension.js"></script>
<script src="../../assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
<script src="../../assets/vendor/js-cookie/js.cookie.js"></script>
<script src="../../assets/vendor/jquery.scrollbar/jquery.scrollbar.min.js"></script>
<script src="../../assets/vendor/jquery-scroll-lock/dist/jquery-scrollLock.min.js"></script>
<script src="../../assets/js/main.js?v=1.2.0"></script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDODKndJ8udk9xrwV_9KZwzziQOgsAR3Ew&callback=myMap"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="../../assets/js/map.js"></script>
<script src="../../assets/js/app.js"></script>
<script src="//cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script>
    function goBack() {
        window.history.back();
    }
    </script>

    <script>
        document.getElementById("doPrint").addEventListener("click", function() {
            var printContents = document.getElementById('printDiv').innerHTML;
            var originalContents = document.body.innerHTML;
            document.body.innerHTML = printContents;
            window.print();
            document.body.innerHTML = originalContents;
        });
    </script>
    <script>
        @print {
            @page :footer {
                display: none
            }
        
            @page :header {
                display: none
            }
        }
    </script>

    <!-- Message Modal -->
    <script>
        $(document).ready(function(){
            $('.messageinfo').click(function(){
            
                var messageid = $(this).data('id');
                
                // AJAX request
                $.ajax({
                    url: './select.php',
                    type: 'post',
                    data: {messageid: messageid},
                    success: function(response){ 
                        // Add response in Modal body
                        $('.modal-body').html(response);
                        // Display Modal
                        $('#viewMessageModal').modal('show'); 
                    }
                });
            });
        });
	</script>
    <!-- Message Modal -->

    <!-- View Name Search Modal -->
    <script>
        $(document).ready(function(){
            $('.namesearchinfo').click(function(){
            
                var namesearchid = $(this).data('id');
                
                // AJAX request
                $.ajax({
                    url: './namesearch_select.php',
                    type: 'post',
                    data: {namesearchid: namesearchid},
                    success: function(response){ 
                        // Add response in Modal body
                        $('.modal-body').html(response);
                        // Display Modal
                        $('#viewNameSearchModal').modal('show'); 
                    }
                });
            });
        });
	</script>
    <!-- View Name Search Modal -->

    <!-- View LTD Search Modal -->
    <script>
        $(document).ready(function(){
            $('.ltdsearchinfo').click(function(){
            
                var ltdsearchid = $(this).data('id');
                
                // AJAX request
                $.ajax({
                    url: './ltdsearch_select.php',
                    type: 'post',
                    data: {ltdsearchid: ltdsearchid},
                    success: function(response){ 
                        // Add response in Modal body
                        $('.modal-body').html(response);
                        // Display Modal
                        $('#viewLtdModal').modal('show'); 
                    }
                });
            });
        });
	</script>
    <!-- View LTD Search Modal -->

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
            text: "<?php echo $_SESSION['name_search_message']; ?>",
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
if (isset($_SESSION['ltd_search_message']))
{
    ?>
    <script>
        swal({
            title: "<?php echo $_SESSION['ltd_search_message_title']; ?>",
            text: "<?php echo $_SESSION['ltd_search_message']; ?>",
            icon: "success",
            button: false,
            timer: 2000,
        }).then(function() {
            window.location = "./ltd-search";
        });
    </script>
    <?php
    unset($_SESSION['ltd_search_message']);
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