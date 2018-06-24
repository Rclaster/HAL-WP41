<?php
    session_start();
    $_SESSION['name'] = '竹内';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="../css/05_24_kadai3.css" rel="stylesheet">
    <title>session練習問題(start)</title>
</head>
<body>

<h1>session練習問題(start)</h1>

<form method="post" action="session_next.php">

    <input type="submit" name="submit" value="session_nextへ">

</form>

</body>
</html>