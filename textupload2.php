<?php

function watermarkImage ($SourceFile, $WaterMarkText, $DestinationFile) {
    list($width, $height) = getimagesize($SourceFile);
    $image_p = imagecreatetruecolor($width, $height);
    $image = imagecreatefromjpeg($SourceFile);
    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width, $height);
    $red = imagecolorallocate($image_p, 255, 0, 0);
    $font = '/Applications/MAMP/htdocs/lab5GraphicsWithPhp/arial/arial.ttf';
    $font_size = 30;
    imagettftext($image_p, $font_size, 40, 100, 300, $red, $font, $WaterMarkText);
    if ($DestinationFile = "") {
        imagejpeg ($image_p, $DestinationFile, 100);
    } else {
        header('Content-Type: image/jpeg');
        imagejpeg($image_p, null, 100);
    };
    imagedestroy($image);
    imagedestroy($image_p);
}

$SourceFile = '/Applications/MAMP/htdocs/lab5GraphicsWithPhp/ 02_Stores_and_Staff_ERD.jpeg';
$DestinationFile = 'watermarked.jpg';
$WaterMarkText = 'WATERMARKED';
watermarkImage ($SourceFile, $WaterMarkText, $DestinationFile);

?>