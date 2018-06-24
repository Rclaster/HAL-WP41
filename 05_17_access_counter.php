<?php
    //ファイルの読み込み
    $fp = @fopen('access_counter.txt', 'r');
    if(!$fp){
        echo '読み込みエラーです';
        exit;
    }
    $line = fgets($fp);
    fclose($fp);

    //ファイルの書き込み
    $fr = @fopen('access_counter.txt', 'w');
    if(!$fr){
        echo '書き込みエラーです';
        exit;
    }
    fwrite($fr, intval($line) + 1);
    fclose($fr);

    //ファイルの読み込み
    $frr = @fopen('access_counter.txt', 'r');
    if(!$frr){
        echo '読み込みエラー2です';
        exit;
    }
    $line2 = fgets($frr);
    fclose($frr);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="css/05_10_kadai2.css" rel="stylesheet">
</head>
<title>アクセスカウンター</title>
<body>
<?php echo $line2; ?>人目のお客様です。
</body>