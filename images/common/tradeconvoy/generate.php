<?php
    function rotateX($x, $y, $theta){
        return $x * cos($theta) - $y * sin($theta);
    }
    function rotateY($x, $y, $theta){
        return $x * sin($theta) + $y * cos($theta);
    }

	
function imagerotateEquivalent($srcImg, $angle, $bgcolor, $ignore_transparent = 0) {

    $srcw = imagesx($srcImg);
    $srch = imagesy($srcImg);

    //Normalize angle
    $angle %= 360;
    //Set rotate to clockwise
    $angle = -$angle;

    if($angle == 0) {
        if ($ignore_transparent == 0) {
            imagesavealpha($srcImg, true);
        }
        return $srcImg;
    }

    // Convert the angle to radians
    $theta = deg2rad ($angle);

    //Standart case of rotate
    if ( (abs($angle) == 90) || (abs($angle) == 270) ) {
        $width = $srch;
        $height = $srcw;
        if ( ($angle == 90) || ($angle == -270) ) {
            $minX = 0;
            $maxX = $width;
            $minY = -$height+1;
            $maxY = 1;
        } else if ( ($angle == -90) || ($angle == 270) ) {
            $minX = -$width+1;
            $maxX = 1;
            $minY = 0;
            $maxY = $height;
        }
    } else if (abs($angle) === 180) {
        $width = $srcw;
        $height = $srch;
        $minX = -$width+1;
        $maxX = 1;
        $minY = -$height+1;
        $maxY = 1;
    } else {
        // Calculate the width of the destination image.
        $temp = array (rotateX(0, 0, 0-$theta),
        rotateX($srcw, 0, 0-$theta),
        rotateX(0, $srch, 0-$theta),
        rotateX($srcw, $srch, 0-$theta)
        );
        $minX = floor(min($temp));
        $maxX = ceil(max($temp));
        $width = $maxX - $minX;

        // Calculate the height of the destination image.
        $temp = array (rotateY(0, 0, 0-$theta),
        rotateY($srcw, 0, 0-$theta),
        rotateY(0, $srch, 0-$theta),
        rotateY($srcw, $srch, 0-$theta)
        );
        $minY = floor(min($temp));
        $maxY = ceil(max($temp));
        $height = $maxY - $minY;
    }
	
	$transparentColor = imagecolorat($srcImg, 0,0);

    $destimg = imagecreatetruecolor($width, $height);
    if ($ignore_transparent == 0) {
//		$transparentColor = imagecolorallocatealpha($destimg, 255, 255,255,0 );
		imagecolortransparent($destimg, $transparentColor);
        imagefill($destimg, 0, 0, $transparentColor);
        imagesavealpha($destimg, true);
    }

    // sets all pixels in the new image
    for($x=$minX; $x<$maxX; $x++) {
        for($y=$minY; $y<$maxY; $y++) {
            // fetch corresponding pixel from the source image
            $srcX = round(rotateX($x, $y, $theta));
            $srcY = round(rotateY($x, $y, $theta));
            if($srcX >= 0 && $srcX < $srcw && $srcY >= 0 && $srcY < $srch) {
                $color = imagecolorat($srcImg, $srcX, $srcY );
            } else {
				if ($bgcolor == -1) 
					$color = $transparentColor;
				else
					$color = $bgcolor;
            }
            imagesetpixel($destimg, $x-$minX, $y-$minY, $color);
        }
    }
    return $destimg;
}

$gd = imagecreatefrompng("0.png");

for ($i=10;$i<360;$i+=10) {
	
	$gd2 = imagerotateEquivalent($gd, 360 - $i, -1);
	$w = round((imagesx($gd2) - 120) / 2);
	$h = round((imagesy($gd2) - 120) / 2);
	
	$gd3 = imagecreatetruecolor(120,120);
	$transparentColor = imagecolorat($gd2, 0,0);
	imagecolortransparent($gd3, $transparentColor);
	imagefill($gd3, 0, 0, $transparentColor);
	imagesavealpha($gd3, true);

		
	imagecopy($gd3 , $gd2, 0,0, $w, $h , 120, 120  );
	
	imagepng($gd3,"$i.png");
	imagedestroy($gd2);
	imagedestroy($gd3);
	
}

imagedestroy($gd);


?>