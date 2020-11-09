<?php 
/*
LeetCode
189. Rotate Array
Given an array, rotate the array to the right by k steps, where k is non-negative.

Follow up:

Try to come up as many solutions as you can, there are at least 3 different ways to solve this problem.
Could you do it in-place with O(1) extra space?
*/

function rotateArray($arr, $move) {
    for ($i = 1; $i <= $move; $i++) {
        $elem = array_pop($arr);
        array_unshift($arr, $elem);
    }
    $result = '['. implode(',', $arr). ']';
    return $result;
}

//tests:
 echo('expected [5,6,7,1,2,3,4], given ' . rotateArray([1,2,3,4,5,6,7], 3));
if (rotateArray([1,2,3,4,5,6,7], 3) === '[5,6,7,1,2,3,4]') {
    echo '   OK'. '<br>';
} else {
    echo '   FAIL'. '<br>';
}

 echo('expected [3,99,-1,-100], given ' . rotateArray([-1,-100,3,99], 2));
if (rotateArray([-1,-100,3,99], 2) === '[3,99,-1,-100]') {
    echo '   OK'. '<br>';
} else {
    echo '   FAIL'. '<br>';
}

?>