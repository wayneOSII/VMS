<?php
session_start();
// date_default_timezone_set("Asia/Taipei");
// $dt = new DateTime();
// $time = $dt->format("Y-m-d H:i:s");
// $edit_time = $dt->format("Y-m-d H:i:s");
// require_once("connect_db.php");
// echo $time,"<br>";

$s_no = $_SESSION['s_no'];


$date = $_POST['date'];
$period = $_POST['time'];

// $location = $_POST['location'];
// echo $location,"";
echo $date,"<br>";
echo $period,"<br>";
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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>預約地點選擇</title>
</head>
<body>
    <h2>
        <p>請選擇地點</p>
    </h2>
    <div id="image-container" style="text-align: center;">
        <img src="./nutc_map.jpeg" alt="your-image-description" usemap="#image-map" >
    </div>
    <h4>
        <form method="post" action="rdata.php" onsubmit="return confirmSubmit()">
        <input type="hidden" name="s_no" value="<?=$s_no?>">
        <input type="hidden" name="date" value="<?=$date?>">
        <input type="hidden" name="period" value="<?=$period?>">

        學生：<?=$s_no?><br>
        所選時間：<?=$date?><br>
        所選時段：<?=$period?><br>
        
        
            <div class="choice">
	            所選地點：
                    <select name="location" id="">
		            <option value="" selected>請選擇地點</option>
		            <option value="A">A</option>
		            <option value="B">B</option>
		            <option value="C">C</option>
		            <option value="D">D</option>
		            <option value="E">E</option>
		            <option value="F">F</option>
		            <option value="G">G</option>
		            <option value="H">H</option>
		            <option value="I">I</option>
	            </select>
            </div>
            <button type="submit">確認</button>
        </form>
    </h4>
</body>
<script>

        
        function confirmSubmit() {
            var location = document.querySelector('select[name="location"]').value;

            var message = `學生：${'<?=$s_no?>'}\n所選時間：${'<?=$date?>'}\n所選時段：${'<?=$period?>'}\n所選地點：${location}\n\n請確認以上資訊`
            var result = confirm(message);
            if (result == true) {
                return true;
            } else {
                return false;
            }
        }
    </script>
</html>