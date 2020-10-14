<?php 
/**
LeetCode
15. 3Sum
Given an array nums of n integers, are there elements a, b, c in nums such that a + b + c = 0? Find all unique triplets in the array which gives the sum of zero.

Notice that the solution set must not contain duplicate triplets.
*/

function splitByPoZnaku($arr) {
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

function get3Sum($arr) {
    list($positive, $negative) = splitByPoZnaku($arr);

    if(!empty($positive) and !empty($negative)){
        $count_p = count($positive) - 1;
        for($i = 0; $i < $count_p; $i ++){
            for($j = $i + 1; $j <= $count_p; $j ++){
                $res = $positive[$i] + $positive[$j];
                $res1 = $res * (-1);
                if(in_array($res1, $negative)){
                    $res2 = array_search($res1, $negative);

                    if(!empty($res2) or $res2 === 0){
                         $sorty= [$positive[$i], $positive[$j], $negative[$res2]];
                         sort($sorty);
                         $result[] = $sorty;
                    }
                }
            }
        }

        $count_n = count($negative) - 1;
        for($i = 0; $i < $count_n; $i++){
            for($j = $i + 1; $j <= $count_n; $j ++){
                $res3 = $negative[$i] + $negative[$j];
                $res4 = $res3 * (-1);
                if(in_array($res4, $positive)){
                    $res5 = array_search($res4, $positive);
                    if(!empty($res5) or $res5 === 0){
                        $sorty= [$negative[$i], $negative[$j], $positive[$res5]];
                        sort($sorty);
                        $result[] = $sorty;
                    }
                }
            }
        }
    }
    if(!empty($result)){
        foreach(array_unique($result, SORT_REGULAR) as $elem){
            $output .= '['. implode(',', $elem). ']';
        }
    }
    return $output;
}

 echo('expected [-1,0,1],[-1,2,-1], given ' . get3Sum([-1,0,1,2,-1,-4]) . '<br>');
 echo('expected [], given ' . get3Sum([-1]) . '<br>');
 echo('expected [], given ' . get3Sum([0]) . '<br>');
 
?>