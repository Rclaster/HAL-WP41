<?php
//postなら処理を実行する
    if($_SERVER['REQUEST_METHOD']==='POST'){

        header('Location:http://localhost/keijiban.php');

    }
    //ファイルの読み込み
    $fp = @fopen('csv/05_24.csv', 'r');
    if(!$fp){
        echo '読み込みエラーです';
        exit;
    }

    //ファイルの書き込み
    $fp = @fopen('csv/05_24.csv', 'a');
    if(!$fp){
        echo '書き込みエラーです';
        exit;
    }
    else{
        fwrite($fp,
            $_GET['name'].','.$_GET['address'].','.$_GET['blood']);
        fwrite($fp, "\n");
        echo '書き込み完了'.'<br>';
    }

    //ファイルの読み込み
    $fp = @fopen('csv/05_24.csv', 'r');
    if(!$fp){
        echo '読み込みエラー2です';
        exit;
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
</head>
<title>ファイルの入出力</title>
<body>
<br>

<table border="1">
    <tr>
        <th>氏名</th>
        <th>住所</th>
        <th>血液</th>
    </tr>
    <?php while ($record = fgetcsv($fp)) { ?>
    <tr>
        <td><?php echo $record[0] ?>
        <td><?php echo $record[1] ?>
        <td><?php echo $record[2] ?>
        </td>
    </tr>
    <?php } ?>
</table>
<?php fclose($fp); ?>

</body>