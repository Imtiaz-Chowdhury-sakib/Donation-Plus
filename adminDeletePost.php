
<?php

if(isset($_GET['p_id'])){
    $p_id = $_GET['p_id'];


    include('dbConnection/dbconn.php');


    $qry="delete from post where p_id='$p_id' limit 1";
    $result=mysqli_query($conn,$qry);

    if($result){
        header('location: adminDeletePostForm.php');
    }else{
        echo"ERROR!!";
    }
}
?>