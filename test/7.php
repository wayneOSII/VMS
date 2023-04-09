<?php
require_once("../backend/connect_db.php");
$sql = 'SELECT * FROM reserve ';
$stmt = $db_link->prepare($sql);
$stmt->execute();
$datas = array();

while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
	$datas[] = $row;
}
print_r($datas);
echo $datas[0]['r_date'];

// foreach($datas as $record){
// 	// 取得每個欄位的值
//     $s_no = $record['s_no'];
//     $r_date = $record['r_date'];
//     $r_period = $record['r_period'];
//     $r_location = $record['r_location'];
//     $create_at = $record['create_at'];
//     $modified_at = $record['modified_at'];

//     // 印出每個欄位的值
//     echo "s_no: " . $s_no . "<br>";
//     echo "r_date: " . $r_date . "<br>";
//     echo "r_period: " . $r_period . "<br>";
//     echo "r_location: " . $r_location . "<br>";
//     echo "create_at: " . $create_at . "<br>";
//     echo "modified_at: " . $modified_at . "<br>";
// }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
	<style>
		/* 設定表格樣式 */
		table {
		  margin: 0 auto;
		  width: 100%;
		  border-collapse: collapse;
		  border: 2px solid #ccc;
		  font-family: Arial, sans-serif;
		  font-size: 16px;
		  max-width: 900px;
		}
	  
		th, td {
		  text-align: center;
		  border: 1px solid #ccc;
		  padding: 10px;
		}
	  
		/* 設定表頭樣式 */
		th {
		  background-color: #007bff;
		  color: white;
		  font-weight: bold;
		  text-transform: uppercase;
		}
	  
		/* 設定表格內容樣式 */
		td {
		  background-color: #f2f2f2;
		}
	  
		/* 設定偶數行背景顏色 */
		tr:nth-child(even) {
		  background-color: #e6e6e6;
		}
		.choice{
			text-align: center;
			/* margin: 5px; */
			padding: 15px 10px 5px;
		}
		select{
			width: 150px;
			height: 30px;
			
		}
	  </style>
</head>
<body>
<?php

// 設定時區
date_default_timezone_set('Asia/Taipei');


// 取得當前年份和月份
$year = date("Y");
$month = date("n");
//今天日期
$today = date("Y-m-d");
echo '<br>',$today,'<br>';
$today_date = date_create($today); // 將今天日期轉換為 DateTime 物件



  echo '<form method="post" action="t_reserve.php" id="location-form">
<div class="choice">
	<select name="location" id="" onchange="submitlocation()">
    	<option value="" selected>請選擇地點</option>
		<option value="A">A資訊大樓</option>
		<option value="B">B中正大樓</option>
		<option value="C">C昌明樓</option>
		<option value="D">D翰英樓</option>
		<option value="E">E弘業樓</option>
		<option value="F">F中商大樓</option>
		<option value="G">G</option>
		<option value="H">H操場</option>
		<option value="I">I籃球場+排球場</option>
	</select>
</div>
';



    // 取得當前月份的第一天是星期幾
    $firstDayOfWeek = date("N", mktime(0, 0, 0, $month, 1, $year));
    echo $firstDayOfWeek;
    // 取得當前月份的天數
    $daysInMonth = date("t", mktime(0, 0, 0, $month, 1, $year));

    // 輸出 HTML 表格開始標籤和表頭行
    echo "<table>";
    echo "<tr><th colspan=\"6\">" . $year."年".$month."月" . "</th></tr>";
    echo "<tr><th></th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th></tr>";

    // 計算需要輸出的行數
    $rows = ceil(($daysInMonth + $firstDayOfWeek - 1) / 7);

    echo $rows;

    //這個月的第一天不是星期一到星期五的話刪除第一列
    if ($firstDayOfWeek > 5) {
    	$row = 2;
    	}else{
    		$row = 1;
    	}

    // 輸出每一行的日期
    //日期欄位
    for ($row ; $row <= $rows; $row++) {
        echo "<tr>";
    	echo "<th>&nbsp;</th>"; // 新增一個空白欄位
        for ($col = 1; $col <= 5; $col++) {
            $day = ($row - 1) * 7 + $col - $firstDayOfWeek + 1;
    		// echo $day,"<br>";
            if ($day < 1 || $day > $daysInMonth) {
    			echo "<th></th>";
    			} else {
    			$date = date_create("$year-$month-$day");
    			$formattedDate = date_format($date, "Y-m-d");
    			echo "<th>$formattedDate</th>";
                    
    			}
        }
        echo "</tr>";
    	echo "<tr>";


    	//空白欄位1
    	if ($col % 2 == 0) {
            echo "<td><p>中午</p><p>12:30-13:25</p></td>";
        } else {
            echo "<td>&nbsp;</td>";
        }
    	for ($col = 1; $col <= 5; $col++) {
            $day = ($row - 1) * 7 + $col - $firstDayOfWeek + 1;
            if ($day < 1 || $day > $daysInMonth) {
    			echo "<td></td>";
    			} else {
    				$date = date_create("$year-$month-$day");
    				$formattedDate = date_format($date, "Y-m-d");
					$formattedData = date_format($date, "Y-m-d");
					$formattedDateObj = date_create($formattedDate); // 將預約日期轉換為 DateTime 物件
    				// echo "<td></td>";
					$isReserved = false;
        			foreach ($datas as $reservation) {
            		if ($formattedData == $reservation['r_date']) {
                		$isReserved = true;
                		break;
            			}
        			}
    				echo "<td>";
					if($isReserved){
						echo '1';
					}else{
						echo '2';
					}
    				echo "</td>";
    			}
        }

    	echo "</tr>";
    	echo "<tr>";

	    //空白欄位2
    	if ($col % 2 == 0) {
            echo "<td><p>下午</p><p>15:30-17:30</p></td>";
        } else {
            echo "<td>&nbsp;</td>";
        }	
    	for ($col = 1; $col <= 5; $col++) {
            $day = ($row - 1) * 7 + $col - $firstDayOfWeek + 1;
            if ($day < 1 || $day > $daysInMonth) {
    			echo "<td></td>";
    			} else {
    				$date = date_create("$year-$month-$day");
    				$formattedDate = date_format($date, "Y-m-d");
					$formattedDateObj = date_create($formattedDate); // 將預約日期轉換為 DateTime 物件
    				echo "<td>";
					if ($formattedDateObj >= $today_date) { // 如果預約日期在今天之後
    				// echo "<a href=\"./backend/get_data.php?date=$formattedData&time=15:30-17:30\">預約</a>";
    				echo 
            // '<form action="../backend/get_data.php" method="POST" id="commit-form">
    						'<input type="hidden" name="date" value=" '.$formattedDate.'">
    						<input type="hidden" name="time" value="15:30-17:30">
    						<button type="submit" onclick="submitForms()">預約</button>
    		  			 
                 ';
					}else{// 如果預約日期在今天之前
						echo '<button disabled>已過期</button>';
					}
    				echo "</td>";
    			}
    		}
    	// echo "<tr>";
    	// echo "<td> </td>";
    	echo "</tr>";

    }
	echo "</form>";
    // 輸出 HTML 表格結束標籤
    echo "</table>";


?>


</body>
<script>
function submitMonth() {
    var form = document.getElementById("month-form");
    form.submit();
}
function submitlocation(){
	var lform = document.getElementById("location-form");
    lform.submit();
}
</script>
</html>





