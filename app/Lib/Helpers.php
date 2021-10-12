<?php

namespace App\Lib;
/**
 * MAKE AVATAR FUNCTION
 */

 class Helpers{

    public function getmakeAvatar($fontPath, $dest, $char){
        if(!function_exists('makeAvatar')){

            $path = $dest;
            $image = @imagecreate(200,200);
            $red = rand(0,255);
            $green = rand(0,255);
            $blue = rand(0,255);
            imagecolorallocate($image,$red,$green,$blue);
            $textcolor = @imagecolorallocate($image,255,255,255);
            imagettftext($image,100,0,50,150,$textcolor,$fontPath,$char);
            imagepng($image,$path);
            imagedestroy($image);
            return $path;
        }
    }

 }
 



?>
