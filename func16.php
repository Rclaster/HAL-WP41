<?php
/**
 * Created by PhpStorm.
 * User: hiroki
 * Date: 2018/06/21
 * Time: 15:00
 */

    /**
     *  引数を四則演算し配列に格納する関数
     *
     * @param $num1
     * @param $num2 (0なら割り算時エラーを格納)
     * @return array 格納配列
     */
    function func16_1($num1, $num2){

        $sum = $num1 + $num2;
        $minus = $num1 - $num2;
        $kake = $num1 * $num2;
        if($num2 == 0){
            $wari = 'エラー';
        }
        else{
            $wari = $num1 / $num2;
        }

        $ary = array();
        array_push($ary, $sum, $minus, $kake, $wari);
        return $ary;
    }

    /**
     * 　引数の配列から最大値を取得する
     *
     * @param $ary 数値を格納している配列
     * @return mixed　数値を格納している配列の最大値を返す
     */
    function func16_2($ary){

        if(in_array(false, array_map('is_numeric', $ary))){
            return false;
        }else{
            $max = $ary[0];
            for ($i = 1; $i < count($ary); $i++){
                if($max < $ary[$i]){
                    $max = $ary[$i];
                }
            }
            return $max;
        }
    }

    /**
     * 　引数の中身を昇順んいソートする関数
     * @param $ary 数値を格納している配列
     * @return array 引数の配列を昇順でソートした配列を返す
     */
    function func16_3($ary){

        if(in_array(false, array_map('is_numeric', $ary))){
            return false;
        }else {
            for ($i = 0; $i < count($ary); $i++) {
                for ($j = 0; $j < (count($ary) - 1 - $i); $j++) {
                    if ($ary[$j + 1] < $ary[$j]) {
                        $tmp = $ary[$j + 1];
                        $ary[$j + 1] = $ary[$j];
                        $ary[$j] = $tmp;
                    }
                }
            }
            return $ary;
        }
    }

    /**
     * 　引数のKeyより配列をソートする関数
     * @param $twoAry 二次元配列
     * @param $num Key
     * @return mixed
     */
    function func16_4($twoAry, $num){

        for ($i = 0; $i < count($twoAry); $i++) {
            for ($j = 0; $j < (count($twoAry) - 1 - $i); $j++) {
                if ($twoAry[$j + 1][$num] < $twoAry[$j][$num]) {
                    $tmp = $twoAry[$j + 1];
                    $twoAry[$j + 1] = $twoAry[$j];
                    $twoAry[$j] = $tmp;
                }
            }
        }
        return $twoAry;
    }
?>