<?php
/**
 * Created by PhpStorm.
 * User: hiroki
 * Date: 2018/06/28
 * Time: 15:12
 */
    date_default_timezone_set('Asia/Tokyo');
    $date = date("YmdHis");
    $destination = '../csv/'.$date.'.csv';

    if(move_uploaded_file($_FILES['up_file']['tmp_name'], $destination)){
        //　一覧表示をするためのデータを取得する
        $fp = @fopen($destination, 'r');  //　ファイルの読み込み 最新の登録データの取得
        if(!$fp){
            echo '読み込みエラーです';
            exit;
        }
    }
    else{
        echo 'アップロードに失敗しました。';
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="../css/05_24_kadai3.css" rel="stylesheet">
    <title>CSV読み書き 6/7</title>
</head>
<body>

<h1>CSVアップロード</h1>

<table class="type06">
    <tr>
        <th>ID</th>
        <th>氏名</th>
        <th>TEL</th>
        <th>メール</th>
    </tr>
    <?php //最新の登録データの取得 id,name,tel,mailの順
     while($record = fgetcsv($fp) !== FALSE){ ?>
        <tr>
            <td><?php echo $record[0] ?></td>
            <td><?php echo $record[1] ?></td>
            <td><?php echo $record[2] ?></td>
            <td><?php echo $record[3] ?></td>
        </tr>
    <?php } ?>
</table>
<?php fclose($fp); ?>

<button type="button" name="btn_back">戻る</button>

</body>
