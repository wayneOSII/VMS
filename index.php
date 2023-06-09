<?php
	session_start();
	
  list($ad_no, $ad_id, $t_no, $t_id, $s_no, $s_id) = array($_SESSION['ad_no'], $_SESSION['ad_id'], $_SESSION['t_no'], $_SESSION['t_id'],$_SESSION['s_no'],$_SESSION['s_id']);
  $ad_name = $_SESSION['ad_name'];
  $t_name = $_SESSION['t_name'];
  $s_name = $_SESSION['s_name'];

  // 使用 compact() 函數將變數轉換為陣列
  $usernames = compact('ad_name', 't_name', 's_name');
  $result = implode('',$usernames);

  // $ad_id = $_SESSION['ad_id'];

  // 檢查是否至少存在一組變數
  if(isset($ad_no, $ad_id) || isset($t_no, $t_id) || isset($s_no, $s_id)){
      echo "
        <script>
         alert('您已經登入了！');
         window.location.replace('./index_in.php');
        </script>
                  ";
      exit();
  }
?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Student Portal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="index.css">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#" >Student Portal</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <!-- <a class="nav-link" href="#" data-target="attend.html">值勤簽到</a> -->
          </li>
          <li class="nav-item">
            <!-- <a class="nav-link" href="#">學生歷史紀錄查</a> -->
          </li>
          <li class="nav-item">
            <!-- <a class="nav-link" href="#">請假申請</a> -->
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./reserve.php">志工時段預選</a>
          </li>
          <li class="nav-item">
            <!-- <a class="nav-link" href="#">缺曠查詢</a> -->
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">活動事項公告</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">活動報名</a>
          </li>
          <li class="nav-item">
            <!-- <a class="nav-link" href="#">獎狀輸出</a> -->
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          <li class="nav-item">
            <a href='#' class="btn btn-default navbar-btn" id="loginbtn">Login</a>
          </li>
          <li class="nav-item">
            <a href="#" class="btn btn-default navbar-btn" id="helpbtn">Help</a>
          </li>
        </ul>
      </div>
      <!-- <div class="ml-auto">
        <a href='#' class="btn btn-default navbar-btn" id="loginbtn">Login</a>
        <a href="#" class="btn btn-default navbar-btn" id="helpbtn">Help</a>
      </div> -->
    </nav>
    <!-- <a href='log_in.html' class="btn btn-default navbar-btn">Login</a>
    <a href="help.html" class="btn btn-default navbar-btn">Help</a> -->
<!-- 將 iframe 嵌入到這個 div 容器中 -->
<div id="attend-container">
    <iframe id="attend-iframe" name="attend-iframe" src="" frameborder="0" width="100%" height="500" style="display: none"></iframe>
  </div>
<script src="index.js"></script>
</body>
</html>    


