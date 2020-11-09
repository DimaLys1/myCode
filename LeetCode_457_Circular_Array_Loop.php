<?php 
/*
LeetCode
457. Circular Array Loop
You are given a circular array nums of positive and negative integers. If a number k at an index is positive, then move forward k steps. Conversely, if it's negative (-k), move backward k steps. Since the array is circular, you may assume that the last element's next element is the first element, and the first element's previous element is the last element.

Determine if there is a loop (or a cycle) in nums. A cycle must start and end at the same index and the cycle's length > 1. Furthermore, movements in a cycle must all follow a single direction. In other words, a cycle must not consist of both forward and backward movements.
*/
///////////////////////////  V1.
function circularArrayLoop1($arr) {
    $countArr = count($arr);
    $step = 0;
    if ($arr[0] === 0 || $countArr === 1 || abs($arr[0]) === $countArr) {
        return 'false';
    } elseif ($arr[0] > 0) {
        $index = 0;
        while (true) {
            $index += $arr[$index];
            $step++;
            if ($arr[$index] < 0 || $arr[$index] === 0) {
                return 'false';
            }
            if ($step > 1 && $index === $countArr) {
            return 'true';
            } elseif ($index > $countArr) {
                return 'false';
            }
        }
    } else {
        $index = $arr[0] + $countArr;
        $step++;
        while (true) {
            if ($arr[$index] > 0 || $arr[$index] === 0) {
                return 'false';
            } 
            $index += $arr[$index];
            $step++;
            if ($step > 1 && $index === 0) {
                return 'true';
            } elseif($index < 0) {
                return 'false';
            }
        }
    }
}
////////////////////////////  V2.
function arrayLoopJumpFromZero($arr, $jump) {
    $count = count($arr);
    $step = abs($jump);
    while ($step >= $count) {
        $step -= $count;
    }
    return ($jump >= 0 || $jump < 0 && $step == 0)? $arr[$step]: $arr[$count - $step];
}

function circularArrayLoop2($arr) {
    if ($arr[0] == 0) {
        return 'false';
    }
    $count = count($arr);
    $k = 1;
    $elem = $arr[0];
    while (abs($elem) < $count) {
        $jump = arrayLoopJumpFromZero($arr, $elem);
        if ($jump == 0) {
            return 'false';
        }
        if ($jump > 0 && $elem < 0 || $jump < 0 && $elem > 0) {
            return 'false';
        }
        $elem += $jump;
        $k++;
    }
    return (abs($elem) == $count && $k > 1)? 'true': 'false';
}
//tests:
 echo('expected [2,-1,1,2,2] = true, given ' . circularArrayLoop2([2,-1,1,2,2]));
if (circularArrayLoop2([2,-1,1,2,2]) == 'true') {
    echo '   OK'. '<br>';
} else {
    echo '   FAIL'. '<br>';
}

 echo('expected [-1,2] = false, given ' . circularArrayLoop2([-1,2]));
if (circularArrayLoop2([-1,2]) === 'false') {
    echo '   OK'. '<br>';
} else {
    echo '   FAIL'. '<br>';
}

 echo('expected [-2,1,-1,-2,-2] = false, given ' . circularArrayLoop2([-2,1,-1,-2,-2]));
if (circularArrayLoop2([-2,1,-1,-2,-2]) == 'false') {
    echo '   OK'. '<br>';
} else {
    echo '   FAIL'. '<br>';
}

 echo('expected [-3,1,2] = false, given ' . circularArrayLoop2([-3,1,2]));
if (circularArrayLoop2([-3,1,2]) === 'false') {
    echo '   OK'. '<br>';
} else {
    echo '   FAIL'. '<br>';
}

?>