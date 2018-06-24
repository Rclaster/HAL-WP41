<?php
    session_start();
    $_SESSION = array();
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(), '', time() - 60 * 60* 24);
    }
    session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="css/05_24_kadai3.css" rel="stylesheet">
    <title>session練習問題(end)</title>
</head>
<body>

<h1>session練習問題(end)</h1>

<form method="post" action="session_next.php">

    <input type="submit" name="submit" value="session_nextへ">

</form>

</body>
</html>