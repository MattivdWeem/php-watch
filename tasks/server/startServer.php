<?php
shell_exec('php -S localhost:'.$t->port.' -t '.$t->start.' tasks/server/router.php > /dev/null 2>/dev/null &');
if(isset($t->open)&&$t->open):
	shell_exec('open http://localhost:'.$t->port);
endif;
echo'Server running on http://localhost:'.$t->port.' Close server by pressing CTRL+C'."\n";
?>