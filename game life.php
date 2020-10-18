<?php 
// Life v1. /10 steps/
$step = 1;
$space = [
['O','X','O','O','O'],
['O','X','O','O','O'],
['X','X','O','O','O'],
['O','O','O','O','O'],
['O','O','O','O','O']
];
foreach ($space as $item) {
    foreach ($item as $elem) {
        echo $elem. ' ';
    }
    echo '<br>';
}
echo '<br>';
for($f = 1 ; $f <= 10; $f++){
    $col = count($space[0]) - 1;
    foreach ($space as $keyRows => $rows) {
        foreach ($rows as $keyColumns => $cell) {
            $flag = 0;
            if ($space[$keyRows][$keyColumns - 1] == 'X') {
                $flag++;
            }
            if ($space[$keyRows][$keyColumns + 1] == 'X') {
                $flag++;
            }
            if ($space[$keyRows - 1][$keyColumns - 1] == 'X') {
                $flag++;
            }
            if ($space[$keyRows - 1][$keyColumns] == 'X') {
                $flag++;
            }
            if ($space[$keyRows - 1][$keyColumns + 1] == 'X') {
                $flag++;
            }
            if ($space[$keyRows + 1][$keyColumns - 1] == 'X') {
                $flag++;
            }
            if ($space[$keyRows + 1][$keyColumns] == 'X') {
                $flag++;
            }
            if ($space[$keyRows + 1][$keyColumns + 1] == 'X') {
                $flag++;
            }

            if ($cell == 'O' and $flag == 3) {
                $cells[] = ['row' => $keyRows, 'col' => $keyColumns, 'fill' => 'X'];
            } elseif ($cell == 'X' and ($flag < 2 or $flag > 3)) {
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