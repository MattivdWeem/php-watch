<?php
/*
 *  Will watch files for you and run tasks when the file changes
 *  Once a file is updated the script will include your given file.
 *
 *  To make the output cleaner you might want to use some thing like phpTerm
 *  And replace the echo's with errors / success messages (die's should be replaced)
 *  with finish and trow
 *
 *  @author Matti van de Weem<mvdweem@gmail.com>
 *
 */


//Time between loops in ms
$sleep 	= 2000;

// constants
$running = true;
$version = array();
$versionCurrent= array();

$tasks = json_decode(file_get_contents('tasks.json'));
foreach($tasks as $key => $t):
	$version[$key] = '';
	$versionCurrent[$key] = '';
endforeach;
while($running):
	foreach($tasks as $key => $t):
		$versionCurrent[$key] = shell_exec('php includes/version.php '.$t->watch);
		if($version[$key] === $versionCurrent[$key] ):
			// no update
		else:
			$version[$key] = $versionCurrent[$key];
			$toInc = 'tasks/'.$t->onUpdate.'.php';
			if(file_exists($toInc)):
				include($toInc);
			else:
				echo ('task executable for: '.$key.' not found..'."\n");
			endif;
		endif;
	endforeach;
	sleep($sleep/1000);
endwhile;

