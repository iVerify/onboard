<?php
$conn = new mysqli('localhost', 'iverdsrg_onboard', 'Iverify2021!!', 'iverdsrg_onboard');
// Turn on error reporting
error_reporting(E_ALL ^ E_NOTICE);
// Check database connection
if (mysqli_connect_errno()) {
    echo "Failed to connect to database:" . mysqli_connect_error();
    exit();
}