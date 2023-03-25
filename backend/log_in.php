<?php
session_start();
$account = isset($_POST['account']) ? $_POST['account'] : "";
print("您輸入的會員帳號為：" . $account . "</br>");

$pwd = isset($_POST['pwd']) ? $_POST['pwd'] : "";
print("您輸入的會員密碼為：" . $pwd . "</br>");

require_once("connect_db.php");


$identity = $_POST['identity'];
switch ($identity) {
    case 'admin':
        $sql = 'SELECT ad_no,ad_id,ad_pwd,ad_name FROM admin WHERE ad_id = :account';
        $sth = $db_link->prepare($sql);
        $sth->bindValue(':account',$account);
        $sth->execute();
        $userData = $sth->fetch(PDO::FETCH_ASSOC);
        foreach($userData as $result){
            echo $result;
        }
        try{
            if(empty($userData) != 1){
                if(password_verify($pwd,$userData['ad_pwd'])){
                    $_SESSION['ad_no'] = $userData['ad_no'];
                    $_SESSION['ad_id'] = $userData["ad_id"];
                    $_SESSION['ad_name'] = $userData["ad_name"];

                    echo "
                    <script>
                        alert('登入成功');
                        window.location.replace('../index.php');
                    </script>
                    ";
                } else {
                    echo "
                    <script>
                        alert('帳號或密碼錯誤1');
                        window.location.replace('./log_in.html');
                    </script>
                    ";
                }
            } else {
                echo "
                <script>
                    alert('帳號或密碼錯誤2');
                    window.location.replace('./log_in.html');
                </script>
                ";
            }
        } catch (PDOException $e) {
            echo "
            <script>
                alert('帳號或密碼錯誤');
                window.location.replace('./log_in.html');
            </script>
            ";
        }
        break;
    case 'teacher':
        $sql2 = 'SELECT t_no,t_id,t_pwd,t_name FROM teacher WHERE t_id = :account';
        $sth = $db_link->prepare($sql2);
        $sth->bindValue(':account',$account);
        $sth->execute();
        $userData = $sth->fetch(PDO::FETCH_ASSOC);
        foreach($userData as $result){
            echo $result;
        }
        try{
            if(empty($userData) != 1){
                if(password_verify($pwd,$userData['t_pwd'])){
                    $_SESSION['t_no'] = $userData['t_no'];
                    $_SESSION['t_id'] = $userData["t_id"];
                    $_SESSION['t_name'] = $userData["t_name"];
                    echo "
                    <script>
                        alert('登入成功');
                        window.location.replace('../index.php');
                    </script>
                    ";
                } else {
                    echo "
                    <script>
                        alert('帳號或密碼錯誤1');
                        window.location.replace('./log_in.html');
                    </script>
                    ";
                }
            } else {
                echo "
                <script>
                    alert('帳號或密碼錯誤2');
                    window.location.replace('./log_in.html');
                </script>
                ";
            }
        } catch (PDOException $e) {
            echo "
            <script>
                alert('帳號或密碼錯誤');
                window.location.replace('./log_in.html');
            </script>
            ";
        }
        break;
    case 'student':
        $sql3 = 'SELECT s_no,s_id,s_pwd,s_name FROM student WHERE s_id = :account';
        $sth = $db_link->prepare($sql3);
        $sth->bindValue(':account',$account);
        $sth->execute();
        $userData = $sth->fetch(PDO::FETCH_ASSOC);
        foreach($userData as $result){
            echo $result;
        }
        try{
            if(empty($userData) != 1){
                if(password_verify($pwd,$userData['s_pwd'])){
                    $_SESSION['s_no'] = $userData['s_no'];
                    $_SESSION['s_id'] = $userData["s_id"];
                    $_SESSION['s_name'] = $userData["s_name"];
                    echo "
                    <script>
                        alert('登入成功');
                        window.location.replace('../index.php');
                    </script>
                    ";
                } else {
                    echo "
                    <script>
                        alert('帳號或密碼錯誤1');
                        window.location.replace('./log_in.html');
                    </script>
                    ";
                }
            } else {
                echo "
                <script>
                    alert('帳號或密碼錯誤2');
                    window.location.replace('./log_in.html');
                </script>
                ";
            }
        } catch (PDOException $e) {
            echo "
            <script>
                alert('帳號或密碼錯誤');
                window.location.replace('./log_in.html');
            </script>
            ";
        }
        break;
}





// $sql = 'SELECT ad_no,ad_id,ad_pwd,ad_name FROM admin WHERE ad_id = :account';
// $sql = 'SELECT mbr_id,mbr_account,mbr_pwd,mbr_name FROM member WHERE mbr_account = :account';
// $sql = 'SELECT mbr_id,mbr_account,mbr_pwd,mbr_name FROM member WHERE mbr_account = :account';

// $sql = 'SELECT mbr_pwd,mbr_name FROM member WHERE mbr_account = :account';
// $sth = $db_link->prepare($sql);
// $sth->bindValue(':account',$account);
// $sth->execute();
// $userData = $sth->fetch(PDO::FETCH_ASSOC);
// foreach($userData as $result){
//     echo $result;
// }
// try{
//     if(empty($userData) != 1){
//         if(password_verify($pwd,$userData['ad_pwd'])){
//             $_SESSION['ad_no'] = $userData['ad_no'];
//             $_SESSION['ad_id'] = $userData["ad_id"];
//             echo "
//             <script>
//                 alert('登入成功');
//                 window.location.replace('../index.php');
//             </script>
//             ";
//         } else {
//             echo "
//             <script>
//                 alert('帳號或密碼錯誤1');
//                 window.location.replace('./log_in.html');
//             </script>
//             ";
//         }
//     } else {
//         echo "
//         <script>
//             alert('帳號或密碼錯誤2');
//             window.location.replace('./log_in.html');
//         </script>
//         ";
//     }
// } catch (PDOException $e) {
//     echo "
//     <script>
//         alert('帳號或密碼錯誤');
//         window.location.replace('./log_in.html');
//     </script>
//     ";
// }
?>