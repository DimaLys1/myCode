 <?php 
function getMaxLen($nums)
{
    $i = 0;
    $s = 0;
    for($j = 0; $j < count($nums); $j++){
        if($nums[$j] != 0){
            $arr1[$i][] = $nums[$j];
        }else $i++;
        if(!empty($arr1[$i])){
            $prod1 = array_product($arr1[$i]);
            if($prod1 > 0){
                $result1[] = count($arr1[$i]);
            }
        }
    }

    for($k = count($nums) - 1; $k >= 0; $k--){
        if($nums[$k] != 0){
            $arr2[$s][] = $nums[$k];
        }else $s++;
        if(!empty($arr2[$s])){
            $prod2 = array_product($arr2[$s]);
            if($prod2 > 0){
                $result2[] = count($arr2[$s]);
        }
    }
}
    rsort($result1);
    rsort($result2);
    if($result1[0] > $result2[0]){
        return $result1[0];
    }else return $result2[0];
}
$arr = [5,-4,4,-7,0,0,5,7,3,0];
echo(getMaxLen($arr));

 ?>