<?php
    //ファイルの上書き
    $fp = @fopen('data.txt', 'w');
    if(!$fp){
        echo '上書きエラーです';
        exit;
    }
    fwrite($fp, 'hal');
    fclose($fp);

    //ファイルの読み込み
    $fr = @fopen('data.txt', 'r');
    if(!$fr){
        echo '読み込みエラーです';
        exit;
    }
    $line = fgets($fr);
    fclose($fr);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="css/05_10_kadai2.css" rel="stylesheet">
</head>
<title>ファイルの入出力</title>
<body>
<?php echo $line; ?>
</body>