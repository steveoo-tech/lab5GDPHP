<?php
function thumbnailer($filepath){
  $file = $filepath;
  $targetFilePath = __DIR__ .'\Thumbnails\\';
  list($old_width, $old_height) = getimagesize($file);

  $old_image = imagecreatefrompng($file);

  $new_width = 150;
  $new_height = ($new_width * $old_height)/$old_width;

  for ($i=0; $i < 4; $i++) { 
      switch ($i) {
          case 0:
              $size ="small";
              break;
              case 1:
                $size ="medium";
                break;
                case 2:
                    $size ="large";
                    break;
                    case 3:
                        $size ="XLarge";
                        break;
          
          default:
              echo "oops";
              break;
      }
$new_width += 150;
$new_height = ($new_width * $old_height)/$old_width;


  $new_image = imagecreatetruecolor($new_width, $new_height);
  imagecopyresampled($new_image, $old_image, 0, 0, 0, 0, $new_width, $new_height, $old_width, $old_height);
  imagepng($new_image, $targetFilePath . "$size.png", 0);
 
  imagedestroy($new_image);
  }
  echo '<h3>Thumbnails</h3>
  <img SRC="./Thumbnails/small.png">
  <img SRC="./Thumbnails/medium.png">
  <img SRC="./Thumbnails/large.png">
  <img SRC="./Thumbnails/XLarge.png">';
  imagedestroy($old_image);
}
