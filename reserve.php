<?php
// // 設定時區
// date_default_timezone_set('Asia/Taipei');

// // 設定要抓取的年月份
// $year = date('Y');
// $month = date('m');

// // 取得當月份的天數
// $days_in_month = cal_days_in_month(CAL_GREGORIAN, $month, $year);

// // 建立表格開頭
// echo "<table border='1'>";
// echo "<tr><th>日期</th><th>星期幾</th></tr>";

// // 迴圈取得每一天的日期及星期幾
// for ($day = 1; $day <= $days_in_month; $day++) {
//     // 取得當天的時間戳記
//     $timestamp = strtotime("$year-$month-$day");
    
//     // 取得當天的日期
//     $date = date('Y-m-d', $timestamp);
    
//     // 取得當天的星期幾
//     $weekday = date('l', $timestamp);
    
//     // 將日期和星期幾以表格的形式呈現
//     echo "<tr><td>$date</td><td>$weekday</td></tr>";
// }

// // 建立表格結尾
// echo "</table>";
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
	  </style>
</head>
<body>

<?php

// 設定時區
date_default_timezone_set('Asia/Taipei');


// 取得當前年份和月份
$year = date("Y");
$month = date("n");

// 取得當前月份的第一天是星期幾
$firstDayOfWeek = date("N", mktime(0, 0, 0, $month, 1, $year));
echo $firstDayOfWeek;
// 取得當前月份的天數
$daysInMonth = date("t", mktime(0, 0, 0, $month, 1, $year));

// // 如果第一天不是星期一到星期五，則在表格中添加空白表格單元格
// if ($firstDayOfWeek > 5) {
//     echo "<tr><td colspan=\"6\"></td></tr>";
// }

// 輸出 HTML 表格開始標籤和表頭行
echo "<table>";
echo "<tr><th colspan=\"6\">" . date("F Y") . "</th></tr>";
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
			$formattedDate = date_format($date, "m/d (D)");
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
			$formattedDate = date_format($date, "m/d (D)");
			//將迴圈取得的日期格式做轉換
			$dateObj = DateTime::createFromFormat('m/d (D)', $formattedDate);
			$formattedData = $dateObj->format('Y-m-d');
			// echo "<td></td>";
			echo "<td>";
			// echo "<a href=\"./backend/get_data.php?date=$formattedData&time=12:30-13:25\">預約</a>";
			echo '<form action="./backend/get_data.php" method="POST">
					<input type="hidden" name="date" value=" '.$formattedData.'">
					<input type="hidden" name="time" value="12:30-13:25">
					<button type="submit">預約</button>
		  		 </form>';
			// if ($col == 1 && $row % 2 == 0) {
			//     echo "Text";
			// }
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
			$formattedDate = date_format($date, "m/d (D)");
			//將迴圈取得的日期格式做轉換
			$dateObj = DateTime::createFromFormat('m/d (D)', $formattedDate);
			$formattedData = $dateObj->format('Y-m-d');
			echo "<td>";
			// echo "<a href=\"./backend/get_data.php?date=$formattedData&time=15:30-17:30\">預約</a>";
			echo '<form action="./backend/get_data.php" method="POST">
					<input type="hidden" name="date" value=" '.$formattedData.'">
					<input type="hidden" name="time" value="15:30-17:30">
					<button type="submit">預約</button>
		  		 </form>';
			echo "</td>";
			}
		}
	// echo "<tr>";
	// echo "<td> </td>";
	echo "</tr>";

}

// 輸出 HTML 表格結束標籤
echo "</table>";
?>


</body>
</html>





