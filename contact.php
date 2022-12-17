<?php include('dbConnection/dbconn.php');

$email = $message = "";
$email_err = "";
$message_err = " ";

$email_valid = false;
$message_valid = false;

if (isset($_POST['submit'])) {
    // email validation
    if (empty($_POST["email"])) {
        $email_err = "Email is required";
        $email_valid = true;
    } else {
        $email = $_POST["email"];
        // check that the e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "Invalid email format";
            $email_valid = true;
        }
    }

    if (empty($_POST['message'])) {
        $message_err = "At least a message is required";
        $message_valid = true;
    } else {
        $message = $_POST['message'];
    }

    if (!$email_valid && !$message_valid) {
            $sql = "INSERT INTO contact(c_email,c_messages) VALUES('$email','$message')";
        if (mysqli_query($conn, $sql)) {
            header('Location: contact.php');
        } else {
            echo 'query error' . mysqli_error($conn);
        }
    }


}
?>

<?php include('./html/contact.html'); ?>

