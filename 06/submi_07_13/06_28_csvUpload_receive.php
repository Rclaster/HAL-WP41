<?php
/**
 * Created by PhpStorm.
 * User: hiroki
 * Date: 2018/06/28
 * Time: 15:12
 */

    //　現在の時間を取得
    date_default_timezone_set('Asia/Tokyo');
    $date = date("YmdHis");
    $destination = '../csv/'.$date.'.csv';

    //　アップロードされたファイルを移動する
    if(!move_uploaded_file($_FILES['up_file']['tmp_name'], $destination)){
        echo 'アップロードエラーです';
        exit;
    }
    //　一覧表示をするためのデータを取得する
    $fp = @fopen($destination, 'r');  //　ファイルの読み込み 最新の登録データの取得
    if(!$fp) {
        echo '読み込みエラーです';
        exit;
    }
    require_once('./tpl/06_28_csvUpload_receive.php');