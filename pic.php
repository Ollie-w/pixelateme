<?php
$thefile = $_FILES["thefile"]['tmp_name'];
$image = imagecreatefromjpeg("$thefile");

function pixelate(&$image) {
    $imagex = imagesx($image); 
    $imagey = imagesy($image);
    $blocksize = 12;
    for ( $x = 0; $x < $imagex; $x += $blocksize)  {
        for ($y = 0; $y < $imagey; $y += $blocksize) {
            $rgb = imagecolorat($image, $x, $y);
            imagefilledrectangle($image, $x, $y, $x + $blocksize - 1, $y + $blocksize - 1, $rgb);
        }
    }
}
pixelate($image);
header('Content-Type: image/jpeg');
header('Content-Disposition: attachment; filename="file.jpg"');  
imagejpeg($image);
imagedestroy($image);
