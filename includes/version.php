<?php
$string = '';
array_shift($argv);
foreach($argv as $file):
	if(file_exists($file)):
		$string .= filemtime($file);
	endif;
endforeach;
return print(sha1($string));
