<?php
function createThumbs( $pathToImages, $pathToThumbs, $thumbWidth, $image_name ){
	
	$thumbWidth=intval($thumbWidth);
	
	// parse path for the extension
	$info = pathinfo($pathToImages . $image_name);
	
	// continue only if this is a JPEG image
	if(strtolower($info['extension']) == 'jpg' || strtolower($info['extension']) == 'jpeg' || strtolower($info['extension']) == 'JPG' ||  strtolower($info['extension']) == 'JPEG' ){
				
		// load image and get image size
		$img = imagecreatefromjpeg( "{$pathToImages}{$image_name}" );
	  	$width = imagesx( $img );
	  	$height = imagesy( $img );
					
	  	// calculate thumbnail size
		$new_width = $thumbWidth;
	  	$new_height = floor( $height * ( $thumbWidth / $width ) );
					
	  	// create a new temporary image
	  	$tmp_img = imagecreatetruecolor( $new_width, $new_height );
	  	
		//making a transparent background for image
		imagealphablending($tmp_img, false);
		$colorTransparent = imagecolorallocatealpha($tmp_img, 0, 0, 0, 127);
		imagefill($tmp_img, 0, 0, $colorTransparent);
		imagesavealpha($tmp_img, true);
					
	  	// copy and resize old image into new image
	  	imagecopyresampled( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
					
	  	// save thumbnail into a file
	  	imagejpeg( $tmp_img, "{$pathToThumbs}{$image_name}", 100 );
	}
	
	// continue only if this is a GIF image
	else if( strtolower($info['extension']) == 'gif' || strtolower($info['extension']) == 'GIF' ){
				
		 // load image and get image size
	  	$img = imagecreatefromgif( "{$pathToImages}{$image_name}" );
	  	$width = imagesx( $img );
	  	$height = imagesy( $img );
					
	  	// calculate thumbnail size
	  	$new_width = $thumbWidth;
	 	$new_height = floor( $height * ( $thumbWidth / $width ) );
					
	  	// create a new temporary image
	  	$tmp_img = imagecreatetruecolor( $new_width, $new_height );
	  	
		//making a transparent background for image
		imagealphablending($tmp_img, false);
		$colorTransparent = imagecolorallocatealpha($tmp_img, 0, 0, 0, 127);
		imagefill($tmp_img, 0, 0, $colorTransparent);
		imagesavealpha($tmp_img, true);
					
	  	// copy and resize old image into new image
	  	imagecopyresampled( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
					
	  	// save thumbnail into a file
	  	imagegif( $tmp_img, "{$pathToThumbs}{$image_name}", 100 );
	}
	
	// continue only if this is a PNG image
	else if( strtolower($info['extension']) == 'png' || strtolower($info['extension']) == 'PNG' ){
				
		// load image and get image size
	  	$img = imagecreatefrompng( "{$pathToImages}{$image_name}" );
	  	$width = imagesx( $img );
	  	$height = imagesy( $img );
					
	  	// calculate thumbnail size
	  	$new_width = $thumbWidth;
	  	$new_height = floor( $height * ( $thumbWidth / $width ) );
					
	  	// create a new temporary image
	  	$tmp_img = imagecreatetruecolor( $new_width, $new_height );
	  	
		//making a transparent background for image
		imagealphablending($tmp_img, false);
		$colorTransparent = imagecolorallocatealpha($tmp_img, 0, 0, 0, 127);
		imagefill($tmp_img, 0, 0, $colorTransparent);
		imagesavealpha($tmp_img, true);
					
	  	// copy and resize old image into new image
	  	imagecopyresampled( $tmp_img, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height );
					
	  	// save thumbnail into a file
	  	imagepng( $tmp_img, "{$pathToThumbs}{$image_name}", 9 );
	}

}
				
?>