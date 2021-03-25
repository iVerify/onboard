<?php
include "../config/db.php";

//Message Select
$messageid = 0;
if(isset($_POST['messageid'])){
   $messageid = mysqli_real_escape_string($conn,$_POST['messageid']);
}
$sql = "SELECT * FROM messages WHERE id=".$messageid;
$result = mysqli_query($conn,$sql);

$response = "<table border='0' width='100%'>";
while( $row = mysqli_fetch_array($result) ){
 $id = $row['id'];
 $firstname = $row['firstname'];
 $lastname = $row['lastname'];
 $agentid = $row['agentid'];
 $email = $row['email'];
 $purpose = $row['purpose'];
 $comment = $row['comment'];
 $date = $row['date'];

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
            $response .= "<th style=\"background-color: #ececef;\"><strong>Purpose:</strong></th>";
            $response .= "<td>" .$purpose. "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
            $response .= "<th style=\"background-color: #ececef;\"><strong>Agent ID:</strong></th>";
            $response .= "<td>" .$agentid. "</td>";
        $response .= "</tr>";

        $response .= "<tr>";
          $response .= "<th style='background-color: #ececef;'><strong>Comment:</strong></th>";
          $response .= "<td><div class='form-group'>";
          $response .= "<textarea class='form-control' rows='5' readonly>".$comment."</textarea>";
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