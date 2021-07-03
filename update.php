<?php

// データ取得

$name = $_POST['name'];
$date = $_POST['date'];
$url  = $_POST['url'];
$score= $_POST['score'];
$content= $_POST['content'];
$id= $_POST['id'];

// DB接続
require_once('funcs.php');
$pdo = db_conn();

// sql用意

$stmt = $pdo->prepare(
    "UPDATE kadai03_table_01 SET name= :name, date= :date, url= :url, score= :score, content=:content, indate= sysdate()
    WHERE id= :id"
); 

// バインド変数を用意

$stmt-> bindValue(':name',$name, PDO::PARAM_STR );
$stmt-> bindValue(':date',date("Y-m-d", strtotime($date)), PDO::PARAM_STR);
$stmt-> bindValue(':url',$url, PDO::PARAM_STR );
$stmt-> bindValue(':score',$score, PDO::PARAM_INT );
$stmt-> bindValue(':content',$content, PDO::PARAM_STR );
$stmt-> bindValue(':id',$id, PDO::PARAM_INT );

// 実行
$status = $stmt->execute();

//データ登録処理後

if($status==false){
    sql_error($stmt);
  }else{
    redirect('select.php');
  }

?>