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


$prev_month = $month - 1;
if ($prev_month == 0) {
    $prev_month = 12;
    $year--;
}

// 取得下一個月份
$next_month = $month + 1;
if ($next_month == 13) {
    $next_month = 1;
    $year++;
}


if (isset($_POST['mon'])){
    $changedmonth = $_POST['mon'];
	// $month = date("n");
	if($month < $changedmonth){
		echo $changedmonth;
		echo '
			<form method="post" action="2.php" id="month-form">
				<div class="choice">
					<select name="mon" onchange="submitMonth()">
						<option value="'.$prev_month.'">'.$prev_month.'月</option>
						<option value="'.$month.'">'.$month.'月</option>
						<option value="'.$changedmonth.'" selected>'.$next_month.'月</option>
					</select>
				</div>
			</form>';
	}elseif($month > $changedmonth){
		echo $changedmonth;
		echo '
			<form method="post" action="2.php" id="month-form">
				<div class="choice">
					<select name="mon" onchange="submitMonth()">
						<option value="'.$changedmonth.'" selected>'.$prev_month.'月</option>
						<option value="'.$month.'">'.$month.'月</option>
						<option value="'.$next_month.'">'.$next_month.'月</option>
					</select>
				</div>
			</form>';
	}else{
		echo $changedmonth;
		echo '
			<form method="post" action="2.php" id="month-form">
				<div class="choice">
					<select name="mon" onchange="submitMonth()">
						<option value="'.$prev_month.'">'.$prev_month.'月</option>
						<option value="'.$month.'" selected>'.$month.'月</option>
						<option value="'.$next_month.'">'.$next_month.'月</option>
					</select>
				</div>
			</form>';
	}




    // 取得當前月份的第一天是星期幾
    $firstDayOfWeek = date("N", mktime(0, 0, 0, $changedmonth, 1, $year));
    echo $firstDayOfWeek;
    // 取得當前月份的天數
    $daysInMonth = date("t", mktime(0, 0, 0, $changedmonth, 1, $year));

    // 輸出 HTML 表格開始標籤和表頭行
    echo "<table>";
    echo "<tr><th colspan=\"6\">" . $year."年".$changedmonth."月" . "</th></tr>";
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
    			$date = date_create("$year-$changedmonth-$day");
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
    			$date = date_create("$year-$changedmonth-$day");
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
    			$date = date_create("$year-$changedmonth-$day");
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
}else{


    echo '
	<form method="post" action="2.php" id="month-form">
		<div class="choice">
			<select name="mon" onchange="submitMonth()">
				<option value="'.$prev_month.'">'.$prev_month.'月</option>
				<option value="'.$month.'" selected>'.$month.'月</option>
				<option value="'.$next_month.'">'.$next_month.'月</option>
			</select>
		</div>
	</form>';


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
}




?>


</body>
<script>
function submitMonth() {
    var form = document.getElementById("month-form");
    form.submit();
}
</script>
</html>





