<?php

// 取得當前年份、月份、日期
$year = date('Y');
$month = date('m');
$day = 1;

// 取得當前月份的天數
$num_days = cal_days_in_month(CAL_GREGORIAN, $month, $year);
echo $num_days;

// 初始化星期幾與日期的陣列
$weekdays = array('日', '一', '二', '三', '四', '五', '六','日');
$dates = array();


// $current_date = strtotime("$year-$month-$day");
// while (date('m', $current_date) == $month) {
//     $date = date('Y-m-d', $current_date);
//     $weekday = date('N', strtotime($date));
//     $dates[] = array('date' => $date, 'weekday' => $weekdays[$weekday - 1]);
//     $current_date = strtotime('+1 day', $current_date);
// }

// for ($i = 0; $i < $num_days; $i++) {
//     $date = date('Y-m-d', strtotime("$year-$month-$day"));
//     $weekday = date('N', strtotime($date));
//     $dates[$i] = array('date' => $date, 'weekday' => $weekdays[$weekday]);
//     $day++;
//     if ($day > $num_days) {
//         break;
//     }
// }

// 產生出所有日期
for ($i = 0; $i < $num_days; $i++) {
    // $date = date('Y-m-d', strtotime("$year-$month-$day"));
    $date = date('Y-m-d', strtotime(sprintf("%04d-%02d-%02d", $year, $month, $day)));
    $weekday = date('N', strtotime($date));
    $dates[$i] = array('date' => $date, 'weekday' => $weekdays[$weekday]);
    $day++;
    
}
print_r($dates);



// // 產生出所有日期
// for ($i = 0; $i < $num_days; $i++) {
//     $date = date('Y-m-d', strtotime("$year-$month-$day"));
//     $weekday = date('N', strtotime($date));
    
//     // 檢查 $dates 陣列的大小，如果超過 7 則不再加入日期
//     if (count($dates) < 7) {
//         $dates[] = array('date' => $date, 'weekday' => $weekdays[$weekday]);
//     }
    
//     echo '<td>' . substr($date, 8) . '</td>';
//     if (($i + 1) % 5 === 0) {
//         echo '</tr><tr>';
//     }
    
//     $day++;
// }



// 產生表格
// echo '<table>';
// echo '<tr>';
// echo '<th></th>';
// for ($i = 1; $i <= 5; $i++) {
//     echo '<th>星期' . $weekdays[$i] . '</th>';
// }
// echo '</tr>';
// echo '<tr>';
// echo '<td>中午<br>12:30-13:25</td>';
// for ($i = 1; $i <= 5; $i++) {
//     $found = false;
//     foreach ($dates as $date) {
//         if ($date['weekday'] == $weekdays[$i] && substr($date['date'], -2) == '01') {
//             echo '<td>' . substr($date['date'], 5) . '</td>';
//             $found = true;
//             break;
//         }
//     }
//     if (!$found) {
//         echo '<td></td>';
//     }
// }
// echo '</tr>';
// echo '<tr>';
// echo '<td>下午<br>15:30-17:30</td>';
// for ($i = 1; $i <= 5; $i++) {
//     $found = false;
//     foreach ($dates as $date) {
//         if ($date['weekday'] == $weekdays[$i] && substr($date['date'], -2) == '01') {
//             echo '<td>' . substr($date['date'], 5) . '</td>';
//             $found = true;
//             break;
//         }
//     }
//     if (!$found) {
//         echo '<td></td>';
//     }
// }
// echo '</tr>';
// echo '</table>';



// echo '<table>';
// echo '<tr>';
// echo '<th></th>';
// for ($i = 1; $i <= $num_days; $i++) { // 修改為 $num_days
//     $date = $dates[$i-1]['date'];
//     $weekday = $weekdays[date('N', strtotime($date))];
//     echo '<th>星期' . $weekday . '<br>' . substr($date, 5) . '</th>';
// }
// echo '</tr>';
// echo '<tr>';
// echo '<td>中午<br>12:30-13:25</td>';
// for ($i = 1; $i <= $num_days; $i++) { // 修改為 $num_days
//     $date = $dates[$i-1]['date'];
//     if (date('H', strtotime($date)) >= 12 && date('H', strtotime($date)) < 13) {
//         echo '<td>X</td>';
//     } else {
//         echo '<td></td>';
//     }
// }
// echo '</tr>';
// echo '<tr>';
// echo '<td>下午<br>15:30-17:30</td>';
// for ($i = 1; $i <= $num_days; $i++) { // 修改為 $num_days
//     $date = $dates[$i-1]['date'];
//     if (date('H', strtotime($date)) >= 15 && date('H', strtotime($date)) < 18) {
//         echo '<td>X</td>';
//     } else {
//         echo '<td></td>';
//     }
// }
// echo '</tr>';
// echo '</table>';


echo '<table>';
echo '<tr>';
echo '<th></th>';
for ($i = 1; $i <= 5; $i++) {
    echo '<th>星期' . $weekdays[$i] . '</th>';
}
echo '</tr>';
echo '<tr>';
echo '<td>中午<br>12:30-13:25</td>';
for ($i = 1; $i <= 5; $i++) {
    $found = false;
    foreach ($dates as $date) {
        if ($date['weekday'] == $weekdays[$i] && substr($date['date'], -2) == '01') {
            echo '<td>' . substr($date['date'], 5) . '</td>';
            $found = true;
            break;
        }
    }
    if (!$found) {
        echo '<td></td>';
    }
}
echo '</tr>';

// // 產生表格
// echo '<table>';
// echo '<tr>';
// echo '<th></th>';
// for ($i = 1; $i <= 5; $i++) {
//     echo '<th>星期' . $weekdays[$i] . '</th>';
// }
// echo '</tr>';

// echo '<tr>';
// echo '<td>中午<br>12:30-13:25</td>';
// for ($i = 1; $i <= 5; $i++) {
//     $found = false;
//     foreach ($dates as $date) {
//         if ($date['weekday'] == $weekdays[$i] && substr($date['date'], -2) == '01') {
//             echo '<td>' . substr($date['date'], 5) . '</td>';
//             $found = true;
//             break;
//         }
//     }
//     if (!$found) {
//         echo '<td></td>';
//     }
// }
// echo '</tr>';

// echo '<tr>';
// echo '<td>下午<br>15:30-17:30</td>';
// for ($i = 1; $i <= 5; $i++) {
//     $found = false;
//     foreach ($dates as $date) {
//         if ($date['weekday'] == $weekdays[$i] && substr($date['date'], -2) == '01') {
//             echo '<td>' . substr($date['date'], 5) . '</td>';
//             $found = true;
//             break;
//         }
//     }
//     if (!$found) {
//         echo '<td></td>';
//     }
// }
// echo '</tr>';

// // 在進入下一個禮拜一時，插入一個新的tr標籤
// echo '<tr>';
// echo '<td>中午<br>12:30-13:25</td>';
// for ($i = 1; $i <= 5; $i++) {
//     $found = false;
// }




// // 產生表格
// echo '<table>';
// echo '<tr>';
// echo '<th></th>';
// for ($i = 1; $i <= 5; $i++) {
//     echo '<th>星期' . $weekdays[$i] . '</th>';
// }
// echo '</tr>';

// echo '<tr>';
// echo '<td>中午<br>12:30-13:25</td>';
// for ($i = 1; $i <= 5; $i++) {
//     $found = false;
//     foreach ($dates as $date) {
//         if ($date['weekday'] == $weekdays[$i] && substr($date['date'], -2) == '01') {
//             echo '<td>' . substr($date['date'], 5) . '</td>';
//             $found = true;
//             break;
//         }
//     }
//     if (!$found) {
//         echo '<td></td>';
//     }
// }
// echo '</tr>';

// echo '<tr>';
// echo '<td>下午<br>15:30-17:30</td>';
// for ($i = 1; $i <= 5; $i++) {
//     $found = false;
//     foreach ($dates as $date) {
//         if ($date['weekday'] == $weekdays[$i] && substr($date['date'], -2) == '01') {
//             echo '<td>' . substr($date['date'], 5) . '</td>';
//             $found = true;
//             break;
//         }
//     }
//     if (!$found) {
//         echo '<td></td>';
//     }
// }
// echo '</tr>';

// // 在進入下一個禮拜一時，插入一個新的tr標籤
// echo '<tr>';
// echo '<td>中午<br>12:30-13:25</td>';
// for ($i = 1; $i <= 5; $i++) {
//     $found = false;
//     foreach ($dates as $date) {
//         if ($date['weekday'] == $weekdays[$i] && substr($date['date'], -2) == '08') {
//             echo '<td>' . substr($date['date'], 5) . '</td>';
//             $found = true;
//             break;
//         }
//     }
//     if (!$found) {
//         echo '<td></td>';
//     }
// }
// echo '</tr>';

// echo '<tr>';
// echo '<td>下午<br>15:30-17:30</td>';
// for ($i = 1; $i <= 5; $i++) {
//     $found = false;
//     foreach ($dates as $date) {
//         if ($date['weekday'] == $weekdays[$i] && substr($date['date'], -2) == '08') {
//             echo '<td>' . substr($date['date'], 5) . '</td>';
//             $found = true;
//             break;
//         }
//     }
//     if (!$found) {
//         echo '<td></td>';
//     }
// }
// echo '</tr>';
// echo '</table>'



// 獲取當前年份和月份
$year = date('Y');
$month = date('m');

// 設置每個時間段的名稱
$time_slot1 = array('中午', '12:30-13:25');
$time_slot2 = array('中午', '15:30-17:30');

// 設置一個計數器，用於計算每個月份的日期數量
$day_count = 1;

// 獲取當前月份的天數
$days_in_month = date('t', mktime(0, 0, 0, $month, 1, $year));

// 創建一個表格
echo '<table>';

// 第一行為空行，僅為了排版
echo '<tr><th></th><th></th><th></th>';

// 遍歷每個日期，並在表格中添加相應的日期和星期幾
for ($i = 1; $i <= $days_in_month; $i++) {
    // 獲取當前日期的星期幾
    $day_of_week = date('N', mktime(0, 0, 0, $month, $i, $year));
    
    // 如果當前日期是星期一，則添加一個新的行
    if ($day_of_week == 1) {
        echo '</tr><tr><td>' . $time_slot1[0] . '<br>' . $time_slot1[1] . '</td><td></td><td></td>';
    }
    
    // 添加當前日期到表格中
    echo '<td>' . $month . '-' . sprintf("%02d", $day_count) . '</td>';
    
    // 如果當前日期是星期日，則添加一個新的行
    if ($day_of_week == 7) {
        echo '</tr><tr><td>' . $time_slot2[0] . '<br>' . $time_slot2[1] . '</td><td></td><td></td>';
    }
    
    // 將計數器加1
    $day_count++;
}

// 將表格結束
echo '</tr></table>';
?>
