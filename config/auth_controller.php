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

    // Finally, register user if there are no errors in the form
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

    $check_agent_query = "SELECT * FROM admin WHERE email='$email' AND username='$username'";
    $result = mysqli_query($conn, $check_agent_query);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['message_title'] = "Admin Already Exist!";
        $_SESSION['message'] = "Modify or Delete admin details";
    }

    // Finally, register user if there are no errors in the form
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

    $admin_update_query = "UPDATE admin SET email='$email', firstName='$firstName', lastName='$lastName'  WHERE id='$id'";
    if ($conn->query($admin_update_query) === TRUE) {
        $_SESSION['success_message_title'] = "Profile Updated";
        $_SESSION['success_message'] = "Welldone Chief for updating your profile 👍";
    } else {
        $_SESSION['message_title']  = "Update Failed";
        $_SESSION['message']    = "Error updating record: " . $conn->error;
    }
}