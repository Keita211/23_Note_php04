<?php

session_start();

require_once('funcs.php');
$pdo = db_conn();


$lid =$_POST['lid'] ;
$lpw =$_POST['lpw'] ;


$stmt = $pdo->prepare("SELECT * FROM kadai04_table_userkanri WHERE lid = :lid");
$stmt->bindValue(":lid",$lid, PDO::PARAM_STR);

$status = $stmt->execute();

if($status==false){
    sql_error($stmt);
}

$val = $stmt->fetch();

if (password_verify($lpw,$val['lpw'])){
    $alert = "<script type='text/javascript'>alert('ログイン成功！');</script>";
    echo $alert;
    $_SESSION['cheked_id'] =session_id();
    $_SESSION['kanri_flg'] =$val['kanri_flg'];
    $_SESSION['name'] =$val['name'];
    redirect('index.php');
}else{
    redirect('login.php');
};



?>


