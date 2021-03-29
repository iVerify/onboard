<?php

//Add Agent Query
if (isset($_POST['add_agent_btn'])) {

    $email = $conn->real_escape_string($_POST['email']);
    $firstname = $conn->real_escape_string($_POST['firstname']);
    $lastname = $conn->real_escape_string($_POST['lastname']);
    $agentid = 'IVA' . rand(1000, 9999);
    $password = $conn->real_escape_string($_POST['password']);
    $picture = $conn->real_escape_string($_POST['picture']);

    $check_agent_query = "SELECT * FROM agents WHERE email='$email'";
    $result = mysqli_query($conn, $check_agent_query);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['message_title'] = "Agent Already Exist!";
        $_SESSION['message'] = "Modify or Delete user details";
    }

    // Finally, register agent if there are no errors in the form
    $password = sha1($password);//encrypt the password before saving in the database
    $query = "INSERT INTO agents (email, firstname, lastname, password, agentid, picture, status) 
  			        VALUES('$email', '$firstname', '$lastname', '$password', '$agentid', 'uploadmale/avatar.png', 'Active')";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['email'] = $email;
        $_SESSION['success_message_title'] = "Agent Added";
        $_SESSION['success_message'] = "Provide agent with login details.";
    }
}

//Agent Profile Update
if (isset($_POST['agentupdate_btn'])) {

    $id = $conn->real_escape_string($_POST['id']);
    $firstname = $conn->real_escape_string($_POST['firstname']);
    $lastname = $conn->real_escape_string($_POST['lastname']);
    $email = $conn->real_escape_string($_POST['email']);
    $agentid = $conn->real_escape_string($_POST['agentid']);
    $password = $conn->real_escape_string($_POST['password']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $status = $conn->real_escape_string($_POST['status']);

    $password = sha1($password);
    $agent_update_query = "UPDATE agents SET firstname='$firstname', lastname='$lastname', email='$email', agentid='$agentid', password='$password', phone='$phone', status='$status' WHERE id='$id'";
    mysqli_query($conn, $agent_update_query);
    if (mysqli_affected_rows($conn) > 0 ) {
        $_SESSION['agent_message_title'] = "Account Updated";
        $_SESSION['agent_message'] = "Welldone Chief 👍";
    } else {
        $_SESSION['message_title']  = "Update Failed";
        $_SESSION['message']    = "Error updating record now: ".mysqli_error($conn).$id;
    }
}


//Add Admin Query
if (isset($_POST['add_admin_btn'])) {

    $email = $conn->real_escape_string($_POST['email']);
    $firstName = $conn->real_escape_string($_POST['firstName']);
    $lastName = $conn->real_escape_string($_POST['lastName']);
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    $position = $conn->real_escape_string($_POST['position']);
    $picture = $conn->real_escape_string($_POST['picture']);

    $check_admin_query = "SELECT * FROM admin WHERE username='$username' AND email='$email'";
    $result = mysqli_query($conn, $check_admin_query);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['message_title'] = "Admin Already Exist!";
        $_SESSION['message'] = "Modify or Delete admin details";
    }

    // Finally, register admin if there are no errors in the form
    $password = sha1($password);//encrypt the password before saving in the database
    $query = "INSERT INTO admin (email, firstName, lastName, password, username, position, picture, status) 
  			        VALUES('$email', '$firstName', '$lastName', '$password', '$username', '$position', 'upload/avatar.png', 'Active')";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['email'] = $email;
        $_SESSION['success_message_title'] = "Admin Added";
        $_SESSION['success_message'] = "Provide admin with login details.";
    }
}

//Admin Profile Update
if (isset($_POST['adminupdate_btn'])) {

    $id = $conn->real_escape_string($_POST['id']);
    $firstName = $conn->real_escape_string($_POST['firstName']);
    $lastName = $conn->real_escape_string($_POST['lastName']);
    $email = $conn->real_escape_string($_POST['email']);
    $username = $conn->real_escape_string($_POST['username']);
    $password = $conn->real_escape_string($_POST['password']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $position = $conn->real_escape_string($_POST['position']);
    $status = $conn->real_escape_string($_POST['status']);

    $password = sha1($password);
    $admin_update_query = "UPDATE admin SET firstName='$firstName', lastName='$lastName', email='$email', username='$username', password='$password', phone='$phone', position='$position', status='$status' WHERE id='$id'";
    mysqli_query($conn, $admin_update_query);
    if (mysqli_affected_rows($conn) > 0 ) {
        $_SESSION['admin_message_title'] = "Account Updated";
        $_SESSION['admin_message'] = "Welldone Chief 👍";
    } else {
        $_SESSION['message_title']  = "Update Failed";
        $_SESSION['message']    = "Error updating record now: ".mysqli_error($conn).$id;
    }
}

//Admin Password Change
$username       = $_SESSION['username'];
$id             = $_SESSION["id"];
$firstName      = $_SESSION['firstName'];
$lastName       = $_SESSION['lastName'];
$username       = $_SESSION['username'];


if(isset($_POST['admin_password_btn'])) {

    $newPassword    = $conn->real_escape_string($_POST['newPassword']);
    $password       = $conn->real_escape_string($_POST['password']);

    $password = sha1($_POST['password']);
    $username = $_SESSION['username'];
    $newPassword = sha1($_POST['newPassword']);
    $sql=mysqli_query($conn,"SELECT * FROM admin where password='$password' && username='$username'");
    $num=mysqli_fetch_array($sql);$username   = $_SESSION['username'];
    $id = $_SESSION["id"];


    if(isset($_POST['password_btn'])) {

        $newPassword    = $conn->real_escape_string($_POST['newPassword']);
        $password       = $conn->real_escape_string($_POST['password']);

        $password = sha1($_POST['password']);
        $username = $_SESSION['username'];
        $newPassword = sha1($_POST['newPassword']);
        $sql=mysqli_query($conn,"SELECT * FROM admin where password='$password' && username='$username'");
        $num=mysqli_fetch_array($sql);
        if($num>0)
        {
            $conn=mysqli_query($conn,"UPDATE admin SET password='$newPassword' where username='$username'");
            $_SESSION['password_change_message_title'] = "Password Changed";
            $_SESSION['password_change_message'] = "Please login with the new password 👍";
        }
        else
        {
            $_SESSION['error_password_change_message_title'] = "Wrong Password";
            $_SESSION['error_password_change_message'] = "Current password mismatch";
        }
    }
    if($num>0)
    {
        $conn=mysqli_query($conn,"UPDATE admin SET password='$newPassword' where username='$username'");
        $_SESSION['password_change_message_title'] = "Password Changed";
        $_SESSION['password_change_message'] = "Please login with the new password 👍";
    }
    else
    {
        $_SESSION['error_password_change_message_title'] = "Wrong Password";
        $_SESSION['error_password_change_message'] = "Current password mismatch";
    }
}

//Admin Profile Update
if (isset($_POST['admin_update_btn'])) {

    $email          = $conn->real_escape_string($_POST['email']);
    $firstName      = $conn->real_escape_string($_POST['firstName']);
    $lastName       = $conn->real_escape_string($_POST['lastName']);
    $username       = $conn->real_escape_string($_POST['username']);

    $admin_update_query = "UPDATE admin SET email='$email', firstName='$firstName', lastName='$lastName', username='$username'  WHERE id='$id'";
    if ($conn->query($admin_update_query) === TRUE) {
        $_SESSION['success_message_title'] = "Profile Updated";
        $_SESSION['success_message'] = "Welldone Chief for updating your profile 👍";
    } else {
        $_SESSION['message_title']  = "Update Failed";
        $_SESSION['message']    = "Error updating record: " . $conn->error;
    }
}

//Add Client Query
if (isset($_POST['add_client_btn'])) {

    $email          = $conn->real_escape_string($_POST['email']);
    $firstName      = $conn->real_escape_string($_POST['firstName']);
    $lastName       = $conn->real_escape_string($_POST['lastName']);
    $companyName    = $conn->real_escape_string($_POST['companyName']);
    $phone          = $conn->real_escape_string($_POST['phone']);
    $status         = $conn->real_escape_string($_POST['status']);

    $check_client_query = "SELECT * FROM client WHERE companyName='$companyName' AND email='$email'";
    $result = mysqli_query($conn, $check_client_query);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['message_title'] = "Client Already Exist!";
        $_SESSION['message'] = "Modify or Delete admin details";
    }

    // Finally, register client if there are no errors in the form
    $query = "INSERT INTO client (email, firstName, lastName, companyName, phone, status) 
  			        VALUES('$email', '$firstName', '$lastName', '$companyName', '$phone', '$status')";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['email'] = $email;
        $_SESSION['success_message_title'] = "Client Added";
        $_SESSION['success_message'] = "Nice one Chief 👍";
    }
}

//Client Account Update
if (isset($_POST['clientupdate_btn'])) {

    $id = $conn->real_escape_string($_POST['id']);
    $firstName = $conn->real_escape_string($_POST['firstName']);
    $lastName = $conn->real_escape_string($_POST['lastName']);
    $email = $conn->real_escape_string($_POST['email']);
    $companyName = $conn->real_escape_string($_POST['companyName']);
    $phone = $conn->real_escape_string($_POST['phone']);
    $status = $conn->real_escape_string($_POST['status']);


    $client_update_query = "UPDATE client SET firstName='$firstName', lastName='$lastName', email='$email', companyName='$companyName', phone='$phone', status='$status' WHERE id='$id'";
    mysqli_query($conn, $client_update_query);
    if (mysqli_affected_rows($conn) > 0 ) {
        $_SESSION['client_message_title'] = "Account Updated";
        $_SESSION['client_message'] = "Welldone Chief 👍";
    } else {
        $_SESSION['message_title']  = "Update Failed";
        $_SESSION['message']    = "Error updating record now: ".mysqli_error($conn).$id;
    }
}

//Guarantor Verification Update
if (isset($_POST['guarantor_update_btn'])) {

    $id = $conn->real_escape_string($_POST['id']);
    $status = $conn->real_escape_string($_POST['status']);
    $clientname = $conn->real_escape_string($_POST['clientname']);
    $rpvisitdate = $conn->real_escape_string($_POST['rpvisitdate']);
    $rpfirstname = $conn->real_escape_string($_POST['rpfirstname']);
    $rplastname = $conn->real_escape_string($_POST['rplastname']);
    $rpaddress = $conn->real_escape_string($_POST['rpaddress']);
    $rpaddressdesc = $conn->real_escape_string($_POST['rpaddressdesc']);
    $mwfirstname = $conn->real_escape_string($_POST['mwfirstname']);
    $mwlastname = $conn->real_escape_string($_POST['mwlastname']);
    $mwoccupation = $conn->real_escape_string($_POST['mwoccupation']);
    $twaddress = $conn->real_escape_string($_POST['twaddress']);
    $twaddressdesc = $conn->real_escape_string($_POST['twaddressdesc']);
    $twfirstname = $conn->real_escape_string($_POST['twfirstname']);
    $twlastname = $conn->real_escape_string($_POST['twlastname']);
    $mwwoccupation = $conn->real_escape_string($_POST['mwwoccupation']);
    $rpagentremark = $conn->real_escape_string($_POST['rpagentremark']);
    $rplatitude = $conn->real_escape_string($_POST['rplatitude']);
    $rplongitude = $conn->real_escape_string($_POST['rplongitude']);

    $guarantor_update_query = "UPDATE guarantor SET status='$status', clientname='$clientname', rpvisitdate='$rpvisitdate', rpfirstname='$rpfirstname', rplastname='$rplastname', rpaddress='$rpaddress', rpaddressdesc='$rpaddressdesc', mwfirstname='$mwfirstname', mwlastname='$mwlastname', mwoccupation='$mwoccupation', twaddress='$twaddress', twaddressdesc='$twaddressdesc', twfirstname='$twfirstname', twlastname='$twlastname', mwwoccupation='$mwwoccupation', rpagentremark='$rpagentremark', rplatitude='$rplatitude', rplongitude='$rplongitude' WHERE id='$id'";
    mysqli_query($conn, $guarantor_update_query);
    if (mysqli_affected_rows($conn) > 0 ) {
        $_SESSION['guarantor_message_title'] = "Guarantor Updated";
        $_SESSION['guarantor_message'] = "Welldone Chief 👍";
    } else {
        $_SESSION['message_title']  = "Update Failed";
        $_SESSION['message']    = "Error updating record now: ".mysqli_error($conn).$id;
    }
}


//Employee Verification Update
if (isset($_POST['employee_update_btn'])) {

    $id = $conn->real_escape_string($_POST['id']);
    $clientname = $conn->real_escape_string($_POST['clientname']);
    $rpvisitdate = $conn->real_escape_string($_POST['rpvisitdate']);
    $rpfirstname = $conn->real_escape_string($_POST['rpfirstname']);
    $rplastname = $conn->real_escape_string($_POST['rplastname']);
    $rpaddress = $conn->real_escape_string($_POST['rpaddress']);
    $rpaddressdesc = $conn->real_escape_string($_POST['rpaddressdesc']);
    $mwfirstname = $conn->real_escape_string($_POST['mwfirstname']);
    $mwlastname = $conn->real_escape_string($_POST['mwlastname']);
    $mwoccupation = $conn->real_escape_string($_POST['mwoccupation']);
    $rpagentremark = $conn->real_escape_string($_POST['rpagentremark']);
    $rpupload = $conn->real_escape_string($_POST['rpupload']);
    $rpupload1 = $conn->real_escape_string($_POST['rpupload1']);
    $rplatitude = $conn->real_escape_string($_POST['rplatitude']);
    $rplongitude = $conn->real_escape_string($_POST['rplongitude']);
    $status = $conn->real_escape_string($_POST['status']);

    $guarantor_update_query = "UPDATE employee SET clientname='$clientname', rpvisitdate='$rpvisitdate', rpfirstname='$rpfirstname', rplastname='$rplastname', rpaddress='$rpaddress', rpaddressdesc='$rpaddressdesc', mwfirstname='$mwfirstname', mwlastname='$mwlastname', mwoccupation='$mwoccupation', rpagentremark='$rpagentremark', rplatitude='$rplatitude', rplongitude='$rplongitude', status='$status' WHERE id='$id'";
    mysqli_query($conn, $guarantor_update_query);
    if (mysqli_affected_rows($conn) > 0 ) {
        $_SESSION['employee_message_title'] = "Employee Updated";
        $_SESSION['employee_message'] = "Welldone Chief 👍";
    } else {
        $_SESSION['message_title']  = "Update Failed";
        $_SESSION['message']    = "Error updating record now: ".mysqli_error($conn).$id;
    }
}


//Previous Work Address Verification Update
if (isset($_POST['pwa_update_btn'])) {

    $id = $conn->real_escape_string($_POST['id']);
    $clientname = $conn->real_escape_string($_POST['clientname']);
    $rpvisitdate = $conn->real_escape_string($_POST['rpvisitdate']);
    $rpfirstname = $conn->real_escape_string($_POST['rpfirstname']);
    $rplastname = $conn->real_escape_string($_POST['rplastname']);
    $rpaddress = $conn->real_escape_string($_POST['rpaddress']);
    $rpaddressdesc = $conn->real_escape_string($_POST['rpaddressdesc']);
    $mwfirstname = $conn->real_escape_string($_POST['mwfirstname']);
    $mwlastname = $conn->real_escape_string($_POST['mwlastname']);
    $mwoccupation = $conn->real_escape_string($_POST['mwoccupation']);
    $eduration = $conn->real_escape_string($_POST['eduration']);
    $conduct = $conn->real_escape_string($_POST['conduct']);
    $wresignation = $conn->real_escape_string($_POST['wresignation']);
    $rpagentremark = $conn->real_escape_string($_POST['rpagentremark']);
    $rpupload = $conn->real_escape_string($_POST['rpupload']);
    $rpupload1 = $conn->real_escape_string($_POST['rpupload1']);
    $rplatitude = $conn->real_escape_string($_POST['rplatitude']);
    $rplongitude = $conn->real_escape_string($_POST['rplongitude']);
    $status = $conn->real_escape_string($_POST['status']);

    $pwa_update_query = "UPDATE previouswork SET clientname='$clientname', rpvisitdate='$rpvisitdate', rpfirstname='$rpfirstname', rplastname='$rplastname', rpaddress='$rpaddress', rpaddressdesc='$rpaddressdesc', mwfirstname='$mwfirstname', mwlastname='$mwlastname', mwoccupation='$mwoccupation', eduration='$eduration', conduct='$conduct', wresignation='$wresignation', rpagentremark='$rpagentremark', rplatitude='$rplatitude', rplongitude='$rplongitude', status='$status' WHERE id='$id'";
    mysqli_query($conn, $pwa_update_query);
    if (mysqli_affected_rows($conn) > 0 ) {
        $_SESSION['pwa_message_title'] = "PWA Updated";
        $_SESSION['pwa_message'] = "Welldone Chief 👍";
    } else {
        $_SESSION['message_title']  = "Update Failed";
        $_SESSION['message']    = "Error updating record now: ".mysqli_error($conn).$id;
    }
}


//Tenant Verification Update
if (isset($_POST['tenant_update_btn'])) {

    $id = $conn->real_escape_string($_POST['id']);
    $clientName = $conn->real_escape_string($_POST['clientName']);
    $rpvisitdate = $conn->real_escape_string($_POST['rpvisitdate']);
    $rpfirstname = $conn->real_escape_string($_POST['rpfirstname']);
    $rplastname = $conn->real_escape_string($_POST['rplastname']);
    $rpaddress = $conn->real_escape_string($_POST['rpaddress']);
    $rpaddressdesc = $conn->real_escape_string($_POST['rpaddressdesc']);
    $mwfirstname = $conn->real_escape_string($_POST['mwfirstname']);
    $mwlastname = $conn->real_escape_string($_POST['mwlastname']);
    $mwoccupation = $conn->real_escape_string($_POST['mwoccupation']);
    $twaddress = $conn->real_escape_string($_POST['twaddress']);
    $twaddressdesc = $conn->real_escape_string($_POST['twaddressdesc']);
    $twfirstname = $conn->real_escape_string($_POST['twfirstname']);
    $twlastname = $conn->real_escape_string($_POST['twlastname']);
    $mwwoccupation = $conn->real_escape_string($_POST['mwwoccupation']);
    $rpagentremark = $conn->real_escape_string($_POST['rpagentremark']);
    $rpupload = $conn->real_escape_string($_POST['rpupload']);
    $rpupload1 = $conn->real_escape_string($_POST['rpupload1']);
    $rplatitude = $conn->real_escape_string($_POST['rplatitude']);
    $rplongitude = $conn->real_escape_string($_POST['rplongitude']);
    $status = $conn->real_escape_string($_POST['status']);

    $guarantor_update_query = "UPDATE tenant SET clientName='$clientName', rpvisitdate='$rpvisitdate', rpfirstname='$rpfirstname', rplastname='$rplastname', rpaddress='$rpaddress', rpaddressdesc='$rpaddressdesc', mwfirstname='$mwfirstname', mwlastname='$mwlastname', mwoccupation='$mwoccupation', twaddress='$twaddress', twaddressdesc='$twaddressdesc', twfirstname='$twfirstname', twlastname='$twlastname', mwwoccupation='$mwwoccupation', rpagentremark='$rpagentremark', rplatitude='$rplatitude', rplongitude='$rplongitude', status='$status' WHERE id='$id'";
    mysqli_query($conn, $guarantor_update_query);
    if (mysqli_affected_rows($conn) > 0 ) {
        $_SESSION['tenant_message_title'] = "Tenant Updated";
        $_SESSION['tenant_message'] = "Welldone Chief 👍";
    } else {
        $_SESSION['message_title']  = "Update Failed";
        $_SESSION['message']    = "Error updating record now: ".mysqli_error($conn).$id;
    }
}


//Add Business Name Search Query
if (isset($_POST['bizname_search_btn'])) {

    $reportid = 'BNS'.rand(10000000000, 9999);
    $username = $conn->real_escape_string($_POST['username']);
    $conductedby = $conn->real_escape_string($_POST['conductedby']);
    $clientname = $conn->real_escape_string($_POST['clientname']);
    $searchdate = $conn->real_escape_string($_POST['searchdate']);
    $searchvenue = $conn->real_escape_string($_POST['searchvenue']);
    $companyname = $conn->real_escape_string($_POST['companyname']);
    $formername = $conn->real_escape_string($_POST['formername']);
    $regnumber = $conn->real_escape_string($_POST['regnumber']);
    $regdate = $conn->real_escape_string($_POST['regdate']);
    $companytype = $conn->real_escape_string($_POST['companytype']);
    $regaddress = $conn->real_escape_string($_POST['regaddress']);
    $mainobjects = $conn->real_escape_string($_POST['mainobjects']);
    $directorsNproprietors = $conn->real_escape_string($_POST['directorsNproprietors']);
    $agentremark = $conn->real_escape_string($_POST['agentremark']);
    $status = $conn->real_escape_string($_POST['status']);

    $bizname_add_query = "INSERT INTO namesearch (reportid, username, conductedby, clientname, searchdate, searchvenue, companyname, formername, regnumber, regdate, companytype, regaddress, mainobjects, directorsNproprietors, agentremark)"
        . "VALUES ('$reportid', '$username', '$conductedby', '$clientname', '$searchdate', '$searchvenue', '$companyname', '$formername', '$regnumber', '$regdate', '$companytype', '$regaddress', '$mainobjects', '$directorsNproprietors', '$agentremark')";

    mysqli_query($conn, $bizname_add_query);
    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['success_message_title'] = "Nice one Chief";
        $_SESSION['success_message'] = "Business Name Report has been added 👍";
    }
    else {
        $error=$conn->error;
        $_SESSION['error_report_title'] = "Error Occurred";
        $_SESSION['error_report_message'] = $error;
    }
}



//Business Name Search Update Query
if (isset($_POST['bizname_update_btn'])) {

    $id = $conn->real_escape_string($_POST['id']);
    $conductedby = $conn->real_escape_string($_POST['conductedby']);
    $clientname = $conn->real_escape_string($_POST['clientname']);
    $searchdate = $conn->real_escape_string($_POST['searchdate']);
    $searchvenue = $conn->real_escape_string($_POST['searchvenue']);
    $companyname = $conn->real_escape_string($_POST['companyname']);
    $formername = $conn->real_escape_string($_POST['formername']);
    $regnumber = $conn->real_escape_string($_POST['regnumber']);
    $regdate = $conn->real_escape_string($_POST['regdate']);
    $companytype = $conn->real_escape_string($_POST['companytype']);
    $regaddress = $conn->real_escape_string($_POST['regaddress']);
    $mainobjects = $conn->real_escape_string($_POST['mainobjects']);
    $directorsNproprietors = $conn->real_escape_string($_POST['directorsNproprietors']);
    $agentremark = $conn->real_escape_string($_POST['agentremark']);
    $status = $conn->real_escape_string($_POST['status']);

    $businessname_update_query = "UPDATE namesearch SET conductedby='$conductedby', clientname='$clientname', searchdate='$searchdate', searchvenue='$searchvenue', companyname='$companyname', formername='$formername', regnumber='$regnumber', regdate='$regdate', companytype='$companytype', regaddress='$regaddress', mainobjects='$mainobjects', directorsNproprietors='$directorsNproprietors', agentremark='$agentremark', status='$status' WHERE id='$id'";
    mysqli_query($conn, $businessname_update_query);
    if (mysqli_affected_rows($conn) > 0 ) {
        $_SESSION['name_search_message_title'] = "Business Name Updated";
        $_SESSION['name_search_message'] = "Welldone Chief 👍";
    } else {
        $_SESSION['message_title']  = "Update Failed";
        $_SESSION['message']    = "Error updating record now: ".mysqli_error($conn).$id;
    }
}



//Add LTD Name Search Query
if (isset($_POST['ltd_search_btn'])) {

    $reportid = 'LTDS'.rand(10000000000, 9999);
    $username = $conn->real_escape_string($_POST['username']);
    $conductedby = $conn->real_escape_string($_POST['conductedby']);
    $clientname = $conn->real_escape_string($_POST['clientname']);
    $searchdate = $conn->real_escape_string($_POST['searchdate']);
    $searchvenue = $conn->real_escape_string($_POST['searchvenue']);
    $companyname = $conn->real_escape_string($_POST['companyname']);
    $formername = $conn->real_escape_string($_POST['formername']);
    $regnumber = $conn->real_escape_string($_POST['regnumber']);
    $regdate = $conn->real_escape_string($_POST['regdate']);
    $companytype = $conn->real_escape_string($_POST['companytype']);
    $regaddress = $conn->real_escape_string($_POST['regaddress']);
    $mainobjects = $conn->real_escape_string($_POST['mainobjects']);
    $borrowpower = $conn->real_escape_string($_POST['borrowpower']);
    $sharecapitalinc = $conn->real_escape_string($_POST['sharecapitalinc']);
    $sharecapital = $conn->real_escape_string($_POST['sharecapital']);
    $shareclass = $conn->real_escape_string($_POST['shareclass']);
    $paidupcapital = $conn->real_escape_string($_POST['paidupcapital']);
    $issuedbutunpaid = $conn->real_escape_string($_POST['issuedbutunpaid']);
    $sharetakenup = $conn->real_escape_string($_POST['sharetakenup']);
    $annualreturns = $conn->real_escape_string($_POST['annualreturns']);
    $registeredcharges = $conn->real_escape_string($_POST['registeredcharges']);
    $companysecretary = $conn->real_escape_string($_POST['companysecretary']);
    $shareholders = $conn->real_escape_string($_POST['shareholders']);
    $directorsNproprietors = $conn->real_escape_string($_POST['directorsNproprietors']);
    $agentremark = $conn->real_escape_string($_POST['agentremark']);
    $status = $conn->real_escape_string($_POST['status']);


    $ltd_add_query = "INSERT INTO ltdsearch (reportid, username, conductedby, clientname, searchdate, searchvenue, companyname, formername, regnumber, regdate, companytype, regaddress, mainobjects, borrowpower, sharecapitalinc, sharecapital, shareclass, paidupcapital, issuedbutunpaid, sharetakenup, annualreturns, registeredcharges, companysecretary, shareholders, directorsNproprietors, agentremark)"
        . "VALUES ('$reportid', '$username', '$conductedby', '$clientname', '$searchdate', '$searchvenue', '$companyname', '$formername', '$regnumber', '$regdate', '$companytype', '$regaddress', '$mainobjects', '$borrowpower', '$sharecapitalinc', '$sharecapital', '$shareclass', '$paidupcapital', '$issuedbutunpaid', '$sharetakenup', '$annualreturns', '$registeredcharges', '$companysecretary', '$shareholders', '$directorsNproprietors', '$agentremark')";
        
    mysqli_query($conn, $ltd_add_query);
    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['success_message_title'] = "Nice one Chief";
        $_SESSION['success_message'] = "Limited Liability Report has been added 👍";
    }
    else {
        $error=$conn->error;
        $_SESSION['error_report_title'] = "Error Occurred";
        $_SESSION['error_report_message'] = $error;
    }
}


//LTD Name Search Update
if (isset($_POST['ltd_update_btn'])) {

    $id = $conn->real_escape_string($_POST['id']);
    $conductedby = $conn->real_escape_string($_POST['conductedby']);
    $clientname = $conn->real_escape_string($_POST['clientname']);
    $searchdate = $conn->real_escape_string($_POST['searchdate']);
    $searchvenue = $conn->real_escape_string($_POST['searchvenue']);
    $companyname = $conn->real_escape_string($_POST['companyname']);
    $formername = $conn->real_escape_string($_POST['formername']);
    $regnumber = $conn->real_escape_string($_POST['regnumber']);
    $regdate = $conn->real_escape_string($_POST['regdate']);
    $companytype = $conn->real_escape_string($_POST['companytype']);
    $regaddress = $conn->real_escape_string($_POST['regaddress']);
    $mainobjects = $conn->real_escape_string($_POST['mainobjects']);
    $borrowpower = $conn->real_escape_string($_POST['borrowpower']);
    $sharecapitalinc = $conn->real_escape_string($_POST['sharecapitalinc']);
    $sharecapital = $conn->real_escape_string($_POST['sharecapital']);
    $shareclass = $conn->real_escape_string($_POST['shareclass']);
    $paidupcapital = $conn->real_escape_string($_POST['paidupcapital']);
    $issuedbutunpaid = $conn->real_escape_string($_POST['issuedbutunpaid']);
    $sharetakenup = $conn->real_escape_string($_POST['sharetakenup']);
    $annualreturns = $conn->real_escape_string($_POST['annualreturns']);
    $registeredcharges = $conn->real_escape_string($_POST['registeredcharges']);
    $companysecretary = $conn->real_escape_string($_POST['companysecretary']);
    $shareholders = $conn->real_escape_string($_POST['shareholders']);
    $directorsNproprietors = $conn->real_escape_string($_POST['directorsNproprietors']);
    $agentremark = $conn->real_escape_string($_POST['agentremark']);
    $status = $conn->real_escape_string($_POST['status']);


    $businessname_update_query = "UPDATE ltdsearch SET conductedby='$conductedby', clientname='$clientname', searchdate='$searchdate', searchvenue='$searchvenue', companyname='$companyname', formername='$formername', regnumber='$regnumber', regdate='$regdate', companytype='$companytype', regaddress='$regaddress', mainobjects='$mainobjects', borrowpower='$borrowpower', sharecapitalinc='$sharecapitalinc', sharecapital='$sharecapital', shareclass='$shareclass', paidupcapital='$paidupcapital', issuedbutunpaid='$issuedbutunpaid', sharetakenup='$sharetakenup', annualreturns='$annualreturns', registeredcharges='$registeredcharges', companysecretary='$companysecretary', shareholders='$shareholders', directorsNproprietors='$directorsNproprietors', agentremark='$agentremark', status='$status' WHERE id='$id'";
    mysqli_query($conn, $businessname_update_query);
    if (mysqli_affected_rows($conn) > 0 ) {
        $_SESSION['ltd_search_message_title'] = "Limited Liability Search Updated";
        $_SESSION['ltd_search_message'] = "Welldone Chief 👍";
    } else {
        $_SESSION['message_title']  = "Update Failed";
        $_SESSION['message']    = "Error updating record now: ".mysqli_error($conn).$id;
    }
}