<?php

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
/*session_start();
header('Content-type: image/jpeg');
$code=$_SESSION["security_coder"];
$font_size=18;
$image_width=100;
$image_height=40;

if(empty($_POST['status'])){
    $image=  imagecreate($image_height, $image_width);
    imagecolorallocate($image, 200, 200, 200);
    $text_color=  imagecolorallocate($image, 0, 0, 0);
    imagettftext($image, $font_size, 0, 11, 28, $text_color, 'calibri.ttf', $code);
    imagejpeg($image);
}
 else {
    $user=$_POST['user'];
    if($user==$code){
        echo 'Succsessfully code !';
    }
}

*/
session_start();
if( !isset( $_SESSION['SecImageStr']))
exit();
$Str = $_SESSION['SecImageStr'];
$SecImage = imagecreate( 50, 20);
$BgColor = imagecolorallocate( $SecImage, 255, 150, 220);
$FrColor = imagecolorallocate( $SecImage, 0, 0, 255);
$LineColor = imagecolorallocate( $SecImage, 255, 0, 150);
for($Index = 0; $Index != 3; $Index++)
{
$LineDegree = rand(15, 50);
imageline ( $SecImage, $Index, $LineDegree, ($Index+1) * 20, $Index,
$LineColor );
}
imagestring ( $SecImage, 4, 5, 1, $Str, $FrColor ) ;
imagejpeg ( $SecImage , '', 100 ) ;
header("Content-type: image/jpg");
imagedestroy ( $SecImage ) ;


?>
