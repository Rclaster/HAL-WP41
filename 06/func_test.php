<?php require_once 'func16.php' ?>
<?php
/**
 * Created by PhpStorm.
 * User: hiroki
 * Date: 2018/06/21
 * Time: 15:19
 */

$ary = func16_1(4, 0);
print_r($ary);

echo '<br>';

$num_ary = [7, 3, 12, 10];
$num = func16_2($num_ary);
var_export($num);

echo '<br>';

$num2 = func16_3($num_ary);
var_export($num2);
echo '<br>';

$lv3 = array ();
$naga = array(1, '永山', 43);
$asada = array(2, '浅田', 40);
array_push($lv3, $naga);
array_push($lv3, $asada);
$key = 0;

//echo '<pre>';
//var_dump($lv3);
//echo '</pre>';

$twoAry = func16_4($lv3, $key);
print_r($twoAry);
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="../css/06_14_fileupload.css" rel="stylesheet">
    <title> テスト</title>
</head>
<body>

</body>
</html>
