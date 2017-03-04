<?php 
session_start();
header("Content-Type: image/png");
include('../config.php');
$font = "../fonts/SaucerBB.ttf";
//image
$image = imagecreatetruecolor(120, 25);
//colors
$red = imagecolorallocate($image, 255, 0, 0);
$white = imagecolorallocate($image, 255, 255, 255);
$black = imagecolorallocate($image, 0, 0, 0);
$blue = imagecolorallocate($image, 0, 255, 0);
$green = imagecolorallocate($image, 0, 0, 255);

$array = array('1','2','3','4','5','6','7','8','9','0','a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','s','r','v','t','u','w','y','z','x');
for($i = 0; $i < 6; $i++)
	$code .= $array[rand(1, count($array) - 1)];
$_SESSION['secret_code'] = shifr(strtolower($code));
imagefill($image, 0, 0, $red);
imageline($image, rand(0, 10), rand(0, 20), rand(100, 120), rand(20, 25), $black);
//imagestring($image, 5, 20, 5, $code, $white);
imageline($image, rand(0, 10), rand(10, 20), rand(100, 120), rand(0, 20), $green);
imageline($image, rand(0, 10), rand(20, 25), rand(100, 120), rand(0, 10), $blue);
imageline($image, rand(20, 50), rand(0, 10), rand(80, 100), rand(0, 10), $green);
imageline($image, rand(20, 50), rand(20, 25), rand(80, 100), rand(20, 25), $blue);

imagettftext($image, 15, 0, 10, 20, $white, $font, $code);
imagepng($image);
imagedestroy($image);
?>
