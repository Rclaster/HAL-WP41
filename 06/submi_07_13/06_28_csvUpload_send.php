<?php
/**
 * Created by PhpStorm.
 * User: hiroki
 * Date: 2018/06/28
 * Time: 15:11
 */
    $error_file = '';

    //　入力チェック
    if (!empty($_POST['btn_submit'])){
        //　未 check
        if(!isset($_FILES['up_file']['name']) || $_FILES['up_file']['name'] === ''){
            $error_file = 'ファイルが未入力です';
        }
        //　.csv　＆　MINE check
        else if(!(explode('.',$_FILES['up_file']['name'])[1] == 'csv') && !($_FILES['up_file']['type'] == 'text/csv')){
            $error_file = 'ファイル形式はcsvで';
        }
        if($error_file == ''){
            require_once('06_28_csvUpload_receive.php');
            exit();
        }
    }
    require_once('./tpl/06_28_csvUpload_send.php');