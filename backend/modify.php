<?php
$account=$_POST['account'];
$pwd=$_POST['pwd'];
$ad_name=$_POST['ad_name'];

print("您輸入的會員帳號為：".$account."<br>");
print("您輸入的會員密碼為：".$pwd."<br>");
print("您輸入的會員名稱為：".$ad_name."<br>");






require_once("connect_db.php");

$userData = [$account, password_hash($pwd, PASSWORD_DEFAULT), $ad_name];
$sql = 'INSERT INTO teacher(t_id,t_pwd,t_name) VALUES (?,?,?)';
$sth = $db_link->prepare($sql);
try{
    if($sth->execute($userData)) {
        echo "
        <script>
            alert('註冊成功，請登入');
            window.location.replace('../frontend/log_in.html');
        </script>
        ";
    }else{
        echo"
        <script>
            alert('註冊失敗');
            window.location.replace('../frontend/sign_up.html');
        </script>
        ";
    }
} catch(PDOException $e) {
    echo $e;
    // echo "
    //     <script>
    //         alert('信箱已註冊過');
    //         window.location.replace('./modify.html');
    //     </script>
    //     ";
}
?>