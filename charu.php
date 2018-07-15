<?php
/**
 * Created by PhpStorm.
 * User: Yil
 * Date: 2018/7/15
 * Time: 14:59
 */

$arr_size       =       100;
$arr            =       array();
for($i=0;$i<$arr_size;$i++){
    $arr[]        =       rand(0,10000);
}
function charu(array $arr){
    $length         =       count($arr);
    for($i = 1;$i<$length;$i++){
        for($j = $i;$j> 0 && ($arr[$j] > $arr[$j-1]);$j--){
            $temp       =       $arr[$j];
            $arr[$j]    =       $arr[$j-1];
            $arr[$j-1]  =       $temp;
        }
    }
    return $arr;
}

function xie(array $arr){
    $length         =       count($arr);
    $k              =       1;
    while( $k < $length/3){
        $k          =       3*$k+1;
    }
    while($k >= 1){
        for($i = 1;$i<$length;$i++){
            for($j = $i;$j>= $k && ($arr[$j] > $arr[$j-$k]);$j-=$k){
                $temp       =       $arr[$j];
                $arr[$j]    =       $arr[$j-$k];
                $arr[$j-$k]  =       $temp;
            }
        }
        $k          =       $k/3;
    }
    return $arr;
}