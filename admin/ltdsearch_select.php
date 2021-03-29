<?php
include "../config/db.php";

//Message Select
$ltdsearchid = 0;
if(isset($_POST['ltdsearchid'])){
   $ltdsearchid = mysqli_real_escape_string($conn,$_POST['ltdsearchid']);
}
$sql = "SELECT * FROM ltdsearch WHERE id=".$ltdsearchid;
$result = mysqli_query($conn,$sql);

$response = "<table border='0' width='100%'>";
while( $row = mysqli_fetch_array($result) ){
    $id = $row['id'];
    $reportid = $row['reportid'];
    $conductedby = $row['conductedby'];
    $clientname = $row['clientname'];
    $searchdate = $row['searchdate'];
    $searchvenue = $row['searchvenue'];
    $companyname = $row['companyname'];
    $formername = $row['formername'];
    $regnumber = $row['regnumber'];
    $regdate = $row['regdate'];
    $companytype = $row['companytype'];
    $regaddress = $row['regaddress'];
    $mainobjects = $row['mainobjects'];
    $borrowpower = $row['borrowpower'];
    $sharecapitalinc = $row['sharecapitalinc'];
    $sharecapital = $row['sharecapital'];
    $shareclass = $row['shareclass'];
    $paidupcapital = $row['paidupcapital'];
    $issuedbutunpaid = $row['issuedbutunpaid'];
    $sharetakenup = $row['sharetakenup'];
    $annualreturns = $row['annualreturns'];
    $registeredcharges = $row['registeredcharges'];
    $companysecretary = $row['companysecretary'];
    $shareholders = $row['shareholders'];
    $directorsNproprietors = $row['directorsNproprietors'];
    $agentremark = $row['agentremark'];
    $status = $row['status'];
    switch ($status) {
        case "Pending";
            $class  = 'bg-warning';
            break;
        case "Approved";
            $class  = 'bg-success';
            break;
        default:
            $class  = $row['class'];
    }

 $response .= "<div class=\"card-body\" style='margin-top: -20px'>";

 $response .= "<div class=\"text-center\">";
 $response .= "<img src=\"../assets/images/logo.png\" style=\"width: 150px;\"><br>";
 $response .= "<label class='form-control-label heading-small'>";
 $response .= "<strong>Verification Status: </strong>"; 
 $response .= "<span class='badge badge-dot'><i class='$class'></i> $status </span>";
 $response .= "</label>";
 $response .= "</div>";

        $response .= "<div class=\"table-responsive\">";

        $response .= "<table class=\"table table-bordered\">";
        $response .= "<tr>";
            $response .= "<th style=\"background-color: #ececef;\"><strong>Search Conducted by:</strong></th>";
            $response .= "<td>" .$conductedby. "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
            $response .= "<th style=\"background-color: #ececef;\"><strong>Search Date:</strong></th>";
            $response .= "<td>" .$searchdate. "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
            $response .= "<th style=\"background-color: #ececef;\"><strong>Search Venue:</strong></th>";
            $response .= "<td>" .$searchvenue. "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
            $response .= "<th style=\"background-color: #ececef;\"><strong>Client:</strong></th>";
            $response .= "<td>" .$clientname. "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
            $response .= "<th style=\"background-color: #ececef;\"><strong>Company Name:</strong></th>";
            $response .= "<td>" .$companyname. "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
            $response .= "<th style=\"background-color: #ececef;\"><strong>Former Name:</strong></th>";
            $response .= "<td>" .$formername. "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
            $response .= "<th style=\"background-color: #ececef;\"><strong>Registration Number:</strong></th>";
            $response .= "<td>" .$regnumber. "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
            $response .= "<th style=\"background-color: #ececef;\"><strong>Registration Date:</strong></th>";
            $response .= "<td>" .$regdate. "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
            $response .= "<th style=\"background-color: #ececef;\"><strong>Company Type:</strong></th>";
            $response .= "<td>" .$companytype. "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
            $response .= "<th style=\"background-color: #ececef;\"><strong>Registered Address:</strong></th>";
            $response .= "<td>" .$regaddress. "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
          $response .= "<th style='background-color: #ececef;'><strong>Company Main Object:</strong></th>";
          $response .= "<td><div class='form-group'>";
          $response .= "<textarea class='form-control' rows='5' readonly>".$mainobjects."</textarea>";
          "</div></td>";
        $response .= "</tr>";

        $response .= "<tr>";
            $response .= "<th style=\"background-color: #ececef;\"><strong>Borrowing Power:</strong></th>";
            $response .= "<td>" .$borrowpower. "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
            $response .= "<th style=\"background-color: #ececef;\"><strong>Share Capital at Incorporation:</strong></th>";
            $response .= "<td>" .$sharecapitalinc. "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
            $response .= "<th style=\"background-color: #ececef;\"><strong>Current Share Capital:</strong></th>";
            $response .= "<td>" .$sharecapital. "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
            $response .= "<th style=\"background-color: #ececef;\"><strong>Class of Shares:</strong></th>";
            $response .= "<td>" .$shareclass. "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
            $response .= "<th style=\"background-color: #ececef;\"><strong>Paid up Capital Under Each Class:</strong></th>";
            $response .= "<td>" .$paidupcapital. "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
            $response .= "<th style=\"background-color: #ececef;\"><strong>Issued but Unpaid Shares:</strong></th>";
            $response .= "<td>" .$issuedbutunpaid. "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
            $response .= "<th style=\"background-color: #ececef;\"><strong>Share Taken Up Payable in Cash:</strong></th>";
            $response .= "<td>" .$sharetakenup. "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
            $response .= "<th style=\"background-color: #ececef;\"><strong>Annual Returns Status:</strong></th>";
            $response .= "<td>" .$annualreturns. "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
            $response .= "<th style=\"background-color: #ececef;\"><strong>Registered Charges:</strong></th>";
            $response .= "<td>" .$registeredcharges. "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
            $response .= "<th style=\"background-color: #ececef;\"><strong>Company Secretary:</strong></th>";
            $response .= "<td>" .$companysecretary. "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
          $response .= "<th style='background-color: #ececef;'><strong>Directors/Proprietors/Trustees:</strong></th>";
          $response .= "<td><div class='form-group'>";
          $response .= "<textarea class='form-control' rows='5' readonly>".$directorsNproprietors."</textarea>";
          "</div></td>";
        $response .= "</tr>";

        $response .= "<tr>";
          $response .= "<th style='background-color: #ececef;'><strong>Shareholders/Shareholding Structure:</strong></th>";
          $response .= "<td><div class='form-group'>";
          $response .= "<textarea class='form-control' rows='5' readonly>".$shareholders."</textarea>";
          "</div></td>";
        $response .= "</tr>";

        $response .= "<tr>";
          $response .= "<th style='background-color: #ececef;'><strong>Agent Remark:</strong></th>";
          $response .= "<td><div class='form-group'>";
          $response .= "<textarea class='form-control' rows='5' readonly>".$agentremark."</textarea>";
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