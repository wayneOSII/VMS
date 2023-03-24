<?php
session_start();
if(isset($_SESSION["ad_no"],$_SESSION['ad_id'])){
    session_unset();
    echo "
    <script>
        alert('登出成功');
        window.location.replace('../index.html');
    </script>
    ";
}else{
    echo "
    <script>
        alert('登出失敗');
        window.location.replace('../index.php');
    </script>
    ";
}
?>