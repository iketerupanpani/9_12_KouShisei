<?php
include('functions.php');

//入力チェック(受信確認処理追加)
if (
    !isset($_POST['lid']) || $_POST['lid']=='' ||
    !isset($_POST['lpw']) || $_POST['lpw']==''
) {
    exit('ParamError');
}

//1. POSTデータ取得
$id     = $_POST['id'];
$name   = $_POST['name'];
$lid  = $_POST['lid'];
$lpw = $_POST['lpw'];

//2. DB接続します(エラー処理追加)
$pdo = db_conn();


//3．データ登録SQL作成
$sql = 'UPDATE user_table SET name=:a1, lid=:a2, lpw=:a3 WHERE id=:id';
$stmt = $pdo->prepare($sql);
$stmt->bindValue(':a1', $name, PDO::PARAM_STR);
$stmt->bindValue(':a2', $lid, PDO::PARAM_STR);
$stmt->bindValue(':a3', $lpw, PDO::PARAM_STR);
$stmt->bindValue(':id', $id, PDO::PARAM_INT);
$status = $stmt->execute();

//4．データ登録処理後
if ($status==false) {
    errorMsg($stmt);
} else {
    header('Location: user_select.php');
    exit;
}
