<?php
    session_start();
    date_default_timezone_set("Asia/Taipei");
    $dt = new DateTime();
    $time = $dt->format("Y-m-d H:i:s");
    $edit_time = $dt->format("Y-m-d H:i:s");
    require_once("connect_db.php");
    echo $time, "<br>";
    
    $s_no = $_SESSION['s_no'];
    
    echo $s_no, "<br>";
    $date = $_POST['date'];
    $period = $_POST['time'];
    
    // $location = $_POST['location'];
    // echo $location, "<br>";
    echo $date, "<br>";
    echo $period, "<br>";
?>