<?php
	session_start();
	require_once("./backend/connect_db.php");
  list($ad_no, $ad_id, $t_no, $t_id, $s_no, $s_id) = array($_SESSION['ad_no'], $_SESSION['ad_id'], $_SESSION['t_no'], $_SESSION['t_id'],$_SESSION['s_no'],$_SESSION['s_id']);
  $ad_name = $_SESSION['ad_name'];
  $t_name = $_SESSION['t_name'];
  $s_name = $_SESSION['s_name'];

  // 使用 compact() 函數將變數轉換為陣列
  $usernames = compact('ad_name', 't_name', 's_name');
  $result = implode('',$usernames);

  // $ad_id = $_SESSION['ad_id'];

  // 檢查是否至少存在一組變數
  if(!isset($ad_no, $ad_id) && !isset($t_no, $t_id) && !isset($s_no, $s_id)){
      echo "
        <script>
         alert('請先登入');
         window.location.replace('./index.php');
        </script>
                  ";
      exit();
  }
  if(isset($s_no, $s_id)){
    echo "
      <script>
       alert('錯誤');
       window.location.replace('./index_in.php');
      </script>
                ";
  }

  print($t_no);
  print($t_id);
  print($t_name);

  
  print($ad_no);
  print($ad_id);
  print($ad_name);

  print($s_no);
  print($s_id);
  print($s_name.'<br>');

  print_r($usernames);

  // foreach($usernames as $result){
  //   echo $result;
  // }



	// $sql = 'SELECT ad_name FROM admin WHERE ad_no = :ad_no';
	// $sth = $db_link->prepare($sql);
  // $sth->bindValue(':ad_no',$ad_no);
  // // $sth->bindValue(':ad_id',$ad_id);
	// $sth->execute();
  // $userData = $sth->fetch(PDO::FETCH_ASSOC);
	// foreach($userData as $result){
  //   echo $result;
  // }

?>






<!DOCTYPE html>
<html>
  <head>
    <meta charset="UTF-8">
    <title>Student Portal</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <link rel="stylesheet" type="text/css" href="./index.css">
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
      <a class="navbar-brand" href="#" data-target="index_in.php">Student Portal</a>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">
          <li class="nav-item">
            <!-- <a class="nav-link" href="#" data-target="attend.html" id="attend_btn">值勤簽到</a> -->
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">學生歷史紀錄查尋</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">出席狀況</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./t_reserve.php">志工時段預選狀況</a>
          </li>
          <li class="nav-item">
            <!-- <a class="nav-link" href="#">缺曠查詢</a> -->
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">活動事項公告</a>
          </li>
          <li class="nav-item">
            <!-- <a class="nav-link" href="#">活動報名</a> -->
          </li>
          <li class="nav-item">
            <!-- <a class="nav-link" href="#">獎狀輸出</a> -->
          </li>
        </ul>
        <ul class="navbar-nav ml-auto">
          
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$result?></a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
              <a class="dropdown-item" href="#">個人檔案</a>
              <a class="dropdown-item" href="#" id="logout-btn" >Logout</a>
            </div>
          </li>
          <!-- <li class="nav-item">
            <a href="#" class="btn btn-default navbar-btn" id="logout-btn" >Logout</a>
          </li> -->
          
        </ul>


      </div>
      <!-- <div class="ml-auto" id="navrbt">
        <form action="./backend/log_out.php" method="POST" id="myform">
        <a href="#" class="btn btn-default navbar-btn" id="rtb"><?=$result?></a>
        <a href="help.html" class="btn btn-default navbar-btn"  onclick="document.getElementById('myform').submit()">Logout</a>
        </form>
      </div> -->
    </nav>

<!-- 將 iframe 嵌入到這個 div 容器中 -->
<div id="attend-container">
    <iframe id="attend-iframe" name="attend-iframe" src="" frameborder="0" width="100%" height="500" style="display: none"></iframe>
  </div>
<script src="indexphp.js"></script>
</body>
</html>    



<!-- <ul class="navbar-nav ml-auto">
          
          <li class="nav-item">
            <a href="#" class="btn btn-default navbar-btn" id="rtb"><?=$result?></a>
          </li>
          <li class="nav-item">
            <a href="./backend/log_out.php" class="btn btn-default navbar-btn" id="logout-btn" >Logout</a>
          </li>
          
        </ul> -->