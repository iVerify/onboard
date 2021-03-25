<?php
include "../config/db.php";

//Message Select
$employeeid = 0;
if(isset($_POST['employeeid'])){
   $employeeid = mysqli_real_escape_string($conn,$_POST['employeeid']);
}
$sql = "SELECT * FROM employee WHERE id=".$employeeid;
$result = mysqli_query($conn,$sql);

$response = "<table border='0' width='100%'>";
while( $row = mysqli_fetch_array($result) ){
    $id = $row['id'];
    $agentid        = $row['agentid'];
    $firstname      = $row['firstname'];
    $lastname       = $row['lastname'];
    $clientname     = $row['clientname'];
    $reportid       = $row['reportid'];
    $rpvisitdate    = $row['rpvisitdate'];
    $rpfirstname    = $row['rpfirstname'];
    $rplastname     = $row['rplastname'];
    $rpaddress      = $row['rpaddress'];
    $rpaddressdesc  = $row['rpaddressdesc'];
    $mwfirstname    = $row['mwfirstname'];
    $mwlastname     = $row['mwlastname'];
    $mwoccupation   = $row['mwoccupation'];
    $twaddress      = $row['twaddress'];
    $twaddressdesc  = $row['twaddressdesc'];
    $twfirstname    = $row['twfirstname'];
    $twlastname     = $row['twlastname'];
    $mwwoccupation  = $row['mwwoccupation'];
    $rpagentremark  = $row['rpagentremark'];
    $rpupload       = $row['rpupload'];
    $rpupload1      = $row['rpupload1'];
    $rplatitude     = $row['rplatitude'];
    $rplongitude    = $row['rplongitude'];
    $status         = $row['status'];
    switch ($status) {
        case "Pending";
            $class  = 'badge-warning';
            break;
        case "Approved";
            $class  = 'badge-success';
            break;
        default:
            $class  = '';

    }

 $response .= "<div class=\"card-body\" style='margin-top: -20px'>";

 $response .= "<div class=\"text-center\">";
 $response .= "<img src=\"../assets/images/logo.png\" style=\"width: 150px;\"><br>";
 $response .= "</div>";

        $response .= "<div class=\"table-responsive\">";

        $response .= "<table class=\"table table-bordered\">";
        $response .= "<tr>";
            $response .= "<th style=\"background-color: #ececef;\"><strong>Agent ID:</strong></th>";
            $response .= "<td>" .$agentid. "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
            $response .= "<th style=\"background-color: #ececef;\"><strong>Agent Full Name:</strong></th>";
            $response .= "<td>" .$firstname." ".$lastname. "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
            $response .= "<th style=\"background-color: #ececef;\"><strong>Client:</strong></th>";
            $response .= "<td>" .$purpose. "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
            $response .= "<th style=\"background-color: #ececef;\"><strong>Visitation Date:</strong></th>";
            $response .= "<td>" .$purpose. "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
            $response .= "<th style=\"background-color: #ececef;\"><strong>Employee First Name:</strong></th>";
            $response .= "<td>" .$purpose. "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
            $response .= "<th style=\"background-color: #ececef;\"><strong>Employee Last Name:</strong></th>";
            $response .= "<td>" .$purpose. "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
            $response .= "<th style=\"background-color: #ececef;\"><strong>Address:</strong></th>";
            $response .= "<td>" .$purpose. "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
            $response .= "<th style=\"background-color: #ececef;\"><strong>Address Landmark & Description:</strong></th>";
            $response .= "<td>" .$purpose. "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
            $response .= "<th style=\"background-color: #ececef;\"><strong>Met with First Name:</strong></th>";
            $response .= "<td>" .$purpose. "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
            $response .= "<th style=\"background-color: #ececef;\"><strong>Met with Last Name:</strong></th>";
            $response .= "<td>" .$purpose. "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
            $response .= "<th style=\"background-color: #ececef;\"><strong>Met with Occupation:</strong></th>";
            $response .= "<td>" .$purpose. "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
            $response .= "<th style=\"background-color: #ececef;\"><strong>Picture:</strong></th>";
            $response .= "<td>" .$purpose. "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
            $response .= "<th style=\"background-color: #ececef;\"><strong>Location on Map:</strong></th>";
            $response .= "<td>"; 
            $response .= "<div>";
            $response .= "<div id='googleMap' style='width:100%;height:400px;"></div>

            <script>
                function myMap() {
                    var mapProp= {
                        center:new google.maps.LatLng(<? echo $rplatitude ?>,<? echo $rplongitude ?>),
                        zoom:20,
                    };
                    var map = new google.maps.Map(document.getElementById("googleMap"),mapProp);
                }
                var marker = new google.maps.Marker({position: myCenter});

                marker.setMap(map);
            </script>
        </div> 
                                        "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
          $response .= "<th style='background-color: #ececef;'><strong>Agent Remark:</strong></th>";
          $response .= "<td><div class='form-group'>";
          $response .= "<textarea class='form-control' rows='5' readonly>".$rpagentremark."</textarea>";
          "</div></td>";
        $response .= "</tr>";
         
        }
        $response .= "</table>";
        $response .= "<div class='text-center'>";
            $response.= "<button type=\"button\" class=\"btn btn-default\" data-dismiss=\"modal\">Close</button>";
        $response .= "</div>";
        
   $response .= "</div>";
   $response .= "</div>";
   $response .= "</div>";
   $response .= "</div>";

echo $response;
exit;