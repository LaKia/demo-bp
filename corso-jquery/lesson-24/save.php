<?php

$f = fopen('data.txt', 'w');
fwrite( $f, $_POST['content']);//content=name of input
fclose($f);

echo 'Comment has been saved';