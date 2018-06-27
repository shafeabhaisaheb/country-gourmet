<?php
$image_name = $_POST["image_name"];
$redirect_page = $_POST["redirect_page"];
$target_dir = "./img/";
#$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$target_file = $target_dir . $image_name;
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadOk = 0;
}
$msg = "";
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
//    echo "Sorry, your file was not uploaded.";
    $msg = "Sorry, there was an error uploading image.";
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
//        echo "Image successfully uploaded.";
        $msg = "Image successfully uploaded.";
    } else {
        $msg = "Sorry, there was an error uploading image.";
//        echo "Sorry, there was an error uploading image.";
    }
}
#header('Location: main.php?msg='.$msg);

header("Refresh:0; url=" . $redirect_page);

?>