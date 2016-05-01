<?php
/**
 * Auto-generated code below aims at helping you parse
 * the standard input according to the problem statement.
 **/
$six = false;

// game loop
while (true) {
    for ($i = 0; $i < 8; $i++) {
        fscanf(STDIN, '%d %d',
            $colorA, // color of the first block
            $colorB // color of the attached block
        );
//Collect all next Blocks to array
        $nextBlocks[$i] = $colorA;
        $nextBlocks[$i + 1] = $colorB;
    }
    for ($i = 0; $i < 12; $i++) {
        fscanf(STDIN, '%s',
            $row
        );
//Collect all my grid to array
        for ($j = 0; $j < 6; $j++) {
            $allRows[$i] = $row[$j];
        }
    }
    for ($i = 0; $i < 12; $i++) {
        fscanf(STDIN, '%s',
            $row // One line of the map ('.' = empty, '0' = skull block, '1' to '5' = colored block)
        );
    }

    // Write an action using echo(). DON'T FORGET THE TRAILING \n
    // To debug (equivalent to var_dump): error_log(var_export($var, true));

//Choosing main color
$color = $nextBlocks[0];

    for ($i = 0; $i < 12; $i++) {
        for ($j = 0; $j < 6; $j++) {
        }
    }

//Choosing targeting line
switch ($color) {
  case '1':
    $targetLine = 0;
    break;
  case '2':
    $targetLine = 1;
    break;
  case '3':
    $targetLine = 2;
    break;
  case '4':
    $targetLine = 3;
    break;
  case '5':
    if ($six) {
        $targetLine = 5;
        $six = false;
    } else {
        $targetLine = 4;
        $six = true;
    }

    break;
}

//Output result
    echo "$targetLine\n"; // "x": the column in which to drop your blocks
}
