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

// this allows user input to be lower case and will change it appropriatly to uppercase
// If you want it to be uppercase you need to inter in (true) to getInput() so it will
// overide the set (false)
function getInput($upper = false) {   
    if ($upper) {
        return strtoupper(trim(fgets(STDIN)));
     }
    else {
       return trim(fgets(STDIN));
    }
}

// this function brings up a submenu for (S)ort allowing you to pick which way to 
// sort the array.
// we referenced sortMenu($items) within in case 'S'
function sortMenu($items) {
    echo '(A)-Z, (Z)-A, (O)rder enter, (R)everse order entered : ';
    $input = getInput(true);
        switch($input) {
            case 'A':
                natcasesort($items);
                break;
            case 'Z':
                natcasesort($items);
                $items = array_reverse($items);
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

function openFile($items) {
    // open file
    $filename = getInput();
    $openFile = fopen($filename, 'r');
    $readFile = (fread($openFile, filesize($filename));
    trim($readFile);
    $fileArray = explode("\n", $readFile);
    fclose($openFile);
    // add file to exisiting list
    $combinedList = array_merge($items, $fileArray);
    return $combinedList;
}

function saveFile($items) {
    $fileName = getInput();
        if (file_exists($fileName)) {
        fwrite(STDOUT, "File already exists. Save and replace existing file? [Y}es or [No]");
        $confirm = getInput();
            if ($confirm == 'n') {
                frwrite(STDOUT, 'Save Cancelled.' . PHP_EOL);
      } else{
        $openFile = fopen($fileName, 'w+');
        foreach ($items as $listItem) {
        fwrite($openFile, $listItem . PHP_EOL);
    }
    }
    fclose($openFile);
}
}

// This is a do/while with a switchcase to allow users to enter new items.
do {
    echo listItems($items); 
 
    echo '(N)ew item, (O)pen file, (R)emove item, (S)ort, (Q)uit, s(A)ve : ';

// Assigning $input = getInput(true) allows any choice that is input
// to follow the getInput function rules

    $input = getInput(true);

    switch($input) {
        case 'N':
            echo 'Enter item: ';
            $newItem = getInput();
            echo '(B)eginning or (E)nd?: ';
            //assigning $choice to getInput(true) allows you to reference it
            // in your if/else statement
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
        // F and L are hidden functions not echo'd out as an option
        case 'F':
            array_shift($items);
            break;
        case 'L':
            array_pop($items);
            break;
        case 'O':
            echo 'Please enter file path: ';
            $items = openFile($items);
            break;
        case 'A':
            echo 'Please enter file path: ';
            saveFile($items);
            echo 'Your list is up-to-date: ';
            break;

    }

} while ($input != 'Q');

echo "Goodbye!\n";

exit(0);