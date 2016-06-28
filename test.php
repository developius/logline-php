<?php
require("class.logline.php");
$logline = new LogLine("DF165TEZIC");

if ($logline->info("I'm a sucker for LogLine")){
	echo "Log of type info succeeded\n";
}
if ($logline->success("Yeah! It worked")){
	echo "Log of type success succeeded\n";
}
if ($logline->warning("Be careful with that")){
	echo "Log of type warning succeeded\n";
}
if ($logline->fatal("Oh man, this is bad")){
	echo "Log of type fatal succeeded\n";
}
?>