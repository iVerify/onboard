<?php

//Add Agent Query
if (isset($_POST['add_agent_btn'])) {

    $email          = $conn->real_escape_string($_POST['email']);
    $firstname      = $conn->real_escape_string($_POST['firstname']);
    $lastname       = $conn->real_escape_string($_POST['lastname']);
    $agentid        = 'IVA' . rand(1000, 9999);
    $password       = $conn->real_escape_string($_POST['password']);

    $check_agent_query = "SELECT * FROM agents WHERE email='$email'";
    $result = mysqli_query($conn, $check_agent_query);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['message_title'] = "Agent Already Exist!";
        $_SESSION['message'] = "Modify or Delete user details";
    }

    // Finally, register agent if there are no errors in the form
    $password = sha1($password);//encrypt the password before saving in the database
    $query = "INSERT INTO agents (email, firstname, lastname, password, agentid, status) 
  			        VALUES('$email', '$firstname', '$lastname', '$password', '$agentid', 'Active')";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['email'] = $email;
        $_SESSION['success_message_title'] = "Agent Added";
        $_SESSION['success_message'] = "Provide agent with login details.";
    }
}

//Add Admin Query
if (isset($_POST['add_admin_btn'])) {

    $email          = $conn->real_escape_string($_POST['email']);
    $firstName      = $conn->real_escape_string($_POST['firstName']);
    $lastName       = $conn->real_escape_string($_POST['lastName']);
    $username       = $conn->real_escape_string($_POST['username']);
    $password       = $conn->real_escape_string($_POST['password']);
    $position       = $conn->real_escape_string($_POST['position']);

    $check_agent_query = "SELECT * FROM admin WHERE username='$username' AND email='$email'";
    $result = mysqli_query($conn, $check_agent_query);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['message_title'] = "Admin Already Exist!";
        $_SESSION['message'] = "Modify or Delete admin details";
    }

    // Finally, register admin if there are no errors in the form
    $password = sha1($password);//encrypt the password before saving in the database
    $query = "INSERT INTO admin (email, firstName, lastName, password, username, position, status) 
  			        VALUES('$email', '$firstName', '$lastName', '$password', '$username', '$position', 'Active')";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['email'] = $email;
        $_SESSION['success_message_title'] = "Admin Added";
        $_SESSION['success_message'] = "Provide admin with login details.";
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

//Guarantor Verification Update
if (isset($_POST['guarantor_update_btn'])) {
    $status         = $conn->real_escape_string($_POST['status']);
    $clientname     = $conn->real_escape_string($_POST['clientname']);
    $rpvisitdate    = $conn->real_escape_string($_POST['rpvisitdate']);
    $rpfirstname    = $conn->real_escape_string($_POST['rpfirstname']);
    $rplastname     = $conn->real_escape_string($_POST['rplastname']);
    $rpaddress      = $conn->real_escape_string($_POST['rpaddress']);
    $rpaddressdesc  = $conn->real_escape_string($_POST['rpaddressdesc']);
    $mwfirstname    = $conn->real_escape_string($_POST['mwfirstname']);
    $mwlastname     = $conn->real_escape_string($_POST['mwlastname']);
    $mwoccupation   = $conn->real_escape_string($_POST['mwoccupation']);
    $twaddress      = $conn->real_escape_string($_POST['twaddress']);
    $twaddressdesc  = $conn->real_escape_string($_POST['twaddressdesc']);
    $twfirstname    = $conn->real_escape_string($_POST['twfirstname']);
    $twlastname     = $conn->real_escape_string($_POST['twlastname']);
    $mwwoccupation  = $conn->real_escape_string($_POST['mwwoccupation']);
    $rpagentremark  = $conn->real_escape_string($_POST['rpagentremark']);
    $rplatitude     = $conn->real_escape_string($_POST['rplatitude']);
    $rplongitude    = $conn->real_escape_string($_POST['rplongitude']);

    $guarantor_update_query = "UPDATE guarantor SET status='$status', clientname='$clientname', rpvisitdate='$rpvisitdate', rpfirstname='$rpfirstname', rplastname='$rplastname', rpaddress='$rpaddress', rpaddressdesc='$rpaddressdesc', mwfirstname='$mwfirstname', mwlastname='$mwlastname', mwoccupation='$mwoccupation', twaddress='$twaddress', twaddressdesc='$twaddressdesc', twfirstname='$twfirstname', twlastname='$twlastname', mwwoccupation='$mwwoccupation', rpagentremark='$rpagentremark', rplatitude='$rplatitude', rplongitude='$rplongitude' WHERE id='$id'";
    if ($conn->query($guarantor_update_query) === TRUE) {
        $_SESSION['guarantor_message_title'] = "Guarantor Updated";
        $_SESSION['guarantor_message'] = "Welldone Chief 👍";
    } else {
        $_SESSION['message_title']  = "Update Failed";
        $_SESSION['message']    = "Error updating record: " . $conn->error;
    }
}