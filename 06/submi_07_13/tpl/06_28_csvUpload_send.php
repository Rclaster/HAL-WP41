<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link href="csvUpload.css" rel="stylesheet">
    <title> CSVアップロード</title>
</head>
<body>

<h1>CSVアップロード</h1>

<form method="post" action="06_28_csvUpload_send.php" enctype="multipart/form-data">
    <input type="file" name="up_file">
    <label><?php echo $error_file; ?></label>
    <br>
    <br>
    <input type="submit" name="btn_submit" value="アップロード">
</form>

</body>
</html>