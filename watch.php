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
$sleep 	= 500;

// constants
$running = true;
$version = array();
$versionCurrent = array();

$tasks = json_decode(file_get_contents('tasks.json'));
foreach($tasks as $key => $t):
	$version[$key] = '';
	$versionCurrent[$key] = '';
	if(isset($t->onLaunch) && $t->onLaunch != ''):
		$toInc = 'tasks/'.$t->onLaunch.'.php';
		if(file_exists($toInc)):
				include($toInc);
			else:
				echo ('task executable for: '.$key.' not found..'."\n");
			endif;
		endif;
endforeach;
while($running):
	foreach($tasks as $key => $t):
		// shell_exec the the version file(this will reset file times and make it able to load)
		if(isset($t->watch) && $t->watch != ''):
			$versionCurrent[$key] = shell_exec('php includes/version.php '.$t->watch);
			if($version[$key] === $versionCurrent[$key] ):
				if(isset($t->onNoUpdate) && $t->onNoUpdate != ''):
					$toInc = 'tasks/'.$t->onNoUpdate.'.php';
					if(file_exists($toInc)):
						include($toInc);
					else:
						echo ('task executable for: '.$key.' not found..'."\n");
					endif;
				endif;
			else:
				$version[$key] = $versionCurrent[$key];
				if(isset($t->onUpdate) && $t->onUpdate != ''):
					$toInc = 'tasks/'.$t->onUpdate.'.php';
					if(file_exists($toInc)):
						include($toInc);
					else:
						echo ('task executable for: '.$key.' not found..'."\n");
					endif;
				endif;
			endif;
		endif;
	endforeach;
	sleep($sleep/1000);
endwhile;

