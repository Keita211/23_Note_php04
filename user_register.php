<?php



require_once('funcs.php');
$pdo = db_conn();

$name = $_POST["name"];
$lid = $_POST["lid"];
$lpw = $_POST["lpw"];
$hlpw = password_hash($lpw, PASSWORD_DEFAULT);
$paid_flg = $_POST["paid_flg"];
$karni_flg = 1; // 1が通常user。０は管理者権限。
$life_flg = 0; // 0なら有効。1は退会user。

 
// echo $name;
// echo $lid;
// echo $hlpw;
// echo $paid_flg;
// echo $karni_flg;
// echo $life_flg;


//SQLを用意
$stmt = $pdo->prepare(
    "INSERT INTO kadai04_table_userkanri(id,name,lid, lpw,kanri_flg,life_flg, paid_flg)
    VALUES (NULL , :name, :lid, :lpw, :kanri_flg,:life_flg, :paid_flg)"
);

// バインド変数を用意
$stmt->bindValue(":name",$name,PDO::PARAM_STR);
$stmt->bindValue(":lid",$lid,PDO::PARAM_STR);
$stmt->bindValue(":lpw",$hlpw,PDO::PARAM_STR);
$stmt->bindValue(":kanri_flg",$karni_flg,PDO::PARAM_INT);
$stmt->bindValue(":life_flg",$life_flg,PDO::PARAM_INT);
$stmt->bindValue(":paid_flg",$paid_flg,PDO::PARAM_INT);

// 実行
$status = $stmt->execute();

if($status==false){
    sql_error($stmt);
  }else{
    redirect('welcome.html');
  }

?>