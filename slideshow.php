<?php
function gallery($directory,$display_type){
	/* step one:  read directory, make array of images */
	if ($handle = opendir($directory)) {
		while (false !== ($file = readdir($handle))){
			if ($file != '.' && $file != '..'){
				$files[] = $file;
			}
		}
		closedir($handle);
	}
	/* step two: loop through, format gallery */
	if(count($files)){
		sort($files);
		foreach($files as $file){
			switch($display_type){
				case 'thumbnails':
					echo "<a href='$directory/$file'><img src='$directory/$file' class='product' /></a>";
					break;
				case 'slideshow':
					echo "<div class='slide'><img src='$directory/$file' class='product' /></a></div>";
					break;
				case 'list':
					echo "<li><img src='$directory/$file' class='product' /></a></li>";
					break;
			}
		}
	}else{
		echo '<p>There are no images in this gallery.</p>';
	}
}
?>