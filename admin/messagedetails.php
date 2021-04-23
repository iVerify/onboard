<?php
$page = 'messages';
include "./components/header.php";
include "./components/sidenav.php";

$id = $_GET['id'];
$query = "SELECT * FROM messages WHERE id='$id'";
$results = mysqli_query($conn, $query);
while ($row = mysqli_fetch_array($results)) {
    $id             = $row['id'];
    $agentid        = $row['agentid'];
    $purpose      = $row['purpose'];
    $comment       = $row['comment'];
    $firstname    = $row['firstname'];
    $lastname     = $row['lastname'];
    ?>
    <!-- Main content -->
    <div class="main-content" id="panel">

    <? include "./components/topnav.php"; ?>

    <div class="header">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center text-center py-4">
                <div class="pl-3">
                    <a href="messages" class="btn btn-icon btn-default" type="button">
                        <span class="btn-inner--icon"><i class="ni ni-bold-left"></i></span>
                        <span class="btn-inner--text">Go Back</span>
                    </a>
                </div>
                <div class="col-lg-12">
                    <h1 class="header-title1 pt-3">
                        Support Message Details
                    </h1>
                    <p>Integrity is the seed for achievement <span style='font-size:15px;'>&#128519;</span></p>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-xl-12" id="pdf">
                        <div class="card row">
                            <div class="card-body">
                                <div class="text-center pb-4">
                                    <img src="../assets/images/logo.png" style="width: 150px;"><br>
                                </div>
                                <div class="table-responsive pb-5">
                                    <table class="table table-bordered">
                                        <tr>
                                            <th style="background-color: #ececef; "><strong>Agent ID:</strong></th>
                                            <td><? echo $agentid ?></td>
                                        </tr>
                                        <tr>
                                            <th style="background-color: #ececef; "><strong>Agent Full Name:</strong></th>
                                            <td><? echo $firstname ?>  <? echo $lastname ?></td>
                                        </tr>
                                        <tr>
                                            <th style="background-color: #ececef; "><strong>Client:</strong></th>
                                            <td><? echo $purpose ?> </td>
                                        </tr>
                                        <tr>
                                            <th style="background-color: #ececef; "><strong>Comment:</strong></th>
                                            <td>
                                                <textarea rows="8" name="rpagentremark" class="form-control"><? echo $comment ?></textarea>
                                            </td>
                                        </tr>
                                    </table>
                                </div>
                                <!--<div class="text-center pb-3">
                                    <a class=\"btn btn-icon btn-default\" href=\"guarantoredit?id=$id\">
                                            <span class=\"btn-inner--icon\"><i class=\"ni ni-ruler-pencil\"></i></span>
                                            <span class=\"btn-inner--text\">Edit</span>
                                        </a>"
                                    <button type="button" class="btn btn-info" onclick="saveDiv('pdf','Title')">
                                        <span class="btn-inner--icon"><i class="ni ni-cloud-download-95"></i></span>
                                        <span class="btn-inner--text">Download PDF</span>
                                    </button>
                                    <button type="button" class="btn btn-danger" id="delete">
                                        <span class="btn-inner--icon"><i class="ni ni-archive-2"></i></span>
                                        <span class="btn-inner--text">Delete</span>
                                    </button>
                                </div>-->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<?php include "./components/footer.php"; ?>