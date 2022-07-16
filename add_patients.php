<!DOCTYPE html>
<html>

<head>
	<meta charset="utf-8">
	<title>Добавяне на пациент в база от данни</title>
	<style>
		nav{
			font-size: 200%;
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
		<nav>Добавяне на пациент</nav>
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
				<td>Възраст:</td>
				<td><input type="text" name="age" /></td>
			</tr>
			<tr>
				<td>Лечение:</td>
				<td><input type="text" name="treatment" /></td>
			</tr>
			<tr>
				<td>Алергии:</td>
				<td><input type="text" name="allergies" /></td>
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
		if ((!empty($_POST['name'])) && (!empty($_POST['egn'])) && (!empty($_POST['age'])) && (!empty($_POST['treatment'])) && (!empty($_POST['allergies']))) {
			$pat_name = $_POST['name'];
			$pat_egn = $_POST['egn'];
			$pat_age = $_POST['age'];
			$pat_treatment = $_POST['treatment'];
			$pat_allergies = $_POST['allergies'];

			$sqlQuery = "INSERT INTO patients (name,egn,age,treatment,allergies) VALUES ('$pat_name', '$pat_egn', '$pat_age', '$pat_treatment', '$pat_allergies')";
			$result = mysqli_query($link, $sqlQuery) or die(mysqli_error($link));

			//извеждане на съобщение за грешка, ако изпълнението на заявката е неуспешно
			if (!$result)
				die("Добавянето на запис е неуспешно: " . mysqli_error($sqlQuery));
			else {
				echo 'Успешно добавен запис в таблицата.';
			}
		} else
			echo 'Моля, въведете всички полета за пациент.';
	}
	?>
	<p><a href="show_patients.php">Покажи всички пациенти </a></p>
	<p><a href="show_patient_by_egn.php">Покажи данните за пациент по ЕГН</a></p>
	<p><a href="show_patients_allergies.php"> Покажи всички пациенти с определени алергии </a></p>
	<p><a href="index.php">← Начало</a></p>

</body>

</html>