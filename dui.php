<?php
/**
 * Created by PhpStorm.
 * User: Yil
 * Date: 2018/7/15
 * Time: 15:19
 */

$arr_size       =       100;
$arr            =       array();
for($i=0;$i<$arr_size;$i++){
    $arr[]        =       rand(0,10000);
}
array_unshift($arr,0);
function swim($arr,$k){
    while($k > 1 && $arr[ceil($k/2)] <$arr[$k] ){
        $temp                           =   $arr[$k];
        $arr[$k]                        =   $arr[ceil($k/2)];
        $arr[ceil($k/2)]         =   $temp;
    }
    return $arr;
}

function sink($arr,$k){
    while($k*2 <= count($arr) ){
        $j      =       $k*2;
        if( $j < count($arr) && $arr[$j] < $arr[$j+1]) $j++;
        if( !($arr[$k] < $arr[$j]) ) break;
        //交换数字
        $temp           =   $arr[$k];
        $arr[$k]        =   $arr[$j];
        $arr[$j]        =   $temp;

        $k      =       $j;
    }
    return $arr;
}

//先全部下沉
//然后一个一个交换上去再下沉