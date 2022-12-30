<?php include('dbConnection/dbconn.php');

session_start();

//$email = $_SESSION["email"];
$message = "";
$message_err = "";


$message_valid = false;

if (isset($_POST['submit'])) {
    $email = $_SESSION['email'];

    if (empty($_POST['message'])) {

        $message_err = "At least a message is required";
        $message_valid = true;
    } else {
        $message = $_POST['message'];
    }

    if (!$message_valid) {
        $sql = "INSERT INTO contact(c_email,c_messages) VALUES('$email','$message')";
        if (mysqli_query($conn, $sql)) {
            header('Location: userPanel.php');
        } else {
            echo 'query error' . mysqli_error($conn);
        }
    }


}
?>

<?php include('./html/loggedInContact.html');
