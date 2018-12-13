<?php

session_start();

$chaine = '123456789ABCDEFGHIKLMNOPQRSTUVWXYZ';

$image = imagecreatefrompng('images/captcha_1.png');

$color = imagecolorallocate($image, 44, 62, 80);

$font = 'fonts/Montserrat-Bold.ttf';

$fontSize = 20; 

$taille = mt_rand(4,9);
$_SESSION['length_captcha'] = $taille;

$x = 0;

$y = 50;

$espacement = 30;

$angle = -30;

$angleSuivant = 20;

function getCode($length, $chars)
{
	$code = null;
	for ($i=0; $i < $length ; $i++) 
	{ 
		$code .= $chars { mt_rand(0 , strlen($chars) - 1)};
	}
	return $code;
};

$code = getCode($taille, $chaine);

for ($j=0; $j <= (strlen($code)-1) ; $j++) 
{ 
	if ($angleSuivant == 20) 
	{
		$angleSuivant = -20;
	}
	else
	{
		$angleSuivant = 20;
	}
	$char = substr($code, $j,1);
	$x = $x + $espacement;
	$angle = $angle + $angleSuivant;
	imagettftext($image, $fontSize , $angle, $x, $y, $color, $font, $char);
}

header('Content-Type: image/png');
imagepng($image);
imagedestroy($image);

$_SESSION['code'] = $code;


?>