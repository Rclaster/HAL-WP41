<?php 
	$color = array();
	for ($i = 0; $i < $_GET['a']; $i++){
		if($i % 2 == 0){
			$color[] = 'white';
		}
		else{
			$color[] = 'red';
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

<!--<?php echo max($_GET['a'],$_GET['b']); ?>-->

<table border="1" width="100ß" cellspacing="0" cellpadding="5" bordercolor="#333333">
<?php for ($i = 0; $i < count($color); $i++) {?>
<tr><td class="<?php echo $color[$i];?>"></td></tr>
<?php } ?>
</body>
</html>