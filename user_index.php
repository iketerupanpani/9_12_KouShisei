<?php
// セッションのスタート
session_start();

//0.外部ファイル読み込み
include('functions.php');

// ログイン状態のチェック
chk_ssid();

//管理/一般フラグチェック
$menu = '<li class="nav-item">
    <a class="nav-link" href="index.php">todo登録</a></li>
    <li class="nav-item">
    <a class="nav-link" href="select.php">todo一覧</a></li>
    <li class="nav-item">
    <a class="nav-link" href="user_index.php">user登録</a></li>
    <li class="nav-item">
    <a class="nav-link" href="user_select.php">user管理</a></li>
    <li class="nav-item"><a class="nav-link" href="logout.php">ログアウト</a></li>';

?>

<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>user登録</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <style>
        div{
            padding: 10px;
            font-size:16px;
            }
    </style>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">user登録</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?=$menu?>
                </ul>
                <ul class="navbar-nav" style="color:#ff6347;">WELCOME <?= $_SESSION["name"] ?> 様</ul>
            </div>
        </nav>
    </header>

    <form method="post" action="user_insert.php">
        <div class="form-group">
            <label for="task">ユーザー名</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter name">
        </div>
        <div class="form-group">
            <label for="lid">LoginID</label>
            <input type="text" class="form-control" id="lid" name="lid">
        </div>
        <div class="form-group">
            <label for="lpw">Pass word</label>
            <input type="password" class="form-control" id="lpw" name="lpw">
        </div>
        <div class="form-group">
        <label for="kanri_flg">管理者権限</label><br>
           <input type="radio" id="kanri_flg" name="kanri_flg" value="0" checked="checked">一般ユーザー 
           <input type="radio" id="kanri_flg" name="kanri_flg" value="1">管理者 
        </div>
        <!-- <div class="form-group">
            <label for="life_flg">有効/無効</label><br>
            <input type="radio" id="life_flg" name="life_flg" value="0" checked="checked">有効
            <input type="radio" id="life_flg" name="life_flg" value="1">無効 -->
        <!-- </div> -->
        <div class="form-group">
            <button type="submit" class="btn btn-primary">登録</button>
        </div>
    </form>

</body>

</html>