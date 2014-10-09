<?php
// array of todo items
$items = array();


// this lists the array items in list order
function listItems($list){
    $string = '';
    foreach ($list as $key => $item) {
        $key++;
        $string .= "[{$key}] {$item}" . PHP_EOL; 
    }
    return $string;
}

// this 
function getInput($upper = false) {   
    if ($upper) {
        return strtoupper(trim(fgets(STDIN)));
     }
    else {
       return trim(fgets(STDIN));
    }
}


function sortMenu($items) {
    echo '(A)-Z, (Z)-A, (O)rder enter, (R)everse order entered : ';
    $input = getInput(true);
        switch($input) {
            case 'A':
                asort($items);
                break;
            case 'Z':
                arsort($items);
                break;
            case 'O':
                ksort($items);
                break;
            case 'R':
                krsort($items);
                break;
            default:
                echo "Please select a valid option. \n";
                break;
    } 
    return $items;
}

do {
    echo listItems($items); 
 
    echo '(N)ew item, (R)emove item, (S)ort, (Q)uit : ';
    
    $input = getInput(true);

    switch($input) {
        case 'N':
            echo 'Enter item: ';
            $newItem = getInput();
            echo '(B)eginning or (E)nd?: ';
            $choice = getInput(true);
                if($choice == 'B') {
                    array_unshift($items, $newItem);
                }
                else {
                    array_push($items, $newItem);
                }
            break;
        case 'R':
            echo 'Enter item number to remove: ';
            $key = getInput();
            $key--;
            unset($items[$key]);
            break;
        case 'S':
            $items = sortMenu($items);
            break;
        case 'F':
            array_shift($items);
            break;
        case 'L':
            array_pop($items);
            break;
    }

} while ($input != 'Q');

echo "Goodbye!\n";

exit(0);