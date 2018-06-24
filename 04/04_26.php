<?php
	//曜日を出力
	$week = ['日', '月', '火', '水', '木', '金', '土'];
	$date = date('w');
	//列、行を出力
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<link href="WP41/css/sample.css" rel="stylesheet">
</head>
<body>

<p><?php echo $week[$date] . '曜日'?></p>
<p><?php echo date('Y/m/d H:i:s')?></p>

<form method="get" action="04_26_2.php">
列<input type="text" name="retu" size="10">
行<input type="text" name="gyo" size="10">
<input type="submit" value="次へ">
</form>

</body>
</html>