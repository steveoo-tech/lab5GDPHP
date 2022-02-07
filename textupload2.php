<?php

function watermarkImage ($SourceFile, $WaterMarkText, $DestinationFile) {
    list($width, $height) = getimagesize($SourceFile);
    $image_p = imagecreatetruecolor($width, $height);
    $image = imagecreatefrompng($SourceFile);
    imagecopyresampled($image_p, $image, 0, 0, 0, 0, $width, $height, $width, $height);
    $red = imagecolorallocatealpha($image_p, 255, 0, 0, 93);
    $font = '/Applications/MAMP/htdocs/lab5GraphicsWithPhp/arial/arial.ttf';
    $fontWin = __DIR__ . '/arial/arial.ttf';
    $font_size = 90;
    $x = 100;
    $y = 300;
    while ( $x < $width && $y < $height) { 
        imagettftext($image_p, $font_size, 40, $x, $y, $red, $fontWin, $WaterMarkText);
        $x += 450;
        if($width - $x < 150){
            $x= 0;
            $y += 450;
        }
    }
  

    if ($DestinationFile) {
        imagepng ($image_p, $DestinationFile, 0);

        return $DestinationFile;
    } else {
        header('Content-Type: image/png');
        imagepng($image_p, null, 100);
    };
    imagedestroy($image);
    imagedestroy($image_p);
}



?>