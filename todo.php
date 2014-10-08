<?php

$items = array();



function listItems($list){
    $string = '';
    foreach ($list as $key => $item) {
        $key++;
        $string .= "[{$key}] {$item}" . PHP_EOL; 
    }

    return $string;
}

function getInput($upper = false) {
     
     return trim(fgets(STDIN));
}

do {
    echo listItems($items); 
 
    echo '(N)ew item, (R)emove item, (Q)uit : ';

    $input = strtoupper(trim(fgets(STDIN)));
 
    if ($input == 'N' ) {
        echo 'Enter item: ';
        $items[] = getInput($input);
        
    } elseif ($input == 'R') {
        echo 'Enter item number to remove: ';
        $key = getInput($input);
        $key--;
        unset($items[$key]);
    }
} while ($input != 'Q');

echo "Goodbye!\n";

exit(0);