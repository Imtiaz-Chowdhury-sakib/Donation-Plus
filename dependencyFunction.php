<?php

function upload_file($file_name)
{
    // $image = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];

    $folder = "image/" . $file_name;
    if (!move_uploaded_file($tempname, $folder)) {
        $image_error_msg = "Failed to upload image";
    }


}

?>