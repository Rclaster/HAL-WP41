<?php
    // 各種占い配列 画像とメッセージと確率
    //末吉配列
    $suekiti = array(
        'img' => 'img/suekiti.jpg',
        'msg' => '君は50%を引いたんだ　頑張りたまえ(末吉)',
        'per' => 50
    );
    //小吉配列
    $syoukiti = array(
        'img' => 'img/syoukiti.jpg',
        'msg' => '君は40%を引いたんだ　頑張りたまえ(小吉)',
        'per' => 40
    );
    //中吉配列
    $tyukiti = array(
        'img' => 'img/tyukiti.jpg',
        'msg' => '君は5%を引いたんだ! やるな(中吉)',
        'per' => 5
    );
    //凶配列
    $kyo = array(
        'img' => 'img/kyo.jpg',
        'msg' => '君は3%を引いたんだ!　誇って良い(凶)',
        'per' => 3
    );
    //大吉配列
    $daikiti = array(
        'img' => 'img/daikiti.jpg',
        'msg' => '君は2%を引いたんだ! 強い!(大吉)',
        'per' => 2
    );
    //占い配列
    $uranai = array(
        $suekiti, $syoukiti, $tyukiti, $kyo, $suekiti
    );
    //ランダム
    $rand = mt_rand(1, 100);

    foreach ($uranai as $val){
        //randがパーセントを上回るまで
        if ($rand <= $val['per']) {
            $img = $val['img'];
            $msg = $val['msg'];
            //ループ抜け
            break;
        }
        //下回った場合
        else{
            $rand -= $val['per'];
        }
    }
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="css/05_10_kadai2.css" rel="stylesheet">
</head>
<title>今日の運勢</title>
<body>

<!--確率のテーブル-->
<table border="1">
    <tr>
        <th>大吉</th>
        <td>2%</td>
    </tr>
    <tr>
        <th>中吉</th>
        <td>5%</td>
    </tr>
    <tr>
        <th>小吉</th>
        <td>40%</td>
    </tr>
    <tr>
        <th>末吉</th>
        <td>50%</td>
    </tr>
    <tr>
        <th>凶</th>
        <td>3%</td>
    </tr>
</table>
<div class="icon">
    <img src="<?php echo $img; ?>">
    <p><?php echo $msg; ?></p>
</div>

</body>
</html>