<?php
function gallery($directory){
	/* step one:  read directory, make array of images */
	if ($handle = opendir($directory)) {  
		while (false !== ($file = readdir($handle)))  
		{  
			if ($file != '.' && $file != '..')  
			{  
				$files[] = $file;  
			}  
		}  
		closedir($handle);  
	}  
	/* step two: loop through, format gallery */  
	if(count($files))  
	{
		sort($files);
		$count=0;
		foreach($files as $file)  
		{  
			echo "<a href='$directory/$file'><img src='$directory/$file' class='product' /></a>";
		}  
	}  
	else  
	{  
		echo '<p>There are no images in this gallery.</p>';  
	}
}
?>