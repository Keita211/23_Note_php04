<?php
//XSS対応（ echoする場所で使用！）
function h($str)
{
    return htmlspecialchars($str, ENT_QUOTES);
}

// DB接続

function db_conn (){
    try{
     //開発用Local環境//
    $db_name = 'kadai_php04';
    $db_id = 'root';
    $db_pw = 'root';
    $db_host = 'localhost';
    
    $pdo = new PDO('mysql:dbname='.$db_name.';charset=utf8;host='.$db_host,$db_id,$db_pw);
    return $pdo;
    }
    catch(PDOException $e) {
        exit('DBConnectError:'.$e->getMessage());
        }
}

function sqlerror($stmt){
    $error = $stmt->errorInfo();
    exit("SQLError:".print_r($error, true));
}

function redirect($filename){
    header("Location: ".$filename);
    exit();
}

?>