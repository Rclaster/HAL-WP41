<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <!--　css読み込み　-->
    <link href="./css/style.css" rel="stylesheet" type="text/css">
    <!--　bootstrap css読み込み　-->
    <link href="./css/bootstrap.min.css" rel="stylesheet">
    <!--　jquery読み込み　-->
    <script src="./js/jquery-3.2.1.min.js"></script>
    <!--　bootstrap js読み込み　-->
    <script src="./js/bootstrap.min.js"></script>
    <title>WP前期評価課題</title>
</head>
<body style="background-color: #abdde5;">

<!--入力フォーム-->
<form class="form-style-9" method="post" action="./index.php" enctype="multipart/form-data">
    <ul>
        <div class="form-group row">
            <div class="col-sm-6">
                <label>ニックネーム</label>
                <input name="name" class="firstname form-control" required="" type="text">
            </div>
            <div class="col-sm-6">
                <label>ジャンル</label>
                <select name="genre" class="form-control">
                    <option value="映画">映画</option>
                    <option value="本">本</option>
                    <option value="音楽">音楽</option>
                </select>
            </div>
        </div>
        <li class="form-group">
            <label>メッセージ</label>
            <textarea name="message" class="form-control"></textarea>
        </li>
        <li>
            <input id="lefile" type="file" style="display:none" name="up_file">
            <div class="input-group">
                <input type="text" id="photoCover" class="form-control" placeholder="no select">
                <span class="input-group-btn"><button type="button" class="btn btn-info" onclick="$('input[id=lefile]').click();">選択</button></span>
            </div>
        </li>

        <li>
            <input class="btn btn-default" type="submit" name="post_submit" value="投稿" />
        </li>
    </ul>
</form>

<!--ジャンル-->
<div class="genre form-style-9">
    <form method="post" action="./index.php">
        <label>ジャンル選択　</label>
        <select name="selected_genre" id="select-genre-c" class="form-control">
            <option value="映画" <?= $select== '映画' ? 'selected' : "" ?>>映画</option>
            <option value="本" <?= $select == '本' ? 'selected' : "" ?>>本</option>
            <option value="音楽" <?= $select == '音楽' ? 'selected' : "" ?>>音楽</option>
        </select>
        <input id="search_button" class="btn btn-default" type="submit" name="search_submit" value="検索" />
    </form>
</div>

<?php //最新の登録データの取得
    foreach ($adequate_csv as $data)  {?>
    <div class="l-card">
        <div class="text-content">
            <h3 class="title"><?php echo $data[0] ?>
                　ニックネーム：<?php echo $data[1] ?>
                　ジャンル：<?php echo $data[3] ?></h3>
            <p class="caption"><?php echo $data[2] ?></p>
            <div class="content-meta">
                <span class="date"><?php echo $data[5] ?></span>
                <span class="like">
                    <i class="material-icons"></i>
                    <form method="post" action="./index.php">
                        <input type="hidden" name="delete_id" value="<?php echo $data[0] ?>">
                        <input id="dele-color" class="btn btn-light" type="submit" name="delete_submit" value="削除" />
                    </form>
                </span>
            </div>
        </div>
        <?php if($data[6] != ''){?>
        <div class="img-container--table-cell">
            <img src="<?php echo UPLOAD_PATH.$data[0] ?>.jpg" />
        </div>
        <?php }?>
    </div>
    <?php } ?>
<?php fclose($fp); ?>

<script src="./js/index.js"></script>
<script>
    $('input[id=lefile]').change(function() {
        $('#photoCover').val($(this).val().replace("C:\\fakepath\\", ""));
    });
</script>

</body>
</html>