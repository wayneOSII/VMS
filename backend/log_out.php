<?php
session_start();
list($ad_no, $ad_id, $t_no, $t_id, $s_no, $s_id) = array($_SESSION['ad_no'], $_SESSION['ad_id'], $_SESSION['t_no'], $_SESSION['t_id'],$_SESSION['s_no'],$_SESSION['s_id']);

// 檢查是否至少存在一組變數
if(isset($ad_no, $ad_id) || isset($t_no, $t_id) || isset($s_no, $s_id)){
    session_unset();
    // echo "
    // <script>
    //     alert('登出成功');
    //     window.location.replace('../index.html');
    // </script>
    // ";
    $result = array('success' => true, 'message' => '登出成功');
}else{
    // echo "
    // <script>
    //     alert('登出失敗');
    //     window.location.replace('../index.php');
    // </script>
    // ";
    $result = array('success' => false, 'message' => '登出失敗');
}

header('Content-Type: application/json');
echo json_encode($result);
?>