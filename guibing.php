<?php
/**
 * Created by PhpStorm.
 * User: Yil
 * Date: 2018/7/15
 * Time: 13:11
 */




$arr_size       =       4;
$arr            =       array();
for($i=0;$i<$arr_size;$i++){
    $arr[]        =       rand(0,10000);
}

function merge(array $arr){
    $arrx           =       $arr;
    $low            =       0;
    $high           =       count($arr);
    $mid            =       ceil(count($arr)/2);

    $i              =       $low;
    $j              =       $mid;

    //从大到小排序
    for($k=$low;$k<$high;$k++){
        if($i > $mid){
            $arr[$k]        =       $arrx[$j++];
        }else if($j >= $high){
            $arr[$k]        =       $arrx[$i++];
        }else if( $arrx[$i] < $arrx[$j] ){
            //进行交换
            $arr[$k]        =       $arrx[$i++];
        }else{
            $arr[$k]        =       $arrx[$j++];
        }
    }
    return $arr;
}

function guibing(array $arr){
    //先排左边,再排右边
    if( count($arr) <=1){
        return $arr;
    }else if (count($arr) ==2){
        return merge($arr);
    }else{
        $low            =       0;
        $high           =       count($arr);
        $mid            =       ceil(count($arr)/2);

        $arr_left       =   array_slice($arr,$low,$mid);
        $arr_left1      =   guibing($arr_left);
        $arr_right      =   array_slice($arr,$mid);
        $arr_right2     =   guibing($arr_right);
        $arr            =   array_merge($arr_left1,$arr_right2);
        return merge($arr);
    }
}

var_dump($arr);
echo "<br/>";
$arr2 = guibing($arr);
var_dump($arr2);