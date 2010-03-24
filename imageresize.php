<?php 

function imageResize($w, $h, $target) { 
	$dimensions = getimagesize($target);
	$width=$dimensions[0];
	$height=$dimensions[1];
 	
	if($width > $w OR $height > $h){
//takes the larger size of the width and height and applies the  
//formula accordingly...this is so this script will work  
//dynamically with any size image 

		if ($width > $height) { 
			$percentageW = ($w / $width); 
			
		} else { 
			$percentageH = ($h / $height); 
		} 

//gets the new value and applies the percentage, then rounds the value 
		if($percentageW == 0){
			$width = round($width * $percentageH); 
			$height = round($height * $percentageH); 
		}else if($percentageH == 0){
			$width = round($width * $percentageW); 
			$height = round($height * $percentageW); 
		}
//returns the new sizes in html image tag format...this is so you 
//can plug this function inside an image tag and just get the 
		if($width > $w OR $height > $h){
			if ($width > $height) { 
			$percentageW = ($w / $width); 
			
			} else { 
				$percentageH = ($h / $height); 
			}
			if($percentageW == 0){
			$width = round($width * $percentageH); 
				$height = round($height * $percentageH); 
			}else if($percentageH == 0){
				$width = round($width * $percentageW); 
				$height = round($height * $percentageW); 
			}
		}
		echo "width=\"$width\" height=\"$height\""; 
	}else{
		return "123";
	}
} 

?>