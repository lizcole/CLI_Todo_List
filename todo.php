<?php

$items = array();

//$key is equal to [0] [1] [2] [3] etc. thus you need to increment it by one(++) to get it to start at '[1]' and then you need to decrement it by one(--) for deleting the list item, so the cl reads the correct array item to remove.
do {
    foreach ($items as $key => $item) {
        $key++;
        echo "[{$key}] {$item}\n";
    }

    echo '(N)ew item, (R)emove item, (Q)uit : ';

    $input = strtoupper(trim(fgets(STDIN)));

    if ($input == 'N' ) {
        echo 'Enter item: ';
        $items[] = trim(fgets(STDIN));
        
    } elseif ($input == 'R') {
        echo 'Enter item number to remove: ';
        $key = trim(fgets(STDIN));
        $key--;
        unset($items[$key]);
    }
} while ($input != 'Q');

echo "Goodbye!\n";

exit(0);