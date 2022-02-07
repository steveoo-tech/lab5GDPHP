<?php

header('Content-type: image/png');
$png_image = imagecreate(500, 500);
$grey = imagecolorallocate($png_image, 229, 229, 229);
$green = imagecolorallocate($png_image, 128, 204, 204);
$purple = imagecolorallocate($png_image, 163, 73, 164);
$darkblue = imagecolorallocate($png_image, 90, 50, 255);
$lightblue = imagecolorallocate($png_image, 2, 162, 232);
$green = imagecolorallocate($png_image, 34, 161, 31);
$yellow = imagecolorallocate($png_image, 255, 242, 1);
$orange = imagecolorallocate($png_image, 255, 137, 29);
$red = imagecolorallocate($png_image, 237, 29, 36);

imagefilltoborder($png_image, 0, 0, $grey, $grey);




imagefilledarc($png_image, 250, 420, 430, 335, 180, 360, $red, IMG_ARC_PIE); //red

imagefilledarc($png_image, 250, 420, 380, 290, 180, 360, $orange, IMG_ARC_PIE); //orange

imagefilledarc($png_image, 250, 420, 330, 255, 180, 360, $yellow, IMG_ARC_PIE); //yellow

imagefilledarc($png_image, 250, 420, 275, 210, 180, 360, $green, IMG_ARC_PIE); //green


imagefilledarc($png_image, 250, 420, 250, 180, 180, 360, $lightblue, IMG_ARC_PIE); //light blue


imagefilledarc($png_image, 250, 420, 240, 150, 180, 360, $darkblue, IMG_ARC_PIE); //dark blue


imagefilledarc($png_image, 250, 420, 200, 125, 180, 360, $purple, IMG_ARC_PIE); //purple




imagepng($png_image);
imagedestroy($png_image);