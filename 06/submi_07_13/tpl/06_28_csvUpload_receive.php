<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="csvUpload.css" rel="stylesheet">
    <title>CSVアップロード</title>
</head>
<body>

<h1>CSVアップロード</h1>

<table class="type06">
    <tr>
        <th>ID</th>
        <th>氏名</th>
        <th>TEL</th>
        <th>メール</th>
    </tr>
    <?php //最新の登録データの取得 id,name,tel,mailの順
    while (($record = fgetcsv($fp)) !== FALSE) { ?>
        <tr>
            <td><?php echo $record[0] ?></td>
            <td><?php echo $record[1] ?></td>
            <td><?php echo $record[2] ?></td>
            <td><?php echo $record[3] ?></td>
        </tr>
    <?php } ?>
</table>
<?php fclose($fp); ?>

<button type="button" name="btn_back">戻る</button>

</body>