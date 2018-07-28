<?php
/**
 * Created by PhpStorm.
 * User: hiroki
 * Date: 2018/07/05
 * Time: 17:44
 */


require_once '../../config.php';

/**
 * 引数$arrayの投稿日時を表示形式にし、id.jpgがあればそれを一番後ろに追加
 * なければ空白を格納　加工した配列を返す
 * @param $array 加工した配列
 * @return mixed　加工した配列
 */
function adequate_array($array){

    $array[5] = date("Y/m/d H:i:s",strtotime($array[5]));

    if(file_exists(UPLOAD_PATH.$array[0].'.jpg')){
        $array[6] = UPLOAD_PATH.$array[0].'.jpg';
    }
    else{
        $array[6] = '';
    }
    return $array;
}

/**
 * 引数$textに含まれている改行文字を<br>に変換して返す
 * @param $text textareaの文字列
 * @return mixed 改行を<br>に変換した文字列
 */
function nl2brr($text)
{
    return str_replace(array("\r\n", "\n", "\r"), "<br>", $text);
}