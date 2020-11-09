<?php 
/*
LeetCode
48. Rotate Image
You are given an n x n 2D matrix representing an image, rotate the image by 90 degrees (clockwise).

You have to rotate the image in-place, which means you have to modify the input 2D matrix directly. DO NOT allocate another 2D matrix and do the rotation.
*/

function rotateImage($arr) {
    $countArr = count($arr) - 1;
    for ($i = 0; $i <= $countArr; $i++) {
        $arrRow = array_column($arr, $i);
        $arrRow = array_reverse($arrRow);
        $arrRes[] = $arrRow;
    }
    $result = '[';
    foreach ($arrRes as $item) {
        $result .= '['. implode(',', $item). '],';
    }
    $result = substr($result, 0, -1);
    $result .= ']';
    return $result;
}

//tests:
 echo('expected [[7,4,1],[8,5,2],[9,6,3]], given ' . rotateImage([[1,2,3],[4,5,6],[7,8,9]]));
if (rotateImage([[1,2,3],[4,5,6],[7,8,9]]) == '[[7,4,1],[8,5,2],[9,6,3]]') {
    echo '   OK'. '<br>';
} else {
    echo '   FAIL'. '<br>';
}

 echo('expected [[15,13,2,5],[14,3,4,1],[12,6,8,9],[16,7,10,11]], given ' . rotateImage([[5,1,9,11],[2,4,8,10],[13,3,6,7],[15,14,12,16]]));
if (rotateImage([[5,1,9,11],[2,4,8,10],[13,3,6,7],[15,14,12,16]]) === '[[15,13,2,5],[14,3,4,1],[12,6,8,9],[16,7,10,11]]') {
    echo '   OK'. '<br>';
} else {
    echo '   FAIL'. '<br>';
}

 echo('expected [[3,1],[4,2]], given ' . rotateImage([[1,2],[3,4]]));
if (rotateImage([[1,2],[3,4]]) == '[[3,1],[4,2]]') {
    echo '   OK'. '<br>';
} else {
    echo '   FAIL'. '<br>';
}

echo('expected [[1]], given ' . rotateImage([[1]]));
if (rotateImage([[1]]) == '[[1]]') {
    echo '   OK'. '<br>';
} else {
    echo '   FAIL'. '<br>';
}

?>