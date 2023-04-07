<?php
session_start();
date_default_timezone_set("Asia/Taipei");
$dt = new DateTime();
$time = $dt->format("Y-m-d H:i:s");
$edit_time = $dt->format("Y-m-d H:i:s");
require_once("connect_db.php");
echo $time;

$s_no = $_SESSION['s_no'];


$date = $_POST['date'];
$period = $_POST['time'];

$location = $_POST['location'];
echo $location,"";
echo $date," ";
echo $period;
// echo "<script> 
//         alert('成功預約');
//         window.location.replace('../reserve.php');
//         </script>";


// $reserveData = [$s_no,$date ,$period, $location,$time,$edit_time];
// $sql = 'INSERT INTO message(s_no ,r_date,r_period,r_location,create_at,modified_at) VALUES (?,?,?,?,?,?)';
// $sth = $db_link->prepare($sql);
// try{
//     if($sth->execute($reserveData)) {
//         echo "
//         <script>
//             alert('預約成功');
//             window.location.replace('../reserve.php');
//         </script>
//         ";
//     }else{
//         echo"
//         <script>
//             alert('錯誤1');
//             window.location.replace('../reserve.php');
//         </script>
//         ";
//     }
// } catch(PDOException $e) {
//     echo "
//         <script>
//             alert('錯誤2');
//             window.location.replace('../reserve.php');
//         </script>
//         ";
// }

?>