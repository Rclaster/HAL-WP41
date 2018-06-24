<?php require_once 'func.php' ?>
<?php
//$randam = array_fill(0, 10, 0);
//
//for($i = 0; $i < 100000; $i++){
//    $randam[rand(0, 10)]++;
//}
//?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="../css/sample.css" rel="stylesheet">
</head>
<body>

<p>sample1関数の場合、<?php echo sample1(5); ?></p>
<p>sample2関数の場合、<?php var_export(sample2(20, 20, 30)); ?></p>
<p>sample3関数の場合、<?php var_export(sample3('あいうえおかきくけ', 5, 10)); ?></p>

</body>
</html>