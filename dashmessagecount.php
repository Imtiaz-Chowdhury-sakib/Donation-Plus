<?php
include('dbConnection/dbconn.php');

$conn = mysqli_connect('localhost', 'root', '', 'donation_plus');
if (!$conn) {
    die("Connection failed");
}
