<?php
include('dbConnection/dbconn.php');

$p_id = $_POST['post_id'];
$u_id = $_POST['user_id'];
$previous_amount = $_POST['previous_amount'];

$c_amount = $_POST['collect_amount'];
if ($c_amount != "") {
    $c_amount = $c_amount + $previous_amount;
} else {
    header('location: donateForm.php?p_id=' . $p_id);
    return null;
}
$collect_amount = $_POST['collect_amount'];


// insert query
$sql = "INSERT into transaction(donate_id,u_id,d_amount) values (" . $p_id . "," . $u_id . "," . $collect_amount . ");";
$result = mysqli_query($conn, $sql);
if (!$result) {
    echo 'query error' . mysqli_error($conn);
} else {
    // update query
    $qry = "UPDATE post SET collecting_amount = $c_amount where p_id = $p_id";
    $result = mysqli_query($conn, $qry);
    header('location: donateForm.php?p_id=' . $p_id);
}


?>

