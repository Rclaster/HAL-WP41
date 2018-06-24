<?php
/**
 * Created by PhpStorm.
 * User: hiroki
 * Date: 2018/06/14
 * Time: 15:42
 */
    $error_file = '';

    //　入力チェック
    if (!empty($_POST['btn_submit'])){
        //　未 check
        if(!isset($_FILES['up_file']['name']) || $_FILES['up_file']['name'] === ''){
            $error_file = 'ファイルが未入力です';
        }
        else if(!$_FILES['up_file']['type'] == 'image/jpeg' || !$_FILES['up_file']['type'] == 'image/png'){
            $error_file = 'ファイルの形式はjpegかpngでお願い';
        }
        if($error_file == ''){
            require_once ('06_14_fileUpload_receive.php');
            exit();
        }
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

<h1>ファイル送信</h1>

<form method="post" action="06_14_fileUpload_send.php" enctype="multipart/form-data">
    <input type="file" name="up_file">
    <label><?php echo $error_file; ?></label>
    <br>
    <br>
    <input type="submit" name="btn_submit" value="送信">
</form>

</body>
</html>