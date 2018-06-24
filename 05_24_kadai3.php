<?php
    $return_name = '';
    $return_tel = '';
    $return_mail = '';

    if(!empty($_GET['name'])){
        $return_name = $_GET['name'];
    }
    if(!empty($_GET['tel'])){
        $return_tel = $_GET['tel'];
    }
    if(!empty($_GET['mail'])){
        $return_mail = $_GET['mail'];
    }

    //エラー配列
    $error = array();
    //　未入力チェック POST時
    if (!empty($_GET['btn_submit'])){
        //　name check
        if(!isset($_GET['name']) || $_GET['name'] === ''){
            $error['name'] = '氏名が入力されていません';
        }
        //　tel check
        if(!isset($_GET['tel']) || $_GET['tel'] === ''){
            $error['tel'] = 'TELが入力されていません';
        }
        //　9〜12　check
        else if(strlen($_GET['tel']) <= 9 || strlen($_GET['tel']) >= 12){
            $error['tel'] = '電話番号は9〜12桁で入力してください';
        }
        // number
        else if(!is_numeric($_GET['tel'])){
            $error['tel'] = 'TELは数値で入力してください';
        }
        //　mail check
        if(!isset($_GET['mail']) || $_GET['mail'] === ''){
            $error['mail'] = 'メールが入力されていません';
        }
        //　@ check
        else if(!preg_match("/@/",($_GET['mail']))){
            $error['mail'] = 'メールアドレスが正しくありません。';
        }
        //　未入力でない時ページを飛ばす
        if(!count($error)){
            //header("Location: 05_24_kadai3_2.php");

            //session_start
            session_start();
            $_SESSION['name'] = $_GET['name'];
            $_SESSION['tel'] = $_GET['tel'];
            $_SESSION['mail'] = $_GET['mail'];

            header("Location: 05_24_kadai3_1.php");
            exit();
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="css/05_24_kadai3.css" rel="stylesheet">
    <title>CSV読み書き</title>
</head>
<body>

<h1>CSV読み書き</h1>

<form method="get" action="05_24_kadai3.php">
    <div class="element_wrap">
        <label>氏名</label>
        <input type="text" name="name" value="<?php echo $return_name; ?>">
        <?php if(!empty($error['name'])){?><label><?php echo $error['name']; ?></label><?php }?>
    </div>
    <div class="element_wrap">
        <label>TEL</label>
        <input type="text" name="tel" value="<?php echo $return_tel; ?>">
        <?php if(!empty($error['tel'])){?><label><?php echo $error['tel']; ?></label><?php }?>
    </div>
    <div class="element_wrap">
        <label>メール</label>
        <input type="text" name="mail" value="<?php echo $return_mail; ?>">
        <?php if(!empty($error['mail'])){?><label><?php echo $error['mail']; ?></label><?php }?>
    </div>
    <input type="submit" name="btn_submit" value="確認">
</form>

</body>
</html>