<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Записване на час в база от данни</title>
	<style>
		nav{
			font-size: 200%;
            padding-left: 4%;
			padding-bottom: 4%;
			font-weight: bold;
		}

		td{
			padding-bottom: 5%;
		}

		body{
			background-image: url("dentalbg.jpg");
			margin-left: 35%;
			margin-top: 6%;
			color: lightblue;
		}

		img{
			opacity: 0.5;
		}
		a{
			color: lightblue;
			text-decoration: none;
			font-size: 130%;
			opacity: 0.5;
		}

		a:hover{
			opacity: 1;
		}

		table{
			font-size: 150%;
			border: 1px solid;
			padding: 20px;
			border-radius: 5px;
		}

	</style>
</head>

<body>

	<form method="POST">
		<nav>Добавяне на час</nav>
		<table>
			<tr>
				<td>Име:</td>
				<td><input type="text" name="name" /></td>
			</tr>
			<tr>
				<td>ЕГН:</td>
				<td><input type="text" name="egn" /></td>
			</tr>
			<tr>
				<td>Телефон:</td>
				<td><input type="text" name="phone" /></td>
			</tr>
			<tr>
				<td>Лечение:</td>
				<td><input type="text" name="treatment" /></td>
			</tr>
			<tr>
				<td>Дата:</td>
				<td><input type="text" name="date" /></td>
			</tr>
            <tr>
				<td>Час:</td>
				<td><input type="text" name="time" /></td>
			</tr>
			<tr>
				<th colspan="2"><input type="submit" name="submit" value="Добави" /></th>
			</tr>
		</table>
	</form>
	<br />


	<?php
	include 'db_connection.php';
	if (isset($_POST['submit'])) {
		if ((!empty($_POST['name'])) && (!empty($_POST['egn'])) && (!empty($_POST['phone'])) && (!empty($_POST['treatment'])) && (!empty($_POST['date']))  && (!empty($_POST['time']))) {
			$pat_name = $_POST['name'];
			$pat_egn = $_POST['egn'];
			$pat_phone = $_POST['phone'];
			$pat_treatment = $_POST['treatment'];
			$pat_date = $_POST['date'];
            $pat_time = $_POST['time'];

			$sqlQuery = "INSERT INTO appointments (name,egn,phone,treatment,date,time) VALUES ('$pat_name', '$pat_egn', '$pat_phone', '$pat_treatment', '$pat_date', '$pat_time')";
			$result = mysqli_query($link, $sqlQuery) or die(mysqli_error($link));

			//извеждане на съобщение за грешка, ако изпълнението на заявката е неуспешно
			if (!$result)
				die("Добавянето на запис е неуспешно: " . mysqli_error($sqlQuery));
			else {
				echo 'Успешно добавен запис в таблицата.';
			}
		} else
			echo 'Моля, въведете всички полета за час.';
	}
	?>
	<p><a href="show_appointments.php">Покажи записаните часове </a></p>
	<p><a href="index.php">← Начало</a></p>

</body>

</html>