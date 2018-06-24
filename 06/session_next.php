<?php
    session_start();

    if(isset($_SESSION['name'])){
        echo 'セッションないよ';
        $data = "";
        exit;
    }
    else{
        $data = $_SESSION['name'];
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="../css/05_24_kadai3.css" rel="stylesheet">
    <title>session練習問題(next)</title>
</head>
<body>

<h1>session練習問題(next)</h1>

<form method="post" action="session_end.php">

    <div class="element_wrap">
        <label>名前</label>
        <input type="text" name="name" value="<?php echo $data; ?>">
    </div>

    <input type="submit" name="submit" value="session_endへ">

</form>

</body>
</html>