<?php
if(isset($_FILES["file"]["type"]))
{
    $filename = $_POST["filename"] . ".png";
    $maxfilesize = $_POST["maxfilesize"];
    $validextensions = array("jpeg", "jpg", "png", "gif");
    $temporary = explode(".", $_FILES["file"]["name"]);
    $file_extension = end($temporary);
    if ($file_extension != ""){
        if ((($_FILES["file"]["type"] == "image/png") || ($_FILES["file"]["type"] == "image/jpg") || ($_FILES["file"]["type"] == "image/jpeg") || ($_FILES["file"]["type"] == "image/gif")
            ) && ($_FILES["file"]["size"] < ($maxfilesize * 1000000))//Approx. 1Mb files can be uploaded.
            && in_array($file_extension, $validextensions)) {
            if ($_FILES["file"]["error"] > 0)
            {
                echo "<span style='color: #d9534f;'>Return Code: " . $_FILES["file"]["error"] . "</span>";
            }
            else
            {
                $sourcePath = $_FILES['file']['tmp_name']; // Storing source path of the file in a variable
                $targetPath = $_SERVER["DOCUMENT_ROOT"]."/assets/img/".$filename; // Target path where file is to be stored
                move_uploaded_file($sourcePath,$targetPath) ; // Moving Uploaded file
                echo "success";
            }
        }
        else
        {
            echo "<span style='color: #d9534f;'>Picture must be < ".$maxfilesize."Mb.</span>";
        }
    }
    else{
        echo "<span style='color: #d9534f;'>Please select a picture first.</span>";
    }
}
else{
    echo "<span style='color: #d9534f;'>Please select a picture first.</span>";
}
