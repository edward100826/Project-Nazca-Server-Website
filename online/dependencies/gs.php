<?php
@$skin = imagecreatefrompng('http://s3.amazonaws.com/MinecraftSkins/'.$_GET['player'].'.png');
if(empty($skin))
{
	$skin = imagecreatefrompng('Steve.png');
}
header("Content-Type: image/png");
header("Cache-Control: max-age=2592000");
imagealphablending( $skin, false );
imagesavealpha( $skin, true );
imagepng($skin);
imagedestroy($skin);
?>