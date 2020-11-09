<?php 
/*LeetCode
55. Jump Game.
Given an array of non-negative integers, you are initially positioned at the first index of the array.

Each element in the array represents your maximum jump length at that position.

Determine if you are able to reach the last index.
*/

function jumpGame($nums) {
    $countNums = count($nums) - 1;
    $res = 0;
    while ($res < $countNums) {
        if ($nums[$res] === 0) {
            return 'false';
        }
        $res += $nums[$res];
        if ($res === $countNums) {
            return 'true';
        }
    }
    return 'false';
}
//tests:
 echo('expected [2,3,1,1,0] = true, given ' . jumpGame([2,3,1,1,0]));
if (jumpGame([2,3,1,1,0]) === 'true') {
    echo '   OK'. '<br>';
} else {
    echo '   FAIL'. '<br>';
}
 echo('expected [3,2,1,0,4] = false, given ' . jumpGame([3,2,1,0,4]));
if (jumpGame([3,2,1,0,4]) === 'false') {
    echo '   OK'. '<br>';
} else {
    echo '   FAIL'. '<br>';
}
 echo('expected [0,2,3,0,1] = false, given ' . jumpGame([0,2,3,0,1]));
if (jumpGame([0,2,3,0,1]) === 'false') {
    echo '   OK'. '<br>';
} else {
    echo '   FAIL'. '<br>';
}
 echo('expected [1,1,1,1,1] = true, given ' . jumpGame([1,1,1,1,1]));
if (jumpGame([1,1,1,1,1]) === 'true') {
    echo '   OK'. '<br>';
} else {
    echo '   FAIL'. '<br>';
}
echo('expected [8,2,1,4,1] = false, given ' . jumpGame([8,2,1,4,1]));
if (jumpGame([8,2,1,4,1]) === 'false') {
    echo '   OK'. '<br>';
} else {
    echo '   FAIL'. '<br>';
}

?>