<?php
include_once('parsedown.php');
$parsedown = new Parsedown;

$path = realpath('');
foreach(glob($path.'/'.$t->watch) as $file):
	file_put_contents($path.'/'.$t->output.str_replace('.md','',basename($file)).'.html',$parsedown->text(file_get_contents($file)));
endforeach;
echo 'Markdown parsed ('.$t->output.')'."\n";
?>