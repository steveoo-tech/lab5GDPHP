<?php

require_once("textupload2.php");
include_once 'thumbnailer.php';
include_once 'indexHTML.php';


// Path configuration
$targetDir = __DIR__;

$statusMsg = '';
if (isset($_POST["submit"])) {
    if (!empty($_FILES["file"]["name"])) {
        // File upload path
        $fileName =  basename($_FILES["file"]["name"]);
        $targetFilePath = $targetDir .'/uploads/'. $fileName;
        $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION);

        // Allow certain file formats
        $allowTypes = array('jpg', 'png', 'jpeg');
        if (in_array($fileType, $allowTypes)) {
            // Upload file to the server
            if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
                // Load the stamp and the photo to apply the watermark to
                switch ($fileType) {
                    case 'jpg':
                        $im = imagecreatefromjpeg($targetFilePath);
                        break;
                    case 'jpeg':
                        $im = imagecreatefromjpeg($targetFilePath);
                        break;
                    case 'png':
                        $im = imagecreatefrompng($targetFilePath);
                        break;
                    default:
                        $im = imagecreatefromjpeg($targetFilePath);
                }


                // Save image and free memory
                imagepng($im, $targetFilePath);
                imagedestroy($im);

                thumbnailer($targetFilePath);
                $DestinationFile = $targetDir . "/watermarked/" . $fileName;
                echo "<h2>Watermarked</h2><img src='./watermarked/$fileName' height='800'>";
                $WaterMarkText = $_POST["subject"];
                watermarkImage ($targetFilePath, $WaterMarkText, $DestinationFile);

                if (file_exists($targetFilePath)) {
                    $statusMsg = "The image with watermark has been uploaded successfully.";
                } else {
                    $statusMsg = "Image upload failed, please try again.";
                }
            } else {
                $statusMsg = "Sorry, there was an error uploading your file.";
            }
        } else {
            $statusMsg = 'Sorry, only JPG, JPEG, and PNG files are allowed to upload.';
        }
    } else {
        $statusMsg = 'Please select a file to upload.';
    }
}

// Display status message
echo $statusMsg;