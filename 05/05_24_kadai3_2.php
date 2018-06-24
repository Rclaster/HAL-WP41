<?php
    $id = 0;

    //　セッションセット
    session_start();

    //　登録時のIDを取得
    $fp = @fopen('csv/05_24_kadai3.csv', 'r');  //　ファイルの読み込み ファイルポインタの取得
    if(!$fp){
        echo '読み込みエラーです';
        exit;
    }
    else if(!sizeof(file('csv/05_24_kadai3.csv'))){    //　初データ登録 0件のためidを+1
        $id++;
    }
    else{                                                       //　二度目以降の登録 件数があるためidの最大値を+1
        while (($csv = fgetcsv($fp)) !== FALSE) {               //　idを配列に格納
           $max_id = explode(',', $csv[0]);
        }
        $id = intval(max($max_id)) + 1;                         //　配列から最大値を抽出
    }

    //　入力された情報をCSVに登録
    $fp = @fopen('csv/05_24_kadai3.csv', 'a');  //　ファイルの書き込み idの最大値+1、名前、tel、メールを書込
    if(!$fp){
        echo '書き込みエラーです';
        exit;
    }
    else{
        fwrite($fp,
            $id.','.$_SESSION['name'].','.$_SESSION['tel'].','.$_SESSION['mail']);
        fwrite($fp, "\n");
    }

    //　セッション削除
    $_SESSION = array();
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(), '', time()-60*60*24);
    }
    session_destroy();

    //　一覧表示をするためのデータを取得する
    $fp = @fopen('csv/05_24_kadai3.csv', 'r');  //　ファイルの読み込み 最新の登録データの取得
    if(!$fp){
        echo '読み込みエラーです';
        exit;
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

<h1>CSV読み書き</h1>

<table class="type06">
    <tr>
        <th>ID</th>
        <th>氏名</th>
        <th>TEL</th>
        <th>メール</th>
    </tr>
    <?php //最新の登録データの取得 id,name,tel,mailの順
        while (($record = fgetcsv($fp)) !== FALSE) { ?>
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