<?php 
/*
LeetCode
1267. Count Servers that Communicate
You are given a map of a server center, represented as a m * n integer matrix grid, where 1 means that on that cell there is a server and 0 means that it is no server. Two servers are said to communicate if they are on the same row or on the same column.

Return the number of servers that communicate with any other server.
*/

function countServersCommunicate($arr) {
    $computers = 0;
    $noCommunicate = 0;
    foreach ($arr as $item) {
        $countInRow = count(array_keys($item, '1'));
        $computers += $countInRow;
        if ($countInRow == 1) {
            $keyRow = array_search('1', $item);
            $column = array_column($arr, $keyRow);
            $countInColumn = count(array_keys($column, '1'));
            if ($countInColumn == 1) {
                $noCommunicate++;
            }
        }
    }
    return $computers - $noCommunicate;
}

//tests:
 echo('expected 0, given ' . countServersCommunicate([[1,0],[0,1]]));
if (countServersCommunicate([[1,0],[0,1]]) == 0) {
    echo '   OK'. '<br>';
} else {
    echo '   FAIL'. '<br>';
}

 echo('expected 3, given ' . countServersCommunicate([[1,0],[1,1]]));
if (countServersCommunicate([[1,0],[1,1]]) == 3) {
    echo '   OK'. '<br>';
} else {
    echo '   FAIL'. '<br>';
}

 echo('expected 4, given ' . countServersCommunicate([[1,1,0,0],[0,0,1,0],[0,0,1,0],[0,0,0,1]]));
if (countServersCommunicate([[1,1,0,0],[0,0,1,0],[0,0,1,0],[0,0,0,1]]) == 4) {
    echo '   OK'. '<br>';
} else {
    echo '   FAIL'. '<br>';
}

 echo('expected 3, given ' . countServersCommunicate([[0,0,0,1],[0,1,0,1],[0,0,1,0],[1,0,0,0]]));
if (countServersCommunicate([[0,0,0,1],[0,1,0,1],[0,0,1,0],[1,0,0,0]]) == 3) {
    echo '   OK'. '<br>';
} else {
    echo '   FAIL'. '<br>';
}

?>