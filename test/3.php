<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
			<form method="post" action="reserve.php" id="month-form">
				<div class="choice">
					<!-- <select name="mon" onchange="submitMonth()">
						<option value="'.$prev_month.'">'.$prev_month.'月</option>
						<option value="'.$month.'">'.$month.'月</option>
						<option value="'.$changedmonth.'" selected>'.$next_month.'月</option>
					</select> -->
                    <select name="location" id="">
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
</body>
</html>