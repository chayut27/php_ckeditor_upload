<?php

if(isset($_GET["type"])){
$type = $_GET["type"];
}

if(isset($_FILES['upload']['name'])){
    $file_name = $_FILES['upload']['name'];

    $allowed = array('gif', 'png', 'jpg', 'jpeg');
    $ext = pathinfo($file_name, PATHINFO_EXTENSION);
    if (!in_array(strtolower($ext), $allowed)) {
        header("HTTP/1.1 400 Not an Image");
        return;
    }

    $url = "uploads/".$file_name;
    if(isset($_GET["CKEditorFuncNum"])){
    $function_number = $_GET["CKEditorFuncNum"];
    }
    $msg = "";
    move_uploaded_file($_FILES['upload']['tmp_name'],$url);

    if(isset($type) && $type == "ImagesDrop"){
        echo json_encode(array(
            "uploaded"=> 1,
            "fileName"=> $file_name,
            "url"=> $url
        ));
    }else{
        echo "<script>";
        echo "window.parent.CKEDITOR.tools.callFunction($function_number,'$url','$msg')";
        echo "</script>";
    }  
}


?>