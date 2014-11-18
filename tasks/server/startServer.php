<?php
shell_exec('php -S localhost:'.$t->port.' -t '.$t->start.' > /dev/null 2>/dev/null &');
shell_exec('open http://localhost:'.$t->port);
echo'Server running on http://l/ocalhost:'.$t->port.' Close server by pressing CTRL+C'."\n";
?>