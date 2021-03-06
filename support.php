<?php
include "./components/header.php";
include "./components/navbar.php";
// Connect database
include('./config/db.php');

// Support script
if (isset($_POST['support_btn'])) {

    $agentid    = $conn->real_escape_string($_POST['agentid']);
    $purpose    = $conn->real_escape_string($_POST['purpose']);
    $comment    = $conn->real_escape_string($_POST['comment']);
    $firstname    = $conn->real_escape_string($_POST['firstname']);
    $lastname    = $conn->real_escape_string($_POST['lastname']);

    $query = "INSERT INTO messages (agentid, purpose, comment, firstname, lastname)"
            ."VALUES ('$agentid', '$purpose', '$comment', '$firstname', '$lastname')";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['agentid'] = $agentid;
        $_SESSION['support_message_title'] = "Request Sent";
        $_SESSION['support_message'] = "Your request will attended to 👍";
    }else {
        error_log("Error is ".mysqli_error($conn));
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
                        Contact Support
                    </h1>
                    <p>Feel free to contact support <span style='font-size:15px;'>&#128519;</span></p>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-xl-12 order-xl-1">
                        <div class="card">
                            <div class="card-body">
                                <form action="<? echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
                                    <h5 class="heading-small text-muted mb-4 text-center">Fill out the form below</h5>
                                    <div class="pl-lg-4">
                                        <div class="row">
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-agent-id">Agent ID</label>
                                                    <input type="text" id="agent-id" name="agentid" class="form-control" value="<?php echo $_SESSION['agentid']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-agent-id">First Name</label>
                                                    <input type="text" id="agent-id" name="firstname" class="form-control" value="<?php echo $_SESSION['firstname']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-agent-id">Last Name</label>
                                                    <input type="text" id="agent-id" name="lastname" class="form-control" value="<?php echo $_SESSION['lastname']; ?>" readonly>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-purpose">Purpose</label>
                                                    <select class="form-control" name="purpose" required id="purpose">
                                                        <option data-display="Select Purpose">Select Purpose</option>
                                                        <option value="Enquiries">Enquiries</option>
                                                        <option value="Complains">Complains</option>
                                                        <option value="Support">Support</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-lg-12">
                                                <div class="form-group">
                                                    <label class="form-control-label" for="input-request">Request</label>
                                                    <textarea id="comment" name="comment" required class="form-control" placeholder="How can i help you?" style="height: 180px;"></textarea>
                                                </div>
                                            </div>
                                            <div class="col-lg-12 text-center text-white">
                                                <button name="support_btn" class="btn btn-icon btn-default" type="submit">
                                                    <span class="btn-inner--icon"><i class="ni ni-send"></i></span>
                                                    <span class="btn-inner--text">Send Request</span>
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