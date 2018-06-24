<?php
/**
 * Created by PhpStorm.
 * User: hiroki
 * Date: 2018/06/14
 * Time: 15:42
 */


    date_default_timezone_set('Asia/Tokyo');
    $date = date("YmdHis");
    $destination = 'img/'.$date.'.jpg';

//    $file = $_FILES['up_file'];
//    echo '<pre>';
//    var_dump($file);
//    echo '</pre>';

    if(move_uploaded_file($_FILES['up_file']['tmp_name'], $destination)){
        echo $destination, 'のアップロードに成功しました。';
    }
    else{
        echo 'アップロードに失敗しました。';
    }

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="css/06_14_fileupload.css" rel="stylesheet">
    <title> アップロード</title>
</head>
<body>

<h1>ファイル受信</h1>

    <div class="element_wrap">
        <img src="<?php echo $destination; ?>">
    </div>

</body>
</html>