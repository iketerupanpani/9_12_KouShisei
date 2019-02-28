<?php
// セッションのスタート
session_start();

//0.外部ファイル読み込み
include('functions.php');

// ログイン状態のチェック
chk_ssid();
//管理/一般フラグチェック
$menu="";
if($_SESSION["kanri_flg"]==0){
    $menu=menu1();
}else if($_SESSION["kanri_flg"]==1){
    $menu==menu2();
}else{
    echo"error";
}

//1.  DB接続します
$pdo = db_conn();

//２．データ登録SQL作成
$sql = 'SELECT * FROM user_table';
$stmt = $pdo->prepare($sql);
$status = $stmt->execute();

//３．データ表示
$view='';
if ($status==false) {
    errorMsg($stmt);
} else {
    while ($result = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $view .='<tr>';
        $view .='<td>';
        // $view .= '<li class="list-group-item">';
        $view .= $result["id"];
        $view .='</td>';
        $view .='<td>';
        $view .= $result['name'];
        $view .='</td>';
        $view .='<td>';
        $view .= $result['lid'];
        $view .='</td>';
        $view .='<td>';
        $view .= $result['lpw'];
        $view .='</td>';
        $view .='<td>';
        $view .= '<a href="user_detail.php?id='.$result[id].'" class="badge badge-primary">Edit</a>';
        $view .='</td>';
        $view .='<td>';
        $view .= '<a href="user_delete.php?id='.$result[id].'" class="badge badge-danger">Delete</a>';
        $view .='</td>';
        $view .='</tr>';
    }
}

?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>todoリスト表示</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body>

    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">todo一覧</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <?=$menu?>
                </ul>
                <b><ul class="navbar-nav" style="color:#ff6347;">WELCOME <?= $_SESSION["name"] ?> 様</ul></b>
            </div>
        </nav>
    </header>

    <div class="container">
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>NAME</th>
                <th>ID</th>
                <th>PASSWORD</th>
                <th>EDIT</th>
                <th>DELETE</th>
            </tr>
        </thead>
        <tbody>
            <?=$view?>
        </tbody>
    </table>
</div>
</body>
<script>
</script>
</html>