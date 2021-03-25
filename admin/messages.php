<?php
$page = 'messages';
include "./components/header.php";
include "./components/sidenav.php";
?>
    <!-- Main content -->
    <div class="main-content" id="panel">

<? include "./components/topnav.php"; ?>

    <div class="header">
    <div class="container-fluid">
        <div class="header-body">
            <div class="row align-items-center text-center py-4">
                <div class="col-lg-12">
                    <h1 class="header-title1 pt-3">
                        Agent Support Messages
                    </h1>
                    <p>Integrity is the seed for achievement <span style='font-size:15px;'>&#128519;</span></p>
                </div>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col">
                        <div class="card">
                            <div class="card-body">
                                <div class="card-header border-0">
                                    <div class="col px-0 pb-3 d-flex justify-content-between">
                                        <h3 class="mb-0">Messages</h3>
                                    </div>
                                </div>
                                <div class="table-responsive">
                                <table id="datatables-basic" class="table table-striped" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Agent ID</th>
                                                <th>Agent Name</th>
                                                <th>Purpose</th>
                                                <th>Comment</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </thead>
                                            <tbody>
                                            <?php
                                            $select_query = "SELECT * FROM messages ORDER BY date ASC";;
                                            $result = mysqli_query($conn, $select_query);
                                            if (mysqli_num_rows($result) > 0) {
                                                // output data of each row
                                                while($row = mysqli_fetch_assoc($result)) {
                                                    $id = $row['id'];
                                                    $agentid = $row['agentid'];
                                                    $purpose = $row['purpose'];
                                                    $agentid = $row['agentid'];
                                                    $comment = $row['comment'];
                                                    $firstname = $row['firstname'];
                                                    $lastname = $row['lastname'];

                                                    $commentlength=54; // Define how many character you want to display.

                                                    $comment = substr($comment, 0, $commentlength);

                                                    echo "<tr>";
                                                    echo "<td class=\"budget\">" .$agentid. "</td>";
                                                    echo "<td class=\"budget\">" .$firstname. "</td>";
                                                    echo "<td class=\"budget\">" .$purpose. "</td>";
                                                    echo "<td class=\"budget\">" .$comment."" ."....."."</td>";

                                                    echo "<td class='text-right'>"
                                                        ."<a href=\"#?id=$id\" class=\"btn btn-sm btn-icon btn-info\">
                                                            <span class=\"btn-inner--icon\"><i class=\"ni ni-ruler-pencil\"></i></span>
                                                            <span class=\"btn-inner--text\">Reply</span>
                                                        </a>
                                                    <button data-id='".$id."' class=\"btn btn-sm btn-icon btn-default messageinfo\">
                                                        <span class=\"btn-inner--icon\"><i class=\"ni ni-zoom-split-in\"></i></span>
                                                        <span class=\"btn-inner--text\">View</span>
                                                    </button>
                                                    <a href=\"\" class=\"btn btn-sm btn-icon btn-danger\" type=\"button\">
                                                        <span class=\"btn-inner--icon\"><i class=\"ni ni-archive-2\"></i></span>
                                                        <span class=\"btn-inner--text\">Delete</span>
                                                    </a>".
                                                        "</td >";
                                                    "</tr>";
                                                }
                                            }else {
                                                echo "<td><p>No Messages Yet!</p></td>";
                                            }
                                            ?>
                                            </tbody>
                                        <tfoot>
                                            <tr>
                                                <th>Agent ID</th>
                                                <th>Agent Name</th>
                                                <th>Purpose</th>
                                                <th>Comment</th>
                                                <th class="text-right">Action</th>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



<?php 
include "./components/modal.php";
include "./components/footer.php"; 
?>