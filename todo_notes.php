<?php

// $key is equal to [0] [1] [2] [3] etc. thus you need to increment it by one(++) 
// to get it to start at '[1]' and then you need to decrement it by one(--) for deleting 
// the list item, so the cl reads the correct array item to remove.

// Create array to hold list of todo items
$items = array();

// The loop!
do {
    // Iterate through list items
    foreach ($items as $key => $item) {
        // Display each item and a newline
        echo "[{$key}] {$item}\n";
    }
    
    // Show the menu options
    echo '(N)ew item, (R)emove item, (Q)uit : ';

    // Get the input from user
    // Use trim() to remove whitespace and newlines
    $input = trim(fgets(STDIN));

    // Check for actionable input
    if ($input == 'N') {
        // Ask for entry
        echo 'Enter item: ';
        // Add entry to list array
        $items[] = trim(fgets(STDIN)); // [] - allows user input to become apart of
        // the array defined, it always adds to the end of the array (only used for arrays)
    } elseif ($input == 'R') {
        // Remove which item?
        echo 'Enter item number to remove: ';
        // Get array key
        $key = trim(fgets(STDIN));
        // Remove from array
        unset($items[$key]);// UNSET is a given variable and is used to unset a variable 
        //or an array
    }
// Exit when input is (Q)uit
} while ($input != 'Q');

// Say Goodbye!
echo "Goodbye!\n";

// Exit with 0 errors
exit(0);

//PHP_EOL; use intead of /n
