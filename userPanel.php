<?php
session_start();
include('dbConnection/dbconn.php');

$id = $_SESSION['id'];
$title = $asking_amount = $details = "";
$title_error_msg = $asking_amount_error_msg = $details_error_msg = $image_error_msg = $category_error_message = "";


if (isset($_POST['upload'])) {
    //title validation
    if (empty($_POST["title"])) {
        $title_error_msg = "Title is required ";
    } else {
        $title = $_POST['title'];
        // check if name only contains latters and whitespace
        if (!preg_match("/^[a-zA-Z ]*$/", $title)) {
            $title_error_msg = "Only alphabet and whitespace are allowed";
        }
    }

    // asking amount validation
    if (empty($_POST["asking_amount"])) {
        $asking_amount_error_msg = "Amount is required for post ";
    } else {
        $asking_amount = $_POST['asking_amount'];
        // check if name only contais digits
        if (!preg_match('/^[1-9][0-9]{0,15}$/',$asking_amount)) {
            $asking_amount_error_msg = "Only digits are allowed";
        }
    }

    // details validation
    if (empty($_POST["details"])) {
        $details_error_msg = "Details is required ";
    } else {
        $details = $_POST['details'];
         //check if name only contains latters and whitespace
        if (!$details) {
            $details_error_msg = "Only alphabet and whitespace are allowed";
        }
    }

    // Category validation
    if (empty($_POST["category"]) || $_POST["category"] == "...") {
        $category_error_message = "Category is required ";
    }else{
        $category = $_POST['category'];
    }

    require_once "dependencyFunction.php";
    $ext = pathinfo($_FILES["uploadfile"]["name"], PATHINFO_EXTENSION);

    $date = $_POST['date'];
    if ($title_error_msg == "" && $asking_amount_error_msg == "" && $details_error_msg == ""
        && $image_error_msg == "" && $category_error_message == "") {
        //query for insert post
        $sql = "INSERT INTO post(title,asking_amount,details,image,user_id,date,category ) VALUES('$title','$asking_amount','$details','$ext','$id','$date','$category')";
        if (mysqli_query($conn, $sql)) {
            $sql = "SELECT LAST_INSERT_ID()";
            $data = mysqli_query($conn, $sql);

            if ($row = $data->fetch_assoc()) {
                upload_file($row["LAST_INSERT_ID()"] . "." . $ext);
            }

            header('Location: userPanel.php');
        } else {
            echo 'query error' . mysqli_error($conn);
        }


    }

}



?>

















<?php include('html/userPanel.html') ?>;
