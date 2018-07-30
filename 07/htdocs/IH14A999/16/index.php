<?php
/**
 * Created by PhpStorm.
 * User: hiroki
 * Date: 2018/07/05
 * Time: 17:44
 */
    require_once './func.php';
    require_once '../../config.php';

    session_start();

    // 表示データの初期化
    $file_name = '';
    //セレクトボックスのselected用
    $select = '';
    //加工した配列用
    $adequate_csv = array();

    //　一覧表示をするためのデータを取得する
    $fp = @fopen(PATH.FILE, 'r');  //　ファイルの読み込み 最新の登録データの取得
    if(!$fp){
        echo '読み込みエラーです';
        exit;
    }

    /**
     * 　フォームから投稿された時の処理
     */
    if(isset($_POST['post_submit'])){

        $name = $_POST['name'];
        $message = $_POST['message'];
        $message = nl2brr(str_replace("\n", "", $message));
        $file = $_FILES['up_file'];
        $file_name = $file['tmp_name'];
        $select_genre = $_POST['genre'];

        if(!sizeof(file(PATH.FILE))){    //　初データ登録 0件のためidを+1
            $id = 1;
        }
        else{                                                       //　二度目以降の登録 件数があるためidの最大値を+1
            while (($csv = fgetcsv($fp)) !== FALSE) {               //　idを配列に格納
                $max_id = explode(',', $csv[0]);
            }
            $id = intval(max($max_id)) + 1;
        }
        //　入力された情報をCSVに登録
        $fp = @fopen(PATH.FILE, 'a');  //　ファイルの書き込み idの最大値+1、名前、tel、メールを書込
        if(!$fp){
            echo '書き込みエラーです';
            exit;
        }
        else {
            $reid = '';
            date_default_timezone_set('Asia/Tokyo');
            $date = date("YmdHis");
            $strdate = date('Ymdhms', strtotime($date));

            fwrite($fp,
                $id . ',' . $name . ',' . $message . ',' . $select_genre . ',' . $reid . ',' . $strdate);
            fwrite($fp, "\n");
        }
        $destination = UPLOAD_PATH.$id.'.jpg';
        move_uploaded_file($file['tmp_name'], $destination);

        //　一覧表示をするためのデータを取得する
        $fp = @fopen(PATH.FILE, 'r');  //　ファイルの読み込み 最新の登録データの取得
        if(!$fp){
            echo '読み込みエラーです';
            exit;
        }
        //　CSVのデータを加工して配列に格納
        while(($csv_record = fgetcsv($fp)) !== FALSE) {
            array_push($adequate_csv, adequate_array($csv_record));
        }
    }

    /**
     *　　ジャンル検索ボタンが押された時の処理
     */
    else if(isset($_POST['search_submit'])){
        $select = $_POST['selected_genre'];

        //　CSVのデータを加工して配列に格納
        while(($csv_record = fgetcsv($fp)) !== FALSE) {
            if($csv_record[3] == $select) {
                array_push($adequate_csv, adequate_array($csv_record));
            }
            else if($select == ''){
                array_push($adequate_csv, adequate_array($csv_record));
            }
        }
    }

    /**
     *　　削除ボタンが押された時の処理
     */
    else if(isset($_POST['delete_submit'])){
        $dir='images/';
        $delete_id = $_POST['delete_id'];

        //　一時格納用
        $bk_csv = array();
        //　全データを取得しそこから削除データを省いたデータを格納
        while(($csv_record = fgetcsv($fp)) !== FALSE) {
            if($csv_record[0] != $delete_id) {
                array_push($bk_csv, $csv_record);
            }
        }
        //　CSV上書き
        $fp = @fopen(PATH.FILE, 'w');
        foreach ($bk_csv as $val) {
            fputcsv($fp,$val);
        }
        //　サーバーの画像削除
        if(file_exists($dir.$delete_id.'.jpg')){
            unlink($dir.$delete_id.'.jpg');
        }
        //　一覧表示をするためのデータを取得する
        $fp = @fopen(PATH.FILE, 'r');  //　ファイルの読み込み 最新の登録データの取得
        if(!$fp){
            echo '読み込みエラーです';
            exit;
        }
        //　CSVのデータを加工して配列に格納
        while(($csv_record = fgetcsv($fp)) !== FALSE) {
            array_push($adequate_csv, adequate_array($csv_record));
        }
    }

    /**
     * 　ロード時の処理(更新)
     */
    else{
        //　CSVのデータを加工して配列に格納
        while(($csv_record = fgetcsv($fp)) !== FALSE) {
            array_push($adequate_csv, adequate_array($csv_record));
        }
    }

    //　配列を降順にする
    $adequate_csv = array_reverse($adequate_csv);
    require_once './tpl/index.php';