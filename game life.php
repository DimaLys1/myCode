<?php 
// Life v3. /10 steps/
//add function printResult for nice output
//TODO nice user input

$space = [
['O','X','O','O','O'],
['O','X','O','O','O'],
['O','X','O','O','O'],
['O','O','O','O','O'],
['O','O','O','O','O']
];

function printResult($cells, $col, $row) {
    static $step = 1;
    $i = 1;
    $j = 0;
    $printRes = 'Шаг '.$step.'<table border="1"><tr>';
    foreach ($cells as $item) {
        $color = 'white';
        if ($item['fill'] == 'X') {
            $color = 'black';
        }
        $printRes .= '<td bgcolor="'.$color.'" width="40px" height="45px">';
        $resultSpace[$j][] = $item['fill'];
        if ($i == $col + 1) {
            $printRes .= '</tr>';
            if ($j != $row) {
                $printRes .= '<tr>';
            }
            $i = 0;
            $j++;
        }
        $i++;
    }
    $printRes .= '</table><br>';
    $step++;
    return [$printRes, $resultSpace];
}

function getNeighbors($space, $keyRows, $keyColumns) {   
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
    $row = count($space) - 1;
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

    list ($printRes, $resultSpace) =  printResult($cells, $col, $row);
    if ($space == $resultSpace) {
        break;
    } else {
        unset($cells);
        $space = $resultSpace;
        unset($resultSpace);
        $step++;
    }
    echo $printRes;
}
 ?>