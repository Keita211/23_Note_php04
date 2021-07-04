<?php


session_start();

$name =$_SESSION['name'];
$kanri_flg =$_SESSION['kanri_flg'];

// SQL, PDOの準備
require_once('funcs.php');
$pdo = db_conn();

$stmt = $pdo->prepare('SELECT * FROM kadai04_table_content');

$statuses = $stmt->execute();

// データ表示

if($name == ""){
    $alert = "<script type='text/javascript'>alert('登録データを閲覧するには会員登録してログインしてください');</script>";
    echo $alert;
}else{
if($kanri_flg == 0){ // 管理権限者だけに削除タグを表示
    $view = "";
    if($status = false){
        sqlerror($status);
    }else{
        while($result = $stmt->fetch(\PDO::FETCH_ASSOC)){
        $view .= '<p>';
        $view .= '<a href= "detail.php?id='.$result["id"].'">';
        $view .= $result['indate'].':'.$result['name'];
        $view .= '</a>';
        $view .= '<a href= "delete.php?id='.$result["id"].'">';
        $view .= '[ 削除 ]';    
        $view .= '</a>';
        $view .= '</p>';
        }
    }}else{ // 一般ユーザーには削除タグは表示させない
    $view = "";
    if($status = false){
    sqlerror($status);
    }else{
    while($result = $stmt->fetch(\PDO::FETCH_ASSOC)){
        $view .= '<p>';
        $view .= '<a href= "detail.php?id='.$result["id"].'">';
        $view .= $result['indate'].':'.$result['name'];
        $view .= '</a>';
        $view .= '</p>';
        }
        }
    }
};



?>


<!DOCTYPE html>
<html lang="ja">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>映画感想一覧表示</title>
    <link rel="stylesheet" href="css/range.css">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <style>
        div {
            padding: 10px;
            font-size: 16px;
        }
    </style>
</head>

<body id="main">
    <!-- Head[Start] -->
    <header>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="welcome.html">TOPページ</a>
                    <a class="navbar-brand" href="index.php">データ登録</a>
                    <a class="navbar-brand" href="login.php">ログイン</a>
                    <a class="navbar-brand" href="logout.php">ログアウト</a>
                </div>
            </div>
        </nav>
    </header>
    <!-- Head[End] -->

    <!-- Main[Start] -->
    <div>
        <div class="container jumbotron">
            <a href="detail.php"></a>
            <?= $view ?>
        </div>
    </div>
    <!-- Main[End] -->

</body>

</html>
