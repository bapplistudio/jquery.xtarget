<?php

echo "# full.html main page :\n\n" . htmlentities(file_get_contents("full.html")) . "\n\n";

echo "# the called _full.php page :\n\n" . htmlentities(file_get_contents("_full.php")) . "\n\n";
