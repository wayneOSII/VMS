# VMS

<h2>2023/03/25 Update</h2> <br>
 1.未使用session無法使用index.php
 
 ```
 if(!isset($ad_no, $ad_id) && !isset($t_no, $t_id) && !isset($s_no, $s_id)){
      echo "
        <script>
         alert('請先登入');
         window.location.replace('./index.html');
        </script>
                  ";
      exit();
  }
 ```
 
 2.使用JavaScript修正了navbar無法點擊的問題<br>
 3.使用JavaScript fetch的方式POST得到log_out.php的判斷式<br>
 根據indexphp.js配合修改log_out.php以傳送json的方式傳送到js<br>
 再透過indexphp.js來提示使用者是否成功登出
 
 ```
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
 ```
 
 ```
 fetch('./backend/log_out.php', {
    method: 'POST',
    credentials: 'same-origin'
  })
  .then((response) => {
    // 解析回應中的 JSON 格式資料
    return response.json();
  })
  .then((data) => {
    // 根據回應中的內容執行不同的操作
    if (data.success) {
      window.location.replace('./index.html');
      alert(data.message);
    } else {
      alert(data.message);
    }
  })
  .catch((error) => {
    alert('登出失敗2');
    console.error(error);
  });
 ```
 
 詳情請見原檔
