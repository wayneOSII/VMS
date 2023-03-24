<?php
	session_start();
	require_once("./backend/connect_db.php");
  $ad_no = $_SESSION['ad_no'];
  $ad_id = $_SESSION['ad_id'];
  print($ad_no);
  print($ad_id);
	$sql = 'SELECT ad_name FROM admin WHERE ad_no = :ad_no';
	$sth = $db_link->prepare($sql);
  $sth->bindValue(':ad_no',$ad_no);
  // $sth->bindValue(':ad_id',$ad_id);
	$sth->execute();
  $userData = $sth->fetch(PDO::FETCH_ASSOC);
	foreach($userData as $result){
    echo $result;
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
      <a class="navbar-brand" href="#" data-target="index.html">Student Portal</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="#" data-target="attend.html">值勤簽到</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">學生歷史紀錄查</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">請假申請</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">志工時段預選</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">缺曠查詢</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">活動事項公告</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">活動報名</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">獎狀輸出</a>
          </li>
        </ul>
      </div>
      <div class="navbar-right">
        <form action="./backend/log_out.php" method="POST" id="myform">
        <a href="#" class="btn btn-default navbar-btn"><?=$result?></a>
        <a href="help.html" class="btn btn-default navbar-btn" onclick="document.getElementById('myform').submit()">Logout</a>
        </form>
      </div>
    </nav>

<!-- 將 iframe 嵌入到這個 div 容器中 -->
<div id="attend-container">
    <iframe id="attend-iframe" name="attend-iframe" src="" frameborder="0" width="100%" height="500" style="display: none"></iframe>
  </div>
<script src="index.js"></script>
</body>
</html>    