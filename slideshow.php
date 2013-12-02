<?php
function gallery($directory = 'images/gallery', $display_type = 'all-the-way'){
	echo "<div class='slideshow'>";
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
			$start = 0;
			$end = strpos($file, '.jpg');
			$caption = substr($file, $start, $end);
			$caption = str_replace('-',' ',$caption);
			$caption = ucfirst(str_replace('_',' ',$caption));
			switch($display_type){
				case 'all-the-way':
					echo "<div class='slide'><img src='$directory/$file' alt='$caption' /><h2 class='caption'>$caption</h2><div class='pager'></div></div>";
					break;
				case 'thumbnails':
					echo "<a href='$directory/$file'><img src='$directory/$file' alt='$caption' /></a>";
					break;
				case 'slideshow':
					echo "<div class='slide'><img src='$directory/$file' alt='$caption' /></div>";
					break;
				case 'captioned-slideshow':
					echo "<div class='slide'><img src='$directory/$file' alt='$caption' /><h2 class='caption'>$caption</h2></div>";
					break;
				case 'list':
					echo "<li><img src='$directory/$file' alt='$caption' /></li>";
					break;
			}
		}
	}else{
		echo '<p>There are no images in this gallery.</p>';
	}
	echo "</div>";
}
?>
