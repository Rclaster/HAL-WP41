<?php
    //　セッションスタート
    session_start();
    $name = $_SESSION['name'];
    $tel = $_SESSION['tel'];
    $mail = $_SESSION['mail'];
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="css/05_24_kadai3.css" rel="stylesheet">
    <title>CSV読み書き</title>
</head>
<body>

<h1>確認画面</h1>

<form method="get" action="05_24_kadai3_2.php">
    <div class="element_wrap">
        <label>氏名</label>
        <label><?php echo $name; ?></label>
    </div>
    <div class="element_wrap">
        <label>TEL</label>
        <label><?php echo $tel; ?></label>
    </div>
    </div>
    <div class="element_wrap">
        <label>メール</label>
        <label><?php echo $mail; ?></label>
    </div>

    <input type="submit" name="btn_submit" value="登録">
</form>

<button type="button" name="btn_back" onclick="history.back()">戻る</button>

</body>
</html>