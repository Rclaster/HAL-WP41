<?php
	//曜日を出力
	$week = ['日', '月', '火', '水', '木', '金', '土'];
	$date = date('w');
	//列、行を出力
	$color = array();
	for ($i = 0; $i < $_GET['retu']; $i++){
		$row = array();
		for ($j = 0; $j < $_GET['gyo']; $j++){
			if($i % 2 == $j % 2){
				$color[] = 'yellow';
			}
			else{
				$color[] = 'red';
			}
			$color == $row;
		}
	}
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

<table border="1" width="100ß" cellspacing="0" cellpadding="5" bordercolor="#333333">
<?php for ($x = 0; $x < $_GET['retu']; $x++){ ?>
<?php $row = array();?>
	<tr>
	<?php for ($y = 0; $y < $_GET['gyo']; $y++){?>
	<td class = "<?php echo $color[$y]; ?>"></td>
	<?php } ?>
	</tr>	
<?php } ?>

</table>

</body>
</html>