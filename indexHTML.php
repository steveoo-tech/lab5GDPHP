<?php
//include_once 'index.php';

//include_once 'textupload2.php';
include_once("rainbow.php");
createRainbow();
?>



<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        .container{
            padding: 20px;
        }

        .status {
            font-size:16px;
            padding: 10px;
            border: 1px dashed;
            margin-bottom: 10px;
        }

        .gallery {
            width: 100%;
            text-align: center;
        }

        h5 {
            color: blue;
            font-size: 18px;
            text-transform: uppercase;
            background: #edeaea;
            padding: 7px 5px 4px 5px;
            margin-top: 20px;
        }

        .gallery img {
            max-width: 100%;
            padding: 10px;
        }
    </style>
</head>
<body>

    <h3>Rainbow</h3>
<img src="rainbow.png" width="300" height="300" alt="some fucking rainbow">

<div class ="container">

<h3>IMAGE UPLOAD</h3>
    <form action="" method="post" enctype="multipart/form-data">
        Select Image File to Upload:
        <input type="file" name="file">
        Insert Text to Watermark:
        <input type="text" name="subject" id="subject" value="Car Loan">
        <input type="submit" name="submit" value="submit">
    </form>


</div>

<?php if(file_exists(__DIR__ . "/Thumbnails/small.png")) { ?>

<?php } ?>

<?php if(!empty($uploadedFileName)) { ?>
<h5>Watermarked Image</h5>
    <div class="gallery">
        <img src="<?php echo 'uploads/' . $uploadedFileName; ?>" alt="">
    </div>
<?php } ?>

</body>
</html>