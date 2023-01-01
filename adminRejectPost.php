<?php
include('dbConnection/dbconn.php');
$p_id = $_GET['p_id'];
$delete_post_dialect = "DELETE FROM post WHERE p_id = '$p_id'";

if (mysqli_query($conn, $delete_post_dialect)) {
    header('Location: adminPendingPost.php');
} else {
    echo 'query error' . mysqli_error($conn);
}

