<?php
include('dbConnection/dbconn.php');
$p_id = $_GET['p_id'];
$update_post_dialect = "UPDATE post SET status = true WHERE p_id = '$p_id'";

if (mysqli_query($conn, $update_post_dialect)) {
    header('Location: adminPendingPost.php');
} else {
    echo 'query error' . mysqli_error($conn);
}
