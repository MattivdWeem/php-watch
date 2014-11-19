<?php
shell_exec('php -S '.$t->host.':'.$t->port.' -t '.$t->start.' tasks/server/router.php > /dev/null 2>/dev/null &');
if(isset($t->open)&&$t->open):
	shell_exec('open http://'.$t->host.':'.$t->port);
endif;
echo'Server running on http://'.$t->host.':'.$t->port.' Close server by pressing CTRL+C'."\n";
?>