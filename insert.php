
<?php
ini_set('display_errors',1);
?>;

<?php

// データ取得

$name = $_POST['name'];
$date = $_POST['date'];
$url  = $_POST['url'];
$score= $_POST['score'];
$content= $_POST['content'];
$open_flg= $_POST['open_flg'];

// DB接続
require_once('funcs.php');
$pdo = db_conn();

// sql用意

$stmt = $pdo->prepare(
    "INSERT INTO kadai04_table_content(id,name,date, url, score,content,indate, open_flg)
    VALUES (NULL , :name, :date, :url, :score,:content, sysdate(),:open_flg )"
);

// バインド変数を用意

$stmt-> bindValue(':name',$name, PDO::PARAM_STR );
$stmt-> bindValue(':date',date("Y-m-d", strtotime($date)), PDO::PARAM_STR);
$stmt-> bindValue(':url',$url, PDO::PARAM_STR );
$stmt-> bindValue(':score',$score, PDO::PARAM_INT );
$stmt-> bindValue(':content',$content, PDO::PARAM_STR );
$stmt-> bindValue(':open_flg',$open_flg, PDO::PARAM_INT );

// 実行
$status = $stmt->execute();

//データ登録処理後

if($status==false){
    sql_error($stmt);
  }else{
    redirect('index.php');
  }

?>