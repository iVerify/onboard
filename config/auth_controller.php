<?php
// initializing variables
$email          = "";
$firstname      = "";
$lastname       = "";
$agentid        = "";
$status         = "";

// Connect database
include('db.php');

if (isset($_POST['add_user_btn'])) {

    $email          = $conn->real_escape_string($_POST['email']);
    $firstname      = $conn->real_escape_string($_POST['firstname']);
    $lastname       = $conn->real_escape_string($_POST['lastname']);
    $agentid        = 'IVA' . rand(1000, 9999);
    $password       = $conn->real_escape_string($_POST['password']);

    $user_check_query = "SELECT * FROM agents WHERE email='$email' LIMIT 1";
    $result = mysqli_query($conn, $user_check_query);
    if (mysqli_num_rows($result) > 0) {
        $_SESSION['message_title'] = "User Already Exist!";
        $_SESSION['message'] = "Modify or Delete user details";
    }

    // Finally, register user if there are no errors in the form
    $password = sha1($password);//encrypt the password before saving in the database
    $query = "INSERT INTO agents (email, firstname, lastname, password, agentid, status) 
  			        VALUES('$email', '$firstname', '$lastname', '$password', '$agentid', 'Active')";
    mysqli_query($conn, $query);
    if (mysqli_affected_rows($conn) > 0) {
        $_SESSION['email'] = $email;
        $_SESSION['success_message_title'] = "New User Added";
        $_SESSION['success_message'] = "Credentials sent field agent.";
        header("Location: ../admin/agents");
    }else {
        echo mysqli_error($conn);
    }
}
?>

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
