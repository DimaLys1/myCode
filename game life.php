<?php 
// Life v2. /10 steps/
$step = 1;
$space = [
['O','X','O','O','O'],
['O','X','O','O','O'],
['X','X','O','O','O'],
['O','O','O','O','O'],
['O','O','O','O','O']
];

function getNeighbors($space, $keyRows, $keyColumns)
{   
    $workMap = [0, -1, 0, 1, -1, -1, -1, 0, -1, 1, 1, -1, 1, 0, 1, 1];
    $neighbors = 0;
        for ($i = 0; $i < 16; $i += 2) {
            if ($space[$keyRows + $workMap[$i]][$keyColumns + $workMap[$i + 1]] == 'X') {    
                $neighbors++;
            }
        }
    return $neighbors;
}
foreach ($space as $item) {
    foreach ($item as $elem) {
        echo $elem. ' ';
    }
    echo '<br>';
}
echo '<br>';
for($f = 1; $f <= 10; $f++){

    $col = count($space[0]) - 1;
    foreach ($space as $keyRows => $rows) {
        foreach ($rows as $keyColumns => $cell) {
            $neighbors = getNeighbors($space, $keyRows, $keyColumns);
            if ($cell == 'O' and $neighbors == 3) {
                $cells[] = ['row' => $keyRows, 'col' => $keyColumns, 'fill' => 'X'];
            } elseif ($cell == 'X' and ($neighbors < 2 or $neighbors > 3)) {
                $cells[] = ['row' => $keyRows, 'col' => $keyColumns, 'fill' => 'O'];
            } else {
                $cells[] = ['row' => $keyRows, 'col' => $keyColumns, 'fill' => $cell];
            }
        }
    }

    echo '<br>'. 'шаг '. $step. '<br>';
    $i = 1;
    $j = 0;
    foreach ($cells as $item) {
        echo $item['fill'].' ';
        $resultSpace[$j][] = $item['fill'];
        if ($i == $col + 1) {
            echo '<br>';
            $i = 0;
            $j++;
        }
        $i++;
    }
    if ($space == $resultSpace) {
        break;
    } else {
        unset($cells);
        $space = $resultSpace;
        unset($resultSpace);
        $step++;
    }
}
 ?>