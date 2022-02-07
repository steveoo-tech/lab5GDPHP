<?php

header('Content-type: image/png');

$im = ImageCreateTrueColor(800, 600);
$red = ImageColorAllocate($im, 255, 0, 0);
$black = ImageColorAllocate($im, 0, 0);

ImageFill($im, 0, 0, $black);
ImageString($im, 5, 100, 40, "Welcome to MY HOUSE DAWGG", $red);
ImagePng($im);
ImageDestroy($im);

$image = imagecreatefromjpeg('/Applications/MAMP/htdocs/lab5GraphicsWithPhp/ 02_Stores_and_Staff_ERD.jpeg');

$textcolor = imagecolorallocate($image, 255, 255, 255);



$custom_text = "Watermark Text";

imagettftext($image, 225, 0, 100, 100, $textcolor, $custom_text);

imagejpeg($image);

imagedestroy($image); // for clearing memory
?>