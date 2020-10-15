<?php 
/**
LeetCode
15_3Sum
Given an array nums of n integers, are there elements a, b, c in nums such that a + b + c = 0? Find all unique triplets in the array which gives the sum of zero.

Notice that the solution set must not contain duplicate triplets.
*/

function splitBySign($arr) {
    $negative = [];
    $positive = [];
    foreach ($arr as $item) {
        if ($item >= 0) {
            $positive[] = $item;
        } else {
            $negative[] = $item;
        }
    }
    return [$positive, $negative];
}
/**
* Добавлена функия getResult для сокращения кода
*/
function getResult ($arr) {
    $k = 1;
    foreach ($arr as $item) {
        $count = count($item) - 1;
        for ($i = 0; $i < $count; $i++) {
            for ($j = $i + 1; $j <= $count; $j++) {
                $res = $item[$i] + $item[$j];
                $res1 = $res * (-1);
                if (in_array($res1, $arr[$k])) {
                    $res2 = array_search($res1, $arr[$k]);

                    if (!empty($res2) or $res2 === 0) {
                         $sorty= [$item[$i], $item[$j], $arr[$k][$res2]];
                         sort($sorty);
                         $result[] = $sorty;
                    }
                }
            }
        }
        $k--;
    }
return $result;
}

function get3Sum($arr) {
    list ($positive, $negative) = splitBySign($arr);
    if (!empty($positive) and !empty($negative)) {
        $result = getResult(list($positive, $negative) = splitBySign($arr));
    }
    if (!empty($result)){
        foreach (array_unique($result, SORT_REGULAR) as $elem){
            $output .= '['. implode(',', $elem). ']';
        }
    }
    return $output;
}

 echo('expected [-1,0,1],[-2,2,0],[3,1,-4],[2,2,-4],[-1,-1,2],[-1,-2,3], given ' . get3Sum([-1,0,1,2,-1,-4,-2,-1,3,2]) . '<br>');
 echo('expected [-1,0,1],[-1,2,-1], given ' . get3Sum([-1,0,1,2,-1,-4]) . '<br>');
 echo('expected [], given ' . get3Sum([-1]) . '<br>');
 echo('expected [], given ' . get3Sum([0]) . '<br>');
?>



