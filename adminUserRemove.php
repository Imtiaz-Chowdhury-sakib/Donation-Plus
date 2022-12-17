<?php

if(isset($_GET['id'])){
    $id=$_GET['id'];

    include("dbConnection/dbconn.php");

    $qry="delete from user where id='$id'";
    $result=mysqli_query($conn,$qry);

    if($result){
        echo"DELETED";
        header('Location:adminUserRemoveForm.php');
    }else{
        echo"ERROR!!";
    }
}
?>
