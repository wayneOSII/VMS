<?php
$db_host = "localhost";
$db_port=3306;
$db_username = "root";
$db_password = "";
$db_name = "VMS";
// 資料庫連線
try {
    $db_link = new PDO(
        "mysql:host={$db_host};port={$db_port};dbname={$db_name};charset=utf8",
        $db_username,
        $db_password
    );
    print "資料庫連結成功<br>";
} catch (PDOException $e) {
    print "資料庫連結失敗<br>";
    die();
}

//關閉資料庫
// unset($db_link);
?>