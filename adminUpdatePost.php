<?php

include('dbConnection/dbconn.php');
    $p_id =$_POST['p_id'];
    $user_id =$_POST['user_id'];

   $category = $_POST['category'];
   $title =$_POST['title'];
   $details =  $_POST['details'];
   $asking_amount = $_POST['asking_amount'];
   $date = $_POST['date'];



   // update query------------
    $qry="UPDATE post SET title ='$title',details = '$details', asking_amount = '$asking_amount', date = '$date',category = '$category' WHERE p_id ='$p_id' AND user_id='$user_id'";
        $result = mysqli_query($conn,$qry); //query executes

        if(!$result){
            echo"ERROR". mysqli_error($conn);
        }else {
                header('location: adminEditPostList.php');
        }
?>