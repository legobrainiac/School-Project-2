<?php 
	$files = scandir('images/');
	foreach($files as $file) {
	  echo($file . "<br/>");
	  echo "<img src='images/$file'><br/>";
	}
?>