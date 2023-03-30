<?php

// 設定時區
date_default_timezone_set('Asia/Taipei');


// 取得當前年份和月份
$year = date("Y");
$month = date("n");

// 取得當前月份的第一天是星期幾
$firstDayOfWeek = date("N", mktime(0, 0, 0, $month, 1, $year));

// 取得當前月份的天數
$daysInMonth = date("t", mktime(0, 0, 0, $month, 1, $year));

// 輸出 HTML 表格開始標籤和表頭行
echo "<table>";
echo "<tr><th colspan=\"6\">" . date("F Y") . "</th></tr>";
echo "<tr><th></th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th></tr>";

// 計算需要輸出的行數
$rows = ceil(($daysInMonth + $firstDayOfWeek - 1) / 7);

// 輸出每一行的日期

//日期欄位
for ($row = 1; $row <= $rows; $row++) {
    echo "<tr>";
	echo "<th>&nbsp;</th>"; // 新增一個空白欄位
    for ($col = 1; $col <= 5; $col++) {
        $day = ($row - 1) * 7 + $col - $firstDayOfWeek + 1;
        if ($day < 1 || $day > $daysInMonth) {
			echo "<th></th>";
			} else {
			$date = date_create("$year-$month-$day");
			$formattedDate = date_format($date, "m/d (D)");
			// echo "<th>$formattedDate</th>";
			echo "<td><a href=\"get_data.php?date=$formattedDate&time=12:30-13:25\">中午 12:30-13:25</a></td>";

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
			// echo "<td></td>";
			echo "<td>";
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
			echo "<td>";
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