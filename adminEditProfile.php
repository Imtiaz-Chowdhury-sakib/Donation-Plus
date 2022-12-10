<?php

include('dbConnection/dbconn.php');
$a_email =$_POST['a_email'];

// update query------------
$qry="UPDATE admin SET a_email='$a_email'";
$result = mysqli_query($conn,$qry); //query executes

if(!$result){
    echo"ERROR". mysqli_error($conn);
}else {
   header('location: adminEditProfileForm.php');
}
?>
