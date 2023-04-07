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
echo $today,'<br>';
$today_date = date_create($today); // 將今天日期轉換為 DateTime 物件


$prev_month = $month - 1;
if ($prev_month == 0) {
    $prev_month = 12;
    // $year--;
}

// 取得下一個月份
$next_month = $month + 1;
if ($next_month == 13) {
    $next_month = 1;
    // $year++;
}




if (isset($_POST['mon'])){
    $changedmonth = $_POST['mon'];
	// $month = date("n");
	echo $changedmonth;
	
	
  echo '<form method="post" action="./get_data.php" id="location-form">
<div class="choice">
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
</form>
';
  
  
  
  
  
  echo "now ",$month;
	echo "changed ",$changedmonth, ' ';
	if($month == 12 && $changedmonth == 1){
		$changedyear = $year + 1;
	}elseif($month == 1 && $changedmonth == 12){
		$changedyear = $year - 1;
	}elseif($month == 12 && $changedmonth == 12){
		$changedyear = $year;
	}elseif($month == 1 && $changedmonth == 1){
		$changedyear = $year;
	}else{
		$changedyear = $year;
	}
	echo $year , " ";
	echo $changedyear , " ";

    // 取得當前月份的第一天是星期幾
    $firstDayOfWeek = date("N", mktime(0, 0, 0, $changedmonth, 1, $changedyear));
    echo "fD",$firstDayOfWeek;
    // 取得當前月份的天數
    $daysInMonth = date("t", mktime(0, 0, 0, $changedmonth, 1, $changedyear));

    // 輸出 HTML 表格開始標籤和表頭行
    echo "<table>";
    echo "<tr><th colspan=\"6\">" . $changedyear."年".$changedmonth."月" . "</th></tr>";
    echo "<tr><th></th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th></tr>";

    // 計算需要輸出的行數
    $rows = ceil(($daysInMonth + $firstDayOfWeek - 1) / 7);

    echo "rows:",$rows;

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
    				$date = date_create("$changedyear-$changedmonth-$day");
    				$formattedDate = date_format($date, "Y/m/d (D)");
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
    				$date = date_create("$changedyear-$changedmonth-$day");
    				$formattedDate = date_format($date, "Y-m-d");
					$formattedDateObj = date_create($formattedDate); // 將預約日期轉換為 DateTime 物件
    				echo "<td>";
					if ($formattedDateObj >= $today_date) { // 如果預約日期在今天之後
    				// echo "<a href=\"./backend/get_data.php?date=$formattedData&time=12:30-13:25\">預約</a>";
    				echo 
            // '<form action="../backend/get_data.php" method="POST" id="commit-form">
    						'<input type="hidden" name="date" value=" '.$formattedDate.'">
    						<input type="hidden" name="time" value="12:30-13:25">
    						<button type="submit" onclick="submitForms()">預約</button>
    			  		 
                 ';
					}else{// 如果預約日期在今天之前
						echo '<button disabled>已過期</button>';
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
    				$date = date_create("$changedyear-$changedmonth-$day");
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

    // 輸出 HTML 表格結束標籤
    echo "</table>";

	if($month == 12 && $changedmonth == 1){
		echo '
			<form method="post" action="5.php" id="month-form">
				<div class="choice">
					<select name="mon" onchange="submitMonth()">
						<option value="'.$prev_month.'">'.$prev_month.'月</option>
						<option value="'.$month.'">'.$month.'月</option>
						<option value="'.$changedmonth.'" selected>'.$next_month.'月</option>
					</select>
				</div>
			</form>';
	}elseif($month == 1 && $changedmonth == 12){
		echo '
			<form method="post" action="5.php" id="month-form">
				<div class="choice">
					<select name="mon" onchange="submitMonth()">
						<option value="'.$changedmonth.'" selected>'.$prev_month.'月</option>
						<option value="'.$month.'">'.$month.'月</option>
						<option value="'.$next_month.'">'.$next_month.'月</option>
					</select>
				</div>
			</form>';
	}elseif($month > $changedmonth){
		echo '
			<form method="post" action="5.php" id="month-form">
				<div class="choice">
					<select name="mon" onchange="submitMonth()">
						<option value="'.$changedmonth.'" selected>'.$prev_month.'月</option>
						<option value="'.$month.'">'.$month.'月</option>
						<option value="'.$next_month.'">'.$next_month.'月</option>
					</select>
				</div>
			</form>';
	}elseif($month < $changedmonth){
		echo '
		<form method="post" action="5.php" id="month-form">
			<div class="choice">
				<select name="mon" onchange="submitMonth()">
					<option value="'.$prev_month.'">'.$prev_month.'月</option>
					<option value="'.$month.'">'.$month.'月</option>
					<option value="'.$changedmonth.'" selected>'.$next_month.'月</option>
				</select>
			</div>
		</form>';
	}else{
		echo '
			<form method="post" action="5.php" id="month-form">
				<div class="choice">
					<select name="mon" onchange="submitMonth()">
						<option value="'.$prev_month.'">'.$prev_month.'月</option>
						<option value="'.$month.'" selected>'.$month.'月</option>
						<option value="'.$next_month.'">'.$next_month.'月</option>
					</select>
				</div>
			</form>';
	}
	unset($changedmonth);
}else{


    



  echo '<form method="post" action="./get_data.php" id="location-form">
<div class="choice">
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
    			$formattedDate = date_format($date, "Y/m/d (D)");
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
					$formattedDateObj = date_create($formattedDate); // 將預約日期轉換為 DateTime 物件
    				// echo "<td></td>";
    				echo "<td>";
					if ($formattedDateObj >= $today_date) { // 如果預約日期在今天之後
    				// echo "<a href=\"./backend/get_data.php?date=$formattedData&time=12:30-13:25\">預約</a>";
    				echo 
            // '<form action="../backend/get_data.php" method="POST" id="commit-form">
    					'<input type="hidden" name="date" value=" '.$formattedDate.'">
    						<input type="hidden" name="time" value="12:30-13:25">
    						<button type="submit" onclick="submitForms()">預約</button>
    		  			 
                 ';
					}else{// 如果預約日期在今天之前
						echo '<button disabled>已過期</button>';
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

	echo '
	<form method="post" action="5.php" id="month-form">
		<div class="choice">
			<select name="mon" onchange="submitMonth()">
				<option value="'.$prev_month.'">'.$prev_month.'月</option>
				<option value="'.$month.'" selected>'.$month.'月</option>
				<option value="'.$next_month.'">'.$next_month.'月</option>
			</select>
		</div>
	</form>';
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





