<?php

session_start();
include('dbConnection/dbconn.php');

$email_err = $password_err = "";
$email_negative = false;
$password_negative = false;
$message="";

if (isset($_POST['submit'])) {
    // email validation
    if (empty($_POST["email"])) {
        $email_err = "Email is required";
        $email_negative = true;
    } else {
        $email = $_POST["email"];
        // check that the e-mail address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_negative = true;
            $email_err = "Invalid email format";
        }
    }

    if (empty($_POST['password'])) {
        $password_err = "* Password is required";
        $password_negative = true;
    }

    if (!$password_negative && !$email_negative) {
        $email = $_POST['email'];
        $password = $_POST['password'];

        $email = stripcslashes($email);
        $password = stripcslashes($password);
        $email = mysqli_real_escape_string($conn, $email);
        $decrypted_pass = $password;
        $password = mysqli_real_escape_string($conn, md5($decrypted_pass));

        $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_array($result);

        if (is_array($row)) {
            $_SESSION["id"] = $row['id'];
            $_SESSION["email"] = $row['email'];
            $_SESSION["name"] = $row['name'];
        } else {
           $message = "Invalid Username or Password!";
        }

        if (isset($_SESSION["name"])) {
            header("Location: userPanel.php");
        }
    }
}

?>

<?php include ('./html/signIn.html'); ?>
